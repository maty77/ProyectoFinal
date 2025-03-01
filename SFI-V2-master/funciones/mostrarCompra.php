<?php
function ListarCompra($vConexion) {
    $Listado = array();

    $SQL = "SELECT 
                c.id_compra,
                c.fecha, 
                p.proveedor, 
                tp.pago, 
                SUM(dc.totalcompra) AS totalcompra
            FROM 
                compra c
            INNER JOIN 
                detallecompra dc ON c.id_compra = dc.id_compra
            INNER JOIN 
                proveedor p ON c.id_proveedor = p.id_proveedor
            INNER JOIN 
                tipopago tp ON c.id_pago = tp.id_pago
            WHERE 1=1";

    if (!empty($_GET['proveedor'])) {
        $SQL .= " AND c.id_proveedor = '" . mysqli_real_escape_string($vConexion, $_GET['proveedor']) . "'";
    }
    if (!empty($_GET['pago'])) {
        $SQL .= " AND c.id_pago = '" . mysqli_real_escape_string($vConexion, $_GET['pago']) . "'";
    }
    if (!empty($_GET['fecha_inicio']) && !empty($_GET['fecha_fin'])) {
        $SQL .= " AND c.fecha BETWEEN '" . mysqli_real_escape_string($vConexion, $_GET['fecha_inicio']) . "' AND '" . mysqli_real_escape_string($vConexion, $_GET['fecha_fin']) . "'";
    }

    $SQL .= " GROUP BY c.id_compra, c.fecha, p.proveedor, tp.pago ORDER BY c.fecha ASC";

    $rs = mysqli_query($vConexion, $SQL);
    
    $i = 0;
    while ($data = mysqli_fetch_array($rs)) {
        $Listado[$i]['ID_COMPRA'] = $data['id_compra'];
        $Listado[$i]['FECHA'] = $data['fecha'];
        $Listado[$i]['PROVE'] = $data['proveedor'];
        $Listado[$i]['TPAGO'] = $data['pago'];
        $Listado[$i]['TOTALC'] = $data['totalcompra'];
        $i++;
    }

    return $Listado;
}

?>