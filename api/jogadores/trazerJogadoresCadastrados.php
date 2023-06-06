<?php 
header('Access-Control-Allow-Origin: *'); //configuração para permitir acessos de outros sites nesse site(api) *API LIBERADA PARA TODOS*
//exportação (RETORNO) em json
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
header('Content-Type: Application/json'); 
//ARQUIVO PARA TRABALHAR COM GET DO SISTEMA

if($api_acao == '') {
    echo json_encode(["mensagem" => "Caminho não existe! Comunique o Leandro."]);
}


//CONSULTA TODOS OS JOGADORES

if($api_acao == 'consultarJogadoresTodos' and $api_param == '') {
    $db = DB::connect(); //esse DB vem das classes
    $request = $db->prepare("SELECT * FROM jogadores");
    $request->execute(); 

    $resultado = $request->fetchAll(PDO::FETCH_ASSOC);

    if($resultado) {
         echo json_encode($resultado);
    } else {
        echo json_encode(["mensagem" => 'Erro ao trazer os jogadores!']);
    }
}

//CONSULTA UM JOGADOR ESPECÍFICO.
if($api_acao == 'getJogador' and $api_param != '') { //ID do usuario
    $db = DB::connect();
    $request = $db->prepare("SELECT * FROM jogadores WHERE id={$api_param}");
    $request->execute(); 

    $resultado = $request->fetchObject();

    if($resultado) {
        echo json_encode($resultado);
    } else {
        echo json_encode(["mensagem" => 'Jogador não encontrado!']);
    }

}