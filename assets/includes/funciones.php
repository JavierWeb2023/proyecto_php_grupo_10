<?php

function Tramites(){
    $tramites = ["Seleccionar Tramite","Facturacion","Impuestos","Sellados","Infracciones","Patentes","VTV",
     "Impuesto Inmobiliario", "Alumbrado, Barrido y Limpieza", "Atencion a Proveedores"];
    
    foreach ($tramites as $valor){
        echo "<option value='$valor'>$valor</option>";
    }
}
?>