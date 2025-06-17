<?php
function InsertarUsuario($vConexion){
    $valor = !empty($_POST['Numero']) ? $_POST['Numero'] : 0;
    $Dispo = !empty($_POST['Disponibilidad']) ? $_POST['Disponibilidad'] : 0;

    $sql = "INSERT INTO Usuario (DNI_U, ID_JER, ID_PROV, Contrasena, Nombre, Apellido, Usuario, Contacto, Domicilio, Ciudad, Disponibilidad) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($vConexion, $sql);
    if (!$stmt) {
        return false;
    }

    $hash = password_hash($_POST['ContraUser'], PASSWORD_DEFAULT);
    mysqli_stmt_bind_param(
        $stmt,
        "iiisssssssi",
        $_POST['DNI'],
        $valor,
        $_POST['Provincia'],
        $hash,
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
