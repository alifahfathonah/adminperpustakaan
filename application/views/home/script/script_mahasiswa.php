<script src="<?php echo base_url(); ?>assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#datatables').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            }
        });
        var table = $('#datatables').DataTable();

        // Edit record
        table.on('click', '.btn-info', function(e) {
            $tr = $(this).closest('tr');
            var data = table.row($tr).data();
            $("#exampleModal").modal('show');
            $("#nama").val(console.log(data));
            $("#nim").val(data[0]);
            $("#nik").val(data[1]);
            $("#nama").val(data[2]);
            $("#alamat").val(data[3]);
            $("#gender").val(data[4]);
            $("#tmp_lahir").val(data[5]);
             $("#tgl_lahir").val(data[6]);
            $("#agama").val(data[7]);
            $("#jurusan").val(data[8]);
            $("#angkatan").val(data[9]);
            $("#hp").val(data[10]);

        });

        table.on('click', '.btn-danger', function(e) {
            
            $tr = $(this).closest('tr');
            //console.log($tr);
            var data = table.row($tr).data();
            console.log(data[1]);
            e.preventDefault();
            //alert(data[0])
            swal({
                    title: 'Hapus',
                    text: 'Anda yakin ingin menghapus data ini !',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Tidak',
                    confirmButtonClass: "btn btn-success",
                    cancelButtonClass: "btn btn-danger",
                    buttonsStyling: false
                }).then(function() {
                    $.ajax({
                        url         : "<?php echo base_url('home/hapus')?>",
                        data        : "nim="+data[1],
                        type        : 'POST',
                        datatype    : 'JSON',
                        success     : function(a){
                            {
                                
                            swal({
                              title: 'Hapus!',
                              text: 'Data berhasil di hapus.',
                              type: 'success',
                              confirmButtonClass: "btn btn-success",
                              buttonsStyling: false
                              });
                              table.row($tr).remove().draw();
                              notif('top','center','Berhasil Dihapus');
                            }
                        },
                        error       : function(e){
                            swal({
                                title: "Data Gagal Di Hapus!",
                                buttonsStyling: false,
                                confirmButtonClass: "btn btn-danger"
                            });
                            notif('top','center','Data Gagal Di Hapus!');
                        }

                    });

                }, function(dismiss) {
                  // dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
                  if (dismiss === 'cancel') {
                    swal({
                      title: 'Cancelled',
                      text: 'Data Tidak Dihapus..',
                      type: 'info',
                      confirmButtonClass: "btn btn-info",
                      buttonsStyling: false
                    })
                  }
                })
        });

        //Like record
        table.on('click', '.like', function() {
            alert('You clicked on Like button');
        });

        $('.card .material-datatables label').addClass('form-group');
    });

    function notif(from,align,message){
        type = ['','info','success','warning','danger','rose','primary'];

        color = Math.floor((Math.random() * 6) + 1);

        $.notify({
            icon: "notifications",
            message: message,

        },{
            type: type[color],
            timer: 3000,
            placement: {
                from: from,
                align: align
            }
        });
    }
   $(document).ready(function() {
            // ketika tombol detail ditekan
        $('.detail-mahasiswa').on("click", function(){
        // ambil nilai id dari link print
        
        var DataMahasiswa= this.id;
        var datanya = DataMahasiswa.split(",");
        if (datanya[4]=='Laki-laki') { var jk='Laki-laki';} else {var jk='Perempuan';}
        if (datanya[12]=='belum') {var disable='<a href="<?=base_url('home/approve/')?>'+datanya[0]+'/setuju" class="btn btn-sm btn-success" id="approve">Aktive</a>';} else if (datanya[12]=='setuju') 
        {var disable='<a href="<?=base_url('home/approve/')?>'+datanya[0]+'/blokir" class="btn btn-sm btn-danger" id="approve">Blokir ???</a>';} else 
        {var disable='<a href="<?=base_url('home/approve/')?>'+datanya[0]+'/belum" class="btn btn-sm btn-info" id="approve">On Status</a>';}
        var str = '';
        str = '<table  class="table table-no-bordered" width="100%" style="font-size:14px">';
        str += '<tr><td></td><td></td><td><img src="<?php echo base_url('assets/mahasiswa/asli/');?>'+datanya[11]+'" class="rounded"></td></tr>';
        str += '<tr><td></td><td></td><td> '+disable+' <td></tr>';
        str += '<tr><td width="150">NIM</td><td width="10">:</td><td>'+datanya[0]+'</td></tr>';
        str += '<tr><td>Nama Lengkap</td><td>:</td><td>'+datanya[1]+'</td></tr>';
        str += '<tr><td>Tempat, Tanggal  Lahir</td><td>:</td><td>'+datanya[2]+', '+datanya[3]+'</td></tr>';
        str += '<tr><td>Jenis Kelamin</td><td>:</td><td>'+jk+'</td></tr>';
        str += '<tr><td>Program Studi</td><td>:</td><td>'+datanya[5]+'</td></tr>';
        str += '<tr><td>Alamat</td><td>:</td><td>'+datanya[6]+'</td></tr>';
        str += '<tr><td>Agama</td><td>:</td><td>'+datanya[7]+'</td></tr>';
        str += '<tr><td>Angkatan</td><td>:</td><td>'+datanya[9]+'</td></tr>';
        str += '<tr><td>Hp</td><td>:</td><td>'+datanya[10]+'</td></tr>';
        str += '</table>';
        $("#IsiModal").html(str);
        });
    });
</script>