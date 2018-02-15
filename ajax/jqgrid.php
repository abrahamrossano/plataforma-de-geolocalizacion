<?php require_once ("inc/init.php");
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
        
        $lista = $con->getInfoUni($id);
        $listaa = $con->getInfoUniCho($id);
?>

<div class="row">
	
	<!-- col -->
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<h1 class="page-title txt-color-blueDark text-center well">
			
			<!-- PAGE HEADER -->
				Lista de Unidades<br>
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
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<table id="jqgrid"></table>
			<div id="pjqgrid"></div>

			<br>
			<a href="javascript:void(0)" id="m1">Get Selected id's</a>
			<br>
			<a href="javascript:void(0)" id="m1s">Select(Unselect) row 13</a>

		</article>
		<!-- WIDGET END -->

	</div>

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
				id : "<?=$fila["id_unidad"]?>",
				tax : "<?=$fila["num_unidad"]?>",
				total : "<?=$fila["placa_unidad"]?>"
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
<div class="row">
	
	<!-- col -->
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<h1 class="page-title txt-color-blueDark text-center well">
			
			<!-- PAGE HEADER -->
				Lista de Unidad - Chofer<br>
				<small class="text-success"></small>
		</h1>
		
	</div>
	<!-- end col -->
	
</div>
<!-- widget grid -->
<section id="widget-grid2" class="">

	<!-- row -->
	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<table id="jqgrid2"></table>
			<div id="pjqgrid2"></div>

			<br>
			<a href="javascript:void(0)" id="m2">Get Selected id's</a>
			<br>
			<a href="javascript:void(0)" id="m2s">Select(Unselect) row 13</a>

		</article>
		<!-- WIDGET END -->

	</div>

	<!-- end row -->

</section>
<!-- end widget grid -->

<script type="text/javascript">
	

	pageSetUp();



	var pagefunction = function() {
		loadScript("js/plugin/jqgrid/jquery.jqGrid.min.js", run_jqgrid_function);

		function run_jqgrid_function() {

			var jqgrid_data = [
                <?php foreach($listaa as $filaa){ ?>
                    {
				id : "<?=$filaa["id_cu"]?>",
                name:"<?=$filaa["nombre_chofer"]?> <?=$filaa["ape_p"]?> <?=$filaa["ape_m"]?>",
                lic:"<?=$filaa["num_licencia"]?>",
				tax : "<?=$filaa["num_unidad"]?>",
				total : "<?=$filaa["placa_unidad"]?>"
                    },
                <?php } ?>
			];

			jQuery("#jqgrid2").jqGrid({
				data : jqgrid_data,
				datatype : "local",
				height : 'auto',
				colNames : ['Acciones', 'ID','Nombre Chofer','Número de licencia', 'Número de Unidad', 'Placa'],
				colModel : [{
					name : 'act',
					index : 'act',
					sortable : false
				}, {
					name : 'id',
					index : 'id'
				},{
					name : 'name',
					index : 'name',
					editable : false
				},{
					name : 'lic',
					index : 'lic',
					editable : false
				}, {
					name : 'tax',
					index : 'tax',
					editable : false
				}, {
					name : 'total',
					index : 'total',
					editable : false
				}],
				rowNum : 10,
				rowList : [10, 20, 30],
				pager : '#pjqgrid2',
				sortname : 'id',
				toolbarfilter : true,
				viewrecords : true,
				sortorder : "asc",
				gridComplete : function() {
					var ids = jQuery("#jqgrid2").jqGrid('getDataIDs');
					for (var i = 0; i < ids.length; i++) {
						var cl = ids[i];
						be = "<button class='btn btn-xs btn-default' data-original-title='Edit Row' onclick=\"jQuery('#jqgrid2').editRow('" + cl + "');\"><i class='fa fa-pencil'></i></button>";
						se = "<button class='btn btn-xs btn-default' data-original-title='Save Row' onclick=\"jQuery('#jqgrid2').saveRow('" + cl + "');\"><i class='fa fa-save'></i></button>";
						ca = "<button class='btn btn-xs btn-default' data-original-title='Cancel' onclick=\"jQuery('#jqgrid2').restoreRow('" + cl + "');\"><i class='fa fa-times'></i></button>";
						//ce = "<button class='btn btn-xs btn-default' onclick=\"jQuery('#jqgrid2').restoreRow('"+cl+"');\"><i class='fa fa-times'></i></button>";
						//jQuery("#jqgrid2").jqGrid('setRowData',ids[i],{act:be+se+ce});
						jQuery("#jqgrid2").jqGrid('setRowData', ids[i], {
							act : be + se + ca
						});
					}
				},
				editurl : "dummy.html",
				caption : "Unidad - Chofer",
				multiselect : true,
				autowidth : true,

			});
			jQuery("#jqgrid2").jqGrid('navGrid', "#pjqgrid2", {
				edit : false,
				add : false,
				del : true
			});
			jQuery("#jqgrid2").jqGrid('inlineNav', "#pjqgrid2");
			/* Add tooltips */
			$('.navtable .ui-pg-button').tooltip({
				container : 'body'
			});

			jQuery("#m2").click(function() {
				var s;
				s = jQuery("#jqgrid2").jqGrid('getGridParam', 'selarrrow');
				alert(s);
			});
			jQuery("#m2s").click(function() {
				jQuery("#jqgrid2").jqGrid('setSelection', "13");
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
				$("#jqgrid2").jqGrid('setGridWidth', $("#content").width());
			});

		}// end function

	}
	loadScript("js/plugin/jqgrid/grid.locale-en.min.js", pagefunction);

</script>
<?php } ?>