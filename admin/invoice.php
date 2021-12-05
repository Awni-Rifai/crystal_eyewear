<!DOCTYPE html>
<html lang=en>
<?php include_once 'layouts/head.php'; ?>

<body id=kt_body class="header-fixed header-tablet-and-mobile-fixed aside-enabled aside-fixed" style=--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px>
	<div class="d-flex flex-column flex-root">
		<div class="page d-flex flex-row flex-column-fluid">
			<?php include_once 'layouts/aside.php'; ?>
			<div class="wrapper d-flex flex-column flex-row-fluid" id=kt_wrapper>
				<?php include_once 'layouts/header.php'; ?>
				<div class="content d-flex flex-column flex-column-fluid" id=kt_content>
					<div class="post d-flex flex-column-fluid" id=kt_post>
						<div id=kt_content_container class=container-xxl>
							<div class="card">
								<div class="card-body py-20">
									<div class="mw-lg-950px mx-auto w-100">
										<div class="d-flex">
											<h4 class="fw-boldest text-gray-800 fs-2qx pe-5">INVOICE</h4>
															

										</div>
										<div class="fw-bold fs-4 text-muted mb-7">
											<div>Order & Account Information</div>
								
										</div>
										<div class="border-bottom pb-12">
											<div class="d-flex justify-content-between flex-column flex-md-row">
												<div class="flex-grow-1 pt-8 mb-13">
													<div class="table-responsive border-bottom mb-14">
														<table class="table">
															<thead>
																<tr class="border-bottom fs-6 fw-bolder text-muted text-uppercase">
																	<th class=min-w-125px>Thumbnail</th>
																	<th class=min-w-125px>Product</th>
																	<th class="min-w-80px">Amount</th>
																</tr>
															</thead>
															<tbody>
																<tr class="fw-bolder text-gray-700 fs-5 ">
																	<td class="d-flex align-items-center">
																		<div class="symbol  symbol-50px overflow-hidden me-3">
																			<a href=../../demo1/dist/apps/product-management/products/view.html>
																				<div class=symbol-label><img src=assets/media/avatars/150-1.jpg alt="Emma Smith" class="w-100"></div>
																			</a>
																		</div>
																	</td>
																	<td class="pt-11 fs-5 pe-lg-6 text-dark fw-boldest "><a href=../../demo1/dist/apps/product-management/products/view.html>Emma Smith</a></td>
																	<td class="pt-11 fs-5 pe-lg-6 text-dark fw-boldest">$3200.00</td>
																</tr>
															</tbody>
														</table>
													</div>
													<div class="d-flex flex-column mw-md-300px w-100">
														<div class="fw-bold fs-5 mb-3 text-dark00">Address Information</div>
														<div class="d-flex flex-stack text-gray-800 mb-3 fs-6">
															<div class="fw-bold pe-5">address line :</div>
															<div class="text-end fw-norma">Barclays UK</div>
														</div>
														<div class="d-flex flex-stack text-gray-800 mb-3 fs-6">
															<div class="fw-bold pe-5">Country:</div>
															<div class="text-end fw-norma">Barclays UK</div>
														</div>
														<div class="d-flex flex-stack text-gray-800 fs-6">
															<div class="fw-bold pe-5">City:</div>
															<div class="text-end fw-norma">Barclays UK</div>
														</div>
													</div>
												</div>
												<div class="border-end d-none d-md-block mh-450px mx-9"></div>
												
												<div class="text-end pt-10">
												<div class="fs-3 fw-bolder text-muted mb-3">Status</div>

												<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Select Status" name="Status">
																		<option value="">Select Status...</option>
																		<option value="1">Successful</option>
																		<option value="2">Pending</option>
																		<option value="3">Rejected</option>
																	</select>
													<div class="border-bottom w-100 my-3 my-lg-8"></div>
													<div class="fs-3 fw-bolder text-muted mb-3">TOTAL AMOUNT</div>
													<div class="fs-xl-2x fs-2 fw-boldest">$20,600.00</div>
													<div class="text-muted fw-bold">Taxes included</div>
													<div class="border-bottom w-100 my-3 my-lg-8"></div>
													<div class="fs-3 fw-bolder text-muted mb-3">Information</div>
													<div class="text-gray-600 fs-6 fw-bold mb-3">Name</div>
													<div class="fs-6 text-gray-800 fw-bold mb-8">Iris Watson.</div>
													<div class="text-gray-600 fs-6 fw-bold mb-3">email</div>
													<div class="fs-6 text-gray-800 fw-bold mb-8">admin@email.com</div>
													<div class="text-gray-600 fs-6 fw-bold mb-3">Phone</div>
													<div class="fs-6 text-gray-800 fw-bold mb-8">12345678</div>
													<div class="text-gray-600 fs-6 fw-bold mb-3">DATE</div>
													<div class="fs-6 text-gray-800 fw-bold">12 May, 2020</div>
												</div>
											</div>
										</div>
										<div class="d-flex flex-stack flex-wrap mt-lg-20 pt-13">
											<button type="button" class="btn btn-success my-1 me-12" onclick="window.print();">Print Invoice</button>
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
	<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
		<span class="svg-icon">
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
				<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
				<path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />
			</svg>
		</span>
	</div>
	<script>
		var hostUrl = "assets/";
	</script>
	<script src="assets/plugins/global/plugins.bundle.js"></script>
	<script src="assets/js/scripts.bundle.js"></script>
	<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
	<script src="assets/js/order-table.js"></script>
</body>

</html>