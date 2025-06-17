<?php
function InsertarCliente($vConexion){
    $Dispo = !empty($_POST['Disponibilidad']) ? $_POST['Disponibilidad'] : '';

    $SQL_Insert = "INSERT INTO Cliente (DNI_CLI, ID_PROV, NOMBRE, APELLIDO, CONTACTO, DOMICILIO, CIUDAD, Disponibilidad, Email )
        VALUES (?,?,?,?,?,?,?,?,?)";

    $stmt = mysqli_prepare($vConexion, $SQL_Insert);
    if ($stmt === false) {
        return false;
    }

    mysqli_stmt_bind_param(
        $stmt,
        'sssssssis',
        $_POST['DNI'],
        $_POST['Provincia'],
        $_POST['NombreCli'],
        $_POST['ApellidoCli'],
        $_POST['ContactoCli'],
        $_POST['DomicilioCli'],
        $_POST['CiudadCli'],
        $Dispo,
        $_POST['EmailCli']
    );

    $ok = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $ok;
}
?>
