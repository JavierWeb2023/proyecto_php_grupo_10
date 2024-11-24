<?php

function Tramites(){
    $tramites = ["Seleccionar Tramite","Facturacion","Impuestos","Sellados","Infracciones","Patentes","VTV",
     "Impuesto Inmobiliario", "Alumbrado, Barrido y Limpieza"];
    
    foreach ($tramites as $valor){
        echo "<option value='$valor'>$valor</option>";
    }
}
?>