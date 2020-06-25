
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="purple">
                <i class="material-icons">assignment</i>
            </div>
            <div class="card-content">
                <h4 class="card-title"> Trafik Jam Aktif </h4>
                <p class="text-info">
                  Data diambil dari Kunjungan Bookless Waktu Sekarang dengan ketentuan
                    <ul>
                        <li>Hari, dan Jam Sekarang : <?=date('d-m-Y H:i:s',time())?></li>
                        <li>Menampilkan Total Kunjungan akses Bookless <span class="text-rose">perhari</span> </li>
                        <li>Pengambilan <span class="text-primary">Live</span>  mulai jam 00:00 sampai 23:00 setiap hari</span>)
                        <li>Cek Kunjungan Umum atau Login. sesuai group id device(<span class="text-primary">Browser/perangkat</span>)</li>
                        <li>Menampilkan Jumlah pengunjung dalam Sepekan dimulai sekarang juga -7 hari sebelumnya </li>
                        <li>Jika 1 akun/user buka 2 browser/perangkat maka dihitung 2 entri</li>
                    </ul>
                </p>
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

