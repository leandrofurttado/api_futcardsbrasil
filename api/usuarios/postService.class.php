<?php

if($api_acao == '') {
    echo json_encode(["ERROR:" => "Caminho não existe! Comunique o Leandro."]);
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
        echo json_encode(["dados_cadastro" => "Cadastro foi realizado com sucesso!"]);
    } else {
        echo json_encode(["dados_cadastro" => 'Houve um erro ao cadastrar!']);
    }

}