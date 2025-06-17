<?php
function InsertarCliente($vConexion){
    $SQL_Insert = "INSERT INTO tipopago (PAGO) VALUES (?)";

    $stmt = mysqli_prepare($vConexion, $SQL_Insert);
    if ($stmt === false) {
        return false;
    }

    mysqli_stmt_bind_param($stmt, 's', $_POST['T_PAGO']);

    $ok = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $ok;
}
?>
