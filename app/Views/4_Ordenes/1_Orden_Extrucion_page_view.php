<!--begin::Content wrapper-->
<div class="d-flex flex-column flex-column-fluid">

	<!--end::Toolbar-->

	<!-- Modal -->
	<div class="modal fade" id="modalFormulario" tabindex="-1" aria-labelledby="modalFormularioLabel"
		aria-hidden="true">
		<div class="modal-dialog  modal-dialog-centered modal-xl">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalFormularioLabel">Formulario de Totales</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
						<button type="submit" class="btn btn-primary">Guardar</button>
						<button type="button" class="btn btn-primary" id="imprimir">Imprimir</button>

					</form>
				</div>
			</div>
		</div>
	</div>

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
							class="notice d-flex bg-light-primary rounded border-primary border border-dashed mb-9 p-6">
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
									<div class="fs-6 text-gray-700">Sector donde se encuentran la lista de pedidos de
										tipo extrucion</div>
								</div>
								<!--end::Content-->
							</div>
							<!--end::Wrapper-->
						</div>
						<div class="card-title">
							<!--begin::Search-->
							<div class="d-flex align-items-center position-relative my-1">
								<!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
								<span class="svg-icon svg-icon-1 position-absolute ms-6">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
										xmlns="http://www.w3.org/2000/svg">
										<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
											transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
										<path
											d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
											fill="currentColor" />
									</svg>
								</span>
								<!--end::Svg Icon-->
								<input type="text" data-kt-docs-table-filter="search"
									class="form-control form-control-solid w-250px ps-14 validar" placeholder="Busqueda"
									data-validacion="^[a-zA-Z0-9\s\.,#@-]+$" />
							</div>
							<!--end::Search-->
						</div>
						<!--begin::Table-->
						<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_datatable_rol">
							<thead>
								<tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
									<th class="min-w-100px text-center">Nombre<br>Usuario</th>
									<th class="min-w-10px text-center">Precio de Bolsa</th>
									<th class="min-w-10px text-center">Material</th>
									<th class="min-w-10px text-center">Tipo de Trabajo</th>
									<th class="min-w-150px text-center">Nota</th>
									<th class="min-w-50px text-center">Fecha<br>Creacion</th>
									<th class="text-end min-w-70px text-center">Acciones</th>
								</tr>
							</thead>
							<tbody class="text-gray-600 fw-semibold">
								<!-- Aquí van los datos de tu tabla -->
							</tbody>
						</table>
						<!--end::Table-->
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