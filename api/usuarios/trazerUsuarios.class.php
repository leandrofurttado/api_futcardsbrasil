<?php 
header('Access-Control-Allow-Origin: *'); //configuração para permitir acessos de outros sites nesse site(api) *API LIBERADA PARA TODOS*
//exportação (RETORNO) em json
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
header('Content-Type: Application/json'); 

if($api_acao == '') {
    echo json_encode(["mensagem" => "Caminho não existe! Comunique o Leandro."]);
}


//CONSULTA TODOS OS USUARIOS

if($api_acao == 'consultarTodos' and $api_param == '') {
    $db = DB::connect(); //esse DB vem das classes
    $request = $db->prepare("SELECT * FROM usuarios ORDER BY username");
    $request->execute(); //executa o request DBO

    $resultado = $request->fetchAll(PDO::FETCH_ASSOC);

    if($resultado) {
         echo json_encode($resultado);
    } else {
        echo json_encode(["mensagem" => 'Usuário não encontrado!']);
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