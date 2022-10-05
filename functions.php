<?php
require_once('app/db.php');



function delete($id){
    require_once('templates/header.php');
    deleteById($id);
    echo '<h2>El item se ha eliminado</h2>';
    echo '<button type="submit " href="home">Continuar</button>;';
    require_once('templates/footer.php');
}

function modificar(){
    // function showOneItemForModify($id){
    //     $item = getItem($id);
    //     include 'templates/header.php';
    //     include 'app/updateForm.php';
    // }
    
    // function modifyItem($id){
    //     if(isset($id)&&isset($_POST['deudor'])&&isset($_POST['cuota'])&&isset($_POST['cuota_capital'])&&isset($_POST['fecha_pago'])){
    //         $deudor = $_POST['deudor'];
    //         $cuota = $_POST['cuota'];
    //         $cuota_capital = $_POST['cuota_capital'];
    //         $fecha_pago = $_POST['fecha_pago'];
    //         // $ID =$_POST['ID'];
    //         modifyDB($deudor,$cuota,$cuota_capital,$fecha_pago,$id);
    //     }
    // }
    
}