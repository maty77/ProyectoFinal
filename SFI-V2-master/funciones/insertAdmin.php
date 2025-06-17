<?php 
function InsertarAdmin($vConexion){
    $Dispo = !empty($_POST['Disponibilidad']) ? $_POST['Disponibilidad'] : 0;

    $sql = "INSERT INTO Usuario (DNI_U, ID_JER, ID_PROV, Contrasena, Nombre, Apellido, Usuario, Contacto, Domicilio, Ciudad, Disponibilidad) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($vConexion, $sql);
    if (!$stmt) {
        return false;
    }

    $hash = password_hash($_POST['PASSadmin'], PASSWORD_DEFAULT);
    mysqli_stmt_bind_param(
        $stmt,
        "iiisssssssi",
        $_POST['DNIadmin'],
        $_POST['Jerarquia'],
        $_POST['Provincia'],
        $hash,
        $_POST['NOMadmin'],
        $_POST['APEadmin'],
        $_POST['EMAILadmin'],
        $_POST['CONTadmin'],
        $_POST['DOMadmin'],
        $_POST['CIUadmin'],
        $Dispo
    );

    $ok = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    return $ok;
}



?>