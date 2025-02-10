<!--begin::Content wrapper-->
<div class="d-flex flex-column flex-column-fluid">
	<!--begin::Toolbar-->
	<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
		<!--begin::Toolbar container-->
		<div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
			<!--begin::Page title-->
			<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
				<!--begin::Title-->
				<h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">PEDIDOS
				</h1>
				<!--end::Title-->
					</div>
			<!--end::Page title-->
			
		</div>
		<!--end::Toolbar container-->
	</div>
	<!--end::Toolbar-->
	<!--begin::Content-->
	<div id="kt_app_content" class="app-content flex-column-fluid">
		<!--begin::Content container-->
		<div id="kt_app_content_container" class="app-container container-fluid">
			<!--begin::Row-->
			<div class="row gx-5 gx-xl-10">
				<div class="card card-flush h-md-100">
					<!--begin::Card body-->
					<div class="card-body py-4">
						<div
							class="notice d-flex bg-light-primary rounded border-primary border border-dashed mb-0 p-8">
							<!--begin::Icon-->
							<!--begin::Svg Icon | path: icons/duotune/art/art006.svg-->
							<span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
									xmlns="http://www.w3.org/2000/svg">
									<path opacity="0.3"
										d="M22 19V17C22 16.4 21.6 16 21 16H8V3C8 2.4 7.6 2 7 2H5C4.4 2 4 2.4 4 3V19C4 19.6 4.4 20 5 20H21C21.6 20 22 19.6 22 19Z"
										fill="currentColor"></path>
									<path
										d="M20 5V21C20 21.6 19.6 22 19 22H17C16.4 22 16 21.6 16 21V8H8V4H19C19.6 4 20 4.4 20 5ZM3 8H4V4H3C2.4 4 2 4.4 2 5V7C2 7.6 2.4 8 3 8Z"
										fill="currentColor"></path>
								</svg>
							</span>
							<!--end::Svg Icon-->
							<!--end::Icon-->
							<!--begin::Wrapper-->
							<div class="d-flex flex-stack flex-grow-1">
								<!--begin::Content-->
								<div class="fw-semibold">
									<div class="fs-6 text-gray-700">Sector donde podra llenar los datos importantes de
										los pedidos y seleccionarlos
									</div>
								</div>
								<!--end::Content-->
							</div>
							<!--end::Wrapper-->
						</div>
						<!--begin::formulario-->
						<div class="card-body py-2">
							<!--begin::Contacts-->
							<div class="card card-flush h-lg-100" id="kt_contacts_main">
								<!--begin::Card header-->
								<div class="card-header pt-0" id="kt_chat_contacts_header">
									<!--begin::Card title-->
									<div class="card-title">
										<!--begin::Svg Icon | path: icons/duotune/communication/com005.svg-->
										<span class="svg-icon svg-icon-1 me-2">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
												xmlns="http://www.w3.org/2000/svg">
												<path
													d="M20 14H18V10H20C20.6 10 21 10.4 21 11V13C21 13.6 20.6 14 20 14ZM21 19V17C21 16.4 20.6 16 20 16H18V20H20C20.6 20 21 19.6 21 19ZM21 7V5C21 4.4 20.6 4 20 4H18V8H20C20.6 8 21 7.6 21 7Z"
													fill="currentColor"></path>
												<path opacity="0.3"
													d="M17 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H17C17.6 2 18 2.4 18 3V21C18 21.6 17.6 22 17 22ZM10 7C8.9 7 8 7.9 8 9C8 10.1 8.9 11 10 11C11.1 11 12 10.1 12 9C12 7.9 11.1 7 10 7ZM13.3 16C14 16 14.5 15.3 14.3 14.7C13.7 13.2 12 12 10.1 12C8.10001 12 6.49999 13.1 5.89999 14.7C5.59999 15.3 6.19999 16 7.39999 16H13.3Z"
													fill="currentColor"></path>
											</svg>
										</span>
										<!--end::Svg Icon-->
										<h2>Registro de Pedidos</h2>
									</div>
									<!--end::Card title-->
								</div>
								<!--end::Card header-->
								<!--begin::Card body-->


								<!--begin::Form Container-->
								<div class="container">
									<div class="row">
										<!--begin::Left Column-->
										<div class="col-2">
											<!-- Placeholder for Image -->
											<div class="d-flex justify-content-center align-items-center border h-100">
												<img src="imagen/logo.png" alt="Left Image" class="img-fluid">
											</div>
										</div>
										<!--end::Left Column-->

										<!--begin::Middle Column-->
										<div class="col-10">
											<!--begin::Form-->
											<form id="kt_ecommerce_settings_general_form"
												class="form fv-plugins-bootstrap5 fv-plugins-framework" action="#">

												<div class="row align-items-center mb-4">
													<div class="col">
														<hr>
													</div>
													<div class="col-auto text-center">
														<span class="fs-5 fw-bold text-muted">Datos Generales</span>
													</div>
													<div class="col">
														<hr>
													</div>
												</div>
												<div class="row row-cols-1 row-cols-md-3 g-3">
													<div class="col">
														<div class="fv-row mb-7 fv-plugins-icon-container">
															<label class="fs-6 fw-semibold form-label mt-3">
																<span class="required">Mes</span>
															</label>
															<input type="text" class="form-control form-control-solid"
																id="mes" value="">
															<div class="fv-plugins-message-container invalid-feedback">
															</div>
														</div>
														<span id="mesError" style="color: red;"></span>											
													</div>
													<div class="col">
														<div class="fv-row mb-7">
															<label class="fs-6 fw-semibold form-label mt-3">
																<span>Semana</span>
															</label>
															<input type="text" class="form-control form-control-solid"
																id="semana" value="">
														</div>
														<span id="semanaError" style="color: red;"></span>
													</div>
													<div class="col">
														<div class="fv-row mb-7">
															<label class="fs-6 fw-semibold form-label mt-3">
																<span>OP</span>
															</label>
															<input type="text" class="form-control form-control-solid"
																id="op" value="">
														</div>
														<span id="opError" style="color: red;"></span>
													</div>
												</div>

												<div class="fv-row mb-7 fv-plugins-icon-container">
													<!--begin::Label-->
													<label class="fs-6 fw-semibold form-label mt-3">
														<span class="required">Nombre del Cliente</span>
													</label>
													<!--end::Label-->
													<!--begin::Input-->
													<input type="text" class="form-control form-control-solid"
														id="nombreCliente" value="">
													<!--end::Input-->
													<span id="nombreClienteError" style="color: red;"></span>												
												</div>
												<div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
													<div class="col">
														<div class="fv-row mb-7 fv-plugins-icon-container">
															<label class="fs-6 fw-semibold form-label mt-3">
																
																<span class="required">Peso</span>
																<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
																title="Si quiero poner numero con decimales usar '.' EJ: 21.21  "></i>
															</label>
															<input type="text" class="form-control form-control-solid validar" data-validacion="^[0-9.]*$"

																id="peso" value="">
															<div class="fv-plugins-message-container invalid-feedback">
															</div>
														</div>
														<span id="pesoError" style="color: red;"></span>
													</div>
													<div class="col">
														<div class="fv-row mb-7">
															<label class="fs-6 fw-semibold form-label mt-3">
																<span>Maquina de Impresion</span>
															</label>
															<input type="text" class="form-control form-control-solid"
																id="maquinaImpresion" value="">
														</div>
														<span id="maquinaImpresionError" style="color: red;"></span>
													</div>
												</div>
												<div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
													<div class="col">
														<div class="fv-row mb-7 fv-plugins-icon-container">
															<label class="fs-6 fw-semibold form-label mt-3">
																<span class="required">Medida de Bolsa</span>
															</label>
															<input type="text" class="form-control form-control-solid"
																id="medidaBolsa" value="">
															<div class="fv-plugins-message-container invalid-feedback">
															</div>
															<span id="medidaBolsaError" style="color: red;"></span>
														</div>
													</div>
													<div class="col">
														<div class="fv-row mb-7">
															<label class="fs-6 fw-semibold form-label mt-3">
																<span>Precio por Bolsa</span>
															</label>
															<input type="text" class="form-control form-control-solid"
																id="precioBolsa" value="">
														</div>
														<span id="precioBolsaError" style="color: red;"></span>
													</div>
												</div>
												<div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
													<div class="col">
														<div class="fv-row mb-7 fv-plugins-icon-container">
															<label class="fs-6 fw-semibold form-label mt-3">
																<span class="required">Impresion</span>
															</label>
															<input type="text" class="form-control form-control-solid"
																id="impresion" value="">
															<div class="fv-plugins-message-container invalid-feedback">
															</div>
														</div>
														<span id="impresionError" style="color: red;"></span>
													</div>
													<div class="col">
														<div class="fv-row mb-7">
															<label class="fs-6 fw-semibold form-label mt-3">
																<span>Material</span>
															</label>
															<input type="text" class="form-control form-control-solid"
																id="material" value="">
														</div>
														<span id="materialError" style="color: red;"></span>
													</div>
												</div>


												<div class="row align-items-center mb-4">
													<div class="col">
														<hr>
													</div>
													<div class="col-auto text-center">
														<span class="fs-5 fw-bold text-muted">Extruccion</span>
													</div>
													<div class="col">
														<hr>
													</div>
												</div>

												<div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
													<div class="col">
														<div class="fv-row mb-7 fv-plugins-icon-container">
															<label class="fs-6 fw-semibold form-label mt-3">
																<span class="required">Maquina de Extrucion</span>
															</label>
															<input type="text" class="form-control form-control-solid"
																id="maquinaExtrucion" value="">
															<div class="fv-plugins-message-container invalid-feedback">
															</div>
														</div>
														<span id="maquinaExtrucionError" style="color: red;"></span>
													</div>
													<div class="col">
														<div class="fv-row mb-7">
															<label class="fs-6 fw-semibold form-label mt-3">
																<span>Medida de Extrucion</span>
															</label>
															<input type="text" class="form-control form-control-solid"
																id="medidaExtrucion" value="">
														</div>
														<span id="medidaExtrucionError" style="color: red;"></span>
													</div>
												</div>


												<div class="row align-items-center mb-4">
													<div class="col">
														<hr>
													</div>
													<div class="col-auto text-center">
														<span class="fs-5 fw-bold text-muted">Laminacion</span>
													</div>
													<div class="col">
														<hr>
													</div>
												</div>
												<div class="row row-cols-1 row-cols-md-3 g-3">
													<div class="col">
														<div class="fv-row mb-7 fv-plugins-icon-container">
															<label class="fs-6 fw-semibold form-label mt-3">
																<span class="required">Material 1 Impresion</span>
															</label>
															<input type="text" class="form-control form-control-solid"
																id="material1Impresion" value="">
															<div class="fv-plugins-message-container invalid-feedback">
															</div>
														</div>
														<span id="material1ImpresionError" style="color: red;"></span>
													</div>
													<div class="col">
														<div class="fv-row mb-7">
															<label class="fs-6 fw-semibold form-label mt-3">
																<span>Material 2 Laminado</span>
															</label>
															<input type="text" class="form-control form-control-solid"
																id="material2Laminado" value="">
														</div>
														<span id="material2LaminadoError" style="color: red;"></span>
													</div>
													<div class="col">
														<div class="fv-row mb-7">
															<label class="fs-6 fw-semibold form-label mt-3">
																<span>Material 3 Laminado</span>
															</label>
															<input type="text" class="form-control form-control-solid"
																id="material3Laminado" value="">
														</div>
														<span id="material3LaminadoError" style="color: red;"></span>
													</div>
												</div>
												<div class="fv-row mb-7">
													<label class="fs-6 fw-semibold form-label mt-3">
														<span>Notas</span>
													</label>
													<textarea class="form-control form-control-solid"
														id="notas"></textarea>
													<span id="notasError" style="color: red;"></span>
												</div>
												<div class="row align-items-center mb-4">
													<div class="col">
														<hr>
													</div>
													<div class="col-auto text-center">
														<span class="fs-5 fw-bold text-muted">Seleccionador de
															Pedidos</span>
													</div>
													<div class="col">
														<hr>
													</div>
												</div>
												<!--begin::Input group-->
												<div class="row mb-6">
													<!--begin::Label-->
													<label class="col-lg-4 col-form-label fw-semibold fs-6">
														<span class="required">Tipos de Ordenes</span>
														<i class="fas fa-exclamation-circle ms-1 fs-7"
															data-bs-toggle="tooltip" title="Seleccionar el ripo de trabajo al que pertenece los datos "></i>
													</label>
													<!--end::Label-->
													<!--begin::Col-->
													<div class="col-lg-8 fv-row">
														<select id="TipoPedido" aria-label="Select a Country"
															data-placeholder="Seleccionar Genero..."
															class="form-select form-select-solid form-select-lg fw-semibold">
															<option value="">Seleccionar Tipo...</option>
															<option value="1">Extrucion </option>
															<option value="2">Bopp </option>
															<option value="3">Tricapa </option>
															<option value="4">Refilado </option>
															<option value="5">Laminacion </option>
														</select>
													</div>
													<!--end::Col-->
													<span id="TipoPedidoError" style="color: red;"></span>
												</div>
												<!--end::Input group-->
												<div class="separator mb-6"></div>

												<div class="row align-items-center mb-4">
													<div class="col">
														<hr>
													</div>
													<div class="col-auto text-center">
														<span class="fs-5 fw-bold text-muted">Seleccionador de
															Pedidos</span>
													</div>
													<div class="col">
														<hr>
													</div>
												</div>
												<!--begin::Input group-->
												<div class="row mb-6">
													<!--begin::Label-->
													<label class="col-lg-4 col-form-label fw-semibold fs-6">
														<span class="required">Tipos de Salidas</span>
														<i class="fas fa-exclamation-circle ms-1 fs-7"
															data-bs-toggle="tooltip" title="Seleccionar el ripo de trabajo al que pertenece los datos "></i>
													</label>
													<!--end::Label-->
													<!--begin::Col-->
													<div class="col-lg-8 fv-row">
														<select id="TipoPedido" aria-label="Select a Country"
															data-placeholder="Seleccionar Genero..."
															class="form-select form-select-solid form-select-lg fw-semibold">
															<option value="">Seleccionar Tipo...</option>
															<option value="1">Bopp </option>
															<option value="2">Tricapa 65x75 </option>
															<option value="3">Tricapa 67x75 </option>
															<option value="4">Refilado </option>
															<option value="5">Laminacion </option>
														</select>
													</div>
													<!--end::Col-->
													<span id="TipoPedidoError" style="color: red;"></span>
												</div>

												<div class="d-flex justify-content-end">
													<button type="button" data-kt-contacts-type="cancel"
														class="btn btn-light me-3" id="clear">Limpiar</button>
													<button type="button" id="BtnGuardarPedido"
														class="btn btn-primary">
														<span class="indicator-label">Guardar</span>
														<span class="indicator-progress">Please wait...<span
																class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
													</button>
												</div>
											</form>
											<!--end::Form-->
										</div>
										<!--end::Middle Column-->

									</div>
								</div>
								<!--end::Form Container-->




								<!--end::Card body-->
							</div>
							<!--end::Contacts-->
						</div>
						<!--end::formulario-->
					</div>
					<!--end::Card body-->
				</div>
			</div>
			<!--end::Row-->
		</div>
		<!--end::Content container-->
	</div>
	<!--end::Content-->
</div>
<!--end::Content wrapper-->