


			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Transations</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?php echo base_url('admin/index'); ?>">Dashboard</a></li>
									<li class="breadcrumb-item active">Transations Details</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table class="datatableee table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>Name</th>
													<th>Email</th>
													<th>Payment_id</th>
													<th>Amount</th>
													<th>Payment_status</th>
													<th>Payment_date</th>
													<th>Payment_Time</th> 
													<th class="text-right">Actions</th>
												</tr>
											</thead>
											<tbody>
												<?php 
												// $mydate = strtotime($startdate);
												// $newformat = date('d-m-Y',$mydate);
												// echo '<tr>';
												// echo '  <td data-sort="'. $mydate .'">'.$newformat .'</td>';
											// echo "<pre>";
											// print_r($transation); die; 
												foreach($transation as $row){ ?>
												<tr>
													<td><?php echo $row->name; ?></td>
													<td><?php echo $row->email; ?></td>
													<td><?php echo $row->payment_id; ?></td>
													<td>
														Rs. <?php echo $row->amount; ?>
													</td>
													<td><?php echo $row->payment_status; ?></td>
													<?php 
														$orderdate= $row->payment_date;
														$orderdate = explode(' ', $orderdate);
														
													?>
													<td><?php echo $orderdate[0]?></td>
													<td><?php echo  $orderdate[1]?></td>
													
													<td class="text-right">
														<div class="actions">
															<!--<a data-toggle="modal" href="#edit_invoice_report" class="btn btn-sm bg-success-light mr-2">
																<i class="fe fe-pencil"></i> Edit
															</a>-->
															<a class="btn btn-success" data-toggle="" href="">
																<i class="fe fe-success"></i>Success 
															</a>
														</div>
													</td>
												</tr>
												<?php } ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>			
					</div>
					
				</div>			
			</div>
			<!-- /Page Wrapper -->
			
			<!-- Edit Details Modal -->
			<div class="modal fade" id="edit_invoice_report" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Edit Invoice Report</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form>
								<div class="row form-row">
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>Invoice Number</label>
											<input type="text" class="form-control" value="#INV-0001">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>Patient ID</label>
											<input type="text" class="form-control" value="	#PT002">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>Patient Name</label>
											<input type="text" class="form-control" value="R Amer">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>Patient Image</label>
											<input type="file"  class="form-control">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>Total Amount</label>
											<input type="text"  class="form-control" value="$200.00">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>Created Date</label>
											<input type="text"  class="form-control" value="29th Oct 2019">
										</div>
									</div>
									
								</div>
								<button type="submit" class="btn btn-primary btn-block">Save Changes</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- /Edit Details Modal -->
		
			<!-- Delete Modal -->
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
								<h4 class="modal-title">Delete</h4>
								<p class="mb-4">Are you sure want to delete?</p>
								<button type="button" class="btn btn-primary">Save </button>
								<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /Delete Modal -->
			
       