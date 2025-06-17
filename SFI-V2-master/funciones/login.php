<?php  
function DatosLogin($vUsuario, $vClave, $vConexion){
    $Usuario = array();
    $sql = "SELECT u.DNI_U, u.Disponibilidad, u.Nombre, u.Apellido, j.Jerarquia, u.id_jer, u.Contrasena
            FROM usuario u, jerarquia j
            WHERE u.Usuario = ? AND u.Id_Jer = j.Id_Jer AND u.disponibilidad = 1";

    $stmt = mysqli_prepare($vConexion, $sql);
    if (!$stmt) {
        return $Usuario;
    }

    mysqli_stmt_bind_param($stmt, "s", $vUsuario);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $data = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if (!empty($data) && password_verify($vClave, $data['Contrasena'])) {
        $Usuario['DNI_U'] = $data['DNI_U'];
        $Usuario['DISPONIBILIDAD'] = $data['Disponibilidad'];
        $Usuario['NOMBRE'] = $data['Nombre'];
        $Usuario['APELLIDO'] = $data['Apellido'];
        $Usuario['JERARQUIA'] = $data['Jerarquia'];
        $Usuario['IDJER'] = $data['id_jer'];
        $Usuario['USUARIO'] = $vUsuario;
    }

    mysqli_stmt_close($stmt);

    return $Usuario;
}



?>