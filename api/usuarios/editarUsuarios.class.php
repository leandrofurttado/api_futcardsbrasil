<?php 


if($api_acao == '') {
    echo json_encode(["mensagem" => "Caminho não existe! Comunique o Leandro."]);
}

//CONSULTA TODOS OS USUARIOS
if($api_acao == 'alterarSenha' and $api_param == '') {
    echo json_encode(["mensagem" => 'Usuário não encontrado! Informe-o ou contacte o Leandro.']);
//Foi realizado essa verificação pois é obrigatório passar params
}

if($api_acao == 'alterarSenha' and $api_param != ''){  //ID

    array_shift($_POST); //--> Faz a remoção da variavel _method

    if(isset($_POST['nova_senha'])) {
        $query = "UPDATE usuarios SET password = '{$_POST['nova_senha']}', password_confirm = '{$_POST['nova_senha_confirm']}' WHERE id=$api_param";
    }

    $db = DB::connect();
    $request = $db->prepare($query);
    $execucao = $request->execute();

    if($execucao) {
        echo json_encode(["mensagem" => "A senha foi alterada com sucesso!"]);
    } else {
        echo json_encode(["mensagem" => 'Houve um erro ao alterar sua senha!']);
    }
}



if($api_acao == 'alterarEmail' and $api_param == '') {
    echo json_encode(["mensagem" => 'Usuário não encontrado! Informe-o ou contacte o Leandro.']);
//Foi realizado essa verificação pois é obrigatório passar params
}


//ALTERANDO EMAIL
if($api_acao == 'alterarEmail' and $api_param != ''){  //ID 

    array_shift($_POST); //--> Faz a remoção da variavel _method

    if(isset($_POST['email'])) {
        $query = "UPDATE usuarios SET email = '{$_POST['email']}' WHERE id=$api_param";
    }

    $db = DB::connect();
    $request = $db->prepare($query);
    $execucao = $request->execute();
    
    var_dump($execucao);

    if ($execucao) {
        if ($request->rowCount() > 0) {
            echo json_encode(["mensagem" => "O e-mail foi alterado com sucesso!"]);
        } else {
            echo json_encode(["mensagem" => 'Esse usuario não existe!']);
        }
    } else {
        echo json_encode(["mensagem" => 'Houve um erro ao alterar esse e-mail!']);
    }

}
