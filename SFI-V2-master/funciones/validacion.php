<?php
function validar_Datos() {
    $vMensaje='';
    
    // Verificar que se haya enviado el dato y contenga al menos 6 dígitos
    if (!isset($_POST['ContactoUser']) || !is_numeric($_POST['ContactoUser']) || $_POST['ContactoUser'] < 100000) {
        $vMensaje.='Debes ingresar una patente de 6 digitos. <br />';
    }


    return $vMensaje;
}



?>