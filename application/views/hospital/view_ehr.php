<?php 
//echo"<pre>";
//print_r($gallery);die;
?>
						<div class="col-md-7 col-lg-8 col-xl-9">  
							 <div class="row form-row">
							 <div class="col-md-12">
							 
										</div>
								<div class="col-md-12">
									<div class="card dash-card">
										
							<!-- Basic Information -->
							 <?php
								if($this->session->flashdata('success')){ ?>
								<div class="alert alert-success alert-dismissible fade show" role="alert">
									<strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?> 
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
								</div>
								<?php }											
								if($this->session->flashdata('warning')){ ?>
								<div class="alert alert-danger alert-dismissible fade show" role="alert">
									 <?php echo $this->session->flashdata('warning'); ?>
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
								</div>
							<?php } ?>
										<div class="card-body">
											
											  <div class="table-responsive">
												<table   class="datatable table table-hover table-center mb-0" >
												    <h2 class="text-center">Patients EHR</h2>
													<thead>
														
															
														    <th>Patients Name</th>
															 <th>EHR Details</th>
															  
															  <th>Download EHR</th>
															  
													</thead>
													<tbody>
														
														<tr>
														<?php 
															foreach($ehr_data as $apub) {  
															
															  $items = array();
															  $ehr_namee = array();
															  $stitle = json_decode($apub->ehr_hospital);
															  $img = json_decode($apub->hospital_image);
															  foreach($img->file_name as $image) {
																$items[] = $image;
															  }
															  foreach($stitle as $v) {
																$ehr_namee[] = $v;
															  }
                                                            //print_r($items);
															//print_r($ehr_namee); 
															echo "<tr>";
															echo "<td>$apub->name</td>";
															?><td><?php 
																foreach ($ehr_namee as $ehr) {
																		echo $ehr.'</br>';
																		
																	} 
																?></td><td><?php 	
																	$base = base_url();
																	foreach ($items as $item) {
																		echo "<a  href='download/$item' class='btn btn-sm'  >
																<i class='fa fa-download'></i> Download 
															</a></br>";
																	} 
																?></td><?php 
																echo "</tr>";	
															  //echo "$item<br />\n$ehr_namee<br />\n";
															}   ?>
															
															
														
															
					
														</tr>
														
														
														
													</tbody>
												</table>
												
											</div>
										</div>
									</div>
								</div>
								
								
								
							</div>

						</div>
					</div>
					</div>
			<!-- /Page Content -->
			<!-- /Delete modal -->
			
