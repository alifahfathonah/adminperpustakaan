<script src="<?php echo base_url(); ?>assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>

<script>

	$(document).ready(function(){
		var save_method ;
		// alert('Ok');

		/*var data = [
		    [
		        "Tiger Nixon",
		        "System Architect",
		        "Edinburgh",
		        "5421",
		    ],
		    [
		        "Garrett Winters",
		        "Director",
		        "Edinburgh",
		        "8422",
		    ]
		]*/

		var table = $('.table').DataTable({
			ajax : {
				url : '<?php echo base_url('User/lihat'); ?>',
				"dataSrc":  function ( json ) {
					var return_data = new Array();
					var d;
					
					var no =1;
		      for (  var i=0, ien=json.length ; i<ien ; i++ ) {
		      	
		      	return_data.push({
		      		'no'				: no++,
							'id' 				: json[i].id,
							'username' 	: json[i].username,
							'status' 		: json[i].status,
							'password'  : json[i].password,
							'level'			: json[i].level,
							'edit'			: '<input id="ubah" type ="button" data-id="'+json[i]['id']+'/'+json[i]['username']+'/'+json[i]['password']+'" name="edit" value="Edit" class="btn btn-sm btn-info">'+
														'<input type ="button" data-id="'+json[i]['id']+'" name="hapus" id="hapus" value="Hapus" class="btn btn-sm btn-danger">',
		      	})
		      }
		      // console.log(json);
		      return return_data;
		    },
		      
		    
			},

			dom: 'Bfrtip',
      lengthMenu: [
          [ 10, 25, 50, -1 ],
          [ '10 rows', '25 rows', '50 rows', 'Show all' ]
      ],
			 buttons: [
            {
                text: 'Tambah',
                action: function ( e, dt, node, config ) {
                    $('#modal').modal('show');
                    save_method = '<?php echo base_url('User/tambah'); ?>';
                    $('.modal-title').text("Tambah User");
                    $('#form').closest('form').find("input[type=username],input[type=password], textarea").val("");
                    $("#status").prop('checked', false);
                }
            }
        ],
			columns : [
				{ data : 'no' },
				{ data : 'username' },
				{ data : 'level' },
				{ data : 'status',
								"render": function (data, type, row) {
					 
					        if ( row.status == 'on') {
					            return '<button class="btn btn-sm btn-success status" data-id="Off,'+row.id+'" >On</button>';
					        }else {
					 
								    return '<button class="btn btn-sm btn-danger status" data-id="On,'+row.id+'" >Off</button>';;
					 
									}
				        }
				},
				{ data : 'edit',
					/*render: function ( data, type, row ) {
				        return '<input id="ubah" type ="button" data-id="'+data+'" name="edit" value="Edit" class="btn btn-sm btn-info"><input type ="button" data-id="'+data+'" name="edit" value="Hapus" class="btn btn-sm btn-danger">';
					    }*/ 
				},
				

			],

	    "columnDefs": [
        	{ 
                "targets": [ -1 ], //last column
                "orderable": false, //set not orderable
          },
           { 
                "targets": [ -2], //2 last column ()
                "orderable": false, //set not orderable
        	},
      ],
			
		});


		table.on('click','#ubah',function(e){
			$('#modal').modal('show');
			save_method = '<?php echo base_url('User/edit');?>';
			$tr = $(this).closest('tr');
			var data = table.row($tr).data();
			$('.modal-title').text("Edit User");
      var datanya = data['status'];
      $("#username").val(data['username']);
      $('#username').trigger('focus')
      // $('#password').trigger();
      $("#password").val(data['password']);
      if (data['status']=='off') {
      	 $("#status").prop('checked', false);
      } else {
      	 $("#status").prop('checked', true);
      }
      $( "#level" ).val(data['level']);
      $('#form').prepend("<input id='id' name='id' type='hidden' value='"+data['id']+"' />")
      // console.log(data['level']);
		})

		table.on('click','#hapus',function(){
			// alert('Ok');
			$tr = $(this).closest('tr');
			var data = table.row($tr).data();
			swal({
				title :  'Hapus',
				text : 'Anda Yakin Hapus '+data['username'],
				showCancelButton : true,
				confirmButtonClass : 'btn btn-success',
				confirmButtonText : 'Hapus',
				cancelButtonText : 'Batal',
				cancelButtonClass : 'btn btn-warning',
				type : 'warning',
				buttonsStyling : false,
			}).then(function(){
				// alert('OK')
        // showNotification('top', 'right');
        $.post('<?php echo base_url('User/hapus')?>',{id : data['id']},function(e){
	        	if (e) {
							swal({
								title : 'Success..',
								type : 'success',
								confirmButtonClass : 'btn btn-info',
								buttonsStyling : false,
							});
							table.row($tr).remove().draw();
	        	}else{
	        		swal({
								title : "Gagal Hapus",
								type 	: 'error',
								confirmButtonText : "Ok",
								confirmButtonClass : "btn btn-danger"
							})
	        	}
        	})
			},function(dismiss){
				if (dismiss="cancel") {

					swal({
						title : "Batal Hapus",
						type 	: 'error',
						confirmButtonText : "Ok",
						confirmButtonClass : "btn btn-info"
					})
				};
			});
		});

	  table.on('click', '.status', function(e) {
	  	// alert('Ok');
	  	$tr = $(this).closest('tr');
      //console.log($tr);
      var data = table.row($tr).data();
      // alert(data['status']+'  '+data['id'])
      var status ;
      const id 	= data['id'];
      switch (data['status']) {
 
		    case "on":
		      status = 'off';
		      break;
		 
		    case "off":
		      status = 'on';
		      break;
		 
		    default:
		      status = '';
		  }

		  // alert(status);
      swal({
      	title 	: 'Ubah Status',
      	text : 'Yakin Ubah Status ??',
      	type 	: 'info',
      	showCancelButton : true,
      	confirmButtonText : 'Ya, Ubah',
      	cancelButtonText : "Batal",
      	confirmButtonClass : "btn btn-info",
      	cancelButtonClass : "btn btn-warning",
      	buttonsStyling : false,
      })
      	.then(function(){

	    		$.post( "<?=base_url('User/status');?>", {status : status,id: id })
						  .done(function( data ) {
						    if (data) {
						    	swal({
					      		title : 'Ubah',
					      		text : "Data Berhasil Diubah",
					      		confirmButtonClass : "btn btn-success",
					      		type : 'success',
					      		buttonsStyling : false
					      	});

					      	 table.ajax.reload();
						    }
						    else{
						    	swal({
					      		title : "Error",
					      		text 	: "Data Gagal Diubah",
					      		type 	: "error",
					      		confirmButtonText : "Cancel",
					      		confirmButtonClass : "btn btn-danger",
					      		buttonsStyling : false,
					      	});
						    }
					});

	      	
	      }, function(dismiss){
	      	swal({
	      		title : "Batal",
	      		text 	: "Data Batal Diubah",
	      		type 	: "error",
	      		confirmButtonText : "Cancel",
	      		confirmButtonClass : "btn btn-danger",
	      		buttonsStyling : false,
	      	});

	      });



	  })


		$('#modal').on('show.bs.modal', function (e) {
				$('#id').remove();
		   // modal.find('.modal-title').text('Judul')

		})

		$('#save').click(function(e){
			e.preventDefault();
			var form = $('#form').serialize();
			var modal = $(this);
			// console.log(form);
			$.post(save_method,form,function(data){
				if (data) {
					swal({
						title : 'Success..',
						type : 'success',
						confirmButtonClass : 'btn btn-success',
						buttonsStyling : false,
					});
				}else{
					swal({
						title : 'Gagal..',
						type : 'warning',
						confirmButtonClass : 'btn btn-info',
						buttonsStyling : false,
					});
				}
				$('#modal').modal('toggle');
				table.ajax.reload();
			});
		});

	})
	
</script>