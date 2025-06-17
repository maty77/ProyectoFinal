<?php
function InsertarUsuario($vConexion){
    $valor = !empty($_POST['Numero']) ? $_POST['Numero'] : '';
    $Dispo = !empty($_POST['Disponibilidad']) ? $_POST['Disponibilidad'] : '';

    $SQL_Insert = "INSERT INTO Usuario (DNI_U, ID_JER, ID_PROV, Contrasena, Nombre, Apellido, Usuario, Contacto, Domicilio, Ciudad, Disponibilidad )
        VALUES (?,?,?,?,?,?,?,?,?,?,?)";

    $stmt = mysqli_prepare($vConexion, $SQL_Insert);
    if ($stmt === false) {
        return false;
    }

    mysqli_stmt_bind_param(
        $stmt,
        'sssssssssss',
        $_POST['DNI'],
        $valor,
        $_POST['Provincia'],
        $_POST['ContraUser'],
        $_POST['NombreUser'],
        $_POST['ApellidoUser'],
        $_POST['EmailUser'],
        $_POST['ContactoUser'],
        $_POST['DomicilioUser'],
        $_POST['CiudadUser'],
        $Dispo
    );

    $ok = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $ok;
}
?>
