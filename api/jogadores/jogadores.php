<?php 



if($api_request == 'jogadores') {
    
    if($method == "GET") {
        include_once("trazerJogadoresCadastrados.php");

    }

    if($method == "POST") {
        include_once("cadastrarUsuarios.class.php");
    }

    //PARA TRABALHAR COM PUT(UPDATE) EM PHP É NECESSÁRIO NO FORM QUE FOR REALIZAR A REQUISIÇÃO PASSAR UM CAMPO COM O NOME

    // "_method = 'PUT';" que irá cair na verificação abaixo. (Php nao se usa PUT)

    if($method == "POST" && isset($_POST['_method']) == "PUT") {
        include_once("editarUsuarios.class.php");
    }

    if($method == "POST") {

        include_once("loginUsuarios.class.php");

    }
} else {
    echo json_encode("Caminho não existe! Comunique o Leandro.");
}