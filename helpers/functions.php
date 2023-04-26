<?php
//essas duas (3 e 4) linhas fazem o php mostrar erros
ini_set('display_errors', 1);
error_reporting(E_ALL);

function saveDataCadastro($nome, $email, $password){
    $data = getDataTransform($nome, $email, $password);
    $file = file("../data/cadastro.txt");
    array_push($file, $data);
    $fp = fopen("../data/cadastro.txt", "a+");
    foreach($file as $line){
        fwrite($fp, $line);
        fwrite($fp, PHP_EOL);
    }
    fclose($fp);
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
        // if($data->email === $email && $data->password === $password){
        //     $_SESSION["username"] = $email;
        //     $_SESSION["nome"] = $data->nome;
        //     $_SESSION["isLogged"] = true;
        //     header("Location: http://localhost/aula/");exit;

        // }
    }
}
?>
