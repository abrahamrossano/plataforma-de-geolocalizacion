<?php

//initilize the page
require_once("inc/init.php");

//require UI configuration (nav, ribbon, etc.)
require_once("inc/config.ui.php");

/*---------------- PHP Custom Scripts ---------

YOU CAN SET CONFIGURATION VARIABLES HERE BEFORE IT GOES TO NAV, RIBBON, ETC.
E.G. $page_title = "Custom Title" */

$page_title = "Login";

//inicio de sesion
    require_once("libreria/sesion.class.php");
    //include_once('libreria/database.php');
    include_once('libreria/config.php');

	$sesion = new sesion();
	
	if( isset($_POST["iniciar"]) )
	{
		
		$usuario = $_POST["usuario"];
		$password = $_POST["password"];
		
		if(validarUsuario($usuario,$password) == true)
		{			
			$sesion->set("usuario",$usuario);
            
			header("location: index.php");
		}
		else 
		{
			echo "Verifica tu nombre de usuario y contraseña";
		}
	}
	
	function validarUsuario($usuario, $password)
	{   
        $conexion= new mysqli(HOST, USER, PASSWD, DATABASE);
        
		$consulta = "select password from usuario where email = '$usuario';";
		
		$result = $conexion->query($consulta);
		
		if($result->num_rows > 0)
		{
			$fila = $result->fetch_assoc();
			if( strcmp($password,$fila["password"]) == 0 )
				return true;						
			else					
				return false;
		}
		else
				return false;
	}
//fin de sesion

/* ---------------- END PHP Custom Scripts ------------- */

//include header
//you can add your custom css in $page_css array.
//Note: all css files are inside css/ folder
$page_css[] = "your_style.css";
$no_main_header = true;
$page_body_prop = array("id"=>"extr-page", "class"=>"animated fadeInDown");
include("inc/header.php");

?>
    <!-- ==========================CONTENT STARTS HERE ========================== -->
    <!-- possible classes: minified, no-right-panel, fixed-ribbon, fixed-header, fixed-width-->
    <header id="header">
        <!--<span id="logo"></span>-->

        <div id="logo-group">
            <span id="logo"> <img src="<?php echo ASSETS_URL; ?>/img/logo.png" alt="SmartAdmin"> </span>

            <!-- END AJAX-DROPDOWN -->
        </div>

        <span id="extr-page-header-space"> <span class="hidden-mobile hiddex-xs">¿Aún no tienes cuenta?</span> <a href="<?php echo APP_URL; ?>/register.php" class="btn btn-danger">Crear cuenta</a> </span>

    </header>

    <div id="main" role="main">

        <!-- MAIN CONTENT -->
        <div id="content" class="container">

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-8 hidden-xs hidden-sm">
                    <h1 class="txt-color-red login-header-big">Nombre</h1>
                    <div class="hero">

                        <div class="pull-left login-desc-box-l">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <h5 class="about-heading">Acerca de Wred Gps</h5>
                                    <p>
                                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa.
                                    </p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <h5 class="about-heading">Not just your average template!</h5>
                                    <p>
                                        Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi voluptatem accusantium!
                                    </p>
                                </div>
                            </div>
                            

                        </div>

                        <img src="<?php echo ASSETS_URL; ?>/img/demo/iphoneview.png" class="pull-right display-image" alt="" style="width:210px">

                    </div>

                </div>
                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
                    <div class="well no-padding">
                        <form form name="frmLogin" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="login-form" class="smart-form client-form">
                            <header>
                                Iniciar sesión
                            </header>

                            <fieldset>

                                <section>
                                    <label class="label">E-mail</label>
                                    <label class="input"> <i class="icon-append fa fa-user"></i>
									<input type="email" name="usuario">
									<b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Ingrese su correo electrónico</b></label>
                                </section>

                                <section>
                                    <label class="label">Contraseña</label>
                                    <label class="input"> <i class="icon-append fa fa-lock"></i>
									<input type="password" name="password">
									<b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Ingrese su contraseña</b> </label>
                                    <div class="note">
                                        <a href="<?php echo APP_URL; ?>/forgotpassword.php">¿Olvido su contraseña?</a>
                                    </div>
                                </section>

                                <section>
                                    <label class="checkbox">
									<input type="checkbox" name="remember" checked="">
									<i></i>Mantener iniciada la sesión</label>
                                </section>
                            </fieldset>
                            <footer>
                                <input type="submit" class="btn btn-primary" name="iniciar">
                            </footer>
                        </form>

                    </div>

                </div>
            </div>
        </div>

    </div>
    <!-- END MAIN PANEL -->
    <!-- ==========================CONTENT ENDS HERE ========================== -->

    <?php 
	//include required scripts
	include("inc/scripts.php"); 
?>

    <!-- PAGE RELATED PLUGIN(S) 
<script src="..."></script>-->

    <script type="text/javascript">
        runAllForms();

        $(function() {
            // Validation
            $("#login-form").validate({
                // Rules for form validation
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 3,
                        maxlength: 20
                    }
                },

                // Messages for form validation
                messages: {
                    email: {
                        required: 'Correo electrónico requerido',
                        email: 'Datos de usuario incorrectos'
                    },
                    password: {
                        required: 'Contraseña requerida'
                    }
                },

                // Do not change code below
                errorPlacement: function(error, element) {
                    error.insertAfter(element.parent());
                }
            });
        });

    </script>

    <?php 
	//include footer
	include("inc/google-analytics.php"); 
?>
