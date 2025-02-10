<!DOCTYPE html>
<html lang="es">
<!--begin::Head-->

<head>
	<base href="../../../">
	<title>Sistema Web</title>
	<meta charset="utf-8" />
	<meta name="description"
		content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
	<meta name="keywords"
		content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="article" />
	<meta property="og:title"
		content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme" />
	<meta property="og:url" content="https://keenthemes.com/metronic" />
	<meta property="og:site_name" content="Keenthemes | Metronic" />
	<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
	<link rel="shortcut icon" href="imagen/logo.png" />
	<!--begin::Fonts-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
	<!--end::Fonts-->
	<!--begin::Global Stylesheets Bundle(used by all pages)-->
	<link href="metronic/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
	<link href="metronic/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
	<!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body data-kt-name="metronic" id="kt_body" class="app-blank app-blank bgi-size-cover bgi-position-center bgi-no-repeat">
	<!--begin::Theme mode setup on page load-->
	<script>if (document.documentElement) { const defaultThemeMode = "system"; const name = document.body.getAttribute("data-kt-name"); let themeMode = localStorage.getItem("kt_" + (name !== null ? name + "_" : "") + "theme_mode_value"); if (themeMode === null) { if (defaultThemeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } else { themeMode = defaultThemeMode; } } document.documentElement.setAttribute("data-theme", themeMode); }</script>
	<!--end::Theme mode setup on page load-->
	<!--begin::Root-->
	<div class="d-flex flex-column flex-root" id="kt_app_root">
		<!--begin::Page bg image-->
		<style>
			body {
				background-image: url('metronic/assets/media/auth/bg10.jpeg');
			}

			[data-theme="dark"] body {
				background-image: url('metronic/assets/media/auth/bg10-dark.jpeg');
			}
		</style>
		<!--end::Page bg image-->
		<!--begin::Authentication - Sign-in -->
		<div class="d-flex flex-column flex-lg-row flex-column-fluid">
			<!--begin::Aside-->
			<div class="d-flex flex-lg-row-fluid">
				<!--begin::Content-->
				<div class="d-flex flex-column flex-center pb-0 pb-lg-10 p-10 w-100">
					<!--begin::Image-->
					<img class="theme-light-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20"
						src="imagen/logo.png" alt="" />
					<img class="theme-dark-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20"
					src="imagen/logo.png" alt="" />
					<!--end::Image-->
				
				</div>
				<!--end::Content-->
			</div>
			<!--begin::Aside-->
			<!--begin::Body-->
			<div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
				<!--begin::Wrapper-->
				<div class="bg-body d-flex flex-center rounded-4 w-md-600px p-10">
					<!--begin::Content-->
					<div class="w-md-400px">
						<!--begin::Heading-->
						<div class="text-center mb-11">
							<!--begin::Title-->
							<h1 class="text-dark fw-bolder mb-3">Bienvenido al Sistema</h1>
							<!--end::Title-->
						
						</div>
						<!--begin::Heading-->
					
						<!--begin::Separator-->
						<div class="separator separator-content my-14">
							<span class="w-125px text-gray-500 fw-semibold fs-7">Ingrese Credenciales</span>
						</div>
						<!--end::Separator-->
						<!--begin::Input group=-->
						<div class="fv-row mb-8">
							<!--begin::Email-->

							<input type="text" placeholder="Correo Electronico" id="email" name="email"
								autocomplete="off" class="form-control bg-transparent" />
							<!--end::Email-->
							<span id="emailError" style="color: red;"></span>
							<!--end::Email-->
						</div>
						<!--end::Input group=-->
						<div class="fv-row mb-3">
							<!--begin::Password-->
							<div class="input-group">
								<input type="password" placeholder="Contraseña" id="password" name="password"
									autocomplete="off" class="form-control bg-transparent" />
								<span class="input-group-text" id="eyeIcon">
									<i class="eye-icon fas fa-eye"></i>
								</span>
							</div>
							<!--end::Password-->
						</div>
						<!--end::Input group=-->
						<!--begin::Submit button-->
						<div class="d-grid mb-10">
							<button type="submit" id="loginBtn" class="btn btn-primary">
								<!--begin::Indicator label-->
								<span class="indicator-label">Ingresar</span>
								<!--end::Indicator label-->
								<!--begin::Indicator progress-->
								<span class="indicator-progress">Please wait...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
								<!--end::Indicator progress-->
							</button>
						</div>
						<!--end::Submit button-->
						

					</div>
					<!--end::Content-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Body-->
		</div>
		<!--end::Authentication - Sign-in-->
	</div>
	<!--end::Root-->
	<!--begin::Javascript-->
	<script>var hostUrl = "metronic/assets/";</script>
	<!--begin::Global Javascript Bundle(used by all pages)-->
	<script src="metronic/assets/plugins/global/plugins.bundle.js"></script>
	<script src="metronic/assets/js/scripts.bundle.js"></script>
	<!--end::Global Javascript Bundle-->

	<script>
		// Mostrar la contraseña por un segundo
		$('#eyeIcon').click(function () {
			const passwordInput = $('#password');
			const type = passwordInput.attr('type') === 'password' ? 'text' : 'password';
			passwordInput.attr('type', type);
			setTimeout(function () {
				passwordInput.attr('type', 'password');
			}, 1000);
		});
		$(document).ready(function () {
			$('#loginBtn').click(function () {
				const email = $('#email').val();
				const password = $('#password').val();

				// Validación de correo electrónico
				const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
				if (!emailRegex.test(email)) {
					$('#emailError').text('Por favor ingrese un correo electrónico válido.');
					return;
				}
				// Ocultar mensaje de error
				$('#emailError').text('');

				// Validar que se ingresen ambos datos
				if (!email.trim() || !password.trim()) {
					Swal.fire({
						icon: 'error',
						title: 'Error',
						text: 'Por favor ingrese correo electrónico y contraseña.'
					});
					return;
				}
				$.ajax({
					url: '/lca',
					type: 'POST',
					dataType: 'json',
					data: { email: email, password: password },
					success: function (response) {
						console.log(response);
						if (response.success) {
							Swal.fire({
								text: "Bienvenido al Sistema!",
								icon: "success",
								buttonsStyling: false,
								confirmButtonText: "Aceptar!",
								customClass: {
									confirmButton: "btn btn-primary"
								},
								didOpen: () => {
									setTimeout(() => {
										window.location.href = '<?= base_url('/cpcc') ?>';
									}, 700); // Retrasar la redirección en milisegundos
								}
							});
						} else {
							Swal.fire({
								text: "ERROR, Por favor revisar los datos ingresados ",
								icon: "error",
								buttonsStyling: !1,
								confirmButtonText: "Aceptar!",
								customClass: { confirmButton: "btn btn-primary" },
							});
							$('#email').val('');
							$('#password').val('');

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
						$('#email').val('');
						$('#password').val('');


					}
				});
			});
			$(document).keypress(function (e) {
				if (e.which === 13) { // Verificar si se presionó la tecla "Enter"
					$('#loginBtn').click(); // Simular un clic en el botón "Ingresar"
					return false; // Evitar que el formulario se envíe automáticamente
				}
			});
		});

	</script>
	<!--end::Javascript-->
</body>
<!--end::Body-->

</html>