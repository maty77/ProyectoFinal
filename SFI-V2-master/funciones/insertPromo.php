<?php
function InsertarPromo($vConexion){
    $codpromo = mysqli_real_escape_string($vConexion, $_POST['CODPROMO']);
    $promo = mysqli_real_escape_string($vConexion, $_POST['PROMO']);
    $term = mysqli_real_escape_string($vConexion, $_POST['TERM']);
    $desc = (int) $_POST['DESC'];
    $activo = (int) $_POST['Activo'];

    $SQL_Insert = "INSERT INTO promociones (id_promo, promo, terminos, valor_descuento, activo )
        VALUES (?,?,?,?,?)";

    $stmt = mysqli_prepare($vConexion, $SQL_Insert);
    if ($stmt === false) {
        return false;
    }

    mysqli_stmt_bind_param($stmt, 'sssis', $codpromo, $promo, $term, $desc, $activo);

    $ok = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $ok;
}
?>
