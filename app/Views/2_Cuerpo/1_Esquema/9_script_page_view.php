<!--begin::Javascript-->
<script>var hostUrl = "metronic/assets/";</script>
<?php
// Obtiene la URL actual
$currentUrl = current_url();
?>
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="metronic/assets/plugins/global/plugins.bundle.js"></script>
<script src="metronic/assets/js/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->
<?php if (strpos($currentUrl, "cpcc") !== false) { ?>
	<script src="metronic/assets/plugins/custom/datatables/datatables.bundle.js"></script>
	<!--Validacion de campos e ingreso de texto-->
	<script>
		document.addEventListener('DOMContentLoaded', function () {
			document.querySelectorAll('.validar').forEach(function (input) {
				input.addEventListener('input', function () {
					const valor = this.value.trim();
					const validacion = new RegExp(this.getAttribute('data-validacion'));
					const mensaje = this.getAttribute('data-mensaje');

					if (!validacion.test(valor)) {
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'No Ingrese caracteres que no corresponden al campo. Verifique por favor.',
							customClass: {
								confirmButton: 'btn btn-primary' // Agrega la clase 'btn btn-success' al botón de confirmación
							}
						});

						this.value = '';
					}
				});
			});
		});
	</script>
	<!-- insertar datos  -->
	<script>
		//cierre de modal
		document.addEventListener('DOMContentLoaded', function () {
			const closeModalBtn = document.getElementById('kt_modal_clienteEdit_close');
			const cancelarModalBtn = document.getElementById('kt_modal_clienteEdit_calcelar');
			if (closeModalBtn) {
				closeModalBtn.addEventListener('click', function () {
					Swal.fire({
						icon: 'warning',
						title: '¿Estás seguro de cerrar?',
						text: '¡Los cambios no se guardarán!',
						showCancelButton: true,
						confirmButtonText: 'Sí, descartar cambios',
						cancelButtonText: 'Cancelar'
					}).then((result) => {
						if (result.isConfirmed) {
							const modal = document.getElementById('kt_editar_modal');
							if (modal) {
								const modalInstance = bootstrap.Modal.getInstance(modal);
								modalInstance.hide();
							}
						}
					});
				});
			}
			if (cancelarModalBtn) {
				cancelarModalBtn.addEventListener('click', function () {
					Swal.fire({
						icon: 'warning',
						title: '¿Estás seguro de cancelar?',
						text: '¡Los cambios no se guardarán!',
						showCancelButton: true,
						confirmButtonText: 'Sí, descartar cambios',
						cancelButtonText: 'Cancelar'
					}).then((result) => {
						if (result.isConfirmed) {
							const modal = document.getElementById('kt_editar_modal');
							if (modal) {
								const modalInstance = bootstrap.Modal.getInstance(modal);
								modalInstance.hide();
							}
						}
					});
				});
			}
		});
		document.addEventListener('DOMContentLoaded', function () {
			const closeModalBtn = document.getElementById('kt_modal_adm_close');
			const cancelarModalBtn = document.getElementById('kt_modal_rol_calcelar');
			if (closeModalBtn) {
				closeModalBtn.addEventListener('click', function () {
					Swal.fire({
						icon: 'warning',
						title: '¿Estás seguro de cerrar?',
						text: '¡Los cambios no se guardarán!',
						showCancelButton: true,
						confirmButtonText: 'Sí, descartar cambios',
						cancelButtonText: 'Cancelar'
					}).then((result) => {
						if (result.isConfirmed) {
							const modal = document.getElementById('kt_modal_add_customer');
							if (modal) {
								const modalInstance = bootstrap.Modal.getInstance(modal);
								modalInstance.hide();
							}
						}
					});
				});
			}
			if (cancelarModalBtn) {
				cancelarModalBtn.addEventListener('click', function () {
					Swal.fire({
						icon: 'warning',
						title: '¿Estás seguro de cancelar?',
						text: '¡Los cambios no se guardarán!',
						showCancelButton: true,
						confirmButtonText: 'Sí, descartar cambios',
						cancelButtonText: 'Cancelar'
					}).then((result) => {
						if (result.isConfirmed) {
							const modal = document.getElementById('kt_modal_add_customer');
							if (modal) {
								const modalInstance = bootstrap.Modal.getInstance(modal);
								modalInstance.hide();
							}
						}
					});
				});
			}
		});
		$(document).ready(function () {
			$('#BtmSubmitCliente').click(function () {
				const nombreUsuario = $('#nombreCliente').val();
				const apellidoUsuario = $('#apellidoCliente').val();
				const correoElectronico = $('#correoElectronico').val();
				const cedulaIdentidad = $('#cedulaIdentidad').val();
				const telefonoUsuario = $('#telefonoCliente').val();
				const direccionUsuario = $('#direccionCliente').val();
				const generoUsuario = $('#generoCliente').val();
				const fechaNacimiento = $('#fechaNacimiento').val();
				// Convertir la fecha al formato YYYY-MM-DD
				const fechaNacimientoFormatted = fechaNacimiento.split('/').reverse().join('-');
				//validacion de nombre y apellido
				if (nombreUsuario.trim() === '' || apellidoUsuario.trim() === '') {
					$('#nombreClienteError').text('Por favor ingrese el nombre completo del usuario nuevo');
					return;
				}
				// Ocultar mensaje de error
				$('#nombreClienteError').text('');
				//validacion de correo electronico
				if (correoElectronico.trim() === '') {
					$('#correoElectronicoError').text('Por favor ingrese correo electronico del nuevo usuario');
					return;
				}
				// Ocultar mensaje de error
				$('#correoElectronicoError').text('');
				//validacion de cedula de identidad
				if (cedulaIdentidad.trim() === '') {
					$('#cedulaIdentidadError').text('Por favor ingrese la cedula de identidad del nuevo usuario');
					return;
				}
				// Ocultar mensaje de error
				$('#cedulaIdentidadError').text('');
				//validacion de telefono
				if (telefonoUsuario.trim() === '') {
					$('#telefonoClienteError').text('Por favor ingrese numero de telefono del nuevo usuario');
					return;
				}
				// Ocultar mensaje de error
				$('#telefonoClienteError').text('');
				//validacion de direccion de cliente
				if (direccionUsuario.trim() === '') {
					$('#direccionClienteError').text('Por favor ingrese direccion del nuevo usuario');
					return;
				}
				// Ocultar mensaje de error
				$('#direccionClienteError').text('');
				//validacion de genero
				if (generoUsuario.trim() === '') {
					$('#generoClienteError').text('Por favor seleccion el genero del nuevo usuario');
					return;
				}
				// Ocultar mensaje de error
				$('#generoClienteError').text('');
				//validacion de fecha de nacimiento
				if (fechaNacimiento.trim() === '') {
					$('#fechaNacimientoError').text('Por favor seleccione fecha de nacimiento del nuevo usuario');
					return;
				}
				// Ocultar mensaje de error
				$('#fechaNacimientoError').text('');

				$.ajax({
					url: '/cpcnc',
					type: 'POST',
					dataType: 'json',
					data: {
						nombreUsuario: nombreUsuario,
						apellidoUsuario: apellidoUsuario,
						correoElectronico: correoElectronico,
						cedulaIdentidad: cedulaIdentidad,
						telefonoUsuario: telefonoUsuario,
						direccionUsuario: direccionUsuario,
						generoUsuario: generoUsuario,
						fechaNacimientoFormatted: fechaNacimientoFormatted,
					},
					success: function (response) {
						if (response.success) {
							Swal.fire({
								text: response.message,
								icon: "success",
								buttonsStyling: false,
								confirmButtonText: "Ok, entendido!",
								customClass: {
									confirmButton: "btn btn-primary"
								}
							}).then((result) => {
								if (result.isConfirmed) {
									const modal = document.querySelector('.modal');
									if (modal) {
										const modalInstance = bootstrap.Modal.getInstance(modal);
										modalInstance.hide();
									}
								}
							});
							limpiarCampoCliente();
							recargar_tabla();
						} else {
							// Cambié el mensaje de error para mostrar correctamente el mensaje devuelto
							Swal.fire({
								text: response.message,
								icon: "error",
								buttonsStyling: false,
								confirmButtonText: "Aceptar!",
								customClass: { confirmButton: "btn btn-primary" },
							});
							limpiarCampoCliente();
						}
					},
					error: function () {
						// Cambié el mensaje de error por un mensaje más descriptivo
						Swal.fire({
							text: "Error Fatal, sistema fuera de servicio. Intenta más tarde, por favor.",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Aceptar!",
							customClass: { confirmButton: "btn btn-primary" },
						});
						limpiarCampoCliente();
					}
				});

			});
		});
		function recargar_tabla() {
			dt.ajax.reload();
		}
		function limpiarCampoCliente() {
			$('#nombreCliente').val('');
			$('#apellidoCliente').val('');
			$('#correoElectronico').val('');
			$('#cedulaIdentidad').val('');
			$('#telefonoCliente').val('');
			$('#direccionCliente').val('');
			$('#generoCliente').val('');
			$('#fechaNacimiento').val('');
		}
	</script>
	<!-- script para enviar y editar datos   -->
	<script>
		//datos a editar
		$(document).ready(function () {
			$('#BtmSubmitClienteEdit').click(function () {
				const id = $('#id').val();
				const nombreUsuario = $('#nombreClienteEdit').val();
				const apellidoUsuario = $('#apellidoClienteEdit').val();
				const correoElectronico = $('#correoElectronicoEdit').val();
				const cedulaIdentidad = $('#cedulaIdentidadEdit').val();
				const telefonoUsuario = $('#telefonoClienteEdit').val();
				const direccionUsuario = $('#direccionClienteEdit').val();
				const generoUsuario = $('#generoClienteEdit').val();
				const fechaNacimiento = $('#fechaNacimientoEdit').val();
				// Convertir la fecha al formato YYYY-MM-DD
				const fechaNacimientoFormatted = fechaNacimiento.split('/').reverse().join('-');
				//validacion de nombre y apellido

				if (nombreUsuario.trim() === '' || apellidoUsuario.trim() === '') {
					$('#nombreClienteErrorEdit').text('Por favor ingrese el nombre completo del Usuario nuevo');
					return;
				}
				// Ocultar mensaje de error
				$('#nombreClienteErrorEdit').text('');
				//validacion de correo electronico
				if (correoElectronico.trim() === '') {
					$('#correoElectronicoErrorEdit').text('Por favor ingrese correo electronico del nuevo usuario');
					return;
				}
				// Ocultar mensaje de error
				$('#correoElectronicoErrorEdit').text('');
				//validacion de cedula de identidad
				if (cedulaIdentidad.trim() === '') {
					$('#cedulaIdentidadErrorEdit').text('Por favor ingrese la cedula de identidad del nuevo usuario');
					return;
				}
				// Ocultar mensaje de error
				$('#cedulaIdentidadErrorEdit').text('');
				//validacion de telefono
				if (telefonoUsuario.trim() === '') {
					$('#telefonoClienteErrorEdit').text('Por favor ingrese numero de telefono del nuevo usuario');
					return;
				}
				// Ocultar mensaje de error
				$('#telefonoClienteErrorEdit').text('');
				//validacion de direccion de cliente
				if (direccionUsuario.trim() === '') {
					$('#direccionClienteErrorEdit').text('Por favor ingrese direccion del nuevo usuario');
					return;
				}
				// Ocultar mensaje de error
				$('#direccionClienteErrorEdit').text('');
				//validacion de genero
				if (generoUsuario.trim() === '') {
					$('#generoClienteErrorEdit').text('Por favor seleccion el genero del nuevo usuario');
					return;
				}
				// Ocultar mensaje de error
				$('#generoClienteErrorEdit').text('');
				//validacion de fecha de nacimiento
				if (fechaNacimiento.trim() === '') {
					$('#fechaNacimientoErrorEdit').text('Por favor seleccione fecha de nacimiento del nuevo usuario');
					return;
				}
				// Ocultar mensaje de error
				$('#fechaNacimientoErrorEdit').text('');

				$.ajax({
					url: '/cpcac',
					type: 'POST',
					dataType: 'json',
					data: {
						id: id,
						nombreUsuario: nombreUsuario,
						apellidoUsuario: apellidoUsuario,
						correoElectronico: correoElectronico,
						cedulaIdentidad: cedulaIdentidad,
						telefonoUsuario: telefonoUsuario,
						direccionUsuario: direccionUsuario,
						generoUsuario: generoUsuario,
						fechaNacimientoFormatted: fechaNacimientoFormatted,
					},

					success: function (response) {

						if (response.success) {
							Swal.fire({
								text: "Datos editados con exito.",
								icon: "success",
								buttonsStyling: false,
								confirmButtonText: "Ok, entendido!",
								customClass: {
									confirmButton: "btn btn-primary"
								}
							}).then((result) => {
								if (result.isConfirmed) {
									const modal = document.querySelector('.modal');
									if (modal) {
										$('#kt_editar_modal').modal('hide');
									}
								}
							});
							recargar_tabla();
						} else {
							Swal.fire({
								text: "ERROR, Por favor veridicar e intentar nuevamente ",
								icon: "error",
								buttonsStyling: !1,
								confirmButtonText: "Aceptar!",
								customClass: { confirmButton: "btn btn-primary" },
							});
						}
					},
					error: function () {
						Swal.fire({
							text: "Error Fatal, Sistema fuera de servicio intentar mas tarde por favor ",
							icon: "error",
							buttonsStyling: !1,
							confirmButtonText: "Aceptar!",
							customClass: { confirmButton: "btn btn-primary" },
						});
					}
				});
			});
		});

		function recargar_tabla() {
			dt.ajax.reload();
		}

	</script>
	<!-- script para listar datos , para eliminar y llena los datos para modificar  -->
	<script>
		$.urlParam = function (name) {
			var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
			return results[1] || 0;
		}
		var table;
		var dt;
		var filterPayment;
		// Class definition
		var KTDatatablesServerSide = function () {
			// Private functions
			var initDatatable = function () {
				dt = $("#kt_datatable_rol").DataTable({
					searchDelay: 500,
					processing: true,
					serverSide: true,
					order: [[1, 'asc']],
					stateSave: true,
					select: {
						style: 'multi',
						selector: 'td:first-child input[type="checkbox"]',
						className: 'row-selected'
					},
					ajax: {
						//hostUrl+"allTipoIndice?c="+$.urlParam('c'),
						url: '/gucdav',
						dataSrc: 'data' // La propiedad que contiene los datos en la respuesta JSON
					},
					columns: [
						{
							data: 'nombre',
							render: function (data, type, row) {
								let badgeClass = '';
								let genderText = row.genero;
								if (genderText === 'M') {
									badgeClass = 'badge-light-primary';
									genderText = 'Masculino'
								} else if (genderText === 'F') {
									badgeClass = 'badge-light-success';
									genderText = 'Femenino'
								} else {
									badgeClass = 'badge-light-warning';
									genderText = 'error'
								}
								return `
																																							<div class="ms-5">
																																								<a 
																																									class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1"
																																									data-kt-ecommerce-category-filter="category_name">${data} ${row.apellido} </a>
																																								<div class="text-muted fs-7 fw-bolder">
																																									<span class="badge py-3 px-4 fs-7 ${badgeClass}">${genderText}</span>
																																								</div>
																																							</div>
																																						`;
							}
						},
						{
							data: 'correo',
							render: function (data, type, row) {
								return `<div class="ms-5" style="max-width: 100px; max-height: 100px; overflow-y: auto;">
																																								<a 
																																									class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1"
																																									data-kt-ecommerce-category-filter="category_name">${data}</a>
																																							</div>`;
							}
						},
						{
							data: 'cedula_identidad',
							render: function (data, type, row) {
								return `<div class="ms-5" style="max-width: 100px; max-height: 100px; overflow-y: auto;">
																																							<a 
																																								class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1"
																																								data-kt-ecommerce-category-filter="category_name">${data}</a>

																																						</div>`;
							}
						},
						{
							data: 'telefono',
							render: function (data, type, row) {
								return `<div class="ms-5">
																																							<a 
																																								class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1"
																																								data-kt-ecommerce-category-filter="category_name">${data}</a>

																																						</div>`;
							}
						},
						{
							data: 'direccion',
							render: function (data, type, row) {
								return `
																																							<div class="ms-5" style="max-width: 230px; max-height: 100px; overflow-y: auto;">
																																								<a 
																																									class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1"
																																									data-kt-ecommerce-category-filter="category_name">
																																									${data}
																																								</a>
																																							</div>`;
							}
						},
						{
							data: 'fecha_nacimiento',
							render: function (data) {
								// Convertir la fecha a un objeto Date
								var date = new Date(data);
								// Obtener el día, mes y año
								var day = date.getDate();
								var month = date.getMonth(); // Se suma 1 porque los meses van de 0 a 11 en JavaScript
								var year = date.getFullYear();
								var monthNames = [
									"Enero", "Febrero", "Marzo",
									"Abril", "Mayo", "Junio", "Julio",
									"Agosto", "Septiembre", "Octubre",
									"Noviembre", "Diciembre"
								];
								// Formatear la fecha como "dd de mes de yyyy"
								return day + ' de ' + monthNames[month] + ' de ' + year;
							}
						},
						{
							data: 'created_at',
							render: function (data) {
								// Convertir la fecha a un objeto Date
								var date = new Date(data);
								// Obtener el día, mes y año
								var day = date.getDate();
								var month = date.getMonth(); // Se suma 1 porque los meses van de 0 a 11 en JavaScript
								var year = date.getFullYear();
								var monthNames = [
									"Enero", "Febrero", "Marzo",
									"Abril", "Mayo", "Junio", "Julio",
									"Agosto", "Septiembre", "Octubre",
									"Noviembre", "Diciembre"
								];
								// Formatear la fecha como "dd de mes de yyyy"
								return day + ' de ' + monthNames[month] + ' de ' + year;
							}
						},
						{
							data: 'Actions',
							render: function (data, type, row) {
								return `
																																				<div class="text-end">
																																					<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" id="btn_editar" data-kt-users-table-filter="delete_row" data-id="${row.id}" data-nombre="${row.nombre}" data-descripcion="${row.descripcion}" data-privilegio="${row.grupo_privilegio}">
																																						<i class="fa-regular fa-pen-to-square"></i>
																																					</a>
																																					<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" id="eliminar" data-kt-users-table-filter="delete_row" data-id="${row.id}" data-nombre="${row.nombre}">
																																						<i class="fa-solid fa-trash"></i>
																																					</a>
																																				</div>
																																			`;
							}
						},
					],
					// columnDefs: [
					//     {
					//         targets: 0,
					//         orderable: false,
					//         render: function (data) {
					//             return `
					//                 <div class="form-check form-check-sm form-check-custom form-check-solid">
					//                     <input class="form-check-input" type="checkbox" value="${data}" />
					//                 </div>`;
					//         }
					//     },
					// ],
					// Add data-filter attribute
					createdRow: function (row, data, dataIndex) {
						$(row).find('td:eq(4)').attr('data-filter', data.CreditCardType);
					}
				});
				table = dt.$;
				// Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
				dt.on('draw', function () {
					initToggleToolbar();
					KTMenu.createInstances();
				});

			}
			// Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
			var handleSearchDatatable = function () {
				const filterSearch = document.querySelector('[data-kt-docs-table-filter="search"]');
				filterSearch.addEventListener('keyup', function (e) {
					dt.search(e.target.value).draw();
				});
			}
			// Init toggle toolbar
			var initToggleToolbar = function () {
				// Toggle selected action toolbar
				// Select all checkboxes
				const container = document.querySelector('#kt_datatable_rol');
				const checkboxes = container.querySelectorAll('[type="checkbox"]');

				// Select elements
				const deleteSelected = document.querySelector('[data-kt-docs-table-select="delete_selected"]');

				// Toggle delete selected toolbar
				checkboxes.forEach(c => {
					// Checkbox on click event
					//console.log()
					c.addEventListener('click', function () {

						setTimeout(function () {
							toggleToolbars();
						}, 50);
					});
				});
			}
			return {
				init: function () {
					initDatatable();
					handleSearchDatatable();
					initToggleToolbar();
				}
			}
		}();
		function recargar_tabla() {
			dt.ajax.reload();
		}
		// On document ready
		KTUtil.onDOMContentLoaded(function () {
			KTDatatablesServerSide.init();
		});
		$(document).on("click", "tbody td #eliminar", function () {
			var el = $(this);
			Swal.fire({
				text: "Está seguro de eliminar el usuario de nombre: " + el.data("nombre"),
				icon: "error",
				showCancelButton: true,
				buttonsStyling: false,
				confirmButtonText: "Si, eliminar!",
				cancelButtonText: "No, eliminar",
				customClass: {
					confirmButton: "btn btn-primary",
					cancelButton: "btn btn-active-light"
				}
			}).then(function (result) {
				if (result.value) {
					$.ajax({
						data: { "id": el.data('id'), "nombre": el.data('nombre') },
						type: "POST",
						dataType: "json",
						url: '/cpcec'
					})
						.done(function (data, textStatus, jqXHR) {

							if (data.success) {

								Swal.fire({
									text: data.message,
									icon: "success",
									buttonsStyling: false,
									confirmButtonText: "Ok!",
									customClass: {
										confirmButton: "btn btn-primary"
									}
								}).then(function (result) {
									if (result.value) {
									}
								});
							} else {
								Swal.fire({
									text: data.message,
									icon: "error",
									buttonsStyling: false,
									confirmButtonText: "Ok!",
									customClass: {
										confirmButton: "btn btn-danger"
									}
								}).then(function (result) {
									if (result.value) {
										//	console.log("error");
									}
								});
							}

							recargar_tabla();
						})
						.fail(function (jqXHR, textStatus, errorThrown) {

							Swal.fire({
								text: "Ocurrio un Error!",
								icon: "error",
								buttonsStyling: false,
								confirmButtonText: "Ok!",
								customClass: {
									confirmButton: "btn btn-danger"
								}
							}).then(function (result) {

							});

							recargar_tabla();
						});
				}
			});
		});

		$(document).on("click", "#btn_editar", function () {
			var el = $(this);
			$('#kt_editar_modal').modal('show');
			//console.log(el.data('id'));
			$.ajax({
				data: { "id": el.data('id') },
				type: "POST",
				dataType: "json",
				url: '/cpcecv',
				success: function (response) {
					//console.log(response); // Aquí puedes manejar la respuesta del controlador
					$('#id').val(response[0].id);
					$('#nombreClienteEdit').val(response[0].nombre);
					$('#apellidoClienteEdit').val(response[0].apellido);
					$('#correoElectronicoEdit').val(response[0].correo);
					$('#cedulaIdentidadEdit').val(response[0].cedula_identidad);
					$('#telefonoClienteEdit').val(response[0].telefono);
					$('#direccionClienteEdit').val(response[0].direccion);
					$('#generoClienteEdit').val(response[0].genero);
					$('#fechaNacimientoEdit').val(response[0].fecha_nacimiento);
					$('#kt_editar_modal').modal('show');
				},
				error: function (xhr, status, error) {
					console.error(error.responseText); // Manejo de errores
				}
			});
		});

	</script>
<?php } elseif (strpos($currentUrl, "cucau") !== false) { ?>
	<script src="metronic/assets/plugins/custom/datatables/datatables.bundle.js"></script>
	<!--Validacion de campos e ingreso de texto-->
	<script>
		document.addEventListener('DOMContentLoaded', function () {
			document.querySelectorAll('.validar').forEach(function (input) {
				input.addEventListener('input', function () {
					const valor = this.value.trim();
					const validacion = new RegExp(this.getAttribute('data-validacion'));
					const mensaje = this.getAttribute('data-mensaje');

					if (!validacion.test(valor)) {
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'No Ingrese caracteres que no corresponden al campo. Verifique por favor.',
							customClass: {
								confirmButton: 'btn btn-primary' // Agrega la clase 'btn btn-success' al botón de confirmación
							}
						});

						this.value = '';
					}
				});
			});
		});
	</script>
	<!-- insertar datos  -->
	<script>
		//cierre de modal
		document.addEventListener('DOMContentLoaded', function () {
			const closeModalBtn = document.getElementById('kt_modal_clienteEdit_close');
			const cancelarModalBtn = document.getElementById('kt_modal_clienteEdit_calcelar');
			if (closeModalBtn) {
				closeModalBtn.addEventListener('click', function () {
					Swal.fire({
						icon: 'warning',
						title: '¿Estás seguro de cerrar?',
						text: '¡Los cambios no se guardarán!',
						showCancelButton: true,
						confirmButtonText: 'Sí, descartar cambios',
						cancelButtonText: 'Cancelar'
					}).then((result) => {
						if (result.isConfirmed) {
							const modal = document.getElementById('kt_editar_modal');
							if (modal) {
								const modalInstance = bootstrap.Modal.getInstance(modal);
								modalInstance.hide();
							}
						}
					});
				});
			}
			if (cancelarModalBtn) {
				cancelarModalBtn.addEventListener('click', function () {
					Swal.fire({
						icon: 'warning',
						title: '¿Estás seguro de cancelar?',
						text: '¡Los cambios no se guardarán!',
						showCancelButton: true,
						confirmButtonText: 'Sí, descartar cambios',
						cancelButtonText: 'Cancelar'
					}).then((result) => {
						if (result.isConfirmed) {
							const modal = document.getElementById('kt_editar_modal');
							if (modal) {
								const modalInstance = bootstrap.Modal.getInstance(modal);
								modalInstance.hide();
							}
						}
					});
				});
			}
		});
		document.addEventListener('DOMContentLoaded', function () {
			const closeModalBtn = document.getElementById('kt_modal_adm_close');
			const cancelarModalBtn = document.getElementById('kt_modal_rol_calcelar');
			if (closeModalBtn) {
				closeModalBtn.addEventListener('click', function () {
					Swal.fire({
						icon: 'warning',
						title: '¿Estás seguro de cerrar?',
						text: '¡Los cambios no se guardarán!',
						showCancelButton: true,
						confirmButtonText: 'Sí, descartar cambios',
						cancelButtonText: 'Cancelar'
					}).then((result) => {
						if (result.isConfirmed) {
							const modal = document.getElementById('kt_modal_add_customer');
							if (modal) {
								const modalInstance = bootstrap.Modal.getInstance(modal);
								modalInstance.hide();
							}
						}
					});
				});
			}
			if (cancelarModalBtn) {
				cancelarModalBtn.addEventListener('click', function () {
					Swal.fire({
						icon: 'warning',
						title: '¿Estás seguro de cancelar?',
						text: '¡Los cambios no se guardarán!',
						showCancelButton: true,
						confirmButtonText: 'Sí, descartar cambios',
						cancelButtonText: 'Cancelar'
					}).then((result) => {
						if (result.isConfirmed) {
							const modal = document.getElementById('kt_modal_add_customer');
							if (modal) {
								const modalInstance = bootstrap.Modal.getInstance(modal);
								modalInstance.hide();
							}
						}
					});
				});
			}
		});
		$(document).ready(function () {
			$('#BtmSubmitPerfil').click(function () {
				// Obtener la imagen seleccionad estudiante
				var fileInputPerfil = $('#avatarEstudiante')[0];
				var filePerfil = fileInputPerfil.files[0];
				//validacion de foto
				if (!filePerfil) {
					$('#avatarError').text('Seleccione una imagen del perfil.');
					return;
				}
				$('#avatarError').text('');
				// validar llenado obligatorio
				//console.log(fileAutomovil);
				const usuario = $('#usuario').val();
				const correo = $('#correo').val();
				const contraseña = $('#contraseña').val();
				const rol = $('#rol').val();
				// Validar que el archivo seleccionado sea una imagen
				if (!['image/png', 'image/jpeg', 'image/jpg'].includes(filePerfil.type)) {
					Swal.fire({
						text: "El archivo subido del perfil debe ser una imagen (PNG, JPEG).",
						icon: "error",
						buttonsStyling: false,
						confirmButtonText: "Aceptar",
						customClass: { confirmButton: "btn btn-primary" },
					});
					return;
				}

				if (usuario.trim() === '') {
					$('#usuarioError').text('Por favor seleccione un usuario');
					return;
				}
				// Ocultar mensaje de error
				$('#usuarioError').text('');
				//validacion de correo electronico
				if (correo.trim() === '') {
					$('#correoError').text('Por favor ingrese correo electronico para ingresar');
					return;
				}
				// Ocultar mensaje de error
				$('#correoError').text('');
				//validacion de cedula de identidad
				if (contraseña.trim() === '') {
					$('#contraseñaError').text('Por favor ingrese contraseña');
					return;
				}
				// Ocultar mensaje de error
				$('#contraseñaError').text('');
				//validacion de telefono
				if (rol.trim() === '') {
					$('#rolError').text('Por favor seleccione un rol');
					return;
				}
				// Ocultar mensaje de error
				$('#rolError').text('');
				//validacion de direccion de cliente
				var formData = new FormData();

				formData.append('filePerfil', filePerfil);
				formData.append('usuario', usuario);
				formData.append('correo', correo);
				formData.append('contraseña', contraseña);
				formData.append('rol', rol);
				$.ajax({
					url: '/cucap',
					type: 'POST',
					dataType: 'json',
					data: formData,
					processData: false,
					contentType: false,
					success: function (response) {
						if (response.success) {
							console.log(response);
							Swal.fire({
								text: response.message,
								icon: "success",
								buttonsStyling: false,
								confirmButtonText: "Ok, entendido!",
								customClass: {
									confirmButton: "btn btn-primary"
								}
							}).then((result) => {
								if (result.isConfirmed) {
									const modal = document.querySelector('.modal');
									if (modal) {
										const modalInstance = bootstrap.Modal.getInstance(modal);
										modalInstance.hide();
									}
								}
							});
							limpiarCampo();
							recargar_tabla();
						} else {
							Swal.fire({
								text: response.message,
								icon: "error",
								buttonsStyling: false,
								confirmButtonText: "Aceptar!",
								customClass: { confirmButton: "btn btn-primary" },
							});
							limpiarCampo();
						}
					},

					error: function (xhr, status, error) {
						console.error("Error en la solicitud:", error);

						Swal.fire({
							text: "No se pudo completar la solicitud. Por favor, inténtalo más tarde y veridicar el correo no puede ser duplicado.",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Aceptar!",
							customClass: { confirmButton: "btn btn-primary" },
						});
					}
				});

			});
		});
		function recargar_tabla() {
			dt.ajax.reload();
		}
		function limpiarCampo() {
			$('#usuario').val('');
			$('#correo').val('');
			$('#contraseña').val('');
			$('#rol').val('');
		}
	</script>
	<!-- script para enviar y editar datos   -->
	<script>
		//datos a editar
		$(document).ready(function () {
			$('#BtmSubmitClienteEdit').click(function () {
				const id = $('#id').val();
				const nombreUsuario = $('#nombreClienteEdit').val();
				const apellidoUsuario = $('#apellidoClienteEdit').val();
				const correoElectronico = $('#correoElectronicoEdit').val();
				const cedulaIdentidad = $('#cedulaIdentidadEdit').val();
				const telefonoUsuario = $('#telefonoClienteEdit').val();
				const direccionUsuario = $('#direccionClienteEdit').val();
				const generoUsuario = $('#generoClienteEdit').val();
				const fechaNacimiento = $('#fechaNacimientoEdit').val();
				// Convertir la fecha al formato YYYY-MM-DD
				const fechaNacimientoFormatted = fechaNacimiento.split('/').reverse().join('-');
				//validacion de nombre y apellido

				if (nombreUsuario.trim() === '' || apellidoUsuario.trim() === '') {
					$('#nombreClienteErrorEdit').text('Por favor ingrese el nombre completo del Usuario nuevo');
					return;
				}
				// Ocultar mensaje de error
				$('#nombreClienteErrorEdit').text('');
				//validacion de correo electronico
				if (correoElectronico.trim() === '') {
					$('#correoElectronicoErrorEdit').text('Por favor ingrese correo electronico del nuevo usuario');
					return;
				}
				// Ocultar mensaje de error
				$('#correoElectronicoErrorEdit').text('');
				//validacion de cedula de identidad
				if (cedulaIdentidad.trim() === '') {
					$('#cedulaIdentidadErrorEdit').text('Por favor ingrese la cedula de identidad del nuevo usuario');
					return;
				}
				// Ocultar mensaje de error
				$('#cedulaIdentidadErrorEdit').text('');
				//validacion de telefono
				if (telefonoUsuario.trim() === '') {
					$('#telefonoClienteErrorEdit').text('Por favor ingrese numero de telefono del nuevo usuario');
					return;
				}
				// Ocultar mensaje de error
				$('#telefonoClienteErrorEdit').text('');
				//validacion de direccion de cliente
				if (direccionUsuario.trim() === '') {
					$('#direccionClienteErrorEdit').text('Por favor ingrese direccion del nuevo usuario');
					return;
				}
				// Ocultar mensaje de error
				$('#direccionClienteErrorEdit').text('');
				//validacion de genero
				if (generoUsuario.trim() === '') {
					$('#generoClienteErrorEdit').text('Por favor seleccion el genero del nuevo usuario');
					return;
				}
				// Ocultar mensaje de error
				$('#generoClienteErrorEdit').text('');
				//validacion de fecha de nacimiento
				if (fechaNacimiento.trim() === '') {
					$('#fechaNacimientoErrorEdit').text('Por favor seleccione fecha de nacimiento del nuevo usuario');
					return;
				}
				// Ocultar mensaje de error
				$('#fechaNacimientoErrorEdit').text('');

				$.ajax({
					url: '/cpcac',
					type: 'POST',
					dataType: 'json',
					data: {
						id: id,
						nombreUsuario: nombreUsuario,
						apellidoUsuario: apellidoUsuario,
						correoElectronico: correoElectronico,
						cedulaIdentidad: cedulaIdentidad,
						telefonoUsuario: telefonoUsuario,
						direccionUsuario: direccionUsuario,
						generoUsuario: generoUsuario,
						fechaNacimientoFormatted: fechaNacimientoFormatted,
					},

					success: function (response) {

						if (response.success) {
							Swal.fire({
								text: "Datos editados con exito.",
								icon: "success",
								buttonsStyling: false,
								confirmButtonText: "Ok, entendido!",
								customClass: {
									confirmButton: "btn btn-primary"
								}
							}).then((result) => {
								if (result.isConfirmed) {
									const modal = document.querySelector('.modal');
									if (modal) {
										$('#kt_editar_modal').modal('hide');
									}
								}
							});
							recargar_tabla();
						} else {
							Swal.fire({
								text: "ERROR, Por favor veridicar e intentar nuevamente ",
								icon: "error",
								buttonsStyling: !1,
								confirmButtonText: "Aceptar!",
								customClass: { confirmButton: "btn btn-primary" },
							});
						}
					},
					error: function () {
						Swal.fire({
							text: "Error Fatal, Sistema fuera de servicio intentar mas tarde por favor ",
							icon: "error",
							buttonsStyling: !1,
							confirmButtonText: "Aceptar!",
							customClass: { confirmButton: "btn btn-primary" },
						});
					}
				});
			});
		});

		function recargar_tabla() {
			dt.ajax.reload();
		}

	</script>
	<!-- script para listar datos , para eliminar y llena los datos para modificar  -->
	<script>
		$.urlParam = function (name) {
			var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
			return results[1] || 0;
		}
		var table;
		var dt;
		var filterPayment;
		// Class definition
		var KTDatatablesServerSide = function () {
			// Private functions
			var initDatatable = function () {
				dt = $("#kt_datatable_rol").DataTable({
					searchDelay: 500,
					processing: true,
					serverSide: true,
					order: [[1, 'asc']],
					stateSave: true,
					select: {
						style: 'multi',
						selector: 'td:first-child input[type="checkbox"]',
						className: 'row-selected'
					},
					ajax: {
						//hostUrl+"allTipoIndice?c="+$.urlParam('c'),
						url: '/cucdpv',
						dataSrc: 'data' // La propiedad que contiene los datos en la respuesta JSON
					},
					columns: [
						{
							data: 'foto',
							render: function (data, type, row) {
								return `<div class="symbol symbol-50px me-3">
																						<img src="uploads/perfil/${data}" class="" alt="">
																					</div>`;
							}
						},
						{
							data: 'nombre',
							render: function (data, type, row) {
								let badgeClass = '';
								let genderText = row.genero;
								if (genderText === 'M') {
									badgeClass = 'badge-light-primary';
									genderText = 'Masculino'
								} else if (genderText === 'F') {
									badgeClass = 'badge-light-success';
									genderText = 'Femenino'
								} else {
									badgeClass = 'badge-light-warning';
									genderText = 'error'
								}
								return `
																																							<div class="ms-5">
																																								<a 
																																									class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1"
																																									data-kt-ecommerce-category-filter="category_name">${data} ${row.apellido} </a>
																																								<div class="text-muted fs-7 fw-bolder">
																																									<span class="badge py-3 px-4 fs-7 ${badgeClass}">${genderText}</span>
																																								</div>
																																							</div>
																																						`;
							}
						},
						{
							data: 'correo',
							render: function (data, type, row) {
								return `<div class="ms-5" style="max-width: 100px; max-height: 100px; overflow-y: auto;">
																																								<a 
																																									class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1"
																																									data-kt-ecommerce-category-filter="category_name">${data}</a>
																																							</div>`;
							}
						},

						{
							data: 'telefono',
							render: function (data, type, row) {
								return `<div class="ms-5">
																																							<a 
																																								class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1"
																																								data-kt-ecommerce-category-filter="category_name">${data}</a>

																																						</div>`;
							}
						},

						{
							data: 'rol',
							render: function (data, type, row) {
								let badgeClass = '';
								let roleText = '';

								// Verifica el valor de 'data' para asignar la clase y el texto correspondiente
								if (data == 1) {
									badgeClass = 'badge-light-danger';
									roleText = 'Administrador';
								} else if (data == 2) {
									badgeClass = 'badge-light-success';
									roleText = 'Usuario';
								} else {
									badgeClass = 'badge-light-warning';
									roleText = 'Error';
								}

								// Retorna el HTML con las clases y texto dinámicos
								return `
																					<div class="ms-5">
																						<div class="text-muted fs-7 fw-bolder">
																							<span class="badge py-3 px-4 fs-7 ${badgeClass}">${roleText}</span>
																						</div>
																					</div>
																				`;
							}
						},



						{
							data: 'created_at',
							render: function (data) {
								// Convertir la fecha a un objeto Date
								var date = new Date(data);
								// Obtener el día, mes y año
								var day = date.getDate();
								var month = date.getMonth(); // Se suma 1 porque los meses van de 0 a 11 en JavaScript
								var year = date.getFullYear();
								var monthNames = [
									"Enero", "Febrero", "Marzo",
									"Abril", "Mayo", "Junio", "Julio",
									"Agosto", "Septiembre", "Octubre",
									"Noviembre", "Diciembre"
								];
								// Formatear la fecha como "dd de mes de yyyy"
								return day + ' de ' + monthNames[month] + ' de ' + year;
							}
						},
						{
							data: 'Actions',
							render: function (data, type, row) {
								return `
																																				<div class="text-end">
																																					<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" id="eliminar" data-kt-users-table-filter="delete_row" data-id="${row.id}" data-nombre="${row.nombre}">
																																						<i class="fa-solid fa-trash"></i>
																																					</a>
																																				</div>
																																			`;
							}
						},
					],
					// columnDefs: [
					//     {
					//         targets: 0,
					//         orderable: false,
					//         render: function (data) {
					//             return `
					//                 <div class="form-check form-check-sm form-check-custom form-check-solid">
					//                     <input class="form-check-input" type="checkbox" value="${data}" />
					//                 </div>`;
					//         }
					//     },
					// ],
					// Add data-filter attribute
					createdRow: function (row, data, dataIndex) {
						$(row).find('td:eq(4)').attr('data-filter', data.CreditCardType);
					}
				});
				table = dt.$;
				// Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
				dt.on('draw', function () {
					initToggleToolbar();
					KTMenu.createInstances();
				});

			}
			// Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
			var handleSearchDatatable = function () {
				const filterSearch = document.querySelector('[data-kt-docs-table-filter="search"]');
				filterSearch.addEventListener('keyup', function (e) {
					dt.search(e.target.value).draw();
				});
			}
			// Init toggle toolbar
			var initToggleToolbar = function () {
				// Toggle selected action toolbar
				// Select all checkboxes
				const container = document.querySelector('#kt_datatable_rol');
				const checkboxes = container.querySelectorAll('[type="checkbox"]');

				// Select elements
				const deleteSelected = document.querySelector('[data-kt-docs-table-select="delete_selected"]');

				// Toggle delete selected toolbar
				checkboxes.forEach(c => {
					// Checkbox on click event
					//console.log()
					c.addEventListener('click', function () {

						setTimeout(function () {
							toggleToolbars();
						}, 50);
					});
				});
			}
			return {
				init: function () {
					initDatatable();
					handleSearchDatatable();
					initToggleToolbar();
				}
			}
		}();
		function recargar_tabla() {
			dt.ajax.reload();
		}
		// On document ready
		KTUtil.onDOMContentLoaded(function () {
			KTDatatablesServerSide.init();
		});
		$(document).on("click", "tbody td #eliminar", function () {
			var el = $(this);
			Swal.fire({
				text: "Está seguro de eliminar el usuario de nombre: " + el.data("nombre"),
				icon: "error",
				showCancelButton: true,
				buttonsStyling: false,
				confirmButtonText: "Si, eliminar!",
				cancelButtonText: "No, eliminar",
				customClass: {
					confirmButton: "btn btn-primary",
					cancelButton: "btn btn-active-light"
				}
			}).then(function (result) {
				if (result.value) {
					$.ajax({
						data: { "id": el.data('id'), "nombre": el.data('nombre') },
						type: "POST",
						dataType: "json",
						url: '/cucel'
					})
						.done(function (data, textStatus, jqXHR) {

							if (data.success) {

								Swal.fire({
									text: data.message,
									icon: "success",
									buttonsStyling: false,
									confirmButtonText: "Ok!",
									customClass: {
										confirmButton: "btn btn-primary"
									}
								}).then(function (result) {
									if (result.value) {
									}
								});
							} else {
								Swal.fire({
									text: data.message,
									icon: "error",
									buttonsStyling: false,
									confirmButtonText: "Ok!",
									customClass: {
										confirmButton: "btn btn-danger"
									}
								}).then(function (result) {
									if (result.value) {
										//	console.log("error");
									}
								});
							}

							recargar_tabla();
						})
						.fail(function (jqXHR, textStatus, errorThrown) {

							Swal.fire({
								text: "Ocurrio un Error!",
								icon: "error",
								buttonsStyling: false,
								confirmButtonText: "Ok!",
								customClass: {
									confirmButton: "btn btn-danger"
								}
							}).then(function (result) {

							});

							recargar_tabla();
						});
				}
			});
		});
	</script>

<?php } elseif (strpos($currentUrl, "rpcrp") !== false) { ?>
	<script src="metronic/assets/plugins/custom/datatables/datatables.bundle.js"></script>
	<!--Validacion de campos e ingreso de texto-->
	<script>
		document.addEventListener('DOMContentLoaded', function () {
			document.querySelectorAll('.validar').forEach(function (input) {
				input.addEventListener('input', function () {
					const valor = this.value.trim();
					const validacion = new RegExp(this.getAttribute('data-validacion'));
					const mensaje = this.getAttribute('data-mensaje');

					if (!validacion.test(valor)) {
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'No Ingrese caracteres que no corresponden al campo. Verifique por favor.',
							customClass: {
								confirmButton: 'btn btn-primary' // Agrega la clase 'btn btn-success' al botón de confirmación
							}
						});

						this.value = '';
					}
				});
			});
		});
	</script>
	<!-- insertar datos  -->
	<script>
		window.onbeforeunload = function () {
			return "Los datos ingresados no se guardarán. ¿Estás seguro de que deseas salir?";
		};

		$('#clear').click(function () {
			limpiarCampo();
		})
		$(document).ready(function () {
			$('#BtnGuardarPedido').click(function () {
				const mes = $('#mes').val();
				const semana = $('#semana').val();
				const op = $('#op').val();
				const nombreCliente = $('#nombreCliente').val();
				const peso = $('#peso').val();
				const maquinaImpresion = $('#maquinaImpresion').val();
				const medidaBolsa = $('#medidaBolsa').val();
				const precioBolsa = $('#precioBolsa').val();
				const impresion = $('#impresion').val();
				const material = $('#material').val();
				const maquinaExtrucion = $('#maquinaExtrucion').val();
				const medidaExtrucion = $('#medidaExtrucion').val();
				const material1Impresion = $('#material1Impresion').val();
				const material2Laminado = $('#material2Laminado').val();
				const material3Laminado = $('#material3Laminado').val();
				const notas = $('#notas').val();
				const TipoPedido = $('#TipoPedido').val();
				//------------------------------------------------------------------------------------------
				//---validacion de campos	
				if (mes.trim() === '') {
					$('#mesError').text('Por favor ingrese el mes');
					return;
				}
				// Ocultar mensaje de error
				$('#mesError').text('');
				if (semana.trim() === '') {
					$('#semanaError').text('Por favor ingrese semana');
					return;
				}
				// Ocultar mensaje de error
				$('#semanaError').text('');
				if (op.trim() === '') {
					$('#opError').text('ingrese el op');
					return;
				}
				// Ocultar mensaje de error
				$('#opError').text('');
				if (nombreCliente.trim() === '') {
					$('#nombreClienteError').text('Por favor ingrese nombre del cliente');
					return;
				}
				// Ocultar mensaje de error
				$('#nombreClienteError').text('');
				if (peso.trim() === '') {
					$('#pesoError').text('Por favor ingrese peso');
					return;
				}
				// Ocultar mensaje de error
				$('#pesoError').text('');
				if (maquinaImpresion.trim() === '') {
					$('#maquinaImpresionError').text('Por favor ingrese la maquina de impresion');
					return;
				}
				// Ocultar mensaje de error
				$('#maquinaImpresionError').text('');
				if (medidaBolsa.trim() === '') {
					$('#medidaBolsaError').text('Por favor ingrese la medidas de bolsa');
					return;
				}
				// Ocultar mensaje de error
				$('#medidaBolsaError').text('');
				if (precioBolsa.trim() === '') {
					$('#precioBolsaError').text('Por favor ingrese el precio de bolsa');
					return;
				}
				// Ocultar mensaje de error
				$('#precioBolsaError').text('');
				if (impresion.trim() === '') {
					$('#impresionError').text('Por favor ingrese la impresion');
					return;
				}
				// Ocultar mensaje de error
				$('#impresionError').text('');
				if (material.trim() === '') {
					$('#materialError').text('Por favor ingrese el material');
					return;
				}
				// Ocultar mensaje de error
				$('#materialError').text('');
				//validacion de cedula de identidad
				if (TipoPedido.trim() === '') {
					$('#TipoPedidoError').text('Por favor seleccion tipo de pedido');
					return;
				}
				// Ocultar mensaje de error
				$('#TipoPedidoError').text('');
				var fronmData = new FormData();

				fronmData.append('mes', mes);
				fronmData.append('semana', semana);
				fronmData.append('op', op);
				fronmData.append('nombreCliente', nombreCliente);
				fronmData.append('peso', peso);
				fronmData.append('maquinaImpresion', maquinaImpresion);
				fronmData.append('medidaBolsa', medidaBolsa);
				fronmData.append('precioBolsa', precioBolsa);
				fronmData.append('impresion', impresion);
				fronmData.append('material', material);
				fronmData.append('maquinaExtrucion', maquinaExtrucion);
				fronmData.append('medidaExtrucion', medidaExtrucion);
				fronmData.append('material1Impresion', material1Impresion);
				fronmData.append('material2Laminado', material2Laminado);
				fronmData.append('material3Laminado', material3Laminado);
				fronmData.append('notas', notas);
				fronmData.append('TipoPedido', TipoPedido);
				console.log(fronmData);
				$.ajax({
					url: '/rpcap',
					type: 'POST',
					dataType: 'json',
					data: fronmData,
					processData: false,
					contentType: false,
					success: function (response) {
						if (response.success) {
							console.log(response);
							Swal.fire({
								text: response.message,
								icon: "success",
								buttonsStyling: false,
								confirmButtonText: "Ok, entendido!",
								customClass: {
									confirmButton: "btn btn-primary"
								}
							}).then((result) => {
								if (result.isConfirmed) {
									const modal = document.querySelector('.modal');
									if (modal) {
										const modalInstance = bootstrap.Modal.getInstance(modal);
										modalInstance.hide();
									}
								}
							});
							limpiarCampo();
						} else {
							Swal.fire({
								text: response.message,
								icon: "error",
								buttonsStyling: false,
								confirmButtonText: "Aceptar!",
								customClass: { confirmButton: "btn btn-primary" },
							});
							limpiarCampo();
						}
					},

					error: function (xhr, status, error) {
						console.error("Error en la solicitud:", error);

						Swal.fire({
							text: "No se pudo completar la solicitud. Verifique los datos ingresados si persiste el error hablar con sorporte.",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Aceptar!",
							customClass: { confirmButton: "btn btn-primary" },
						});
					}
				});

			});
		});

		function limpiarCampo() {
			$('#mes').val('');
			$('#semana').val('');
			$('#op').val('');
			$('#nombreCliente').val('');
			$('#peso').val('');
			$('#maquinaImpresion').val('');
			$('#medidaBolsa').val('');
			$('#precioBolsa').val('');
			$('#impresion').val('');
			$('#material').val('');
			$('#maquinaExtrucion').val('');
			$('#medidaExtrucion').val('');
			$('#material1Impresion').val('');
			$('#material2Laminado').val('');
			$('#material3Laminado').val('');
			$('#notas').val('');
			$('#TipoPedido').val('');
		}

	</script>
<?php } elseif (strpos($currentUrl, "ocoe") !== false) { ?>
	<!-- script para listar datos , para eliminar y llena los datos para modificar  -->
	<script src="metronic/assets/plugins/custom/datatables/datatables.bundle.js"></script>
	<!--script para realiza la suma de las columnas -->
	<script>
		document.querySelectorAll('.campo').forEach(campo => {
			campo.addEventListener('input', () => {
				const fila = campo.closest('tr');
				const campos = fila.querySelectorAll('.campo');
				const total = Array.from(campos).reduce((suma, input) => suma + Number(input.value || 0), 0);
				fila.querySelector('.total').value = total;
			});
		});
	</script>


	<script>
		$.urlParam = function (name) {
			var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
			return results[1] || 0;
		}
		var table;
		var dt;
		var filterPayment;
		// Class definition
		var KTDatatablesServerSide = function () {
			// Private functions
			var initDatatable = function () {
				dt = $("#kt_datatable_rol").DataTable({
					searchDelay: 500,
					processing: true,
					serverSide: true,
					order: [[1, 'asc']],
					stateSave: true,
					select: {
						style: 'multi',
						selector: 'td:first-child input[type="checkbox"]',
						className: 'row-selected'
					},
					ajax: {
						//hostUrl+"allTipoIndice?c="+$.urlParam('c'),
						url: '/ocdpe',
						dataSrc: 'data' // La propiedad que contiene los datos en la respuesta JSON
					},
					columns: [
						{
							data: 'nombre_usuario',
							render: function (data, type, row) {
								return `<div class="ms-5" >
																																								<a 
																																									class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1"
																																									data-kt-ecommerce-category-filter="category_name">${data} ${row.apellido_usuario}</a>
																																							</div>`;
							}
						},

						{
							data: 'precio_bolsa',
							render: function (data, type, row) {
								return `<div class="ms-5">
																																							<a 
																																								class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1"
																																								data-kt-ecommerce-category-filter="category_name">${data}</a>

																																						</div>`;
							}
						},
						{
							data: 'material',
							render: function (data, type, row) {
								return `<div class="ms-5">
																																							<a 
																																								class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1"
																																								data-kt-ecommerce-category-filter="category_name">${data}</a>

																																						</div>`;
							}
						},

						{
							data: 'tipo_trabajo',
							render: function (data, type, row) {
								return `
																					<div class="ms-5">
																						<div class="text-muted fs-7 fw-bolder">
																							<span class="badge py-3 px-4 fs-7 badge-light-success">${data}</span>
																						</div>
																					</div>
																				`;
							}
						},
						{
							data: 'notas',
							render: function (data, type, row) {
								let badgeClass = '';
								let roleText = '';

								// Verifica el valor de 'data' para asignar la clase y el texto correspondiente
								if (data == "") {
									badgeClass = 'badge-light-warning';
									roleText = 'Sin Comentario';
								} else {
									badgeClass = 'badge-light-danger';
									roleText = data;
								}

								// Retorna el HTML con las clases y texto dinámicos
								return `
																					<div class="ms-5" style="max-width: 200px; max-height: 100px; overflow-y: auto;">
																						<div class="text-muted fs-7 fw-bolder">
																							<span class="badge py-3 px-4 fs-7  ${badgeClass}">${roleText}</span>
																						</div>
																					</div>
																				`;
							}
						},



						{
							data: 'created_at',
							render: function (data) {
								// Convertir la fecha a un objeto Date
								var date = new Date(data);
								// Obtener el día, mes y año
								var day = date.getDate();
								var month = date.getMonth(); // Se suma 1 porque los meses van de 0 a 11 en JavaScript
								var year = date.getFullYear();
								var monthNames = [
									"Enero", "Febrero", "Marzo",
									"Abril", "Mayo", "Junio", "Julio",
									"Agosto", "Septiembre", "Octubre",
									"Noviembre", "Diciembre"
								];
								// Formatear la fecha como "dd de mes de yyyy"
								return day + ' de ' + monthNames[month] + ' de ' + year;
							}
						},
						{
							data: 'Actions',
							render: function (data, type, row) {
								return `
																																			<div class="text-end">
																																				<!-- Ícono de eliminar -->
																																				<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" id="eliminar" data-kt-users-table-filter="delete_row" data-id="${row.id}">
																																					<i class="fa-solid fa-trash"></i>
																																				</a>
																																				<!-- Ícono de impresión -->
																																				<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" id="imprimir" data-kt-users-table-filter="print_row" data-id="${row.id}" data-nombre="${row.tipo_trabajo}">
																																					<i class="fa-solid fa-print"></i>
																																				</a>
																																				<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" id="abrirFormulario" data-bs-toggle="modal" data-bs-target="#modalFormulario"  data-id="${row.id}" >
																																					<i class="fa-solid fa-pen"></i>
																																				</a>
																																			</div>

																																			`;
							}
						},
					],
					// columnDefs: [
					//     {
					//         targets: 0,
					//         orderable: false,
					//         render: function (data) {
					//             return `
					//                 <div class="form-check form-check-sm form-check-custom form-check-solid">
					//                     <input class="form-check-input" type="checkbox" value="${data}" />
					//                 </div>`;
					//         }
					//     },
					// ],
					// Add data-filter attribute
					createdRow: function (row, data, dataIndex) {
						$(row).find('td:eq(4)').attr('data-filter', data.CreditCardType);
					}
				});
				table = dt.$;
				// Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
				dt.on('draw', function () {
					initToggleToolbar();
					KTMenu.createInstances();
				});

			}
			// Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
			var handleSearchDatatable = function () {
				const filterSearch = document.querySelector('[data-kt-docs-table-filter="search"]');
				filterSearch.addEventListener('keyup', function (e) {
					dt.search(e.target.value).draw();
				});
			}
			// Init toggle toolbar
			var initToggleToolbar = function () {
				// Toggle selected action toolbar
				// Select all checkboxes
				const container = document.querySelector('#kt_datatable_rol');
				const checkboxes = container.querySelectorAll('[type="checkbox"]');

				// Select elements
				const deleteSelected = document.querySelector('[data-kt-docs-table-select="delete_selected"]');

				// Toggle delete selected toolbar
				checkboxes.forEach(c => {
					// Checkbox on click event
					//console.log()
					c.addEventListener('click', function () {

						setTimeout(function () {
							toggleToolbars();
						}, 50);
					});
				});
			}
			return {
				init: function () {
					initDatatable();
					handleSearchDatatable();
					initToggleToolbar();
				}
			}
		}();
		function recargar_tabla() {
			dt.ajax.reload();
		}
		// On document ready
		KTUtil.onDOMContentLoaded(function () {
			KTDatatablesServerSide.init();
		});
		$(document).on("click", "tbody td #eliminar", function () {
			var el = $(this);
			Swal.fire({
				text: "Está seguro de eliminar el pedido",
				icon: "error",
				showCancelButton: true,
				buttonsStyling: false,
				confirmButtonText: "Si, eliminar!",
				cancelButtonText: "No, eliminar",
				customClass: {
					confirmButton: "btn btn-primary",
					cancelButton: "btn btn-active-light"
				}
			}).then(function (result) {
				if (result.value) {
					$.ajax({
						data: { "id": el.data('id') },
						type: "POST",
						dataType: "json",
						url: '/oceoe'
					})
						.done(function (data, textStatus, jqXHR) {

							if (data.success) {

								Swal.fire({
									text: data.message,
									icon: "success",
									buttonsStyling: false,
									confirmButtonText: "Ok!",
									customClass: {
										confirmButton: "btn btn-primary"
									}
								}).then(function (result) {
									if (result.value) {
									}
								});
							} else {
								Swal.fire({
									text: data.message,
									icon: "error",
									buttonsStyling: false,
									confirmButtonText: "Ok!",
									customClass: {
										confirmButton: "btn btn-danger"
									}
								}).then(function (result) {
									if (result.value) {
										//	console.log("error");
									}
								});
							}

							recargar_tabla();
						})
						.fail(function (jqXHR, textStatus, errorThrown) {

							Swal.fire({
								text: "Ocurrio un Error!",
								icon: "error",
								buttonsStyling: false,
								confirmButtonText: "Ok!",
								customClass: {
									confirmButton: "btn btn-danger"
								}
							}).then(function (result) {

							});

							recargar_tabla();
						});
				}
			});
		});
		$(document).on("click", "tbody td #imprimir", function () {
			var el = $(this);
			console.log("aqiu")
			//e.preventDefault();
			var id = el.data('id');
			console.log(id);
			var url = '/ocdipe?id=' + id;
			window.open(url, '_blank');

		});
		$(document).on("click", "tbody td #abrirFormulario", function () {
			var el = $(this);
			//console.log("aqiu")
			//e.preventDefault();
			var id = el.data('id');
			//	console.log(id);
			$('#id').val(id);

		});
	</script>

	<script>
		$(document).ready(function () {
			// Capturar el evento de envío del formulario
			$('#formularioTotales').on('submit', function (e) {
				e.preventDefault(); // Evitar el envío por defecto

				const id = $('#id').val();
				if (!id) {
					alert('El ID no puede estar vacío.');
					return;
				}

				// Crear un array para almacenar los datos de las filas
				let datos = [];

				// Recorrer cada fila del tbody y capturar los datos
				$('tbody tr').each(function () {
					let fila = {
						item: $(this).find('td:first').text().trim().replace(':', ''), // Quitar espacios y los ":"
						columna1: $(this).find('td:nth-child(2) input').val(),
						columna2: $(this).find('td:nth-child(3) input').val(),
						columna3: $(this).find('td:nth-child(4) input').val(),
						columna4: $(this).find('td:nth-child(5) input').val(),
						columna5: $(this).find('td:nth-child(6) input').val(),
						columna6: $(this).find('td:nth-child(7) input').val(),
						columna7: $(this).find('td:nth-child(8) input').val(),
						columna8: $(this).find('td:nth-child(9) input').val(),
						total: $(this).find('td:nth-child(10) input').val(),
					};
					datos.push(fila);
				});

				// Validar que hay datos antes de enviar
				if (datos.length === 0) {
					alert('No hay datos para enviar.');
					return;
				}
				alert('Datos Guardados correctamente');
				// Enviar los datos mediante AJAX
				$.ajax({
					url: '/rsg', // Cambia esta URL por la de tu servidor
					method: 'POST',
					contentType: 'application/json',
					data: JSON.stringify({ id: id, filas: datos })
				});
			});
		});
	</script>
	<script>
		$(document).ready(function () {
			$('#imprimir').click(function () {
				alert("impresión");
				var url = '/rsis';
				window.open(url, '_blank');
			});
		});


	</script>


<?php } elseif (strpos($currentUrl, "ocob") !== false) { ?>
	<!-- script para listar datos , para eliminar y llena los datos para modificar  -->
	<script src="metronic/assets/plugins/custom/datatables/datatables.bundle.js"></script>
	<!--script para realiza la suma de las columnas -->
	<script>
		document.querySelectorAll('.campo').forEach(campo => {
			campo.addEventListener('input', () => {
				const fila = campo.closest('tr');
				const campos = fila.querySelectorAll('.campo');
				const total = Array.from(campos).reduce((suma, input) => suma + Number(input.value || 0), 0);
				fila.querySelector('.total').value = total;
			});
		});
	</script>
	<script>
		$.urlParam = function (name) {
			var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
			return results[1] || 0;
		}
		var table;
		var dt;
		var filterPayment;
		// Class definition
		var KTDatatablesServerSide = function () {
			// Private functions
			var initDatatable = function () {
				dt = $("#kt_datatable_rol").DataTable({
					searchDelay: 500,
					processing: true,
					serverSide: true,
					order: [[1, 'asc']],
					stateSave: true,
					select: {
						style: 'multi',
						selector: 'td:first-child input[type="checkbox"]',
						className: 'row-selected'
					},
					ajax: {
						//hostUrl+"allTipoIndice?c="+$.urlParam('c'),
						url: '/ocdpbv',
						dataSrc: 'data' // La propiedad que contiene los datos en la respuesta JSON
					},
					columns: [
						{
							data: 'nombre_usuario',
							render: function (data, type, row) {
								return `<div class="ms-5" >
																																								<a 
																																									class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1"
																																									data-kt-ecommerce-category-filter="category_name">${data} ${row.apellido_usuario}</a>
																																							</div>`;
							}
						},

						{
							data: 'precio_bolsa',
							render: function (data, type, row) {
								return `<div class="ms-5">
																																							<a 
																																								class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1"
																																								data-kt-ecommerce-category-filter="category_name">${data}</a>

																																						</div>`;
							}
						},
						{
							data: 'material',
							render: function (data, type, row) {
								return `<div class="ms-5">
																																							<a 
																																								class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1"
																																								data-kt-ecommerce-category-filter="category_name">${data}</a>

																																						</div>`;
							}
						},

						{
							data: 'tipo_trabajo',
							render: function (data, type, row) {
								return `
																					<div class="ms-5">
																						<div class="text-muted fs-7 fw-bolder">
																							<span class="badge py-3 px-4 fs-7 badge-light-success">${data}</span>
																						</div>
																					</div>
																				`;
							}
						},
						{
							data: 'notas',
							render: function (data, type, row) {
								let badgeClass = '';
								let roleText = '';

								// Verifica el valor de 'data' para asignar la clase y el texto correspondiente
								if (data == "") {
									badgeClass = 'badge-light-warning';
									roleText = 'Sin Comentario';
								} else {
									badgeClass = 'badge-light-danger';
									roleText = data;
								}

								// Retorna el HTML con las clases y texto dinámicos
								return `
																					<div class="ms-5" style="max-width: 200px; max-height: 100px; overflow-y: auto;">
																						<div class="text-muted fs-7 fw-bolder">
																							<span class="badge py-3 px-4 fs-7  ${badgeClass}">${roleText}</span>
																						</div>
																					</div>
																				`;
							}
						},



						{
							data: 'created_at',
							render: function (data) {
								// Convertir la fecha a un objeto Date
								var date = new Date(data);
								// Obtener el día, mes y año
								var day = date.getDate();
								var month = date.getMonth(); // Se suma 1 porque los meses van de 0 a 11 en JavaScript
								var year = date.getFullYear();
								var monthNames = [
									"Enero", "Febrero", "Marzo",
									"Abril", "Mayo", "Junio", "Julio",
									"Agosto", "Septiembre", "Octubre",
									"Noviembre", "Diciembre"
								];
								// Formatear la fecha como "dd de mes de yyyy"
								return day + ' de ' + monthNames[month] + ' de ' + year;
							}
						},
						{
							data: 'Actions',
							render: function (data, type, row) {
								return `
																																				<div class="text-end">
																																					<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" id="eliminar" data-kt-users-table-filter="delete_row" data-id="${row.id}" data-nombre="${row.nombre}">
																																						<i class="fa-solid fa-trash"></i>
																																					</a>
																																					<!-- Ícono de impresión -->
																																					<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" id="imprimir" data-kt-users-table-filter="print_row" data-id="${row.id}" data-nombre="${row.tipo_trabajo}">
																																						<i class="fa-solid fa-print"></i>
																																					</a>
																																					<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" id="abrirFormulario" data-bs-toggle="modal" data-bs-target="#modalFormulario"  data-id="${row.id}" >
																																					<i class="fa-solid fa-pen"></i>
																																				</a>
																																				</div>
																																			`;
							}
						},
					],
					// columnDefs: [
					//     {
					//         targets: 0,
					//         orderable: false,
					//         render: function (data) {
					//             return `
					//                 <div class="form-check form-check-sm form-check-custom form-check-solid">
					//                     <input class="form-check-input" type="checkbox" value="${data}" />
					//                 </div>`;
					//         }
					//     },
					// ],
					// Add data-filter attribute
					createdRow: function (row, data, dataIndex) {
						$(row).find('td:eq(4)').attr('data-filter', data.CreditCardType);
					}
				});
				table = dt.$;
				// Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
				dt.on('draw', function () {
					initToggleToolbar();
					KTMenu.createInstances();
				});

			}
			// Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
			var handleSearchDatatable = function () {
				const filterSearch = document.querySelector('[data-kt-docs-table-filter="search"]');
				filterSearch.addEventListener('keyup', function (e) {
					dt.search(e.target.value).draw();
				});
			}
			// Init toggle toolbar
			var initToggleToolbar = function () {
				// Toggle selected action toolbar
				// Select all checkboxes
				const container = document.querySelector('#kt_datatable_rol');
				const checkboxes = container.querySelectorAll('[type="checkbox"]');

				// Select elements
				const deleteSelected = document.querySelector('[data-kt-docs-table-select="delete_selected"]');

				// Toggle delete selected toolbar
				checkboxes.forEach(c => {
					// Checkbox on click event
					//console.log()
					c.addEventListener('click', function () {

						setTimeout(function () {
							toggleToolbars();
						}, 50);
					});
				});
			}
			return {
				init: function () {
					initDatatable();
					handleSearchDatatable();
					initToggleToolbar();
				}
			}
		}();
		function recargar_tabla() {
			dt.ajax.reload();
		}
		// On document ready
		KTUtil.onDOMContentLoaded(function () {
			KTDatatablesServerSide.init();
		});
		$(document).on("click", "tbody td #eliminar", function () {
			var el = $(this);
			Swal.fire({
				text: "Está seguro de eliminar el pedido",
				icon: "error",
				showCancelButton: true,
				buttonsStyling: false,
				confirmButtonText: "Si, eliminar!",
				cancelButtonText: "No, eliminar",
				customClass: {
					confirmButton: "btn btn-primary",
					cancelButton: "btn btn-active-light"
				}
			}).then(function (result) {
				if (result.value) {
					$.ajax({
						data: { "id": el.data('id') },
						type: "POST",
						dataType: "json",
						url: '/oceoe'
					})
						.done(function (data, textStatus, jqXHR) {

							if (data.success) {

								Swal.fire({
									text: data.message,
									icon: "success",
									buttonsStyling: false,
									confirmButtonText: "Ok!",
									customClass: {
										confirmButton: "btn btn-primary"
									}
								}).then(function (result) {
									if (result.value) {
									}
								});
							} else {
								Swal.fire({
									text: data.message,
									icon: "error",
									buttonsStyling: false,
									confirmButtonText: "Ok!",
									customClass: {
										confirmButton: "btn btn-danger"
									}
								}).then(function (result) {
									if (result.value) {
										//	console.log("error");
									}
								});
							}

							recargar_tabla();
						})
						.fail(function (jqXHR, textStatus, errorThrown) {

							Swal.fire({
								text: "Ocurrio un Error!",
								icon: "error",
								buttonsStyling: false,
								confirmButtonText: "Ok!",
								customClass: {
									confirmButton: "btn btn-danger"
								}
							}).then(function (result) {

							});

							recargar_tabla();
						});
				}
			});
		});
		$(document).on("click", "tbody td #imprimir", function () {
			var el = $(this);
			//console.log("aqiu")
			//e.preventDefault();
			var id = el.data('id');
			console.log(id);
			var url = '/ocipb?id=' + id;
			window.open(url, '_blank');

		});
		$(document).on("click", "tbody td #abrirFormulario", function () {
			var el = $(this);
			//console.log("aqiu")
			//e.preventDefault();
			var id = el.data('id');
			//	console.log(id);
			$('#id').val(id);

		});




	</script>
	<script>
		$(document).ready(function () {
			// Capturar el evento de envío del formulario
			$('#formularioTotales').on('submit', function (e) {
				e.preventDefault(); // Evitar el envío por defecto

				const id = $('#id').val();
				if (!id) {
					alert('El ID no puede estar vacío.');
					return;
				}

				// Crear un array para almacenar los datos de las filas
				let datos = [];

				// Recorrer cada fila del tbody y capturar los datos
				$('tbody tr').each(function () {
					let fila = {
						item: $(this).find('td:first').text().trim().replace(':', ''), // Quitar espacios y los ":"
						columna1: $(this).find('td:nth-child(2) input').val(),
						columna2: $(this).find('td:nth-child(3) input').val(),
						columna3: $(this).find('td:nth-child(4) input').val(),
						columna4: $(this).find('td:nth-child(5) input').val(),
						columna5: $(this).find('td:nth-child(6) input').val(),
						columna6: $(this).find('td:nth-child(7) input').val(),
						columna7: $(this).find('td:nth-child(8) input').val(),
						columna8: $(this).find('td:nth-child(9) input').val(),
						total: $(this).find('td:nth-child(10) input').val(),
					};
					datos.push(fila);
				});

				// Validar que hay datos antes de enviar
				if (datos.length === 0) {
					alert('No hay datos para enviar.');
					return;
				}
				alert('Datos Guardados correctamente');
				// Enviar los datos mediante AJAX
				$.ajax({
					url: '/rsg', // Cambia esta URL por la de tu servidor
					method: 'POST',
					contentType: 'application/json',
					data: JSON.stringify({ id: id, filas: datos })
				});
			});
		});
	</script>
	<script>
		$(document).ready(function () {
			$('#imprimir').click(function () {
				alert("impresión");
				var url = '/rsis';
				window.open(url, '_blank');
			});
		});


	</script>
<?php } elseif (strpos($currentUrl, "ocot") !== false) { ?>
	<!-- script para listar datos , para eliminar y llena los datos para modificar  -->
	<script src="metronic/assets/plugins/custom/datatables/datatables.bundle.js"></script>
	<!--script para realiza la suma de las columnas -->
	<script>
		document.querySelectorAll('.campo').forEach(campo => {
			campo.addEventListener('input', () => {
				const fila = campo.closest('tr');
				const campos = fila.querySelectorAll('.campo');
				const total = Array.from(campos).reduce((suma, input) => suma + Number(input.value || 0), 0);
				fila.querySelector('.total').value = total;
			});
		});
	</script>
	<script>
		$.urlParam = function (name) {
			var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
			return results[1] || 0;
		}
		var table;
		var dt;
		var filterPayment;
		// Class definition
		var KTDatatablesServerSide = function () {
			// Private functions
			var initDatatable = function () {
				dt = $("#kt_datatable_rol").DataTable({
					searchDelay: 500,
					processing: true,
					serverSide: true,
					order: [[1, 'asc']],
					stateSave: true,
					select: {
						style: 'multi',
						selector: 'td:first-child input[type="checkbox"]',
						className: 'row-selected'
					},
					ajax: {
						//hostUrl+"allTipoIndice?c="+$.urlParam('c'),
						url: '/ocdptv',
						dataSrc: 'data' // La propiedad que contiene los datos en la respuesta JSON
					},
					columns: [
						{
							data: 'nombre_usuario',
							render: function (data, type, row) {
								return `<div class="ms-5" >
																																								<a 
																																									class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1"
																																									data-kt-ecommerce-category-filter="category_name">${data} ${row.apellido_usuario}</a>
																																							</div>`;
							}
						},

						{
							data: 'precio_bolsa',
							render: function (data, type, row) {
								return `<div class="ms-5">
																																							<a 
																																								class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1"
																																								data-kt-ecommerce-category-filter="category_name">${data}</a>

																																						</div>`;
							}
						},
						{
							data: 'material',
							render: function (data, type, row) {
								return `<div class="ms-5">
																																							<a 
																																								class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1"
																																								data-kt-ecommerce-category-filter="category_name">${data}</a>

																																						</div>`;
							}
						},

						{
							data: 'tipo_trabajo',
							render: function (data, type, row) {
								return `
																					<div class="ms-5">
																						<div class="text-muted fs-7 fw-bolder">
																							<span class="badge py-3 px-4 fs-7 badge-light-success">${data}</span>
																						</div>
																					</div>
																				`;
							}
						},
						{
							data: 'notas',
							render: function (data, type, row) {
								let badgeClass = '';
								let roleText = '';

								// Verifica el valor de 'data' para asignar la clase y el texto correspondiente
								if (data == "") {
									badgeClass = 'badge-light-warning';
									roleText = 'Sin Comentario';
								} else {
									badgeClass = 'badge-light-danger';
									roleText = data;
								}

								// Retorna el HTML con las clases y texto dinámicos
								return `
																					<div class="ms-5" style="max-width: 200px; max-height: 100px; overflow-y: auto;">
																						<div class="text-muted fs-7 fw-bolder">
																							<span class="badge py-3 px-4 fs-7  ${badgeClass}">${roleText}</span>
																						</div>
																					</div>
																				`;
							}
						},



						{
							data: 'created_at',
							render: function (data) {
								// Convertir la fecha a un objeto Date
								var date = new Date(data);
								// Obtener el día, mes y año
								var day = date.getDate();
								var month = date.getMonth(); // Se suma 1 porque los meses van de 0 a 11 en JavaScript
								var year = date.getFullYear();
								var monthNames = [
									"Enero", "Febrero", "Marzo",
									"Abril", "Mayo", "Junio", "Julio",
									"Agosto", "Septiembre", "Octubre",
									"Noviembre", "Diciembre"
								];
								// Formatear la fecha como "dd de mes de yyyy"
								return day + ' de ' + monthNames[month] + ' de ' + year;
							}
						},
						{
							data: 'Actions',
							render: function (data, type, row) {
								return `
																																				<div class="text-end">
																																					<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" id="eliminar" data-kt-users-table-filter="delete_row" data-id="${row.id}" data-nombre="${row.nombre}">
																																						<i class="fa-solid fa-trash"></i>
																																					</a>
																																					<!-- Ícono de impresión -->
																																					<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" id="imprimir" data-kt-users-table-filter="print_row" data-id="${row.id}" data-nombre="${row.tipo_trabajo}">
																																						<i class="fa-solid fa-print"></i>
																																					</a>
																																					<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" id="abrirFormulario" data-bs-toggle="modal" data-bs-target="#modalFormulario"  data-id="${row.id}" >
																																					<i class="fa-solid fa-pen"></i>
																																				</a>
																																				</div>
																																			`;
							}
						},
					],
					// columnDefs: [
					//     {
					//         targets: 0,
					//         orderable: false,
					//         render: function (data) {
					//             return `
					//                 <div class="form-check form-check-sm form-check-custom form-check-solid">
					//                     <input class="form-check-input" type="checkbox" value="${data}" />
					//                 </div>`;
					//         }
					//     },
					// ],
					// Add data-filter attribute
					createdRow: function (row, data, dataIndex) {
						$(row).find('td:eq(4)').attr('data-filter', data.CreditCardType);
					}
				});
				table = dt.$;
				// Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
				dt.on('draw', function () {
					initToggleToolbar();
					KTMenu.createInstances();
				});

			}
			// Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
			var handleSearchDatatable = function () {
				const filterSearch = document.querySelector('[data-kt-docs-table-filter="search"]');
				filterSearch.addEventListener('keyup', function (e) {
					dt.search(e.target.value).draw();
				});
			}
			// Init toggle toolbar
			var initToggleToolbar = function () {
				// Toggle selected action toolbar
				// Select all checkboxes
				const container = document.querySelector('#kt_datatable_rol');
				const checkboxes = container.querySelectorAll('[type="checkbox"]');

				// Select elements
				const deleteSelected = document.querySelector('[data-kt-docs-table-select="delete_selected"]');

				// Toggle delete selected toolbar
				checkboxes.forEach(c => {
					// Checkbox on click event
					//console.log()
					c.addEventListener('click', function () {

						setTimeout(function () {
							toggleToolbars();
						}, 50);
					});
				});
			}
			return {
				init: function () {
					initDatatable();
					handleSearchDatatable();
					initToggleToolbar();
				}
			}
		}();
		function recargar_tabla() {
			dt.ajax.reload();
		}
		// On document ready
		KTUtil.onDOMContentLoaded(function () {
			KTDatatablesServerSide.init();
		});
		$(document).on("click", "tbody td #eliminar", function () {
			var el = $(this);
			Swal.fire({
				text: "Está seguro de eliminar el pedido",
				icon: "error",
				showCancelButton: true,
				buttonsStyling: false,
				confirmButtonText: "Si, eliminar!",
				cancelButtonText: "No, eliminar",
				customClass: {
					confirmButton: "btn btn-primary",
					cancelButton: "btn btn-active-light"
				}
			}).then(function (result) {
				if (result.value) {
					$.ajax({
						data: { "id": el.data('id') },
						type: "POST",
						dataType: "json",
						url: '/oceoe'
					})
						.done(function (data, textStatus, jqXHR) {

							if (data.success) {

								Swal.fire({
									text: data.message,
									icon: "success",
									buttonsStyling: false,
									confirmButtonText: "Ok!",
									customClass: {
										confirmButton: "btn btn-primary"
									}
								}).then(function (result) {
									if (result.value) {
									}
								});
							} else {
								Swal.fire({
									text: data.message,
									icon: "error",
									buttonsStyling: false,
									confirmButtonText: "Ok!",
									customClass: {
										confirmButton: "btn btn-danger"
									}
								}).then(function (result) {
									if (result.value) {
										//	console.log("error");
									}
								});
							}

							recargar_tabla();
						})
						.fail(function (jqXHR, textStatus, errorThrown) {

							Swal.fire({
								text: "Ocurrio un Error!",
								icon: "error",
								buttonsStyling: false,
								confirmButtonText: "Ok!",
								customClass: {
									confirmButton: "btn btn-danger"
								}
							}).then(function (result) {

							});

							recargar_tabla();
						});
				}
			});
		});
		$(document).on("click", "tbody td #imprimir", function () {
			var el = $(this);
			console.log("aqiu")
			//e.preventDefault();
			var id = el.data('id');
			console.log(id);
			var url = '/ocipt?id=' + id;
			window.open(url, '_blank');

		});

		$(document).on("click", "tbody td #abrirFormulario", function () {
			var el = $(this);
			//console.log("aqiu")
			//e.preventDefault();
			var id = el.data('id');
			//	console.log(id);
			$('#id').val(id);

		});



	</script>
	<script>
		$(document).ready(function () {
			// Capturar el evento de envío del formulario
			$('#formularioTotales').on('submit', function (e) {
				e.preventDefault(); // Evitar el envío por defecto

				const id = $('#id').val();
				if (!id) {
					alert('El ID no puede estar vacío.');
					return;
				}

				// Crear un array para almacenar los datos de las filas
				let datos = [];

				// Recorrer cada fila del tbody y capturar los datos
				$('tbody tr').each(function () {
					let fila = {
						item: $(this).find('td:first').text().trim().replace(':', ''), // Quitar espacios y los ":"
						columna1: $(this).find('td:nth-child(2) input').val(),
						columna2: $(this).find('td:nth-child(3) input').val(),
						columna3: $(this).find('td:nth-child(4) input').val(),
						columna4: $(this).find('td:nth-child(5) input').val(),
						columna5: $(this).find('td:nth-child(6) input').val(),
						columna6: $(this).find('td:nth-child(7) input').val(),
						columna7: $(this).find('td:nth-child(8) input').val(),
						columna8: $(this).find('td:nth-child(9) input').val(),
						total: $(this).find('td:nth-child(10) input').val(),
					};
					datos.push(fila);
				});

				// Validar que hay datos antes de enviar
				if (datos.length === 0) {
					alert('No hay datos para enviar.');
					return;
				}
				alert('Datos Guardados correctamente');
				// Enviar los datos mediante AJAX
				$.ajax({
					url: '/rsg', // Cambia esta URL por la de tu servidor
					method: 'POST',
					contentType: 'application/json',
					data: JSON.stringify({ id: id, filas: datos })
				});
			});
		});
	</script>
	<script>
		$(document).ready(function () {
			$('#imprimir').click(function () {
				alert("impresión");
				var url = '/rsis';
				window.open(url, '_blank');
			});
		});


	</script>
<?php } elseif (strpos($currentUrl, "ocor") !== false) { ?>
	<!-- script para listar datos , para eliminar y llena los datos para modificar  -->
	<script src="metronic/assets/plugins/custom/datatables/datatables.bundle.js"></script>
	<!--script para realiza la suma de las columnas -->
	<script>
		document.querySelectorAll('.campo').forEach(campo => {
			campo.addEventListener('input', () => {
				const fila = campo.closest('tr');
				const campos = fila.querySelectorAll('.campo');
				const total = Array.from(campos).reduce((suma, input) => suma + Number(input.value || 0), 0);
				fila.querySelector('.total').value = total;
			});
		});
	</script>
	<script>
		$.urlParam = function (name) {
			var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
			return results[1] || 0;
		}
		var table;
		var dt;
		var filterPayment;
		// Class definition
		var KTDatatablesServerSide = function () {
			// Private functions
			var initDatatable = function () {
				dt = $("#kt_datatable_rol").DataTable({
					searchDelay: 500,
					processing: true,
					serverSide: true,
					order: [[1, 'asc']],
					stateSave: true,
					select: {
						style: 'multi',
						selector: 'td:first-child input[type="checkbox"]',
						className: 'row-selected'
					},
					ajax: {
						//hostUrl+"allTipoIndice?c="+$.urlParam('c'),
						url: '/ocdprv',
						dataSrc: 'data' // La propiedad que contiene los datos en la respuesta JSON
					},
					columns: [
						{
							data: 'nombre_usuario',
							render: function (data, type, row) {
								return `<div class="ms-5" >
																																								<a 
																																									class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1"
																																									data-kt-ecommerce-category-filter="category_name">${data} ${row.apellido_usuario}</a>
																																							</div>`;
							}
						},

						{
							data: 'precio_bolsa',
							render: function (data, type, row) {
								return `<div class="ms-5">
																																							<a 
																																								class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1"
																																								data-kt-ecommerce-category-filter="category_name">${data}</a>

																																						</div>`;
							}
						},
						{
							data: 'material',
							render: function (data, type, row) {
								return `<div class="ms-5">
																																							<a 
																																								class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1"
																																								data-kt-ecommerce-category-filter="category_name">${data}</a>

																																						</div>`;
							}
						},

						{
							data: 'tipo_trabajo',
							render: function (data, type, row) {
								return `
																					<div class="ms-5">
																						<div class="text-muted fs-7 fw-bolder">
																							<span class="badge py-3 px-4 fs-7 badge-light-success">${data}</span>
																						</div>
																					</div>
																				`;
							}
						},
						{
							data: 'notas',
							render: function (data, type, row) {
								let badgeClass = '';
								let roleText = '';

								// Verifica el valor de 'data' para asignar la clase y el texto correspondiente
								if (data == "") {
									badgeClass = 'badge-light-warning';
									roleText = 'Sin Comentario';
								} else {
									badgeClass = 'badge-light-danger';
									roleText = data;
								}

								// Retorna el HTML con las clases y texto dinámicos
								return `
																					<div class="ms-5" style="max-width: 200px; max-height: 100px; overflow-y: auto;">
																						<div class="text-muted fs-7 fw-bolder">
																							<span class="badge py-3 px-4 fs-7  ${badgeClass}">${roleText}</span>
																						</div>
																					</div>
																				`;
							}
						},



						{
							data: 'created_at',
							render: function (data) {
								// Convertir la fecha a un objeto Date
								var date = new Date(data);
								// Obtener el día, mes y año
								var day = date.getDate();
								var month = date.getMonth(); // Se suma 1 porque los meses van de 0 a 11 en JavaScript
								var year = date.getFullYear();
								var monthNames = [
									"Enero", "Febrero", "Marzo",
									"Abril", "Mayo", "Junio", "Julio",
									"Agosto", "Septiembre", "Octubre",
									"Noviembre", "Diciembre"
								];
								// Formatear la fecha como "dd de mes de yyyy"
								return day + ' de ' + monthNames[month] + ' de ' + year;
							}
						},
						{
							data: 'Actions',
							render: function (data, type, row) {
								return `
																																				<div class="text-end">
																																					<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" id="eliminar" data-kt-users-table-filter="delete_row" data-id="${row.id}" data-nombre="${row.nombre}">
																																						<i class="fa-solid fa-trash"></i>
																																					</a>
																																					<!-- Ícono de impresión -->
																																					<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" id="imprimir" data-kt-users-table-filter="print_row" data-id="${row.id}" data-nombre="${row.tipo_trabajo}">
																																						<i class="fa-solid fa-print"></i>
																																					</a>
																																					<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" id="abrirFormulario" data-bs-toggle="modal" data-bs-target="#modalFormulario"  data-id="${row.id}" >
																																					<i class="fa-solid fa-pen"></i>
																																				</a>
																																				</div>
																																			`;
							}
						},
					],
					// columnDefs: [
					//     {
					//         targets: 0,
					//         orderable: false,
					//         render: function (data) {
					//             return `
					//                 <div class="form-check form-check-sm form-check-custom form-check-solid">
					//                     <input class="form-check-input" type="checkbox" value="${data}" />
					//                 </div>`;
					//         }
					//     },
					// ],
					// Add data-filter attribute
					createdRow: function (row, data, dataIndex) {
						$(row).find('td:eq(4)').attr('data-filter', data.CreditCardType);
					}
				});
				table = dt.$;
				// Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
				dt.on('draw', function () {
					initToggleToolbar();
					KTMenu.createInstances();
				});

			}
			// Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
			var handleSearchDatatable = function () {
				const filterSearch = document.querySelector('[data-kt-docs-table-filter="search"]');
				filterSearch.addEventListener('keyup', function (e) {
					dt.search(e.target.value).draw();
				});
			}
			// Init toggle toolbar
			var initToggleToolbar = function () {
				// Toggle selected action toolbar
				// Select all checkboxes
				const container = document.querySelector('#kt_datatable_rol');
				const checkboxes = container.querySelectorAll('[type="checkbox"]');

				// Select elements
				const deleteSelected = document.querySelector('[data-kt-docs-table-select="delete_selected"]');

				// Toggle delete selected toolbar
				checkboxes.forEach(c => {
					// Checkbox on click event
					//console.log()
					c.addEventListener('click', function () {

						setTimeout(function () {
							toggleToolbars();
						}, 50);
					});
				});
			}
			return {
				init: function () {
					initDatatable();
					handleSearchDatatable();
					initToggleToolbar();
				}
			}
		}();
		function recargar_tabla() {
			dt.ajax.reload();
		}
		// On document ready
		KTUtil.onDOMContentLoaded(function () {
			KTDatatablesServerSide.init();
		});
		$(document).on("click", "tbody td #eliminar", function () {
			var el = $(this);
			Swal.fire({
				text: "Está seguro de eliminar el pedido",
				icon: "error",
				showCancelButton: true,
				buttonsStyling: false,
				confirmButtonText: "Si, eliminar!",
				cancelButtonText: "No, eliminar",
				customClass: {
					confirmButton: "btn btn-primary",
					cancelButton: "btn btn-active-light"
				}
			}).then(function (result) {
				if (result.value) {
					$.ajax({
						data: { "id": el.data('id') },
						type: "POST",
						dataType: "json",
						url: '/oceoe'
					})
						.done(function (data, textStatus, jqXHR) {

							if (data.success) {

								Swal.fire({
									text: data.message,
									icon: "success",
									buttonsStyling: false,
									confirmButtonText: "Ok!",
									customClass: {
										confirmButton: "btn btn-primary"
									}
								}).then(function (result) {
									if (result.value) {
									}
								});
							} else {
								Swal.fire({
									text: data.message,
									icon: "error",
									buttonsStyling: false,
									confirmButtonText: "Ok!",
									customClass: {
										confirmButton: "btn btn-danger"
									}
								}).then(function (result) {
									if (result.value) {
										//	console.log("error");
									}
								});
							}

							recargar_tabla();
						})
						.fail(function (jqXHR, textStatus, errorThrown) {

							Swal.fire({
								text: "Ocurrio un Error!",
								icon: "error",
								buttonsStyling: false,
								confirmButtonText: "Ok!",
								customClass: {
									confirmButton: "btn btn-danger"
								}
							}).then(function (result) {

							});

							recargar_tabla();
						});
				}
			});
		});
		$(document).on("click", "tbody td #imprimir", function () {
			var el = $(this);
			console.log("aqiu")
			//e.preventDefault();
			var id = el.data('id');
			console.log(id);
			var url = '/ocipr?id=' + id;
			window.open(url, '_blank');

		});
		$(document).on("click", "tbody td #abrirFormulario", function () {
			var el = $(this);
			//console.log("aqiu")
			//e.preventDefault();
			var id = el.data('id');
			//	console.log(id);
			$('#id').val(id);

		});



	</script>
	<script>
		$(document).ready(function () {
			// Capturar el evento de envío del formulario
			$('#formularioTotales').on('submit', function (e) {
				e.preventDefault(); // Evitar el envío por defecto

				const id = $('#id').val();
				if (!id) {
					alert('El ID no puede estar vacío.');
					return;
				}

				// Crear un array para almacenar los datos de las filas
				let datos = [];

				// Recorrer cada fila del tbody y capturar los datos
				$('tbody tr').each(function () {
					let fila = {
						item: $(this).find('td:first').text().trim().replace(':', ''), // Quitar espacios y los ":"
						columna1: $(this).find('td:nth-child(2) input').val(),
						columna2: $(this).find('td:nth-child(3) input').val(),
						columna3: $(this).find('td:nth-child(4) input').val(),
						columna4: $(this).find('td:nth-child(5) input').val(),
						columna5: $(this).find('td:nth-child(6) input').val(),
						columna6: $(this).find('td:nth-child(7) input').val(),
						columna7: $(this).find('td:nth-child(8) input').val(),
						columna8: $(this).find('td:nth-child(9) input').val(),
						total: $(this).find('td:nth-child(10) input').val(),
					};
					datos.push(fila);
				});

				// Validar que hay datos antes de enviar
				if (datos.length === 0) {
					alert('No hay datos para enviar.');
					return;
				}
				alert('Datos Guardados correctamente');
				// Enviar los datos mediante AJAX
				$.ajax({
					url: '/rsg', // Cambia esta URL por la de tu servidor
					method: 'POST',
					contentType: 'application/json',
					data: JSON.stringify({ id: id, filas: datos })
				});
			});
		});
	</script>
	<script>
		$(document).ready(function () {
			$('#imprimir').click(function () {
				alert("impresión");
				var url = '/rsis';
				window.open(url, '_blank');
			});
		});


	</script>
<?php } elseif (strpos($currentUrl, "ocol") !== false) { ?>
	<!-- script para listar datos , para eliminar y llena los datos para modificar  -->
	<script src="metronic/assets/plugins/custom/datatables/datatables.bundle.js"></script>
	<!--script para realiza la suma de las columnas -->
	<script>
		document.querySelectorAll('.campo').forEach(campo => {
			campo.addEventListener('input', () => {
				const fila = campo.closest('tr');
				const campos = fila.querySelectorAll('.campo');
				const total = Array.from(campos).reduce((suma, input) => suma + Number(input.value || 0), 0);
				fila.querySelector('.total').value = total;
			});
		});
	</script>
	<script>
		$.urlParam = function (name) {
			var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
			return results[1] || 0;
		}
		var table;
		var dt;
		var filterPayment;
		// Class definition
		var KTDatatablesServerSide = function () {
			// Private functions
			var initDatatable = function () {
				dt = $("#kt_datatable_rol").DataTable({
					searchDelay: 500,
					processing: true,
					serverSide: true,
					order: [[1, 'asc']],
					stateSave: true,
					select: {
						style: 'multi',
						selector: 'td:first-child input[type="checkbox"]',
						className: 'row-selected'
					},
					ajax: {
						//hostUrl+"allTipoIndice?c="+$.urlParam('c'),
						url: '/ocdplv',
						dataSrc: 'data' // La propiedad que contiene los datos en la respuesta JSON
					},
					columns: [
						{
							data: 'nombre_usuario',
							render: function (data, type, row) {
								return `<div class="ms-5" >
																																								<a 
																																									class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1"
																																									data-kt-ecommerce-category-filter="category_name">${data} ${row.apellido_usuario}</a>
																																							</div>`;
							}
						},

						{
							data: 'precio_bolsa',
							render: function (data, type, row) {
								return `<div class="ms-5">
																																							<a 
																																								class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1"
																																								data-kt-ecommerce-category-filter="category_name">${data}</a>

																																						</div>`;
							}
						},
						{
							data: 'material',
							render: function (data, type, row) {
								return `<div class="ms-5">
																																							<a 
																																								class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1"
																																								data-kt-ecommerce-category-filter="category_name">${data}</a>

																																						</div>`;
							}
						},

						{
							data: 'tipo_trabajo',
							render: function (data, type, row) {
								return `
																					<div class="ms-5">
																						<div class="text-muted fs-7 fw-bolder">
																							<span class="badge py-3 px-4 fs-7 badge-light-success">${data}</span>
																						</div>
																					</div>
																				`;
							}
						},
						{
							data: 'notas',
							render: function (data, type, row) {
								let badgeClass = '';
								let roleText = '';

								// Verifica el valor de 'data' para asignar la clase y el texto correspondiente
								if (data == "") {
									badgeClass = 'badge-light-warning';
									roleText = 'Sin Comentario';
								} else {
									badgeClass = 'badge-light-danger';
									roleText = data;
								}

								// Retorna el HTML con las clases y texto dinámicos
								return `
																					<div class="ms-5" style="max-width: 200px; max-height: 100px; overflow-y: auto;">
																						<div class="text-muted fs-7 fw-bolder">
																							<span class="badge py-3 px-4 fs-7  ${badgeClass}">${roleText}</span>
																						</div>
																					</div>
																				`;
							}
						},



						{
							data: 'created_at',
							render: function (data) {
								// Convertir la fecha a un objeto Date
								var date = new Date(data);
								// Obtener el día, mes y año
								var day = date.getDate();
								var month = date.getMonth(); // Se suma 1 porque los meses van de 0 a 11 en JavaScript
								var year = date.getFullYear();
								var monthNames = [
									"Enero", "Febrero", "Marzo",
									"Abril", "Mayo", "Junio", "Julio",
									"Agosto", "Septiembre", "Octubre",
									"Noviembre", "Diciembre"
								];
								// Formatear la fecha como "dd de mes de yyyy"
								return day + ' de ' + monthNames[month] + ' de ' + year;
							}
						},
						{
							data: 'Actions',
							render: function (data, type, row) {
								return `
																																				<div class="text-end">
																																					<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" id="eliminar" data-kt-users-table-filter="delete_row" data-id="${row.id}" data-nombre="${row.nombre}">
																																						<i class="fa-solid fa-trash"></i>
																																					</a>
																																					<!-- Ícono de impresión -->
																																					<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" id="imprimir" data-kt-users-table-filter="print_row" data-id="${row.id}" data-nombre="${row.tipo_trabajo}">
																																						<i class="fa-solid fa-print"></i>
																																					</a>
																																					<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" id="abrirFormulario" data-bs-toggle="modal" data-bs-target="#modalFormulario"  data-id="${row.id}" >
																																					<i class="fa-solid fa-pen"></i>
																																				</a>
																																				</div>
																																			`;
							}
						},
					],
					// columnDefs: [
					//     {
					//         targets: 0,
					//         orderable: false,
					//         render: function (data) {
					//             return `
					//                 <div class="form-check form-check-sm form-check-custom form-check-solid">
					//                     <input class="form-check-input" type="checkbox" value="${data}" />
					//                 </div>`;
					//         }
					//     },
					// ],
					// Add data-filter attribute
					createdRow: function (row, data, dataIndex) {
						$(row).find('td:eq(4)').attr('data-filter', data.CreditCardType);
					}
				});
				table = dt.$;
				// Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
				dt.on('draw', function () {
					initToggleToolbar();
					KTMenu.createInstances();
				});

			}
			// Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
			var handleSearchDatatable = function () {
				const filterSearch = document.querySelector('[data-kt-docs-table-filter="search"]');
				filterSearch.addEventListener('keyup', function (e) {
					dt.search(e.target.value).draw();
				});
			}
			// Init toggle toolbar
			var initToggleToolbar = function () {
				// Toggle selected action toolbar
				// Select all checkboxes
				const container = document.querySelector('#kt_datatable_rol');
				const checkboxes = container.querySelectorAll('[type="checkbox"]');

				// Select elements
				const deleteSelected = document.querySelector('[data-kt-docs-table-select="delete_selected"]');

				// Toggle delete selected toolbar
				checkboxes.forEach(c => {
					// Checkbox on click event
					//console.log()
					c.addEventListener('click', function () {

						setTimeout(function () {
							toggleToolbars();
						}, 50);
					});
				});
			}
			return {
				init: function () {
					initDatatable();
					handleSearchDatatable();
					initToggleToolbar();
				}
			}
		}();
		function recargar_tabla() {
			dt.ajax.reload();
		}
		// On document ready
		KTUtil.onDOMContentLoaded(function () {
			KTDatatablesServerSide.init();
		});
		$(document).on("click", "tbody td #eliminar", function () {
			var el = $(this);
			Swal.fire({
				text: "Está seguro de eliminar el pedido",
				icon: "error",
				showCancelButton: true,
				buttonsStyling: false,
				confirmButtonText: "Si, eliminar!",
				cancelButtonText: "No, eliminar",
				customClass: {
					confirmButton: "btn btn-primary",
					cancelButton: "btn btn-active-light"
				}
			}).then(function (result) {
				if (result.value) {
					$.ajax({
						data: { "id": el.data('id') },
						type: "POST",
						dataType: "json",
						url: '/oceoe'
					})
						.done(function (data, textStatus, jqXHR) {

							if (data.success) {

								Swal.fire({
									text: data.message,
									icon: "success",
									buttonsStyling: false,
									confirmButtonText: "Ok!",
									customClass: {
										confirmButton: "btn btn-primary"
									}
								}).then(function (result) {
									if (result.value) {
									}
								});
							} else {
								Swal.fire({
									text: data.message,
									icon: "error",
									buttonsStyling: false,
									confirmButtonText: "Ok!",
									customClass: {
										confirmButton: "btn btn-danger"
									}
								}).then(function (result) {
									if (result.value) {
										//	console.log("error");
									}
								});
							}

							recargar_tabla();
						})
						.fail(function (jqXHR, textStatus, errorThrown) {

							Swal.fire({
								text: "Ocurrio un Error!",
								icon: "error",
								buttonsStyling: false,
								confirmButtonText: "Ok!",
								customClass: {
									confirmButton: "btn btn-danger"
								}
							}).then(function (result) {

							});

							recargar_tabla();
						});
				}
			});
		});
		$(document).on("click", "tbody td #imprimir", function () {
			var el = $(this);
			console.log("aqiu")
			//e.preventDefault();
			var id = el.data('id');
			console.log(id);
			var url = '/ocipl?id=' + id;
			window.open(url, '_blank');

		});
		$(document).on("click", "tbody td #abrirFormulario", function () {
			var el = $(this);
			//console.log("aqiu")
			//e.preventDefault();
			var id = el.data('id');
			//	console.log(id);
			$('#id').val(id);

		});


	</script>
	<script>
		$(document).ready(function () {
			// Capturar el evento de envío del formulario
			$('#formularioTotales').on('submit', function (e) {
				e.preventDefault(); // Evitar el envío por defecto

				const id = $('#id').val();
				if (!id) {
					alert('El ID no puede estar vacío.');
					return;
				}

				// Crear un array para almacenar los datos de las filas
				let datos = [];

				// Recorrer cada fila del tbody y capturar los datos
				$('tbody tr').each(function () {
					let fila = {
						item: $(this).find('td:first').text().trim().replace(':', ''), // Quitar espacios y los ":"
						columna1: $(this).find('td:nth-child(2) input').val(),
						columna2: $(this).find('td:nth-child(3) input').val(),
						columna3: $(this).find('td:nth-child(4) input').val(),
						columna4: $(this).find('td:nth-child(5) input').val(),
						columna5: $(this).find('td:nth-child(6) input').val(),
						columna6: $(this).find('td:nth-child(7) input').val(),
						columna7: $(this).find('td:nth-child(8) input').val(),
						columna8: $(this).find('td:nth-child(9) input').val(),
						total: $(this).find('td:nth-child(10) input').val(),
					};
					datos.push(fila);
				});

				// Validar que hay datos antes de enviar
				if (datos.length === 0) {
					alert('No hay datos para enviar.');
					return;
				}
				alert('Datos Guardados correctamente');
				// Enviar los datos mediante AJAX
				$.ajax({
					url: '/rsg', // Cambia esta URL por la de tu servidor
					method: 'POST',
					contentType: 'application/json',
					data: JSON.stringify({ id: id, filas: datos })
				});
			});
		});
	</script>
	<script>
		$(document).ready(function () {
			$('#imprimir').click(function () {
				alert("impresión");
				var url = '/rsis';
				window.open(url, '_blank');
			});
		});


	</script>
<?php } ?>
<!--end::Javascript-->