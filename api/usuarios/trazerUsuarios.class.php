<?php 
//ARQUIVO PARA TRABALHAR COM GET DO SISTEMA


if($api_acao == '') {
    echo json_encode(["ERROR:" => "Caminho não existe! Comunique o Leandro."]);
}



//CONSULTA TODOS OS USUARIOS
if($api_acao == 'consultarTodos' and $api_param == '') {
    $db = DB::connect(); //esse DB vem das classes
    $request = $db->prepare("SELECT * FROM usuarios ORDER BY usuario");
    $request->execute(); //executa o request DBO

    $resultado = $request->fetchAll(PDO::FETCH_ASSOC);

    if($resultado) {
        echo json_encode(["dados_usuarios" => $resultado]);
    } else {
        echo json_encode(["dados_usuarios" => 'Usuário não encontrado!']);
    }
}


//CONSULTA UM USUARIO ESPECÍFICO.
if($api_acao == 'consultar' and $api_param != '') { //ID do usuario
    $db = DB::connect();
    $request = $db->prepare("SELECT * FROM usuarios WHERE id={$api_param}");
    $request->execute(); //executa o request DBO

    $resultado = $request->fetchObject();

    if($resultado) {
        echo json_encode(["dados_usuarios" => $resultado]);
    } else {
        echo json_encode(["dados_usuarios" => 'Usuário não encontrado!']);
    }
}