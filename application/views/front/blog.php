

			<div class="breadcrumb-bar">

				<div class="container-fluid">

					<div class="row align-items-center">

						<div class="col-md-12 col-12">

							<nav aria-label="breadcrumb" class="page-breadcrumb">

								<ol class="breadcrumb">

									<li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>

									<li class="breadcrumb-item active" aria-current="page">Blog</li>

								</ol>

							</nav>

							<h2 class="breadcrumb-title">Blog List</h2>

						</div>

					</div>

				</div>

			</div>

			<!-- /Breadcrumb -->

			

			<!-- Page Content -->

			<div class="content">

				<div class="container">

             

					<div class="row">

						<div class="col-lg-8 col-md-12">

							<!-- Blog Post -->

							<?php foreach($blog as $row):?>

							<div class="blog">

								<div class="blog-image">

									<a href="#"><img class="img-fluid" src="<?php echo base_url();?>assets/img/blog/<?php echo $row->blog_image;?>" alt="Post Image" style="height:400px;"></a>

								</div>

								<h3 class="blog-title"><a href="#"><?php echo $row->blog_name?></a></h3>

								<div class="blog-info clearfix">

									<div class="post-left">

										<ul>

											<li>

												<div class="post-author">

													<a href="#"><span> Posted By: Cureu </span></a>

												</div>

											</li>

											<li><i class="far fa-clock"></i><?php echo  $row->created_at?></li>

											<!--<li><i class="far fa-comments"></i>12 Comments</li>

											<li><i class="fa fa-tags"></i>Health Tips</li>---->

										</ul>

									</div>

								</div>

								<div class="blog-content">

								<!--	<p class="content1"><?php echo $row->blog_description;?></p>  -->

									<!--	<a href="#" class="read-more">Read More</a>  -->
									
									<a class="show_hide" data-content="toggle-text" style="color:blue; cursor:pointer;">Read More</a>
									<div class="content1"><?php echo $row->blog_description;?></div>

								</div>
								

							</div>

							<?php endforeach;?>

							<!-- /Blog Post -->




						</div>
						
						
						

						

						<!-- Blog Sidebar -->

						<div class="col-lg-4 col-md-12 sidebar-right theiaStickySidebar">



							<!-- Search -->

							<div class="card search-widget">

								<div class="card-body">

									<form class="search-form">

										<div class="input-group">

											<input type="text" placeholder="Search..." class="form-control">

											<div class="input-group-append">

												<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>

											</div>

										</div>

									</form>

								</div>

							</div>

							<!-- /Search -->



							<!-- Latest Posts -->

							<div class="card post-widget">

								<div class="card-header">

									<h4 class="card-title">Latest Posts</h4>

								</div>

								<div class="card-body">

								<ul class="latest-posts">

								<?php foreach($blog as $row): ?>

								

										<li>

											<div class="post-thumb">

												<a href="#">

													<img class="img-fluid" src="<?php echo base_url() ?>assets/img/blog/<?php echo $row->blog_image ?>" alt="">

													<span value="<?php echo base_url() ?>assets/img/blog/<?php echo $row->blog_image ?>"></span>

												</a>

											</div>

											<div class="post-info">

												<h4>

													<a href="#"><?php  echo ($row->blog_name);?></a>

												</h4>

												<p><?php echo $row->created_at; ?></p>

											</div>

											

										</li>

											

										<?php endforeach; ?>

										</ul>

										</div>

										<!---<li>

											<div class="post-thumb">

												<a href="blog-details.html">

													<img class="img-fluid" src="<?php //echo base_url() ?>assets/img/blog/blog-thumb-02.jpg" alt="">

												</a>

											</div>

											<div class="post-info">

												<h4>

													<a href="blog-details.html">What are the benefits of Online Doctor Booking?</a>

												</h4>

												<p>3 Dec 2019</p>

											</div>

										</li>

										<li>

											<div class="post-thumb">

												<a href="blog-details.html">

													<img class="img-fluid" src="<?php //echo base_url() ?>assets/img/blog/blog-thumb-03.jpg" alt="">

												</a>

											</div>

											<div class="post-info">

												<h4>

													<a href="blog-details.html">Benefits of consulting with an Online Doctor</a>

												</h4>

												<p>3 Dec 2019</p>

											</div>

										</li>

										<li>

											<div class="post-thumb">

												<a href="blog-details.html">

													<img class="img-fluid" src="<?php //echo base_url() ?>assets/img/blog/blog-thumb-04.jpg" alt="">

												</a>

											</div>

											<div class="post-info">

												<h4>

													<a href="blog-details.html">5 Great reasons to use an Online Doctor</a>

												</h4>

												<p>2 Dec 2019</p>

											</div>

										</li>

										<li>

											<div class="post-thumb">

												<a href="blog-details.html">

													<img class="img-fluid" src="<?php //echo base_url() ?>assets/img/blog/blog-thumb-05.jpg" alt="">

												</a>

											</div>

											<div class="post-info">

												<h4>

													<a href="blog-details.html">Online Doctor Appointment Scheduling</a>

												</h4>

												<p>1 Dec 2019</p>

											</div>

										</li>

									</ul>

								</div>

							</div>

							<!-- /Latest Posts -->



							<!-- Categories -->

							<div class="card category-widget">

								<div class="card-header">

									<h4 class="card-title">Blog Categories</h4>

								</div>

								<div class="card-body">

									<ul class="categories">

									

									<?php  foreach($blog_side as $row):?>

										<li><?php echo $row->blog_name; ?></li>

										<?php endforeach; ?>

									</ul>

								</div>

							</div>

							<!-- /Categories -->



							<!-- Tags -->

							<!--div class="card tags-widget">

								<div class="card-header">

									<h4 class="card-title">Tags</h4>

								</div>

								<div class="card-body">

									<ul class="tags">

										<li><a href="#" class="tag">Children</a></li>

										<li><a href="#" class="tag">Disease</a></li>

										<li><a href="#" class="tag">Appointment</a></li>

										<li><a href="#" class="tag">Booking</a></li>

										<li><a href="#" class="tag">Kids</a></li>

										<li><a href="#" class="tag">Health</a></li>

										<li><a href="#" class="tag">Family</a></li>

										<li><a href="#" class="tag">Tips</a></li>

										<li><a href="#" class="tag">Shedule</a></li>

										<li><a href="#" class="tag">Treatment</a></li>

										<li><a href="#" class="tag">Dr</a></li>

										<li><a href="#" class="tag">Clinic</a></li>

										<li><a href="#" class="tag">Online</a></li>

										<li><a href="#" class="tag">Health Care</a></li>

										<li><a href="#" class="tag">Consulting</a></li>

										<li><a href="#" class="tag">Doctors</a></li>

										<li><a href="#" class="tag">Neurology</a></li>

										<li><a href="#" class="tag">Dentists</a></li>

										<li><a href="#" class="tag">Specialist</a></li>

										<li><a href="#" class="tag">Doccure</a></li>

									</ul>

								</div>

							</div-->

							<!-- /Tags -->

							

						</div>

						<!-- /Blog Sidebar -->

						

					</div>

				</div>



			</div>		

			<!-- /Page Content -->

            </div>
			
			
			
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
								<script>
										$(document).ready(function () {
											// alert('okk');
											$(".content1").hide();
											$(".show_hide").on("click", function () {
												var txt = $(".content1").is(':visible') ? 'Read More' : 'Read Less';
												$(".show_hide").text(txt);
												$(this).next('.content1').slideToggle(200);
											});
										});
								</script>

