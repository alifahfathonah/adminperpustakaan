
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="rose">
                                    <i class="material-icons">perm_identity</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title">Edit Profile - <?php echo $this->nativesession->get('username');?> 
                                        <small class="category">Complete your </small>

                                    </h4>
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
                                    <?=form_open_multipart('mahasiswa/update')?>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group label-floating <?=setValidationStyle('nim')?>">
                                                    <label class="control-label">NIM</label>
                                                    <input type="text" name="nim" value="<?=$input->nim?>" class="form-control">
                                                    <?=form_hidden('nik',$input->nik)?>
                                                <?=setValidationIcon('nim') ?>
                                                <?=form_error('nim')?>
                                                </div>

                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group label-floating <?=setValidationStyle('nama')?>">
                                                    <label class="control-label">Nama Lengkap</label>
                                                    <input type="text" name="nama" class="form-control" value="<?=$input->nama?>">
                                                    <?=setValidationIcon('nama');?>
                                                    <?=form_error('nama')?>
                                                
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating <?=setValidationStyle('email')?>">
                                                    <label class="control-label">Alamat Email</label>
                                                    <input type="email" class="form-control" value="<?=$input->email?>" name="email" >
                                                    <?=setValidationIcon('email');?>
                                                    <?=form_error('email')?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group label-floating <?=setValidationStyle('tmp_lahir')?>">
                                                    <label class="control-label">Tempat Lahir</label>
                                                    <input type="text" value="<?=$input->tmp_lahir?>" class="form-control" name="tmp_lahir" >
                                                    <?=setValidationIcon('tmp_lahir');?>
                                                    <?=form_error('tmp_lahir')?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating <?=setValidationStyle('tgl_lahir')?>">
                                                    <label class="control-label">Tanggal Lahir</label>
                                                    <input type="date" value="<?=$input->tgl_lahir?>" class="form-control" name="tgl_lahir" >
                                                    <?=setValidationIcon('tgl_lahir');?>
                                                    <?=form_error('tgl_lahir')?>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group label-floating <?=setValidationStyle('angkatan')?>">
                                                    <label class="control-label">Angkatan</label>
                                                    <input type="text" value="<?=$input->angkatan?>" class="form-control" name="angkatan" >
                                                    <?=setValidationIcon('angkatan');?>
                                                    <?=form_error('angkatan')?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group label-floating <?=setValidationStyle('agama')?>">
                                                    <label class="control-label">Agama</label>
                                                    <select class="form-control" name="agama">
                                                        <option value="islam" <?=set_select('agama','islam',$input->agama == "islam" ? TRUE : FALSE );?> >Islam</option>
                                                        <option value="kristen" <?=set_select('agama','kristen',$input->agama == "kristen" ? TRUE : FALSE );?>>Kristen</option>
                                                        <option value="katolik" <?=set_select('agama','katolik',$input->agama == "katolik" ? TRUE : FALSE);?> >Katolik</option>
                                                        <option value="hindu" <?=set_select('agama','hindu',$input->agama == "hindu" ? TRUE : FALSE);?> >Hindu</option>
                                                        <option <?=set_select('agama','budha',$input->agama == "budha" ? TRUE : FALSE);?> value="budha" >Budha</option>
                                                        <option value="khonghuchu" <?=set_select('agama','khonghuchu',$input->agama == "khonghuchu" ? TRUE : FALSE);?>>Khonghuchu</option>
                                                    </select>
                                                    <?=setValidationIcon('agama');?>
                                                    <?=form_error('agama')?>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row">
                                                  <div class="form-group label-floating column-sizing <?=setValidationStyle('gender')?>">
                                                    <label class=" control-label col-sm-2"  >Gender<small>*</small></label>
                                                  
                                                    <div class="col-sm-6">
                                                        <div class="form-group label-floating column-sizing">
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="gender" value="Perempuan" <?=set_radio('gender','Perempuan',$input->gender == "Perempuan" ? TRUE : FALSE)?> >P
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group label-floating column-sizing">
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="gender"  value="Laki-laki" <?=set_radio('gender','Laki-laki',$input->gender == "Laki-laki" ? TRUE : FALSE)?> >L
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <?=setValidationIcon('gender');?>
                                                    <?=form_error('gender')?>
                                                  </div>
                                              </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating <?=setValidationStyle('jurusan')?>">
                                                    <label class="control-label">Jurusan</label>
                                                    <input type="text" value="<?=$input->jurusan?>" class="form-control" name="jurusan">
                                                    <?=setValidationIcon('jurusan');?>
                                                    <?=form_error('jurusan')?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-group label-floating <?=setValidationStyle('alamat')?>">
                                                        <label class="control-label">Alamat tempat tinggal.</label>
                                                        <textarea class="form-control" name="alamat" rows="3"><?=$input->alamat?></textarea>
                                                    <?=setValidationIcon('alamat');?>
                                                    <?=form_error('alamat')?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-md-offset-1">
                                                <div class="form-group label-floating <?=setValidationStyle('kode_post')?>">
                                                    <label class="control-label">Kode Post</label>
                                                    <input type="text" value="<?=$input->kode_post?>" name="kode_post" class="form-control">

                                                    <?=setValidationIcon('kode_post');?>
                                                    <?=form_error('kode_post')?>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-md-offset-1">
                                                <div class="form-group label-floating <?=setValidationStyle('hp')?>">
                                                    <label class="control-label">HP</label>
                                                    <input type="text" value="<?=$input->hp?>" name="hp" class="form-control">
                                                    <?=setValidationIcon('hp');?>
                                                    <?=form_error('hp')?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="control-label label-floating column-sizing <?=setValidationStyle('image')?>">Image</label>
                                                <div class="form-footer text-right">
                                                  <input type="file" name="image" class="" />
                                                  <?=
                                                    fileFormError('image','<p class="form-error">','</p>');
                                                  ?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-3">
                                                <div class="form-group label-floating column-sizing <?=setValidationStyle('password')?>">
                                                    <label class="control-label"></label>
                                                    <input class="form-control" name="password" value="<?=$input->password?>" id="" type="text" placeholder="Ganti Password" />

                                                    <?=setValidationIcon('password');?>
                                                    <?=form_error('password')?>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group label-floating column-sizing <?=setValidationStyle('confirmpassword')?>">
                                                    <label class="control-label"></label>
                                                    <input class="form-control" name="confirmpassword" id="" type="text" placeholder="#Ulangi Password" equalTo="#idSource" />

                                                    <?=setValidationIcon('confirmpassword');?>
                                                    <?=form_error('confirmpassword')?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2 col-md-offset-8">
                                                <button type="submit" class="btn btn-rose pull-right">Update</button>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-profile">
                                <div class="card-avatar">
                                    <a href="#pablo">
                                        <?php
                                            $img = $input->image;
                                            if ($img){?>
                                            <img class="img" src="<?php echo base_url("assets/mahasiswa/asli/$input->image")?>" />'
                                                
                                            
                                            <?php }else{ ?>
                                             <img class="img" src="<?php echo base_url()?>assets/img/userlogo.jpg" />
                                            <?php } ?>
                                        ?>
                                        
                                    </a>
                                </div>
                                <div class="card-content">
                                    <h6 class="category text-gray"><?=$input->jurusan;?></h6>
                                    <h4 class="card-title"><?=$input->nama?></h4>
                                    <p class="description">
                                        <?=$input->alamat;echo $input->kode_post;?>
                                    </p>
                                    <a href="#pablo" class="btn btn-rose btn-round">Follow</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>