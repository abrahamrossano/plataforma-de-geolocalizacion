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
        
        $lista = $con->getInfoCho($id);
?>

<div class="row">

    <!-- col -->
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h1 class="page-title txt-color-blueDark text-center well">

            <!-- PAGE HEADER -->
            Lista de Choferes<br>
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
            <div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-2" data-widget-editbutton="false">
                <!-- widget options:
				usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

				data-widget-colorbutton="false"
				data-widget-editbutton="false"
				data-widget-togglebutton="false"
				data-widget-deletebutton="false"
				data-widget-fullscreenbutton="false"
				data-widget-custombutton="false"
				data-widget-collapsed="true"
				data-widget-sortable="false"

				-->
                <header>
                    <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                    <h2>Lista de Choferes </h2>

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

                        <table id="datatable_col_reorder" class="table table-striped table-bordered table-hover" width="100%">
                            <thead>
                                <tr>
                                    <th data-hide="phone">ID</th>
                                    <th data-class="expand">Nombre</th>
                                    <th>Foto</th>
                                    <th data-hide="phone">Numero Licencia</th>
                                    <th data-hide="phone,tablet">Fecha de Vencimiento</th>
                                    <th data-hide="phone,tablet">Modificar</th>
                                    <th data-hide="phone,tablet">Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach($lista as $fila){ 
                            ?>
                                    <tr>
                                        <td>
                                            <?=$fila["id_chofer"]?>
                                        </td>
                                        <td>
                                            <?=$fila["nombre_chofer"]?>
                                                <?=$fila["ape_p"]?>
                                                    <?=$fila["ape_m"]?>
                                        </td>
                                        <td><img src="<?php echo ASSETS_URL; ?>/img/avatars/<?=$fila["foto_chofer"]?>" alt="me" class="online" /></td>
                                        <td>
                                            <?=$fila["num_licencia"]?>
                                        </td>
                                        <td>
                                            <?=$fila["fecha_vencimiento"]?>
                                        </td>
                                        <td><button value="" class="ColVis_Button">Modificar</button></td>
                                        <td><button value="" class="ColVis_Button">Eliminar</button></td>
                                    </tr>
                                    <?php } ?>
                            </tbody>
                        </table>

                    </div>
                    <!-- end widget content -->

                </div>
                <!-- end widget div -->

            </div>


        </article>
        <!-- WIDGET END -->

    </div>

    <!-- end row -->

    <!-- end row -->

</section>
<!-- end widget grid -->

<script type="text/javascript">
    pageSetUp();
    var pagefunction = function() {
        //console.log("cleared");
        /* BASIC ;*/
        var responsiveHelper_dt_basic = undefined;
        var responsiveHelper_datatable_fixed_column = undefined;
        var responsiveHelper_datatable_col_reorder = undefined;
        var responsiveHelper_datatable_tabletools = undefined;

        var breakpointDefinition = {
            tablet: 1024,
            phone: 480
        };

        $('#dt_basic').dataTable({
            "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>" +
                "t" +
                "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
            "autoWidth": true,
            "preDrawCallback": function() {
                // Initialize the responsive datatables helper once.
                if (!responsiveHelper_dt_basic) {
                    responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basic'), breakpointDefinition);
                }
            },
            "rowCallback": function(nRow) {
                responsiveHelper_dt_basic.createExpandIcon(nRow);
            },
            "drawCallback": function(oSettings) {
                responsiveHelper_dt_basic.respond();
            }
        });

        /* END BASIC */

        /* COLUMN FILTER  */
        var otable = $('#datatable_fixed_column').DataTable({
            //"bFilter": false,
            //"bInfo": false,
            //"bLengthChange": false
            //"bAutoWidth": false,
            //"bPaginate": false,
            //"bStateSave": true // saves sort state using localStorage
            "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6 hidden-xs'f><'col-sm-6 col-xs-12 hidden-xs'<'toolbar'>>r>" +
                "t" +
                "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
            "autoWidth": true,
            "preDrawCallback": function() {
                // Initialize the responsive datatables helper once.
                if (!responsiveHelper_datatable_fixed_column) {
                    responsiveHelper_datatable_fixed_column = new ResponsiveDatatablesHelper($('#datatable_fixed_column'), breakpointDefinition);
                }
            },
            "rowCallback": function(nRow) {
                responsiveHelper_datatable_fixed_column.createExpandIcon(nRow);
            },
            "drawCallback": function(oSettings) {
                responsiveHelper_datatable_fixed_column.respond();
            }

        });

        // custom toolbar
        $("div.toolbar").html('<div class="text-right"><img src="img/logo.png" alt="SmartAdmin" style="width: 111px; margin-top: 3px; margin-right: 10px;"></div>');

        // Apply the filter
        $("#datatable_fixed_column thead th input[type=text]").on('keyup change', function() {

            otable
                .column($(this).parent().index() + ':visible')
                .search(this.value)
                .draw();

        });
        /* END COLUMN FILTER */

        /* COLUMN SHOW - HIDE */
        $('#datatable_col_reorder').dataTable({
            "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'C>r>" +
                "t" +
                "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
            "autoWidth": true,
            "preDrawCallback": function() {
                // Initialize the responsive datatables helper once.
                if (!responsiveHelper_datatable_col_reorder) {
                    responsiveHelper_datatable_col_reorder = new ResponsiveDatatablesHelper($('#datatable_col_reorder'), breakpointDefinition);
                }
            },
            "rowCallback": function(nRow) {
                responsiveHelper_datatable_col_reorder.createExpandIcon(nRow);
            },
            "drawCallback": function(oSettings) {
                responsiveHelper_datatable_col_reorder.respond();
            }
        });

        /* END COLUMN SHOW - HIDE */

        /* TABLETOOLS */
        $('#datatable_tabletools').dataTable({

            // Tabletools options: 
            //   https://datatables.net/extensions/tabletools/button_options
            "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'T>r>" +
                "t" +
                "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
            "oTableTools": {
                "aButtons": [
                    "copy",
                    "csv",
                    "xls",
                    {
                        "sExtends": "pdf",
                        "sTitle": "SmartAdmin_PDF",
                        "sPdfMessage": "SmartAdmin PDF Export",
                        "sPdfSize": "letter"
                    },
                    {
                        "sExtends": "print",
                        "sMessage": "Generated by SmartAdmin <i>(press Esc to close)</i>"
                    }
                ],
                "sSwfPath": "js/plugin/datatables/swf/copy_csv_xls_pdf.swf"
            },
            "autoWidth": true,
            "preDrawCallback": function() {
                // Initialize the responsive datatables helper once.
                if (!responsiveHelper_datatable_tabletools) {
                    responsiveHelper_datatable_tabletools = new ResponsiveDatatablesHelper($('#datatable_tabletools'), breakpointDefinition);
                }
            },
            "rowCallback": function(nRow) {
                responsiveHelper_datatable_tabletools.createExpandIcon(nRow);
            },
            "drawCallback": function(oSettings) {
                responsiveHelper_datatable_tabletools.respond();
            }
        });

        /* END TABLETOOLS */

    };

    // load related plugins

    loadScript("js/plugin/datatables/jquery.dataTables.min.js", function() {
        loadScript("js/plugin/datatables/dataTables.colVis.min.js", function() {
            loadScript("js/plugin/datatables/dataTables.tableTools.min.js", function() {
                loadScript("js/plugin/datatables/dataTables.bootstrap.min.js", function() {
                    loadScript("js/plugin/datatable-responsive/datatables.responsive.min.js", pagefunction)
                });
            });
        });
    });

</script>
<?php } ?>
