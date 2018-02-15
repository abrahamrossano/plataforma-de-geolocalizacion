<?php require_once("inc/init.php"); ?>

<div class="row">
	
	<!-- col -->
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<h1 class="page-title txt-color-blueDark text-center well">
			
			<!-- PAGE HEADER -->
				Facturación y Pagos<br>
				<small class="text-success"></small>
		</h1>
		
	</div>
	<!-- end col -->
	
</div>

<!-- widget grid -->
<section id="widget-grid" class="">

	<!-- row -->
	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-sm-12 col-md-12 col-lg-6">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false" data-widget-deletebutton="false">
			
				<header>
					<!--COLOCAR HEADER MAS TARDE-->
				

				</header>

				<!-- widget div-->
				<div>

					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->

					</div>
					<!-- end widget edit box -->

					<!-- widget content -->
					<div class="widget-body">

						<div class="row">
							<form id="wizard-1" novalidate="novalidate">
								<div id="bootstrap-wizard-1" class="col-sm-12">
									<div class="form-bootstrapWizard">
										<ul class="bootstrapWizard form-wizard">
											<li class="active" data-target="#step1">
												<a href="#tab1" data-toggle="tab"> <span class="step">1</span> <span class="title">Información Básica</span> </a>
											</li>
											<li data-target="#step2">
												<a href="#tab2" data-toggle="tab"> <span class="step">2</span> <span class="title">Datos de Facturación</span> </a>
											</li>
											<li data-target="#step3">
												<a href="#tab3" data-toggle="tab"> <span class="step">3</span> <span class="title">Información de Pago</span> </a>
											</li>
											<li data-target="#step4">
												<a href="#tab4" data-toggle="tab"> <span class="step">4</span> <span class="title">Generar Pago</span> </a>
											</li>
										</ul>
										<div class="clearfix"></div>
									</div>
									<div class="tab-content">
										<div class="tab-pane active" id="tab1">
											<br>
											<h3><strong>Paso 1 </strong> - Información Básica</h3>

											<div class="row">
                                                <div class="col-sm-12">
													<div class="form-group">
                                                         <label>Nombre o Razón Social</label><br>
														<div class="input-group">
                                                           
															<span class="input-group-addon"><i class="fa fa-user fa-lg fa-fw"></i></span>
															<input class="form-control input-lg" type="text" name="razon" id="razon">

														</div>
													</div>
												</div>

												

											</div>

											<div class="row">
                                                <div class="col-sm-12">
													<div class="form-group">
                                                        <label>Correo Electrónico</label><br>
														<div class="input-group">
                                                            
															<span class="input-group-addon"><i class="fa fa-envelope fa-lg fa-fw"></i></span>
															<input class="form-control input-lg" type="text" name="email" id="email">

														</div>
													</div>

												</div>
												
												<div class="col-sm-12">
													<div class="form-group">
                                                        <label>R.F.C</label><br>
														<div class="input-group">
                                                            
															<span class="input-group-addon"><i class="glyphicon glyphicon-credit-card fa-lg fa-fw"></i></span>
															<input class="form-control input-lg" type="text" name="rfc" id="lname">

														</div>
													</div>
												</div> <!-- termina div de apellido-->
											</div>

										</div>
										<div class="tab-pane" id="tab2">
											<br>
											<h3><strong>Paso 2</strong> - Información de Facturación</h3>

											<div class="row">
                                                <div class="col-sm-6">
													<div class="form-group">
														<div class="input-group">
															<span class="input-group-addon"><i class="fa fa-flag fa-lg fa-fw"></i></span>
															<select name="pais" class="form-control input-lg">
																<option value="" selected="selected">Pais</option>
																<option value="aguascaliente">Aguascaliente</option>
																<option value="baja california">Baja California</option>
																<option value="baja california sur">Baja California Sur</option>
																<option value="campeche">Campeche</option>
																<option value="chiapas">Chiapas</option>
																<option value="chihuahua">Chihuahua</option>
																<option value="coahuila">Coahuila</option>
																<option value="colima">Colima</option>
																<option value="durango">Durango</option>
																<option value="estado de mexico">Estado de México</option>
																<option value="guanajuato">Guanajuato</option>
																<option value="guerrero">Guerrero</option>
																<option value="hidalgo">Hidalgo</option>
																<option value="jalisco">Jalisco</option>
																<option value="michoacan">Michoacán</option>
																<option value="morelos">Morelos</option>
																<option value="nayarit">Nayarit</option>
																<option value="nuevo leon">Nuevo León</option>
																<option value="oaxaca">Oaxaca</option>
																<option value="puebla">Puebla</option>
																<option value="queretaro">Queretaro</option>
																<option value="quintana roo">Quintana Roo</option>
																<option value="san luis potosi">San Luis Potosí</option>
																<option value="sinaloa">Sinaloa</option>
																<option value="sonora">Sonora</option>
																<option value="tabasco">Tabasco</option>
																<option value="tamaulipas">Tamaulipas</option>
																<option value="tlaxcala">Tlaxcala</option>
																<option value="veracruz">Veracruz</option>
																<option value="yucatan">Yucatán</option>
																<option value="zacatecas">Zacatecas</option>
															</select>
														</div>
													</div>
												</div>
                                                
												<div class="col-sm-6">
													<div class="form-group">
														<div class="input-group">
															<span class="input-group-addon"><i class="fa fa-flag fa-lg fa-fw"></i></span>
															<select name="estado" class="form-control input-lg">
																<option value="" selected="selected">Estado</option>
																<option value="aguascaliente">Aguascaliente</option>
																<option value="baja california">Baja California</option>
																<option value="baja california sur">Baja California Sur</option>
																<option value="campeche">Campeche</option>
																<option value="chiapas">Chiapas</option>
																<option value="chihuahua">Chihuahua</option>
																<option value="coahuila">Coahuila</option>
																<option value="colima">Colima</option>
																<option value="durango">Durango</option>
																<option value="estado de mexico">Estado de México</option>
																<option value="guanajuato">Guanajuato</option>
																<option value="guerrero">Guerrero</option>
																<option value="hidalgo">Hidalgo</option>
																<option value="jalisco">Jalisco</option>
																<option value="michoacan">Michoacán</option>
																<option value="morelos">Morelos</option>
																<option value="nayarit">Nayarit</option>
																<option value="nuevo leon">Nuevo León</option>
																<option value="oaxaca">Oaxaca</option>
																<option value="puebla">Puebla</option>
																<option value="queretaro">Queretaro</option>
																<option value="quintana roo">Quintana Roo</option>
																<option value="san luis potosi">San Luis Potosí</option>
																<option value="sinaloa">Sinaloa</option>
																<option value="sonora">Sonora</option>
																<option value="tabasco">Tabasco</option>
																<option value="tamaulipas">Tamaulipas</option>
																<option value="tlaxcala">Tlaxcala</option>
																<option value="veracruz">Veracruz</option>
																<option value="yucatan">Yucatán</option>
																<option value="zacatecas">Zacatecas</option>
															</select>
														</div>
													</div>
												</div>
                                                <div class="col-sm-6">
													<div class="form-group">
                                                        <label>Ciudad</label><br>
														<div class="input-group">
                                                            
															<span class="input-group-addon"><i class="fa fa-map-marker fa-lg fa-fw"></i></span>
															<input class="form-control input-lg" type="text" name="ciudad" id="ciudad">
																
														</div>
													</div>
												</div>
                                                <div class="col-sm-6">
													<div class="form-group">
                                                         <label>Colonia</label><br>
														<div class="input-group">
                                                           
															<span class="input-group-addon"><i class="fa fa-map-marker fa-lg fa-fw"></i></span>
															<input class="form-control input-lg" type="text" name="colonia" id="colonia">
																
														</div>
													</div>
												</div>
                                                <div class="col-sm-12">
													<div class="form-group">
                                                         <label>Dirección</label><br>
														<div class="input-group">
                                                           
															<span class="input-group-addon"><i class="fa fa-home fa-lg fa-fw"></i></span>
															<input class="form-control input-lg" type="text" name="dir" id="dir">
																
														</div>
													</div>
												</div>
                                               
											</div>
											<div class="row">
                                                 <div class="col-sm-4">
													<div class="form-group">
                                                        <label>C.P</label><br>
														<div class="input-group">
                                                            
															<span class="input-group-addon"><i class="fa fa-envelope-o fa-lg fa-fw"></i></span>
															<input class="form-control input-lg" type="text" name="postal" id="postal">
														</div>
													</div>
												</div>
                                                 <div class="col-sm-4">
													<div class="form-group">
                                                        <label>Núm. Int</label><br>
														<div class="input-group">
                                                            
															<span class="input-group-addon"><i class=" fa-lg fa-fw"></i></span>
															<input class="form-control input-lg"  type="text" name="numint" id="postal">
														</div>
													</div>
												</div>
                                                 <div class="col-sm-4">
													<div class="form-group">
                                                        <label>Núm. Ext</label><br>
														<div class="input-group">
                                                            
															<span class="input-group-addon"><i class=" fa-lg fa-fw"></i></span>
															<input class="form-control input-lg" type="text" name="numext" id="postal">
														</div>
													</div>
												</div>
                                                 
												<div class="col-sm-6">
													<div class="form-group">
                                                        <label>Teléfono</label><br>
														<div class="input-group">
															<span class="input-group-addon"><i class="fa fa-phone fa-lg fa-fw"></i></span>
															<input class="form-control input-lg" type="text" name="wphone" id="wphone">
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="tab-pane" id="tab3">
                                            
											<br>
											<h3><strong>Paso 3</strong> - Información de Pago</h3>
											<div class="alert alert-info fade in">
												<button class="close" data-dismiss="alert">
													×
												</button>
												<i class="fa-fw fa fa-info"></i>
												<strong>¡Importante!</strong> Especifique su forma de pago e información adicional
											</div>
                                            <div class="col-sm-8">
													<div class="form-group">
														<div class="input-group">
															<span class="input-group-addon"><i class="fa fa-money fa-lg fa-fw"></i></span>
															<select name="formapago" class="form-control input-lg">
																<option value="" selected="selected">Forma de Pago</option>
																<option value="aguascaliente">Efectivo</option>
																<option value="baja california">Tarjeta Credito</option>
                                                                <option value="baja california">Tarjeta Debito</option>
                                                                <option value="baja california">Transferencia</option>
															</select>
														</div>
													</div>
												</div>
										</div>
										<div class="tab-pane" id="tab4">
											<br>
											<h3><strong>Paso 4</strong> - Generar Pago</h3>
											<br>
											<h1 class="text-center text-success"><strong><i class="fa fa-check fa-lg"></i> Completar</strong></h1>
											<h4 class="text-center">Para terminar haga click en el boton siguiente para realizar el pago y generar la factura</h4>
											<br>
											<br>
										</div>

										<div class="form-actions">
											<div class="row">
												<div class="col-sm-12">
													<ul class="pager wizard no-margin">
														
														<li class="previous disabled">
															<a href="javascript:void(0);" class="btn btn-lg btn-default"> Anterior </a>
														</li>
														
														<li class="next">
															<a href="javascript:void(0);" class="btn btn-lg txt-color-darken"> Siguiente </a>
														</li>
													</ul>
												</div>
											</div>
										</div>

									</div>
								</div>
							</form>
						</div>

					</div>
					<!-- end widget content -->

				</div>
				<!-- end widget div -->

			</div>
			<!-- end widget -->

		</article>
		<!-- WIDGET END -->

		<!-- NEW WIDGET START -->
		<article class="col-sm-12 col-md-12 col-lg-6">

			**En esta parte va la forma de pago que se realizara usando el api de conekta o cualquier empresa<br><br>
            
            **si no si colocar la api dentro del formulario y de este lado una seccion para descargar las facturas igual que el formulario de reporte
		</article>
		<!-- WIDGET END -->

	</div>

	<!-- end row -->

</section> 
<!-- end widget grid -->

<script type="text/javascript">
	

	pageSetUp();

	var pagefunction = function() {

		// load bootstrap wizard
		
		loadScript("js/plugin/bootstrap-wizard/jquery.bootstrap.wizard.min.js", runBootstrapWizard);

		//Bootstrap Wizard Validations

		function runBootstrapWizard() {

			var $validator = $("#wizard-1").validate({

				rules : {
					email : {
						required : true,
						email : "El correo electronico debe tener este formato  nombre@dominio.com"
					},
					razon : {
						required : true
					},
					rfc : {
						required : true
					},
					pais : {
						required : true
					},
					estado : {
						required : true
					},
                    ciudad : {
                        required : true
                    }, 
                    dir : {
                        required : true
                    },
                    
					postal : {
						required : true,
						minlength : 4
					},
					wphone : {
						minlength : 10
					},
					colonia : {
						required : true
						
					}
				},

				messages : {
					razon : "Por favor, espeficique la razon social o nombre completo",
					rfc :   "Por favor espeficique el rfc",
                    pais:   "Por favor espeficique su pais",
                    estado: "Por favor espeficique su estado",
                    ciudad: "Por favor espeficique su ciudad",
                    dir:    "Por favor espeficique su dirección",
                    postal: "Por favor espeficique su C.P",
                    wphone: "Por favor espeficique a 10 digitos",
                    colonia:"Por favor espeficique el rfc",
					email : {
						required : "Se requiere que ingrese su correo eléctronico",
						email : "El correo electronico debe tener este formato  nombre@dominio.com"
					}
				},

				highlight : function(element) {
					$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
				},
				unhighlight : function(element) {
					$(element).closest('.form-group').removeClass('has-error').addClass('has-success');
				},
				errorElement : 'span',
				errorClass : 'help-block',
				errorPlacement : function(error, element) {
					if (element.parent('.input-group').length) {
						error.insertAfter(element.parent());
					} else {
						error.insertAfter(element);
					}
				}
			});

			$('#bootstrap-wizard-1').bootstrapWizard({

				'tabClass' : 'form-wizard',
				'onNext' : function(tab, navigation, index) {
					var $valid = $("#wizard-1").valid();
					if (!$valid) {
						$validator.focusInvalid();
						return false;
					} else {
						$('#bootstrap-wizard-1').find('.form-wizard').children('li').eq(index - 1).addClass('complete');
						$('#bootstrap-wizard-1').find('.form-wizard').children('li').eq(index - 1).find('.step').html('<i class="fa fa-check"></i>');
					}
				}
			});

		};

		// load fuelux wizard
		
		loadScript("js/plugin/fuelux/wizard/wizard.min.js", fueluxWizard);
		
		function fueluxWizard() {

			var wizard = $('.wizard').wizard();

			wizard.on('finished', function(e, data) {
				//$("#fuelux-wizard").submit();
				//console.log("submitted!");
				$.smallBox({
					title : "Congratulations! Your form was submitted",
					content : "<i class='fa fa-clock-o'></i><i>1 seconds ago...</i>",
					color : "#5F895F",
					iconSmall : "fa fa-check bounce animated",
					timeout : 4000
				});

			});

		};

	};

	// end pagefunction
	
	// Load bootstrap wizard dependency then run pagefunction
	pagefunction();

</script>
