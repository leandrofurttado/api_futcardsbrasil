<?php 
header('Access-Control-Allow-Origin: *'); //configuração para permitir acessos de outros sites nesse site(api) *API LIBERADA PARA TODOS*
//exportação (RETORNO) em json
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
header('Content-Type: Application/json'); 

if($api_request == 'usuarios') {



    if($method == "GET") {

        include_once("trazerUsuarios.php");

    }



    if($method == "POST") {

        include_once("cadastrarUsuarios.php");

    }

    //PARA TRABALHAR COM PUT(UPDATE) EM PHP É NECESSÁRIO NO FORM QUE FOR REALIZAR A REQUISIÇÃO PASSAR UM CAMPO COM O NOME

    // "_method = 'PUT';" que irá cair na verificação abaixo. (Php nao se usa PUT)

/*     if($method == "POST" && isset($_POST['_method']) == "PUT") {

        include_once("editarUsuarios.php");

    }
 */


    if($method == "POST") {

        include_once("loginUsuarios.php");

    }

    if($method == "POST") {

        include_once("editarUsuarios.php");

    }





} else {
}