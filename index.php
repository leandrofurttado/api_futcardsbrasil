<?php 
header('Access-Control-Allow-Origin: *'); //configuração para permitir acessos de outros sites nesse site(api) *API LIBERADA PARA TODOS*
//exportação (RETORNO) em json
header('Content-Type: Application/json'); 

date_default_timezone_set("America/Sao_Paulo");


// $caminho_api = explode("/", $_GET['path']); //pega o path do .htaccess e pega todo o diretorio da url após o nome do projeto


//SETA O PATH PASSADO HTTP
if(isset($_GET['path'])) {
    $caminho_api = explode("/", $_GET['path']);
} else {
    echo "Caminho não existe!";
}


//API
if(isset($caminho_api[0])) {
    $api_request = $caminho_api[0];
} else {
    echo "Caminho não existe!";
}

//AÇÃO
if(isset($caminho_api[1])) {
    $api_acao = $caminho_api[1];
} else {
    $api_acao = '';
}

//PARAMS
if(isset($caminho_api[2])) {
    $api_param = $caminho_api[2];
} else {
    $api_param = '';
}


//SETANDO O MÉTODO
$method = $_SERVER['REQUEST_METHOD'];

include_once "classes/db.class.php";
include_once "api/usuarios/usuarios.php";
