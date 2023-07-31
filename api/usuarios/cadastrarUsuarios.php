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

    $_POST['credits'] = 0;

    if (isset($_POST['username'])) {
        $username = $_POST['username'];
    
        // CRIANDO A QUERY DE VERIFICAÇÃO SE JÁ EXISTE ESSE USUARIO NO BANCO
        $checkQuery = "SELECT COUNT(*) as count FROM usuarios WHERE username = :username";
        $db = DB::connect();
        $checkRequest = $db->prepare($checkQuery);
        $checkRequest->bindParam(':username', $username);
        $checkRequest->execute();
        $result = $checkRequest->fetch(PDO::FETCH_ASSOC);
    
        if ($result['count'] > 0) {
            echo json_encode(["mensagem" => "Esse usuário já existe em nosso banco!", "erro"]); 
        } else { // SE NAO EXISTE ELE IRÁ GERAR O CADASTRO NORMALMENTE
            $query = "INSERT INTO usuarios (";
            $query .= implode(',', array_keys($_POST));
            $query .= ") VALUES (";
            $query .= implode(",", array_map(function($value) {
                return "'" . $value . "'";
            }, array_values($_POST)));
            $query .= ")";
    
            $request = $db->prepare($query);
            $execucao = $request->execute(); //executa o request DBO
    
            if($execucao) {
                echo json_encode(["mensagem" => "Cadastro foi realizado com sucesso!", "sucesso"]);
            } else {
                echo json_encode(["mensagem" => "Houve um erro ao cadastrar!", "erro"]);
            }
        }
    } else {
        echo json_encode(["mensagem" => "Houve um erro ao cadastrar!", "erro"]);
    }
}