<?php
require('functions.php');
if(isset($_POST['email']) && isset($_POST['password'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    login($email, $password);
}
?>