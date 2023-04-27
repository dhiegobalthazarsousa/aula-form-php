<?php
//essas duas (3 e 4) linhas fazem o php mostrar erros
ini_set('display_errors', 1);
error_reporting(E_ALL);

function saveDataCadastro($nome, $email, $password){
    $data = getDataTransform($nome, $email, $password);
    $fp = fopen("../data/cadastro.txt", "a+");
    fwrite($fp, $data);
    fwrite($fp, PHP_EOL);
    fclose($fp);
    header("Location: http://localhost/aula-form-php/");exit;
}

function getDataTransform($nome, $email, $password){
    $data = array(
        "nome" => $nome,
        "email" => $email,
        "password" => $password
    );
    return json_encode($data);
}

function login($email, $password){
    ob_start();
    session_start();
    $handle = file('../data/cadastro.txt');
    foreach($handle as $linha){
        $data = json_decode($linha);
        var_dump($data);
        if($data->email === $email && $data->password === $password){
            $_SESSION["username"] = $email;
            $_SESSION["nome"] = $data->nome;
            $_SESSION["isLogged"] = true;
            header("Location: http://localhost/aula-form-php/");exit;

        }
    }
}
?>
