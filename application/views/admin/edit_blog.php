<head>
	<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
</head> 		
		<div class="page-wrapper">
						<div class="content container-fluid">	
						<div class="row">
							<div class="col-12">
							<!-- General -->
								<div class="card">
									<div class="card-header">
										<h4 class="card-title">General</h4>
											<?php
												if($this->session->flashdata('info_success')){ ?>
												<div class="alert alert-success alert-dismissible fade show" role="alert">
													<strong>Success!</strong> <?php echo $this->session->flashdata('info_success'); ?>
													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">×</span>
													</button>
												</div>
												<?php }											
												if($this->session->flashdata('Warning')){ ?>
												<div class="alert alert-danger alert-dismissible fade show" role="alert">
													 <?php echo $this->session->flashdata('Warning'); ?>
													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">×</span>
													</button>
												</div>
												<?php } ?>
									</div>
										
									<div class="card-body">
										<?php echo form_open_multipart('Admin/Edit_blogg')?>
										<input type="hidden" name="hide"  value='<?php echo $edit_blog->id?>'>
											<div class="form-group">
									
												<label>Blog Title</label>
												<input type="text" class="form-control" name="Update_name" value="<?php echo $edit_blog->blog_name;?>">
											</div>
											<div class="form-group">
												
												<label>Blog Logo</label>
												<img src="<?php echo base_url() ?>assets/img/blog/<?php echo $edit_blog->blog_image; ?>" width="200px " height="100px">
												<input type="file" class="form-control" name="update_image" >
												<input type="hidden" name="update_img" value="<?php echo base_url() ?>assets/img/blog/<?php echo $edit_blog->blog_image; ?>">
												<small class="text-secondary">Recommended image size is <b>150px x 150px</b></small>
											</div>
											
											<div class="form-group">
												<label>About</label>
												<textarea class="form-control" name="update_description" required="" style="height: 150px;"><?php echo $edit_blog->blog_description;?></textarea>
												<script>
														CKEDITOR.replace( 'update_description' );
												</script>
											</div>
											
											<div class="form-group">
												
												<?php echo  form_submit(['type'=>'submit','value'=>'Submit','class'=>'btn btn-primary']);?>
											</div>
											
										</form>
									</div>
								</div>
							<!-- /General -->
						</div>		
				</div>
			</div>
		</div>
						