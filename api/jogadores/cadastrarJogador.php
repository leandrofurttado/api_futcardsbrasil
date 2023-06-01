<?php

if($api_acao == '') {
    echo json_encode(["mensagem" => "Caminho não existe! Comunique o Leandro."]);
}

//CONSULTA TODOS OS USUARIOS
/*
POST deve ter:
nome_jogador
jogos
vitorias
gols
ano_nascimento
valor_carta -> pode ser NULL
nome_arquivo -> pode ser NULL
caminho_arquivo -> pode ser NULL -> ver no projeto a ideia que fiz 
*/
if($api_acao == 'cadastrarJogador' and $api_param == '') {
    //CRIANDO A QUERY DE CADASTRO
    $query = "INSERT INTO jogadores (";
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
        echo json_encode(["mensagem" => 'Jogador não encontrado!']);
    }
} else if ($api_acao == 'cadastrarJogador' and $api_param != ''){
    echo json_encode(["mensagem" => "Error!"]);
}