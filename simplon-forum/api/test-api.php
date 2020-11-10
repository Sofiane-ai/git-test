<?php
//tests 
include('Api.php');

$api_object = new Api();

if($_GET["action"] == 'fetch_all'){
    
    $data = $api_object->fetch_all(); 
}
echo json_encode($data);

?>