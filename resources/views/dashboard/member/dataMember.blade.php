<div class="row" id="divDataMember">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Data Registrasi Member</h4>
                <div class="table-responsive">
                    <table class="table mb-0 table-hover" id="tblDataMember">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Email Member</th>
                                <th>Nama Member</th>
                                <th>No Handphone</th>
                                <th>Jurusan</th>
                                <th>Alamat</th>
                                <th>Status Pembayaran</th>
                                <th>Telegram ID</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dataMember as $token)
                            <tr>
                                <td>{{ $loop -> iteration }}</td>
                                <td>{{ $token -> email }}</td>
                                <td>{{ $token -> nama }}</td>
                                <td>{{ $token -> hp }}</td>
                                <td>{{ $token -> jurusan }}</td>
                                <td>{{ $token -> alamat }}</td>
                                <td>Selesai</td>
                                <td>{{ $token -> telegram_id }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    $("#tblDataMember").dataTable();
</script>