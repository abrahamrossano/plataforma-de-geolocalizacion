<?php require_once("inc/init.php"); 
require_once("../libreria/sesion.class.php");
	
	$sesion = new sesion();
	$usuario = $sesion->get("usuario");
	
	if( $usuario == false )
	{	
		header("Location: login.php");		
	}
	else 
	{
        include_once('../libreria/database.php');
        include_once('../libreria/config.php');
        include_once('../libreria/consulta.php');
        $id = $sesion->get("id");
        $sql= new database(HOST, USER, PASSWD, DATABASE);
        $con= new consulta($sql);
        
        $lista = $con->getFullInfoUsuario($id);
?>
<!-- row -->
<div class="row">

    <!-- col -->
    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
        <h1 class="page-title txt-color-blueDark">
            <!-- PAGE HEADER --><i class="fa-fw fa fa-file-o"></i> Otras páginas <span>>
			Perfil </span></h1>
    </div>
    <!-- end col -->

    <!-- right side of the page with the sparkline graphs -->

</div>
<!-- end row -->

<!-- row -->

<?php foreach($lista as $fila){ ?>

<div class="row">

    <div class="col-sm-12">


        <div class="well well-sm">

            <div class="row">

                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="well well-light well-sm no-margin no-padding">

                        <div class="row">

                            <div class="col-sm-12">
                                <div id="myCarousel" class="carousel fade profile-carousel">
                                    <div class="air air-top-left padding-10">
                                        <h4 class="txt-color-white font-md"><?=$fila["fechaReg"]?></h4>
                                    </div>
                                    <ol class="carousel-indicators">
                                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                        <li data-target="#myCarousel" data-slide-to="1" class=""></li>
                                        <li data-target="#myCarousel" data-slide-to="2" class=""></li>
                                    </ol>
                                    <div class="carousel-inner">
                                        <!-- Slide 1 -->
                                        <div class="item active">
                                            <img src="img/demo/s1.jpg" alt="">
                                        </div>
                                        <!-- Slide 2 -->
                                        <div class="item">
                                            <img src="img/demo/s2.jpg" alt="">
                                        </div>
                                        <!-- Slide 3 -->
                                        <div class="item">
                                            <img src="img/demo/m3.jpg" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">

                                <div class="row">

                                    <div class="col-sm-3 profile-pic">
                                        <img src="img/avatars/<?=$fila["foto"]?>">
                                    </div>
                                    <div class="col-sm-6">
                                        <h1><?=$fila["usuario"]?>
                                            <br>
                                            <small> Empresa</small></h1>

                                        <ul class="list-unstyled">
                                            <li>
                                                <p class="text-muted">
                                                    <i class="fa fa-phone"></i>&nbsp;&nbsp;(<span class="txt-color-darken">313</span>) <span class="txt-color-darken">464</span> - <span class="txt-color-darken">6473</span>
                                                </p>
                                            </li>
                                            <li>
                                                <p class="text-muted">
                                                    <i class="fa fa-envelope"></i>&nbsp;&nbsp;<a href="mailto:<?=$fila["email"]?>"><?=$fila["email"]?></a>
                                                </p>
                                            </li>
                                            <li>
                                                <p class="text-muted">
                                                    <i class="fa fa-skype"></i>&nbsp;&nbsp;<span class="txt-color-darken">john12</span>
                                                </p>
                                            </li>
                                            <li>
                                                <p class="text-muted">
                                                    <i class="fa fa-calendar"></i>&nbsp;&nbsp;<span class="txt-color-darken">Free after <a href="javascript:void(0);" rel="tooltip" title="" data-placement="top" data-original-title="Create an Appointment">4:30 PM</a></span>
                                                </p>
                                            </li>
                                        </ul>
                                        <br>
                                        <br>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-sm-12">

                                <hr>

                                <div class="padding-10">

                                    <ul class="nav nav-tabs tabs-pull-right">
                                        <li class="active">
                                            <a href="#a1" data-toggle="tab">Concesionario</a>
                                        </li>
                                        <li>
                                            <a href="#a2" data-toggle="tab">Moderadores</a>
                                        </li>
                                        <li class="pull-left">
                                            <span class="margin-top-10 display-inline"><i class="fa fa-rss text-success"></i> Perfiles</span>
                                        </li>
                                    </ul>

                                    <div class="tab-content padding-top-10">
                                        <div class="tab-pane fade in active" id="a1">

                                            <div class="row">
                                                <section id="widget-grid" class="" style="width:600px;">

                                                            <table id="jqgrid"></table>
                                                            <div id="pjqgrid"></div>

                                                            <br>
                                                            <a href="javascript:void(0)" id="m1">Get Selected id's</a>
                                                            <br>
                                                            <a href="javascript:void(0)" id="m1s">Select(Unselect) row 13</a>

                                                </section>
                                            </div>

                                        </div>
                                        <div class="tab-pane fade" id="a2">

                                            

                                        </div>
                                        <!-- end tab -->
                                    </div>

                                </div>

                            </div>

                        </div>
                        <!-- end row -->

                    </div>

                </div>
                
            </div>
        </div>
    </div>
</div>

<?php } ?>

<!-- end row -->

</section>
<!-- end widget grid -->

<script type="text/javascript">
	

	pageSetUp();



	var pagefunction = function() {
		loadScript("js/plugin/jqgrid/jquery.jqGrid.min.js", run_jqgrid_function);

		function run_jqgrid_function() {

			var jqgrid_data = [
                <?php foreach($lista as $fila){ ?>
                    {
				id : "<?=$fila["usuario"]?>",
				tax : "<?=$fila["usuario"]?>",
				total : "<?=$fila["usuario"]?>"
                    },
                <?php } ?>
			];

			jQuery("#jqgrid").jqGrid({
				data : jqgrid_data,
				datatype : "local",
				height : 'auto',
				colNames : ['Acciones', 'ID', 'Numero de Unidad', 'Placa'],
				colModel : [{
					name : 'act',
					index : 'act',
					sortable : false
				}, {
					name : 'id',
					index : 'id'
				}, {
					name : 'tax',
					index : 'tax',
					editable : true
				}, {
					name : 'total',
					index : 'total',
					editable : true
				}],
				rowNum : 10,
				rowList : [10, 20, 30],
				pager : '#pjqgrid',
				sortname : 'id',
				toolbarfilter : true,
				viewrecords : true,
				sortorder : "asc",
				gridComplete : function() {
					var ids = jQuery("#jqgrid").jqGrid('getDataIDs');
					for (var i = 0; i < ids.length; i++) {
						var cl = ids[i];
						be = "<button class='btn btn-xs btn-default' data-original-title='Edit Row' onclick=\"jQuery('#jqgrid').editRow('" + cl + "');\"><i class='fa fa-pencil'></i></button>";
						se = "<button class='btn btn-xs btn-default' data-original-title='Save Row' onclick=\"jQuery('#jqgrid').saveRow('" + cl + "');\"><i class='fa fa-save'></i></button>";
						ca = "<button class='btn btn-xs btn-default' data-original-title='Cancel' onclick=\"jQuery('#jqgrid').restoreRow('" + cl + "');\"><i class='fa fa-times'></i></button>";
						//ce = "<button class='btn btn-xs btn-default' onclick=\"jQuery('#jqgrid').restoreRow('"+cl+"');\"><i class='fa fa-times'></i></button>";
						//jQuery("#jqgrid").jqGrid('setRowData',ids[i],{act:be+se+ce});
						jQuery("#jqgrid").jqGrid('setRowData', ids[i], {
							act : be + se + ca
						});
					}
				},
				editurl : "dummy.html",
				caption : "Unidades",
				multiselect : true,
				autowidth : true,

			});
			jQuery("#jqgrid").jqGrid('navGrid', "#pjqgrid", {
				edit : false,
				add : false,
				del : true
			});
			jQuery("#jqgrid").jqGrid('inlineNav', "#pjqgrid");
			/* Add tooltips */
			$('.navtable .ui-pg-button').tooltip({
				container : 'body'
			});

			jQuery("#m1").click(function() {
				var s;
				s = jQuery("#jqgrid").jqGrid('getGridParam', 'selarrrow');
				alert(s);
			});
			jQuery("#m1s").click(function() {
				jQuery("#jqgrid").jqGrid('setSelection', "13");
			});

			// remove classes
			$(".ui-jqgrid").removeClass("ui-widget ui-widget-content");
			$(".ui-jqgrid-view").children().removeClass("ui-widget-header ui-state-default");
			$(".ui-jqgrid-labels, .ui-search-toolbar").children().removeClass("ui-state-default ui-th-column ui-th-ltr");
			$(".ui-jqgrid-pager").removeClass("ui-state-default");
			$(".ui-jqgrid").removeClass("ui-widget-content");

			// add classes
			$(".ui-jqgrid-htable").addClass("table table-bordered table-hover");
			$(".ui-jqgrid-btable").addClass("table table-bordered table-striped");

			$(".ui-pg-div").removeClass().addClass("btn btn-sm btn-primary");
			$(".ui-icon.ui-icon-plus").removeClass().addClass("fa fa-plus");
			$(".ui-icon.ui-icon-pencil").removeClass().addClass("fa fa-pencil");
			$(".ui-icon.ui-icon-trash").removeClass().addClass("fa fa-trash-o");
			$(".ui-icon.ui-icon-search").removeClass().addClass("fa fa-search");
			$(".ui-icon.ui-icon-refresh").removeClass().addClass("fa fa-refresh");
			$(".ui-icon.ui-icon-disk").removeClass().addClass("fa fa-save").parent(".btn-primary").removeClass("btn-primary").addClass("btn-success");
			$(".ui-icon.ui-icon-cancel").removeClass().addClass("fa fa-times").parent(".btn-primary").removeClass("btn-primary").addClass("btn-danger");

			$(".ui-icon.ui-icon-seek-prev").wrap("<div class='btn btn-sm btn-default'></div>");
			$(".ui-icon.ui-icon-seek-prev").removeClass().addClass("fa fa-backward");

			$(".ui-icon.ui-icon-seek-first").wrap("<div class='btn btn-sm btn-default'></div>");
			$(".ui-icon.ui-icon-seek-first").removeClass().addClass("fa fa-fast-backward");

			$(".ui-icon.ui-icon-seek-next").wrap("<div class='btn btn-sm btn-default'></div>");
			$(".ui-icon.ui-icon-seek-next").removeClass().addClass("fa fa-forward");

			$(".ui-icon.ui-icon-seek-end").wrap("<div class='btn btn-sm btn-default'></div>");
			$(".ui-icon.ui-icon-seek-end").removeClass().addClass("fa fa-fast-forward");

			// update buttons
			
			$(window).on('resize.jqGrid', function() {
				$("#jqgrid").jqGrid('setGridWidth', $("#content").width());
			});

		}// end function

	}
	loadScript("js/plugin/jqgrid/grid.locale-en.min.js", pagefunction);

</script>
<?php } ?>
