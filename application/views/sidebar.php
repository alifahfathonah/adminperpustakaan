<!-- SideBar Mahsiswa -->

<?php if ($level=="mahasiswa") :?>
        <div class="sidebar" data-active-color="rose" data-background-color="black" data-image="<?php echo base_url();?>assets/img/sidebar-1.jpg">
            <!--
                Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
                Tip 2: you can also add an image using data-image tag
                Tip 3: you can change the color of the sidebar with data-background-color="white | black"
            -->
            <div class="logo">
                <a href="" class="simple-text">
                    Halaman Mahasiswa
                </a>
            </div>
            <div class="logo logo-mini">
                <a href="#" class="simple-text">
                    EL
                </a>
            </div>
            <div class="sidebar-wrapper">
                <div class="user">
                    <div class="photo">
                        <img src="<?php echo base_url(); ?>assets/img/logo.jpg" />
                    </div>
                    <div class="info">
                        <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                            <?php echo $username; ?>
                            <b class="caret"></b>
                        </a>
                        <div class="collapse" id="collapseExample">
                            <ul class="nav">
                                <li>
                                    <a href="<?php echo base_url('mahasiswa/profile'); ?>">My Profile</a>
                                </li>
                                <li>
                                    <a href="#">Settings</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <ul class="nav">
                    <li <?php $hasil =($halaman=='dashboard')? $h ="class='active'": $h=""; echo $hasil;?>>
                        <a href="<?=base_url('mahasiswa/home')?>">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <li <?php $hasil=($halaman=='upload')? $h="class='active'": $h=""; echo $hasil; ?> >
                        <a href="<?=base_url('mahasiswa/upload')?>">
                            <i class="material-icons">account_box</i>
                            <p>Upload</p>
                        </a>
                    </li>
                    <li <?=$hasil=($halaman=='history')? $h="class='active' ": $h=""; echo $hasil ?> >
                        <a href="<?=base_url('mahasiswa/history')?>">
                            <i class="material-icons">dashboard</i>
                            <p>History Buku</p>
                        </a>
                    </li>
                   
                </ul>
            </div>
        </div>
    
<?php else: ?>
        <div class="sidebar" data-active-color="rose" data-background-color="black" data-image="<?php echo base_url();?>assets/img/sidebar-1.jpg">
            <!--
                Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
                Tip 2: you can also add an image using data-image tag
                Tip 3: you can change the color of the sidebar with data-background-color="white | black"
            -->
            <div class="logo">
                <a href="<?=base_url('home');?>" class="simple-text">
                    Halaman Admin
                </a>
            </div>
            <div class="logo logo-mini">
                <a href="#" class="simple-text">
                    EL
                </a>
            </div>
            <div class="sidebar-wrapper">
                <div class="user">
                    <div class="photo">
                        <img src="<?php echo base_url(); ?>assets/img/logo.jpg" />
                    </div>
                    <div class="info">
                        <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                            <?php echo $username; ?>
                            <b class="caret"></b>
                        </a>
                        <div class="collapse" id="collapseExample">
                            <ul class="nav">
                                <li>
                                    <a href="#">Settings</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <ul class="nav">
                    <li <?php $hasil =($halaman=='dashboard')? $h ="class='active'": $h=""; echo $hasil;?> >
                        <a href="<?php echo base_url('home') ?>">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#pagesExamples">
                            <i class="material-icons">image</i>
                            <p>Print Data
                                <b class="caret"></b>
                            </p>
                        </a>
                        <?php $hasil = (isset($collapse)) ? "in" : '' ; ?>
                        <div class="collapse <?php echo $hasil ; ?> " id="pagesExamples">
                            <ul class="nav">
                                <li <?php $h = ($halaman=='trafikPengunjung') ? "class='active'" : '' ; echo $h; ?>>
                                    <a href="<?php echo base_url('home/trafikPengunjung');?>">Statistik Pengunjung</a>
                                </li>
                                <li <?php $h = ($halaman=='trafikJamAktif') ? "class='active'" : '' ; echo $h; ?>>
                                    <a href="<?=base_url('home/trafikJamAktif');?>">Statistik Hari Aktif</a>
                                </li>
                                <li <?php $h = ($halaman=='trafikBuku') ? "class='active'" : '' ; echo $h; ?> >
                                    <a href="<?=base_url('home/trafikBuku')?>" >Trafik Baca Buku</a>
                                </li>
                                <?php $h = ($halaman=='trafikUser') ? 'active' : '' ; ?>
                                <li class="<?= $h ;?>">
                                    <a href="<?php echo base_url('home/trafikuser'); ?>">Trafik Dari User</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    
                    <li>
                        <a data-toggle="collapse" href="#laporan">
                            <i class="material-icons">print</i>
                            <p>Cetak Laporan
                                <b class="caret"></b>
                            </p>
                        </a>
                        <?php $hasil =  ($halaman=='laporan') ? "in" : '' ; ?>
                        <div class="collapse <?php echo $hasil ; ?> " id="laporan">
                            <ul class="nav">
                                <?php $h = ($halaman=='laporan') ? 'active' : '' ; ?>
                                <li class="<?= $h ;?>">
                                    <a href="<?php echo base_url('Laporan'); ?>">Laporan</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li <?php $hasil =($halaman=='mahasiswa')? $h ="class='active'": $h=""; echo $hasil;?>>
                        <a href="<?php echo base_url('home/mahasiswa')?>">
                            <i class="material-icons">dashboard</i>
                            <p>Mahasantri</p>
                        </a>
                    </li>
                    <?php if ($level=="admin") { ?>
                      
                    <li <?php $hasil =($halaman=='user')? $h ="class='active'": $h=""; echo $hasil;?> >
                        <a href="<?php echo base_url('User');?>">

                            <i class="material-icons">dashboard</i>
                            <p>User</p>
                        </a>
                    </li>
                        
                    <?php } ?>
                    <li <?= $hasil = ($halaman=='bebasPustaka') ? $h="class='active'" : $h="" ; echo $hasil; ;?>>
                        <a href="<?= base_url('home/bebaspustaka') ;?>">
                            <i class="material-icons">dashboard</i>
                            <p>Bebas Pustaka</p>
                        </a>
                    </li>
                    <li <?= $hasil = ($halaman=='listbuku') ? $h="class='active'" : $h="" ; echo $hasil; ;?> >
                        <a href="<?=base_url('home/listBuku')?>">
                            <i class="material-icons">dashboard</i>
                            <p>List Buku</p>
                        </a>
                    </li>
                   
                </ul>
            </div>
        </div>

<?php endif;?>