<div class="row" id="divDataToken">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Data Token Registrasi</h4>
                <p class="card-title-desc">
                    <a class="btn btn-primary waves-effect waves-light" href="javascript:void(0)" @click="tambahTokenAtc()">
                        <i class="mdi mdi-plus-box-multiple-outline"></i>
                        Create Token Baru
                    </a>&nbsp;
                </p>

                <div class="table-responsive">
                    <table class="table mb-0 table-hover" id="tblDataToken">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Email Member</th>
                                <th>Nama Member</th>
                                <th>Token</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dataToken as $token)
                            <tr>
                                <td>{{ $loop -> iteration }}</td>
                                <td>{{ $token -> email }}</td>
                                <td>{{ $token -> nama }}</td>
                                <td>{{ $token -> token }}</td>
                                <td>
                                    <a class="btn btn-warning btn-sm waves-effect waves-light" href="javascript:void(0)" onclick="deleteTokenAtc('{{ $token -> id }}')">
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

<!-- modal tambah token  -->
<div class="modal fade" tabindex="-1" role="dialog" id="modalTambahToken">
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
                    <label for="company">Email Member</label>
                    <input type="text" class="form-control" id="txtEmailMember">
                </div>
                <div class="form-group">
                    <label for="company">Nama Member</label>
                    <input type="text" class="form-control" id="txtNamaMember">
                </div>
                <div>
                    <strong>Pastikan member telah melakukan pembayaran untuk mengcreate token</strong><br />
                    <a href="javascript:void(0)" class="btn btn-primary" onclick="prosesCreateToken()">Proses Create Token</a>
                </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>


<script>
    $("#tblDataToken").dataTable();

    var appToken = new Vue({
        el: '#divDataToken',
        data: {

        },
        methods: {
            tambahTokenAtc: function() {
                $("#modalTambahToken").modal("show");
                console.log("Haloo");
            }
        }
    });

    function prosesCreateToken() {
        let email = document.querySelector("#txtEmailMember").value;
        let nama = document.querySelector("#txtNamaMember").value;

        if (email == "" || nama == "") {
            pesanUmumApp('warning', 'Isi field', 'Harap lengkap seluruh field !!!');
        } else {
            confirmQuest('info', 'Konfirmasi', 'Create token (Pastikan member sudah melakukan pembayaran) ...?', function(x) {
                konfirmasiCreateToken();
            });
        }
    }

    function konfirmasiCreateToken() {
        let email = document.querySelector("#txtEmailMember").value;
        let nama = document.querySelector("#txtNamaMember").value;

        let rProsesCreate = server + "token/create/process";

        let ds = {
            'email': email,
            'nama': nama
        }

        axios.post(rProsesCreate, ds).then(function(res) {
            $("#modalTambahToken").modal("hide");
            setTimeout(function() {
                if (res.data.status === "sukses") {
                    pesanUmumApp('success', 'Sukses', 'Token berhasil dicreate');
                    renderPage('registrasi/token/list', 'Token Registrasi Member');
                } else {

                }

            }, 300);

        });

    }

    function deleteTokenAtc(id) {
        confirmQuest('info', 'Konfirmasi', 'Hapus token member? (Menghapus token akan menghapus data member)', function(x) {
            konfirmasiHapusToken(id);
        });
    }

    function konfirmasiHapusToken(id)
    {
        let rTokenDelete = server + "token/delete/process";
        let ds = {'id':id}

        axios.post(rTokenDelete, ds).then(function(res){
            setTimeout(function() {
                if (res.data.status === "sukses") {
                    pesanUmumApp('success', 'Sukses', 'Token berhasil dihapus');
                    renderPage('registrasi/token/list', 'Token Registrasi Member');
                } else {

                }

            }, 300);
        });

    }
</script>