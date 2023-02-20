<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="row row-grid">
							
								<?php 
								$d_user_id = '';
								foreach($favourite as $favour): 
								if($d_user_id != $favour->id):
								?>
							
								
								<div class="col-md-6 col-lg-4 col-xl-3">
									<div class="profile-widget">
										<div class="doc-img">
											<a href="#">
												<img class="img-fluid" alt="User Image" src="<?php echo base_url() ?>assets/img/doctors/<?php echo $favour->image ?>" onerror="this.onerror=null; this.src='http://cureu.in/assets/img/doctors/123.png'" >
											</a>
											<!--<a href="javascript:void(0)" class="fav-btn">
												<i class="far fa-bookmark"></i>
											</a>-->
										</div>
										<div class="pro-content">
											<h3 class="title">
												<a href="#"><?php echo $favour->name ?></a> 
												<i class="fas fa-check-circle verified"></i>
											</h3>
											<p class="speciality"><?php echo implode(',',json_decode($favour->degree)); ?></p>
											<?php /*<div class="rating">
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<span class="d-inline-block average-rating">(17)</span>
											</div>*/?>
											<ul class="available-info">
												<li>
													<i class="fas fa-map-marker-alt"></i><?php echo  substr($favour->address,0,40); ?>
												</li>
												<?php /*<li>
													<i class="far fa-clock"></i> Available on Fri, 22 Mar
												</li>*/?>
												<?php /*<li>
													<i class="far fa-money-bill-alt"></i>  
												</li>*/?>
											</ul>
											<center>
											<div class="row row-sm">
												<div class="col-12">
													<a href="<?php echo base_url() ?>welcome/chat/<?php echo $favour->id; ?>" class="btn view-btn">Chat</a>
												</div>
												
												<!-- <div class="col-6">
													<a href="<?php echo base_url() ?>welcome/appointment_details/<?php //echo $favour->id; ?>" class="btn book-btn">Book Now</a>
												</div> -->
											</div>
											</center>
										</div>
									</div>
								</div>
										<?php  
										$d_user_id= $favour->id;
										endif;
										endforeach;?>
								
								<?php /*<div class="col-md-6 col-lg-4 col-xl-3">
									<div class="profile-widget">
										<div class="doc-img">
											<a href="doctor-profile.html">
												<img class="img-fluid" alt="User Image" src="<?php echo base_url() ?>assets/img/doctors/doctor-02.jpg">
											</a>
											<a href="javascript:void(0)" class="fav-btn">
												<i class="far fa-bookmark"></i>
											</a>
										</div>
										<div class="pro-content">
											<h3 class="title">
												<a href="doctor-profile.html">Dr. Darren Elder</a> 
												<i class="fas fa-check-circle verified"></i>
											</h3>
											<p class="speciality">BDS, MDS - Oral & Maxillofacial Surgery</p>
											<div class="rating">
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star"></i>
												<span class="d-inline-block average-rating">(35)</span>
											</div>
											<ul class="available-info">
												<li>
													<i class="fas fa-map-marker-alt"></i> Newyork, USA
												</li>
												<li>
													<i class="far fa-clock"></i> Available on Fri, 22 Mar
												</li>
												<li>
													<i class="far fa-money-bill-alt"></i> $50 - $300 <i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
												</li>
											</ul>
											<div class="row row-sm">
												<div class="col-6">
													<a href="doctor-profile.html" class="btn view-btn">View Profile</a>
												</div>
												<div class="col-6">
													<a href="booking.html" class="btn book-btn">Book Now</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								
								
								<div class="col-md-6 col-lg-4 col-xl-3">
									<div class="profile-widget">
										<div class="doc-img">
											<a href="doctor-profile.html">
												<img class="img-fluid" alt="User Image" src="<?php echo base_url() ?>assets/img/doctors/doctor-07.jpg">
											</a>
											<a href="javascript:void(0)" class="fav-btn">
												<i class="far fa-bookmark"></i>
											</a>
										</div>
										<div class="pro-content">
											<h3 class="title">
												<a href="doctor-profile.html">Dr. Linda Tobin</a> 
												<i class="fas fa-check-circle verified"></i>
											</h3>
											<p class="speciality">MBBS, MD - General Medicine, DM - Neurology</p>
											<div class="rating">
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star"></i>
												<span class="d-inline-block average-rating">(43)</span>
											</div>
											<ul class="available-info">
												<li>
													<i class="fas fa-map-marker-alt"></i> Kansas, USA
												</li>
												<li>
													<i class="far fa-clock"></i> Available on Fri, 22 Mar
												</li>
												<li>
													<i class="far fa-money-bill-alt"></i> $100 - $1000 
													<i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
												</li>
											</ul>
											<div class="row row-sm">
												<div class="col-6">
													<a href="doctor-profile.html" class="btn view-btn">View Profile</a>
												</div>
												<div class="col-6">
													<a href="booking.html" class="btn book-btn">Book Now</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								
								<div class="col-md-6 col-lg-4 col-xl-3">
									<div class="profile-widget">
										<div class="doc-img">
											<a href="doctor-profile.html">
												<img class="img-fluid" alt="User Image" src="<?php echo base_url() ?>assets/img/doctors/doctor-08.jpg">
											</a>
											<a href="javascript:void(0)" class="fav-btn">
												<i class="far fa-bookmark"></i>
											</a>
										</div>
										<div class="pro-content">
											<h3 class="title">
												<a href="doctor-profile.html">Dr. Paul Richard</a> 
												<i class="fas fa-check-circle verified"></i>
											</h3>
											<p class="speciality">MBBS, MD - Dermatology , Venereology & Lepros</p>
											<div class="rating">
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star"></i>
												<span class="d-inline-block average-rating">(49)</span>
											</div>
											<ul class="available-info">
												<li>
													<i class="fas fa-map-marker-alt"></i> California, USA
												</li>
												<li>
													<i class="far fa-clock"></i> Available on Fri, 22 Mar
												</li>
												<li>
													<i class="far fa-money-bill-alt"></i> $100 - $400 
													<i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
												</li>
											</ul>
											<div class="row row-sm">
												<div class="col-6">
													<a href="doctor-profile.html" class="btn view-btn">View Profile</a>
												</div>
												<div class="col-6">
													<a href="booking.html" class="btn book-btn">Book Now</a>
												</div>
											</div>
										</div>
									</div>
								</div>*/?>
								
								
							</div>
						</div>
					</div>
				</div>

			</div>		
			<!-- /Page Content -->
</div>