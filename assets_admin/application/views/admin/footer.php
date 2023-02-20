 </div>
		<!-- /Main Wrapper -->
	    <!-- jQuery -->
	<script src="<?php echo base_url() ?>assets_admin/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="<?php echo base_url() ?>assets_admin/js/popper.min.js"></script>
        <script src="<?php echo base_url() ?>assets_admin/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JS -->
        <script src="<?php echo base_url() ?>assets_admin/plugins/slimscroll/jquery.slimscroll.min.js"></script>
				<script src="<?php echo base_url() ?>assets_admin/plugins/raphael/raphael.min.js"></script>    
		<script src="<?php echo base_url() ?>assets_admin/plugins/morris/morris.min.js"></script>  
		<script src="<?php echo base_url() ?>assets_admin/js/chart.morris.js"></script>
				<!-- Form Validation JS -->
        <script src="<?php echo base_url() ?>assets_admin/js/form-validation.js"></script>
		<!-- Mask JS -->
		<script src="<?php echo base_url() ?>assets_admin/js/jquery.maskedinput.min.js"></script>
        <script src="<?php echo base_url() ?>assets_admin/js/mask.js"></script>
			<!-- Select2 JS -->
			<script src="<?php echo base_url() ?>assets_admin/js/select2.min.js"></script>
		
			<!-- Datetimepicker JS -->
			<script src="<?php echo base_url() ?>assets_admin/js/moment.min.js"></script>
		<script src="<?php echo base_url() ?>assets_admin/js/bootstrap-datetimepicker.min.js"></script>
		
		<!-- Full Calendar JS -->
        <script src="<?php echo base_url() ?>assets_admin/js/jquery-ui.min.js"></script>
        <script src="<?php echo base_url() ?>assets_admin/plugins/fullcalendar/fullcalendar.min.js"></script>
        <script src="<?php echo base_url() ?>assets_admin/plugins/fullcalendar/jquery.fullcalendar.js"></script>
		<!-- Datatables JS -->
		<script src="<?php echo base_url() ?>assets_admin/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url() ?>assets_admin/plugins/datatables/datatables.min.js"></script>	
		<!-- Custom JS -->
		<script  src="<?php echo base_url() ?>assets_admin/js/script.js"></script>
		
	 
		<!--for invoice-->
		
		
	
	</script>
	
	
	
	<script>
	
$(".js-example-tags").select2({
  tags: true
});
		
	
			//delete 
			    $(document).off('click','.delete').on('click' , '.delete',function(){
					$id=$(this).attr('data-id');
					$('#del_id').val($id);
				$('#delete_modal').modal('show');		
				});
			//activate
			
				$(document).off('click','.activate').on('click' , '.activate',function(){
					$id=$(this).attr('data-id');
					//alert($id);
					$('#del_idd').val($id);
				$('#activate').modal('show');		
				});
				
				
				
				$(document).on('click' , '.modals',function(){
					id=$(this).attr('data-id');
					$.ajax({
							method:"POST",
							data:{idd:id},
							url: "<?php echo base_url() ?>/admin/show_profile", 
							success: function(result){
							//alert(result);
							$('#view_profile').html(result);
							$('#show_profile').modal('show');
						  }});
				
						
						
					//	$data=($tr).children('td').map(function(){
					//	return $(this).text();
					//}).get();
					//console.log($data);
					//$id=$('delete_id').val($data[0]);
					//console.log($id);
					
				});


					<!--- doctors profile--->
		$(document).on('click' , '.modall',function(){
					id=$(this).attr('data-id');
					$.ajax({
							method:"POST",
							data:{idd:id},
							url: "<?php echo base_url() ?>/admin/show_profilee", 
							success: function(result){
							//alert(result);
							$('#view_profile').html(result);
							$('#show_profile').modal('show');
						  }});
				
						
						
					//	$data=($tr).children('td').map(function(){
					//	return $(this).text();
					//}).get();
					//console.log($data);
					//$id=$('delete_id').val($data[0]);
					//console.log($id);
					
				});
					<!--- end doctors profile--->
				
				
								
								$(document).ready(function(){
									
								$('#country').on('change',function(){
								var couId=$(this).val();
								$.ajax({
									method:"POST",
									data:{id:couId},
									url:"<?php echo base_url(); ?>admin/get_state",
									
									dataType:"json",
									success:function(data){
										 $("#state").empty();
							$("#state").append("<option value=-1> ~~ Select City ~~</option>");
							$.each(data,function(i,item)
							{
								$("#state").append("<option value="+item.id+">"+item.name+"</option>");
							});
						}
					});
				
				});
				
			$('#state').on('change',function(){
								var couId=$(this).val();
								//	alert(couId);
								$.ajax({
									method:"POST",
									data:{id:couId},
									url:"<?php echo base_url(); ?>admin/get_city",
									dataType:"json",
									success:function(data){
										 $("#city").empty();
							$("#city").append("<option value=-1> ~~ Select City ~~</option>");
							$.each(data,function(i,item)
							{
								$("#city").append("<option value="+item.id+">"+item.name+"</option>");
							});
						}
					});
				
				});
				});
				
				
				   $(document).on('click' , '#edit_special',function(){
					id=$(this).attr('data-id');
					service_name=$(this).attr('data-name');
					service_image=$(this).attr('data-image');
					$('#edit_special_id').val(id);
					$('#special_name').val(service_name);
					$('#image_view').attr('src',service_image);
					
				$('#edit_specialities_details').modal('show');
					
					//	$data=($tr).children('td').map(function(){
					//	return $(this).text();
					//}).get();
					//console.log($data);
					//$id=$('delete_id').val($data[0]);
					//console.log($id);
					
				});
			
			</script>
			 <script>
			  $(document).ready(function() {
					$('.datatableee').DataTable( {
						"order": [[ 3, "desc" ]]
					} );
				} );
			// </script>
	
	
	
  </body>

<!-- Mirrored from doccure-laravel.dreamguystech.com/template/public/admin/index_admin by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 01 Sep 2020 05:20:36 GMT -->
</html>