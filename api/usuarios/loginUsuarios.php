<?php
header('Access-Control-Allow-Origin: *'); //configuração para permitir acessos de outros sites nesse site(api) *API LIBERADA PARA TODOS*
//exportação (RETORNO) em json
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
header('Content-Type: Application/json'); 

if($api_acao == '') {
    echo json_encode(["ERROR:" => "Caminho não existe! Comunique o Leandro."]);
}



//serviço de login
//TODO verificar como irá ser feito o login (Front-end)
if($api_acao == 'login' and $api_param == '') { 
    $query = "SELECT * FROM usuarios WHERE username = '{$_POST['username']}' AND senha = '{$_POST['password']}'";
    $db = DB::connect(); //esse DB vem das classes
    $request = $db->prepare($query);
    $request->execute(); 
    $resultado = $request->fetchAll();

    if($resultado != false) {
        echo json_encode(["mensagem" => $resultado[0], 'sucesso']);
    } else {
        echo json_encode(["mensagem" => 'Usuario não encontrado!', 'erro']);
    }



}