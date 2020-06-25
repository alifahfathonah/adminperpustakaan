
        <h2>EDIT DATA MAHASISWA</h2>
        <form role="form" action="<?= $this->config->base_url(); ?>home/prosesedit" method="post" enctype="multipart/form-data">      
            
            <div>
                <label>Nama</label> :
                <input type="text" name="nama" value="<?=$k->row('nama');?>">
            </div>
           <div>
                <label>Nim</label> :
                <input type="text" name="nim" value="<?=$k->row('nim');?>">
            </div>
             <div>
                <label>Nik</label> :
                <input type="text" name="nik" value="<?=$k->row('nik');?>">
            </div>
             <div>
                <label>Alamat</label> :
                <input type="text" name="alamat" value="<?=$k->row('alamat');?>">
            </div>
            <div>
                <label>Kode post</label> :
                <input type="text" name="kode_post" value="<?=$k->row('kode_post');?>">
            </div>
             <div>
                <label>Gender</label> :
                <input type="text" name="gender" value="<?=$k->row('gender');?>">
            </div>
             <div>
                <label>Tempat Lahir</label> :
                <input type="text" name="tmp_lahir" value="<?=$k->row('tmp_lahir');?>">
            </div>
             <div>
                <label>Tanggal lahir</label> :
                <input type="text" name="tgl_lahir" value="<?=$k->row('tgl_lahir');?>">
            </div>
             <div>
                <label>Agama</label> :
                <input type="text" name="agama" value="<?=$k->row('agama');?>">
            </div>
             <div>
                <label>Jurusan</label> :
                <input type="text" name="jurusan" value="<?=$k->row('jurusan');?>">
            </div>
             <div>
                <label>Angkatan</label> :
                <input type="text" name="angkatan" value="<?=$k->row('angkatan');?>">
            </div>
             <div>
                <label>Hp</label> :
                <input type="text" name="hp" value="<?=$k->row('hp');?>">
            </div>
             <div>
                <label>Email</label> :
                <input type="text" name="email" value="<?=$k->row('email');?>">
            </div>
             <div>
                <label>Password</label> :
                <input type="text" name="password" value="<?=$k->row('password');?>">
            </div>
            <div>
                <button  name="submit">Edit</button>
            </div>
        </form>
    
