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

        echo json_encode(["mensagem" => "A senha foi alterada com sucesso!", "sucesso"]);

    } else {

        echo json_encode(["mensagem" => 'Houve um erro ao alterar sua senha!', "erro"]);

    }


}

if($api_acao == 'editar' and $api_param != ''){  //ID

    if(isset($_POST['nova_foto']) and isset($_POST['nome_completo'])) {
        $query = "UPDATE usuarios SET imageBase64 = '{$_POST['nova_foto']}', nome_completo = '{$_POST['nome_completo']}' WHERE id=$api_param";
    }

    if(isset($_POST['nova_foto']) and !isset($_POST['nome_completo'])) {
        $query = "UPDATE usuarios SET imageBase64 = '{$_POST['nova_foto']}' WHERE id=$api_param";
    }

    if(!isset($_POST['nova_foto']) and isset($_POST['nome_completo'])) {
        $query = "UPDATE usuarios SET nome_completo = '{$_POST['nome_completo']}' WHERE id=$api_param";
    }

    $db = DB::connect();
    $request = $db->prepare($query);
    $execucao = $request->execute();

    if($execucao) {
        echo json_encode(["mensagem" => "Os dados foram editados com sucesso!", "sucesso"]);
    } else {
        echo json_encode(["mensagem" => 'Houve um erro ao editar seus dados!', "erro"]);
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

