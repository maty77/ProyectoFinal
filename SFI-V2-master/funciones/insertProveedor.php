<?php
function InsertarProveedor($vConexion){
    $Dispo = !empty($_POST['Disponibilidad']) ? $_POST['Disponibilidad'] : '';

    $SQL_Insert = "INSERT INTO Proveedor (Id_Proveedor, Id_Prov, Proveedor, Contacto, Domicilio, Ciudad, Email, Disponibilidad)
        VALUES (?,?,?,?,?,?,?,?)";

    $stmt = mysqli_prepare($vConexion, $SQL_Insert);
    if ($stmt === false) {
        return false;
    }

    mysqli_stmt_bind_param(
        $stmt,
        'ssssssss',
        $_POST['CUIT'],
        $_POST['Provincia'],
        $_POST['Proveedor'],
        $_POST['ContactoProv'],
        $_POST['DomicilioProv'],
        $_POST['CiudadProv'],
        $_POST['EmailProv'],
        $Dispo
    );

    $ok = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $ok;
}
?>
