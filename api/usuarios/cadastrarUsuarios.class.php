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
if($api_acao == 'cadastrar' and $api_param == '') {
    //CRIANDO A QUERY DE CADASTRO
    $query = "INSERT INTO usuarios (";
    $query .= implode(',', array_keys($_POST));
    $query .= ") VALUES (";
    $query .= implode(",", array_map(function($value) {
        return "'" . $value . "'";
    }, array_values($_POST)));
    $query .= ")";
    $db = DB::connect(); //esse DB vem das classes
    $request = $db->prepare($query);
    $execucao = $request->execute(); //executa o request DBO

    if($execucao) {
        echo json_encode(["mensagem" => "Cadastro foi realizado com sucesso!"]);
    } else {
        echo json_encode(["mensagem" => 'Houve um erro ao cadastrar!']);
    }
}