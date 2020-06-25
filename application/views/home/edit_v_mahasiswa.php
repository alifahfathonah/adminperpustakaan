  <div class="row">
    
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-icon" data-background-color="green">
          <i class="material-icons">language</i>
        </div>
        <div class="card-content">

          <!-- <?php echo validation_errors(); ?> -->
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


          <h4 class="card-title">Edit Mahasiswa </h4>
          <div class="row">
            <div class="col-md-5">
              <form role="form" action="<?= $this->config->base_url(); ?>home/prosesedit" method="post" enctype="multipart/form-data" class="form-horizontal">      
                <div class="row">
                  <label class="col-md-3 label-on-left" for="nama">Nama</label>
                  <div class="col-md-9">
                    <div class="form-group label-floating is-empty <?=setValidationStyle('nama') ;?>">
                      <label for="name " class="control-label"></label>
                      <input type="text" class="form-control" name="nama" value="<?=$k->nama;?>">
                      <input type="hidden" class="form-control" name="nim" value="<?=$k->nim;?>">                    
                      <?=setValidationIcon('nama');?>
                      <?=form_error('nama');?>
                    </div>
                  </div>
                </div> 
                 <div class="row">
                  <label for="" class="col-md-3 label-on-left">Nik</label>
                  <div class="col-md-9">
                    <div class="form-group label-floating is-empty <?=setValidationStyle('nik') ;?>">
                      <label for="nik" class="control-label"></label>
                      <input type="text" name="nik" value="<?=$k->nik?>" class="form-control">
                      <?=setValidationIcon('nik');?>
                      <?=form_error('nik');?>
                    </div>
                  </div>
                </div>
                 <div class="row">
                  <label for="" class="col-md-3 label-on-left">Alamat</label>
                  <div class="col-md-9">
                    <div class="form-group <?=setValidationStyle('alamat') ;?> label-floating is-empty">
                      <label class="control-label"></label>
                      <input type="text" class="form-control" name="alamat" value="<?=$k->alamat?>">
                      <?=setValidationIcon('alamat');?>
                      <?=form_error('alamat');?>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-md-3 label-on-left">Kode post</label>
                  <div class="col-md-9">
                    <div class="form-group label-floating is-empty <?=setValidationStyle('kode_post') ;?> ">
                      <label for="" class="control-label"> </label>
                      <input type="text" name="kode_post" value="<?=$k->kode_post;?>" class="form-control">
                      <?=setValidationIcon('kode_post');?>
                      <?=form_error('kode_post');?>
                    </div>
                  </div>
                </div>
                 <div class="row">
                    <label class="col-md-3 label-on-left">Gender</label>
                    <div class="col-md-9">
                      <div class="form-group label-floating is-empty <?=setValidationStyle('gender') ;?>">
                        <label for="" class="control-label"></label>
                          <!-- <input type="text" name="gender" value="<?=$k->gender;?>" class="form-control"> -->
                          <div class="row">
                            <div class="col-sm-6">
                              <input type="radio" name="gender" value="Laki-laki" <?=set_radio('gender','Laki-laki',$k->gender == 'Laki-laki' ? True : False );?> > Laki-laki
                            </div>
                            <div class="col-sm-6">
                              <input type="radio" name="gender" value="Perempuan" <?=set_radio('gender','Perempuan',$k->gender == 'Perempuan' ? True : False );?> > Perempuan
                            </div>
                          </div>
                          <div class="row">
                            <?=setValidationIcon('gender');?>
                            <?=form_error('gender');?>
                            
                          </div>
                      </div>
                    </div>
                </div>
                 <div class="row">
                    <label class="col-md-3 label-on-left">Tempat Lahir</label>
                    <div class="col-md-9">
                      <div class="form-group label-floating is-empty <?=setValidationStyle('tmp_lahir') ;?>">
                        <label for="" class="control-label"></label>
                        <input type="text" name="tmp_lahir" value="<?=$k->tmp_lahir;?>" class="form-control">
                        <?=setValidationIcon('tmp_lahir');?>
                        <?=form_error('tmp_lahir');?>
                      </div>
                    </div>
                </div>
                 <div class="row">
                    <label class="col-md-3 label-on-left">Tanggal Lahir</label>
                    <div class="col-md-9">
                      <div class="form-group label-floating is-empty <?=setValidationStyle('tgl_lahir') ;?>">
                        <label for="" class="control-label"></label>
                        <input type="date" name="tgl_lahir" value="<?=$k->tgl_lahir;?>" class="form-control" >
                        <?=setValidationIcon('tgl_lahir');?>
                        <?=form_error('tgl_lahir');?>
                      </div>
                    </div>
                </div>
                 <div class="row">
                    <label class="col-md-3 label-on-left">Agama</label>
                    <div class="col-md-9">
                      <div class="form-group label-floating is-empty <?=setValidationStyle('agama') ;?>">
                        <label for="" class="control-label"></label>
                        <!-- <input type="text" name="agama" value="<?=$k->agama;?>" class="form-control" > -->
                        <select name="agama" id="agama" class="form-control">
                          <option value ="kristen" <?=set_select('agama','kristen', $k->agama=='kristen'? true:false );?> >Kristen</option>
                          <option value ="islam" <?=set_select('agama','islam', $k->agama=='islam'? true:false );?> >Islam</option>
                          <option value ="khatolik" <?=set_select('agama','khatolik', $k->agama=='khatolik'? true:false );?> >Khatolik</option>
                          <option value ="hindu" <?=set_select('agama','hindu', $k->agama=='hindu'? true:false );?> >Hindu</option>
                          <option value ="khonghucu" <?=set_select('agama','khonghucu', $k->agama=='khonghucu'? true:false );?> >Khonghucu</option>
                          <option value ="budha" <?=set_select('agama','budha', $k->agama=='budha'? true:false );?> >Budha</option>
                        </select>
                        <?=setValidationIcon('agama');?>
                        <?=form_error('agama');?>
                      </div>
                    </div>
                </div>
                 <div class="row">
                    <label class="label-on-left col-md-3">Jurusan</label>
                    <div class="col-md-9">
                      <div class="form-group label-floating is-empty <?=setValidationStyle('jurusan') ;?>">
                        <label for="jurusan" class="control-label"></label>
                        <input type="text" name="jurusan" value="<?=$k->jurusan;?>" class="form-control">
                        <?=setValidationIcon('jurusan');?>
                        <?=form_error('jurusan');?>
                      </div>
                    </div>
                </div>
                 <div class="row">
                    <label class="label-on-left col-md-3">Angkatan</label>
                    <div class="col-md-9">
                      <div class="form-group label-floating is-empty <?=setValidationStyle('angkatan') ;?>">
                        <label for="angkatan" class="control-label"></label>
                        <input type="number" name="angkatan" value="<?=$k->angkatan;?>" class="form-control">
                        <?=setValidationIcon('angkatan');?>
                        <?=form_error('angkatan');?>
                      </div>
                    </div>
                </div>
                 <div class="row">
                    <label class="label-on-left col-md-3">Hp</label>
                    <div class="col-md-9">
                      <div class="form-group label-floating is-empty <?=setValidationStyle('hp') ;?>">
                        <label for="hp" class="control-label"></label>
                        <input type="number" name="hp" value="<?=$k->hp;?>" class="form-control">
                        <?=setValidationIcon('hp');?>
                        <?=form_error('hp');?>
                      </div>
                    </div>
                </div>
                 <div class="row">
                    <label class="label-on-left col-md-3">Email</label>
                    <div class="col-md-9">
                      <div class="form-group label-floating is-empty <?=setValidationStyle('email') ;?>">
                        <label for="email" class="control-label"></label>
                        <input class="form-control" type="email" name="email" value="<?=$k->email;?>">
                        <?=setValidationIcon('email');?>
                        <?=form_error('email');?>
                      </div>
                    </div>
                </div>
                 <div class="row">
                    <label class="col-md-3 label-on-left">Password</label>
                    <div class="col-md-9">
                      <div class="form-group label-floating is-empty">
                        <label for="password" class="control-label"></label>
                        <input type="password" name="password" value="<?=$k->password;?>" class="form-control">
                      </div>
                    </div>
                </div>
                <div class="row">
                  <label class="col-md-3"></label>
                    <button class="btn btn-info" name="submit">Edit</button>
                </div>
            </form>
    

            </div>
          </div>
        </div>
      </div>

    </div>

  </div>    

