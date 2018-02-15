<?php require_once("inc/init.php"); ?>
<!-- row -->
<div class="row">
	
	<!-- col -->
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<h1 class="page-title txt-color-blueDark text-center well">
			
			<!-- PAGE HEADER -->
				Registro de Choferes<br>
				<small class="text-success"></small>
		</h1>
		
	</div>
	<!-- end col -->
	
</div>
<!-- end row -->



<!-- widget grid -->
<section id="widget-grid" class="">

    <div class="jarviswidget" id="wid-id-4" data-widget-editbutton="false" data-widget-custombutton="false">
			
				<header>
					<!--<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
					<h2>Registration form </h2>		-->		
					
				</header>

				<!-- widget div-->
				<div>
					
					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->
						
					</div>
					<!-- end widget edit box -->
					
					<!-- widget content -->
					<div class="widget-body no-padding">
						
						<form action="" id="smart-form-register" class="smart-form">
							<header>
								Datos del Chofer
							</header>

							<fieldset>
                                <div class="row">
									<section class="col col-6">
                                        <label>Nombre</label>
										<label class="input"> <i class="icon-append fa fa-user"></i>
											<input type="text" name="nombre">
										</label>
									</section>
									<section class="col col-6">
                                        <label>Apellido Paterno</label>
										<label class="input"> <i class="icon-append fa fa-user"></i>
											<input type="text" name="app">
										</label>
									</section>
								</div>
                                <div class="row">
								<section class="col col-6">
                                    <label>Apellido Materno</label>
                                        <label class="input"> <i class="icon-append fa fa-user"></i>
											<input type="text" name="apm">
										</label>
                                        
									</section>
									<section class="col col-6">
                                        <label>Nombre de Usuario</label>
                                         <label class="input"> <i class="icon-append fa fa-user"></i>
											<input type="text" name="nomuser">
										</label>
									</section>
                                    </div>
                                    
                                <div class="row">
								<section class="col col-6">
                                    <label>Contraseña</label>
									<label class="input"> <i class="icon-append fa fa-lock"></i>
										<input type="password" name="password" id="password">
										<b class="tooltip tooltip-bottom-right">No olvide su contraseña</b> </label>
								</section>

								<section class="col col-6">
                                    <label>Confirmar Contraseña</label>
									<label class="input"> <i class="icon-append fa fa-lock"></i>
										<input type="password" name="passwordConfirm">
										<b class="tooltip tooltip-bottom-right">No olvide su contraseña</b> </label>
								</section>
                                    </div>
							</fieldset>

							<fieldset>
								<div class="row">
									<section class="col col-6">
                                        <label>Núm. de Licencia</label>
										<label class="input"> <span class="icon-append  glyphicon glyphicon-credit-card"></span>
                                           <!-- <i class="icon-append glyphicon .glyphicon-credit-card"></i>-->
											<input type="tel" name="licencia" data-mask="999999999999">
										</label>
									</section>
									<section class="col col-6">
										<label class="select">
											<select name="tipol">
												<option value="0" selected="" disabled="">Tipo de Licencia</option>
												<option value="1">A</option>
												<option value="1">B</option>
												<option value="2">C</option>
												
											</select> <i></i> </label>
									</section>
                                    </div>
                                <div class="row">
									<section class="col col-6">
                                        <label>Fecha de Vencimiento</label>
										<label class="input"> <i class="icon-append fa fa-calendar"></i>
											<input type="text" name="request" class="datepicker" data-dateformat='dd/mm/yy'>
										</label>
									</section>
                                    <section class="col col-6">
                                        <label>Foto del Chofer</label>
									<label for="file" class="input input-file">
										<div class="button"><input type="file" name="file" onchange="this.parentNode.nextSibling.value = this.value">Buscar</div><input type="text" readonly="">
									</label>
								</section>
								</div>	
							</fieldset>
							<footer>
								<button type="submit" class="btn btn-primary">
									Registrar
								</button>
							</footer>
						</form>						
						
					</div>
					<!-- end widget content -->
					
				</div>
				<!-- end widget div -->
				
			</div>
    
    
</section>
<!-- end widget grid -->


<script type="text/javascript">
	
	

	pageSetUp();
	

	var pagefunction = function() {

        
        var $registerForm = $("#smart-form-register").validate({

			// Rules for form validation
			rules : {
				nombre : {
					required : true
				},
				app : {
					required : true
					
				},
				password : {
					required : true,
					minlength : 3,
					maxlength : 20
				},
				passwordConfirm : {
					required : true,
					minlength : 3,
					maxlength : 20,
					equalTo : '#password'
				},
				apm : {
					required : true
				},
				nomuser : {
					required : true
				},
				licencia : {
					required : true
				},
				tipol : {
					required : true
				}
			},

			// Messages for form validation
			messages : {
				nombre : {
					required : 'Por favor, escriba el nombre del chofer'
				},
				app : {
					required : 'Por favor, escriba el apellido paterno del chofer'
				},
				password : {
					required : 'Por favor, escriba una contraseña'
				},
				passwordConfirm : {
					required : 'Por favor, escriba la contraeña una vez más',
					equalTo : 'Las contraseñas no coinciden, escriba la misma contraseña que arriba'
				},
				apm : {
					required : 'Por favor, escriba el apellido materno del chofer'
				},
				nomuser : {
					required : 'Por favor, escriba el nombre de usuario del chofer'
				},
				licencia : {
					required : 'Por favor, escriba el número de licencia'
				},
				tipol : {
					required : 'Por favor, elija una tipo de licencia'
				}
			},

			// Do not change code below
			errorPlacement : function(error, element) {
				error.insertAfter(element.parent());
			}
		});

        
        
        
		// START AND FINISH DATE
		$('#startdate').datepicker({
			dateFormat : 'dd.mm.yy',
			prevText : '<i class="fa fa-chevron-left"></i>',
			nextText : '<i class="fa fa-chevron-right"></i>',
			onSelect : function(selectedDate) {
				$('#finishdate').datepicker('option', 'minDate', selectedDate);
			}
            
		});
		
		$('#finishdate').datepicker({
			dateFormat : 'dd.mm.yy',
			prevText : '<i class="fa fa-chevron-left"></i>',
			nextText : '<i class="fa fa-chevron-right"></i>',
			onSelect : function(selectedDate) {
				$('#startdate').datepicker('option', 'maxDate', selectedDate);
			}
		});
		
	};
	
     $.datepicker.regional['es'] = {
 closeText: 'Cerrar',
 prevText: '< Ant',
 nextText: 'Sig >',
 currentText: 'Hoy',
 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
 monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
 dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
 weekHeader: 'Sm',
 dateFormat: 'dd/mm/yy',
 firstDay: 1,
 isRTL: false,
 showMonthAfterYear: false,
 yearSuffix: ''
 };
 $.datepicker.setDefaults($.datepicker.regional['es']);
$(function () {
$("#fecha").datepicker();
});
	// end pagefunction
	
	// Load form valisation dependency 
	loadScript("js/plugin/jquery-form/jquery-form.min.js", pagefunction);

</script>
