<?php
require('functions.php');
if(isset($_POST['nome']) && isset($_POST['email'])){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    saveDataCadastro($nome, $email, $password);
}
?>