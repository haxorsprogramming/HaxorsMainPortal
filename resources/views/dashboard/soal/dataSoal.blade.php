<div class="row" id="divDataSoal">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Data Soal Test</h4>
                <p class="card-title-desc">
                    <a class="btn btn-primary waves-effect waves-light" href="javascript:void(0)" onclick="tambahSoalAtc()">
                        <i class="mdi mdi-plus-box-multiple-outline"></i>
                        Create Soal Baru
                    </a>&nbsp;
                </p>

                <div class="table-responsive">
                    <table class="table mb-0 table-hover" id="tblDataSoal">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kd Soal</th>
                                <th style="width: 800px;">Soal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($dataSoal as $soal)
                        <tr>
                            <td>{{ $loop -> iteration }}</td>
                            <td>{{ $soal -> kode_soal }}</td>
                            <td>{{ $soal -> soal }}</td>
                            <td>
                            <a class="btn btn-warning btn-sm waves-effect waves-light" href="javascript:void(0)" onclick="deleteSoal('{{ $soal -> kode_soal }}')">
                                        <i class="mdi mdi-folder-edit-outline"></i>
                                        Hapus
                                    </a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- modal tambah soal  -->
<div class="modal fade" tabindex="-1" role="dialog" id="modalTambahSoal">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Token</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="company">Pertanyaan untuk test</label>
                    <textarea class="form-control" style="resize:none;" id="txtSoal"></textarea>
                </div>
                <div>
                    <a href="javascript:void(0)" class="btn btn-primary" onclick="prosesCreateSoal()">Proses Tambah Soal</a>
                </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>


<script>
    $("#tblDataSoal").dataTable();

    function tambahSoalAtc()
    {
        $("#modalTambahSoal").modal("show");
    }

    function prosesCreateSoal()
    {
        let isiSoal = document.querySelector("#txtSoal").value;
        if(isiSoal === ""){
            pesanUmumApp('warning', 'Isi field', 'Harap lengkap seluruh field !!!');
        }else{
            confirmQuest('info', 'Konfirmasi', 'Proses tambah soal baru ...?', function(x) {
                konfirmasiCreateSoal();
            });
        }
    }

    function konfirmasiCreateSoal()
    {
        let isiSoal = document.querySelector("#txtSoal").value;
        let ds = {'isi':isiSoal}
        let rProsesCreateSoal = server + "soal/create/process";

        axios.post(rProsesCreateSoal, ds).then(function(res){
            $("#modalTambahSoal").modal("hide");
            setTimeout(function() {
                if (res.data.status === "sukses") {
                    pesanUmumApp('success', 'Sukses', 'Soal berhasil dicreate');
                    renderPage('soal/list', 'Data Soal');
                } else {

                }

            }, 300);

        });
    }

    function deleteSoal(kdSoal)
    {
        confirmQuest('info', 'Konfirmasi', 'Hapus soal? ... ', function(x) {
            konfirmasiHapusSoal(kdSoal);
        });
    }

    function konfirmasiHapusSoal(kdSoal)
    {
        let ds = {'kd':kdSoal}
        let rProsesDeleteSoal = server + "soal/delete/process";

        axios.post(rProsesDeleteSoal, ds).then(function(res){
            pesanUmumApp('success', 'Sukses', 'Soal berhasil dihapus');
            renderPage('soal/list', 'Data Soal');
        });

    }

</script>