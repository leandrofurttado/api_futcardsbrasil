<?php 

if($api_request == 'usuarios') {

    if($method == "GET") {
        include_once("getService.class.php");
    }

    if($method == "POST") {
        include_once("postService.class.php");
    }

} else {
    echo json_encode("Caminho não existe! Comunique o Leandro.");
}