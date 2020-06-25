<script src="<?php echo base_url(); ?>assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/chart.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/Chart.js"></script>

<script>

$(document).ready(function(){
// alert('OK')

	var ctx = document.getElementById("myChart").getContext('2d');

	$.post("<?php echo base_url('home/trafikJamAktif_')?>",{})
	.done(function(data){
		var res = data.split(',');
		var no0 = res[0].split(":");
		var no1 = res[1].split(":");
		var no2 = res[2].split(":");
		var no3 = res[3].split(":");
		var no4 = res[4].split(":");
		var no5 = res[5].split(":");
		var no6 = res[6].split(":");
		
		// console.log(data);
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: [no0[0]+'\n'+no0[1], no1[0]+'\n'+no1[1], no2[0]+'\n'+no2[1], no3[0]+'\n'+no3[1], no4[0]+'\n'+no4[1], no5[0]+'\n'+no5[1],no6[0]+'\n'+no6[1] ],
				datasets: [{
					label: '# Jumlah Pengunjung',
					data: [no0[2], no1[2], no2[2], no3[2], no4[2], no5[2],no6[2]],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(153, 102, 255, 0.2)',
					'rgba(255, 159, 64, 0.2)',
					'rgba(137, 128, 128, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 159, 64, 1)',
					'rgba(137, 128, 128, 1)'
					],
				borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	})

});

</script>


