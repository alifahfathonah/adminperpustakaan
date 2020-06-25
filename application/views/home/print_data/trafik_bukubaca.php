
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="purple">
                <i class="material-icons">assignment</i>
            </div>
            <div class="card-content">
                <h4 class="card-title"> Trafik Buku Dibaca </h4>
                <p class="text-info">Data diambil dari Kunjungan Bookless Waktu Sekarang Dengan ketentuan
                <ul>
                    <li>Hari, dan Jam Sekarang : <?=date('d-m-Y H:i:s')?></li>
                    <li>Menampilkan Berapa lama kunjungan dari user</li>
                    <li>Cek Kunjungan Umum atau Login. apakah ada aktivitas selama 5 menit yang lalu</li>
                    <li>Jika Ada aktivitas akan menambahkan waktu buka terakhir</li>
                    <li>Jika Belum ada aktivitas selama > 5 menit terakhir/ Browser ditutup / Broser Pindah </li>
                    <li>browser di tutup | tidak dibuka selama > 5 menit (script off di anggap offline) Maka Buat Id Open Baru</li>
                    <li>Ketika Buat id Open Baru, Maka id device dan pengguna tetap sama</li>
                </ul>
                </p>

                <table class="table table-striped live" id="table_bukubaca">
                    <thead>
                        <tr>
                            <th>Id User</th>
                            <th>Time Open</th>
                            <th>Time Live</th>
                            <th>Lama Baca</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
                <div class="form-group mb-2">
                    <label class="custom-control-label">Total Seluruh Jam Baca</label>
                    <div class="col-sm-1 ">
                      <input class="form-control" id="menit" type="text" readonly="" value="" name="">
                    </div>
                </div>
                <!-- <button id="buku" class="btn btn-info">Reload</button> -->
                <div class="toolbar">
                </div>
                <canvas id="myChart"></canvas>
            </div>
            <!-- end content-->
        </div>
        <!--  end card  -->
    </div>
    <!-- end col-md-12 -->
</div>