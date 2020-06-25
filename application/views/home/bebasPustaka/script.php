<script src="<?php echo base_url(); ?>assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>

<script type="text/javascript">

function buka(){
	// alert(a+'Buka')
	$('#myModal').modal('show');
}

$(document).ready(function() {

	$( "#testform" ).submit(function( event ) {
		event.preventDefault();
		//alert('ok');
		$.post( "<?=base_url();?>home/cariSBP",$( "#testform" ).serialize(), function( data ) {
			$('#result').html(data);
		  // console.log(data);
		}, "json");
		//var data = $("#testform").serialize();
		

	});

})



	

</script>