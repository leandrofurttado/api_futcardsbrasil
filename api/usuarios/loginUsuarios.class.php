<?php

if($api_acao == '') {
    echo json_encode(["ERROR:" => "Caminho não existe! Comunique o Leandro."]);
}

//serviço de login
if($api_acao == 'login' and $api_param == '') { 
    
    $query = "SELECT * FROM usuarios WHERE username = '{$_POST['username']}' AND password = '{$_POST['password']}'";
    $db = DB::connect(); //esse DB vem das classes
    $request = $db->prepare($query);
    $request->execute(); 
    $resultado = $request->fetchObject();

    if($resultado != false) {
        echo json_encode(["mensagem" => "Usuario encontrado (Login sucesso)!", 'sucesso']);
    } else {
        echo json_encode(["mensagem" => 'Houve um erro ao LOGAR!', 'erro']);
    }

}