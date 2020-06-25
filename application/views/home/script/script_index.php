<script src="<?php echo base_url(); ?>assets/js/Chart.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/Chart.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>

<script type="text/javascript">


$(document).ready(function() {

        // Javascript method's body can be found in assets/js/demos.js
        
        // demo.initDashboardPageCharts();

        // demo.initVectorMap();

})


    

</script>
<script>
    

  $(document).ready(function(){

    $('#dibaca').click(function(){
      $.post( "<?=base_url('home/diBaca')?>", function( data ) {
			  $( "#result" ).empty().append(data);
			});
    })

  }) 

</script>
