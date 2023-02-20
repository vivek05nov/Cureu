



<!-- Page Wrapper -->

<div class="page-wrapper">

                <div class="content container-fluid">

				

					<!-- Page Header -->

					<div class="page-header">

						<div class="row">

							<div class="col-sm-12">

								<h3 class="page-title"> Hospital Appointments</h3>

								<ul class="breadcrumb">

									<li class="breadcrumb-item"><a href="<?php echo base_url('admin/index'); ?>">Dashboard</a></li>

									<li class="breadcrumb-item active">Appointments</li>

								</ul>

							</div>

						</div>

					</div>

					<!-- /Page Header -->

					<div class="row">

						<div class="col-md-12">

						

							<!-- Recent Orders -->

							<div class="card">

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

										<table class="datatable table table-hover table-center mb-0">

											<thead>

												<tr>

													<th>Hospital Name</th>

													<th>Speciality</th>

													<th>Patient Name</th>

													<th>Apointment Date</th>

													<th>Contact </th>

													<th>Process </th>

													<!--<th>Status</th>

													<th class="text-right">Amount</th>

													<th class="text-right">Action</th>-->

												</tr>

											</thead>

											<tbody>

											<?php $sr = 1; 

											foreach($appointment as $row){ ?>

												<tr>

													<td>

														<h2 class="table-avatar">

															<a href="#" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="" onerror="this.onerror=null; this.src='<?php echo base_url('assets/img/doctors/123.png') ?>'" alt="User Image"></a>

															<a href="#"><?php echo $row->hospital ?></a>

														</h2>

													</td>

													<td><?php echo $row->specialities_name ?></td>

													<td>

														<h2 class="table-avatar">

															<a href="#" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="" onerror="this.onerror=null; this.src='<?php echo base_url('assets/img/doctors/123.png') ?>'" alt="User Image"></a>

															<a href="#"><?php echo $row->customer ?> </a>

														</h2>

													</td>

													<td><?php echo $row->appointment_date ?>&nbsp;&nbsp;<span class="text-primary d-block"><?php echo $row->appointment_time ?></span></td>

													<td><?php echo $row->contact; ?></td>

													

													<!--<td>

														<div class="status-toggle">

															<input type="checkbox" id="status_1" class="check" checked>

															<label for="status_1" class="checktoggle">checkbox</label>

														</div>

													</td>

													<td class="text-right">

														$200.00

													</td>

													<td>

														<div class="actions">

															

															<a  data-id="<?php  echo base_url();// $row->id; ?>" class=" delete btn btn-sm bg-danger-light "  >

																<i class="fe fe-trash"></i> Delete

															</a>

														</div>



													</td>---->

													<td>

	

													<?php 

													if(($row->status)=='1'){

													?>

													<span class="badge badge-pill bg-warning-light">Pending</span>

													<?php 

													}

													else if(($row->status)=='2')

													{?>

														<span class="badge badge-pill bg-success-light">Confirmed</span>

													<?php 

													}

													else

													{?>

														<span class="badge badge-pill bg-danger-light">Cancelled</span>

														<?php 

													}

													?>

													</td>

												</tr>

												<?php $sr++; } ?>

											</tbody>

										</table>

									</div>

								</div>

							</div>

							<!-- /Recent Orders -->

							

						</div>

					</div>

				</div>			

			</div>

			<!-- /Page Wrapper -->

		<div class="modal fade" id="delete_modal" aria-hidden="true" role="dialog">

														<div class="modal-dialog modal-dialog-centered" role="document" >

															<div class="modal-content">

															<!--	<div class="modal-header">

																	<h5 class="modal-title">Delete</h5>

																	<button type="button" class="close" data-dismiss="modal" aria-label="Close">

																		<span aria-hidden="true">&times;</span>

																	</button>

																</div>-->

																<div class="modal-body">

																	<div class="form-content p-2">

																	<form method="post" action="<?php echo base_url('admin/delete_appointment'); ?>">

																	 <input type="hidden" id="del_id" name="del" value=''>

																		<h4 class="modal-title" >Delete</h4>

																		<p class="mb-4">Are you sure want to delete?</p>

																		<input type="submit" value="Ok" class="btn btn-primary" name="submit">

																		<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

																		</form>

																	</div>

																</div>

															</div>

														</div>

													</div>

       