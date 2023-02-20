<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="card ">
								<div class="card-body">

<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						<div class="">
							<div class="invoice-content">
								<div class="invoice-item">
									<div class="row">
										<div class="col-md-6">
											<div class="invoice-logo">
												<img src="<?php echo base_url() ?>assets_admin/img/logo.png" alt="logo">
											</div>
										</div>
										<div class="col-md-6">
											<p class="invoice-details">
												<strong>Order: </strong><?php echo $transation->order_id ?><br>
												<strong>Issued: </strong><?php echo date('Y-m-d')?>
											</p>
										</div>
									</div>
								</div>
								
								<!-- Invoice Item -->
								<div class="invoice-item">
									<div class="row">
										<div class="col-md-6">
											<div class="invoice-info">
												<strong class="customer-text">Invoice From</strong>
												<p class="invoice-details invoice-details-two">
													<?php foreach($dname as $dnames): ?>
													Dr. <?php echo $dnames->name ?>
													<?php endforeach; ?> 
													
													<br>
													
													806  Twin Willow Lane, Old Forge,<br>
													Newyork, USA <br>
												</p>
											</div>
										</div>
										<div class="col-md-6">
											<div class="invoice-info invoice-info2">
												<strong class="customer-text">Invoice To</strong>
												<p class="invoice-details">
													<?php echo $transation->member_name ?> <br>
													<?php echo $transation->member_address ?> <br>
													
												</p>
											</div>
										</div>
									</div>
								</div>
								<!-- /Invoice Item -->
								
								<!-- Invoice Item -->
								<div class="invoice-item">
									<div class="row">
										<div class="col-md-12">
											<div class="invoice-info">
												<strong class="customer-text">Payment Method</strong>
												<p class="invoice-details invoice-details-two">
													<?php echo $transation->method ?> <br>
													<?php echo $transation->payment_id ?> <br>
													
												</p>
											</div>
										</div>
									</div>
								</div>
								<!-- /Invoice Item -->
								
								<!-- Invoice Item -->
								<div class="invoice-item invoice-table-wrap">
									<div class="row">
										<div class="col-md-12">
											<div class="table-responsive">
												<table class="invoice-table table table-bordered">
													<thead>
														<tr>
															<th>Description</th>
															<th class="text-center">Method</th>
															<th class="text-center">VAT</th>
															<th class="text-right">Total</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>Appointment Fee : </td>
															<td class="text-center">₹ <?php echo $transation->amount ?></td>
															<td class="text-center">₹0</td>
															<td class="text-right">₹ <?php echo $transation->amount ?></td>
														</tr>
														
													</tbody>
												</table>
											</div>
										</div>
										<div class="col-md-6 col-xl-4 ml-auto">
											<div class="table-responsive">
												<table class="invoice-table-two table">
													<tbody>
													<tr>
														<th>Subtotal:</th>
														<td><span>₹ <?php echo $transation->amount ?></span></td>
													</tr>
													<tr>
														<th>Discount:</th>
														<td><span>0%</span></td>
													</tr>
													<tr>
														<th>Total Amount:</th>
														<td><span>₹ <?php echo $transation->amount ?></span></td>
													</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
								<!-- /Invoice Item -->
								
								<!-- Invoice Information -->
								<div class="other-info">
									<h4>Other information</h4>
									<p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed dictum ligula, cursus blandit risus. Maecenas eget metus non tellus dignissim aliquam ut a ex. Maecenas sed vehicula dui, ac suscipit lacus. Sed finibus leo vitae lorem interdum, eu scelerisque tellus fermentum. Curabitur sit amet lacinia lorem. Nullam finibus pellentesque libero.</p>
								</div>
								<!-- /Invoice Information -->
								
							</div>
						</div>
					</div>

				</div>

			</div>

			</div>

		</div>

	</div>


</div>

</div>

			
			<!-- /Page Content --> 