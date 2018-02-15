<?php require_once("inc/init.php"); ?>
<!-- row -->
<div class="row">

    <!-- col -->
    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
        <h1 class="page-title txt-color-blueDark">

            <!-- PAGE HEADER -->
            <i class="fa-fw fa fa-home"></i> geo-cercas
            <span>>  
				mapa
			</span>
        </h1>
    </div>
    <!-- end col -->

</div>
<!-- end row -->

<!-- widget grid -->
<section id="widget-grid" class="">

    <!-- row -->
    <div class="row">

        <!-- NEW WIDGET START -->
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            <!-- Widget ID (each widget will need unique ID)-->
            <div class="jarviswidget" id="wid-id-2" data-widget-colorbutton="false" data-widget-editbutton="false">

                <header>
                    <span class="widget-icon"> <i class="fa fa-comments"></i> </span>
                    <h2>Mapa </h2>

                </header>

                <!-- widget div-->
                <div>

                    <div>
                        <!-- widget edit box -->
                        <div style="width:100%; height:500px;" class="jarviswidget-editbox">
                            <div>
                                <label>Title:</label>
                                <input type="text" />
                            </div>
                        </div>
                        <!-- end widget edit box -->

                        <div class="widget-body no-padding">
                            <!-- content goes here -->


                            <!-- content goes here -->

                            <div id="map" name="map" class="vector-map" ></div>
                            <div id="style-selector-control" class="map-control">
                                <select id="style-selector" class="selector-control">
                                    <option value="default" selected="selected">Por defecto</option>
                                    <option value="silver">Crema</option>
                                    <option value="night">Noche</option>
                                  </select>
                            </div>
                            <input type="button" value="Mostrar" onclick="mostrar()"><br>
                            <input type="button" value="Ocultar" onclick="ocultar()"><br>
                            <div id="panel">
                                <div id="color-palette"></div>
                                <div>
                                    <button id="delete-button">Delete Selected Shape</button><br>
                                </div>
                                <div id="guardar"><input type="text" id="nombre"><input type="button" value="Guardar" onclick="saveData()"></div>
                                <div id="curpos"></div>
                                <div id="cursel"></div>
                                <div id="note"><small>Note: markers can be selected, but are not graphically indicated; can be deleted, but cannot have their color changed.</small></div>
                            </div>

                            

                            <script src="ajax/lib/alertify.min.js"></script>
                            <script type="text/javascript">
                                function reset() {
                                    $("#toggleCSS").attr("href", "ajax/themes/alertify.default.css");
                                    alertify.set({
                                        labels: {
                                            ok: "OK",
                                            cancel: "Cancel"
                                        },
                                        delay: 5000,
                                        buttonReverse: false,
                                        buttonFocus: "ok"
                                    });
                                }

                            </script>
                            <!-- end content -->

                        </div>

                    </div>

                </div>
                <!-- end widget div -->

            </div>
            <!-- end widget -->

        </article>
        <!-- WIDGET END -->

    </div>

    <!-- end row -->

    <!-- row -->

    <div class="row">

        <!-- a blank row to get started -->
        <div class="col-sm-12">
            <!-- your contents here -->
        </div>

    </div>

    <!-- end row -->

</section>
<!-- end widget grid -->

<script type="text/javascript">
    pageSetUp();

    var pagefunction = function() {};

    pagefunction();

</script>
