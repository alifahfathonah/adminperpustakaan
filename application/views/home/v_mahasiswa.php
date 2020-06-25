
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="purple">
                <i class="material-icons">assignment</i>
            </div>
            <div class="card-content">
                <h4 class="card-title"> Table Mahasiswa </h4>
                <div class="toolbar">
                <?php
                //echo showFlashMessage();
                    if(isset($_SESSION['warning']) || isset($_SESSION['error']) || isset($_SESSION['success']))
                    {
                    echo showFlashMessage();
                    unset($_SESSION['warning']);
                    unset($_SESSION['error']);
                    unset($_SESSION['success']);
                    }
                ?> 
                </div>

                <div class="material-datatables">
                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Nim</td>
                                <td>Nama</td>
                                <td>Gender</td>
                                <td>Tmp_lahir</td>
                                <td>Agama</td>
                                <td>Status</td>
                                <td class="disabled-sorting text-right">Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=0;
                            foreach ($query->result() as $row) : $no++;?>
                            <tr>
                                <td><?=$no;?></td>
                                <td><?php echo $row->nim;?></td>  
                                <td><?php echo $row->nama;?></td>   
                                <td><?php echo $row->gender;?></td>   
                                <td><?php echo $row->tmp_lahir;?></td>
                                <td><?php echo $row->agama;?></td>    
                                <td>
                                    <?php 
                                    $data = $row->status ;
                                    switch ($data) {
                                        case 'setuju':
                                            echo "<label class='text-success'>Approve</label>";
                                            break;
                                        case 'belum':
                                            echo "<label class='text-warning'>Belum</label>";
                                            break;
                                        default:
                                            echo "<label class='text-danger'>Blokir</label>";
                                            break;
                                    }
                                    ?>
                                    
                                <td class="td-actions text-right">
                                  <a href="<?php echo base_url('home/edit/'.$row->nim); ?>" class="btn btn-success">
                                    <i class="material-icons">edit</i>
                                  </a>
                                  <button type="button" rel="tooltip" class="btn btn-danger">
                                      <i class="material-icons">close</i>
                                  </button>
                                  <a href="#ModalDetail" id='<?php echo $row->nim;?>,<?php echo $row->nama;?>,<?=$row->tmp_lahir;?>,<?=$row->tgl_lahir;?>,<?=$row->gender;?>,<?=$row->jurusan;?>,<?=$row->alamat;?>,<?=$row->agama;?>,<?=$row->jurusan;?>,<?=$row->angkatan;?>,<?=$row->hp;?>,<?=$row->image;?>,<?=$row->status?>' data-toggle="modal"  class="detail-mahasiswa"><i class="material-icons">person</i></a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end content-->
        </div>
        <!--  end card  -->
    </div>
    <!-- end col-md-12 -->
</div>
<!-- Modal -->
        <div class="modal fade" id="ModalDetail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"><span class="fa fa-user"></span>&nbsp;Detail Mahasiswa</h4>
              </div>
              <div class="modal-body" id="IsiModal">
                ...
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal"><span class="fa fa-close"></span>Tutup</button>
                </div>
            </div>
          </div>
        </div>
