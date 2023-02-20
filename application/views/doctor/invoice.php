
						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="card card-table">
								<div class="card-body">
								
									<!-- Invoice Table -->
									<div class="table-responsive">
										<table class="datatable table table-hover table-center mb-0"> 
											<thead>
												<tr>
													<th>Sr.No</th>
													<th>Invoice Number</th>
													<th>Patient ID</th>
													<th>Doctor Name</th>
													<th>Patient Name</th>
													<th>Total Amount</th>
													<th>Payment Date</th>
													<th>Payment Time</th>
													
													<th class="text-center">Actions</th>
												</tr>
											</thead>
											
											<tbody>
											<?php $sr = 1; ?>
											<?php foreach($transation as $trans): ?> 
												<tr> 
												<td><?php echo $sr ?></td>
											<td><a href="invoice.html">PT00<?php echo $trans->id ?></td>
													<td><?php echo $trans->payment_id ?></td>
													<td><?php echo $trans->name ?>	</td>
													<td>
														
													<?php foreach($dname as $dnames): ?>		
													<?php echo $dnames->name ?>		
													<?php endforeach; ?>	
													</td>
													<td>$ <?php echo $trans->amount ?></td>
													
													<td class="text-center">
														<?php echo  date("d M Y", strtotime("$trans->payment_date")) ?>
														
													</td>
													<td class="text-center">
														<?php echo  date("H:i:s", strtotime("$trans->payment_date")) ?>
														
													</td>
													<td class="text-right">
														<div class="actions">
															
															
															<a href="<?php echo base_url(); ?>doctors/invoice_list?var1=<?= $trans->id;?>&var2=<?= $dnames->name;?>" class="btn btn-sm bg-info-light">
																<i class="far fa-eye"></i> View
															</a>
															
														</div>
													</td>
													<?php $sr++; endforeach; ?>
													
												</tr>
											</tbody>
										</table>
									</div>
									<!-- /Invoice Table -->
									
								</div>
							</div>
						</div>
					</div>

				</div>

			</div>		
            <!-- /Page Content -->
</div>
