
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="purple">
                <i class="material-icons">assignment</i>
            </div>
            <div class="card-content">
                <h4 class="card-title"> Trafik User Bookless </h4>
                <p class="text-info">Data diambil dari Kunjungan Bookless Waktu Sekarang Dengan ketentuan
                <ul>
                    <li>Hari, dan Jam Sekarang : <?=date('d-m-Y H:i:s')?></li>
                    <li>Menampilkan Berapa lama <span class="text-danger">Live</span> kunjungan dari user</li>
                    <li>Tekan <span class="text-warning">Reload</span></li>
                    <li>Menampilkan Total kunjungan dari User/Gues yang dalam sepekan telah mengakses bookless</li>
                    <li>Perhitungan diambil dari setiap hari user/gues berapa kali akses</li>
                    <li>ditambah dengan 7 hari terakhir </li>
                    <li>Admin akan mengetahui User dalam sepekan berapa kali berkunjung bookless</li>
                </ul>
                </p>
                <button id="user" class="btn btn-info">Reload</button>
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