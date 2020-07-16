<!DOCTYPE html>
<html>
    <head>
        <title>Global Seguros</title>
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/bootstrap-theme.min.css">
        <script src="/js/jquery.min.js"></script>
        <?php
            include 'conexion.php';
        ?>
    </head>
    <body>
        <div class="container col-md-12"><strong>Bienvenido</strong></div>
        <hr>
        <div id="cargoSelec" class="container col-md-12">
            <label>Seleccione Cargo:</label>
            <select id="selecCargos" name="selecCargos" onchange="getColaborador(this.value)";>
                <option value="">Seleccione...</option>
                <?php
                    $cargo_consulta= "SELECT * FROM tbl_cargo ORDER BY descripcionCargo ASC";
                    $cargo_resultado = $obj_conexion->query($cargo_consulta);
                    if($cargo_resultado->num_rows>0){
                        while ($infoCargo = $cargo_resultado->fetch_array()){
                            //print_r($infoCargo);die();
                            echo '<option value="'.$infoCargo['id_Cargo'].'">'.$infoCargo['descripcionCargo'].'</option>';
                        }
                    }
                ?>
            </select>
        </div>
        <div id="div_rtaCargo" class="container col-md-12"></div>
    </body>
</html>


<script type="text/javascript">

    $(document).ready(function(){
        //$("#div_rtaCargo").hide();
    })
    function getColaborador(IdCargo){
        //alert(IdCargo);
        $("#div_rtaCargo").empty();
        if( IdCargo == ''){
            $("#div_rtaCargo").empty();
        }else{//Listar Colaboradores con la tienda con filtro de colaborador
            $.ajax({
                type: "POST",
				url:  "informeColaborador.php",
				data: {
					Id_Cargo:IdCargo
				},
                success: function(datos) {
                    var table_repoColaborador = "<div id='div_case_asigned' align='center'>"
								+"<table class='ui-state-hover ui-corner-all' style='padding:12px' width='100%' id='Tabla_ColaboradorReporte'>"
									+"<thead>"
									+	'<tr >'
									+		'<th class="colHeader small" valign="center" width="5%">#</th>'
									+		'<th class="colHeader small" valign="center" width="10%">Tipo Documento</th>'
									+		'<th class="colHeader small" valign="center" width="10%">Nro Documento</th>'
									+		'<th class="colHeader small" valign="center" width="17%">Nombre</th>'
									+		'<th class="colHeader small" valign="center" width="10%">Fecha Nacimiento</th>'
									+		'<th class="colHeader small" valign="center" width="10%">Genero</th>'
                                    +		'<th class="colHeader small" valign="center" width="10%">Fecha registro labor</th>'
                                    +		'<th class="colHeader small" valign="center" width="10%">Tienda</th>'
                                    +		'<th class="colHeader small" valign="center" width="10%">Dirección</th>'
                                    +		'<th class="colHeader small" valign="center" width="10%">Teléfono</th>'
									+	'</tr>'
									+'</thead>'
									+"<tbody height='10'> "
									+'</tbody>'
								+"</table>"
							  +"</div>";
                    $("#div_rtaCargo").html(table_repoColaborador);
                    var json = eval(datos)
                    console.log(json[0].result_trabajoColaborador);
                    jQuery("#Tabla_ColaboradorReporte tbody").html();
					jQuery("#Tabla_ColaboradorReporte tbody").html(json[0].result_trabajoColaborador);
				}//end success
            });
            
        }
    }
</script>