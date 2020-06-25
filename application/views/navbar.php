
            <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-minimize">
                        <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                            <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                            <i class="material-icons visible-on-sidebar-mini">view_list</i>
                        </button>
                    </div>
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"><?=$halaman?>  </a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href='#pablo' class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">dashboard</i>
                                    <p class="hidden-lg hidden-md">Dashboard</p>
                                </a>
                                <?php if ($level=="mahasiswa") { ?>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="http://bookless.id/simulasi/buku/ " target="_blank ">
                                          <i class="material-icons">
                                          local_library
                                          </i>Buka Bookless
                                        </a>
                                    </li>
                                </ul>
                                <?php } ?>
                            </li>
                            <?php if ($level=="admin") { ?>
                            <li class="nav-item dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                  <i class="material-icons">notifications</i>
                                  <span class="notification"><?=$jumlah?></span>
                                  <p class="hidden-lg hidden-md">
                                      Notifications
                                      <b class="caret"></b>
                                  </p>
                              </a>
                              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <div>
                                  <?php if ($jumlah >=1): ?>
                                    
                                  <ul class="list-group notif" >
                                    <li>
                                      <button class="btn btn-sm" id="dibaca">Tandai sudah baca</button>
                                    </li>
                                    
                                    <div id="result">
                                      <?php foreach ($data->result() as $key ): ?>
                                        <li class="list-group-item"><?php echo $key->log_user; ?> <?=$key->log_desc?><label class="text-danger">(<?= $this->printwaktu->time_stamp(strtotime($key->log_time));?>)</label> </li>
                                        <?php $lihat = $key->log_id  ;?>
                                      <?php endforeach ?>
                                      <?php if ($data->num_rows() >= '8'): ?>
                                        <div class="pagging">
                                          <li><button class="btn btn-sm" onclick="lihat('<?php echo $lihat ?>')" id="">Lihat Selangkapnya..</button></li>
                                        </div>
                                      <?php else: ?>
                                        <div class="pagging">
                                          <li><button id="end" class="btn btn-sm">No Page</button></li>
                                        </div>
                                      <?php endif ?>
                                    </div>
                                  </ul>

                                  <?php endif ?>
                                </div>
                              </div>
                            </li>
                            <?php }?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-sign-out-alt"></i>
                                    <p class="hidden-lg hidden-md">Profile <b class="caret"></b></p>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="<?php echo base_url('login/logout'); ?>">Keluar</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="separator hidden-lg hidden-md"></li>
                        </ul>
                    </div>
                </div>
            </nav>