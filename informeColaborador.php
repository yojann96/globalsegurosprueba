<?php
    include 'conexion.php';
    $Id_Cargo = $_POST["Id_Cargo"];
        
    $sql_informeColaborador = "SELECT * 
        FROM tbl_colaborador AS CL
        INNER JOIN tbl_registrotrabajo AS RT ON CL.id_Colaborador = RT.idFkColaborador
        INNER JOIN tbl_tienda AS TD ON RT.idFkTienda = TD.id_Tienda
        WHERE CL.idFkCargo = ".$Id_Cargo." ORDER BY RT.fechaRegistroTrabajo";
    $ReporteColab_resultado = $obj_conexion->query($sql_informeColaborador);
    $i1 = 1;
    $html = '';
    while( $infoColaborador_row = $ReporteColab_resultado->fetch_array() ){
        //print_r($infoColaborador_row);die();
        //Crea cuerpo de la Tabla
        $html .= "<tr>";
        $html .= "<td class='listTableRow small' valign='center'>".$i1."</td>";
        $html .= "<td class='listTableRow small' valign='center''>".$infoColaborador_row['tipoDocColaborador']."</td>";
        $html .= "<td class='listTableRow small' valign='center'>".$infoColaborador_row['numeroDocColaborador']."</td>";
        $html .= "<td class='listTableRow small' valign='center'>".$infoColaborador_row['apellidosColaborador']." ".$infoColaborador_row['nombreColaborador']."</td>";
        $html .= "<td class='listTableRow small' valign='center'>".$infoColaborador_row['fechaNacimiento']."</td>";
        $html .= "<td class='listTableRow small' valign='center'>".$infoColaborador_row['genero']."</td>";
        $html .= "<td class='listTableRow small' valign='center'>".$infoColaborador_row['fechaRegistroTrabajo']."</td>";
        $html .= "<td class='listTableRow small' valign='center'>".$infoColaborador_row['nombreTienda']."</td>";
        $html .= "<td class='listTableRow small' valign='center'>".$infoColaborador_row['direccionTienda']."</td>";
        $html .= "<td class='listTableRow small' valign='center'>".$infoColaborador_row['telefonoTienda']."</td>";
        $html .= "</tr>";//Cierra Tabla.......
        $i1++;
    }
    $jsondata[0]['result_trabajoColaborador'] = $html;
    echo json_encode($jsondata);
    
?>