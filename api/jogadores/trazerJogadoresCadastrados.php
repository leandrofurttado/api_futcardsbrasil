<?php 

//ARQUIVO PARA TRABALHAR COM GET DO SISTEMA

if($api_acao == '') {
    echo json_encode(["mensagem" => "Caminho não existe! Comunique o Leeeeandro."]);
}


//CONSULTA TODOS OS USUARIOS

if($api_acao == 'consultarJogadoresTodos' and $api_param == '') {
    $db = DB::connect(); //esse DB vem das classes
    $request = $db->prepare("SELECT * FROM jogadores");
    $request->execute(); //executa o request DBO

    $resultado = $request->fetchAll(PDO::FETCH_ASSOC);

    if($resultado) {
         echo json_encode($resultado);
    } else {
        echo json_encode(["mensagem" => 'Erro ao trazer os jogadores!']);
    }
}

//CONSULTA UM USUARIO ESPECÍFICO.
// TODO fazer tela de PERFIL (todos os dados incluindo fotos.)
if($api_acao == 'consultar' and $api_param != '') { //ID do usuario
    $db = DB::connect();
    $request = $db->prepare("SELECT * FROM usuarios WHERE id={$api_param}");
    $request->execute(); //executa o request DBO

    $resultado = $request->fetchObject();

    if($resultado) {
        echo json_encode($resultado);
    } else {
        echo json_encode(["mensagem" => 'Usuário não encontrado!']);
    }

}