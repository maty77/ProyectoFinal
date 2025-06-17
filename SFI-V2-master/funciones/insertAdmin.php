<?php
function InsertarAdmin($vConexion){
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
        $_POST['DNIadmin'],
        $_POST['Jerarquia'],
        $_POST['Provincia'],
        $_POST['PASSadmin'],
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
