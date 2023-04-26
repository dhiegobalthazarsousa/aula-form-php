<?php
//session_start() ativa o listener da variavel global $_SESSION
//deve ser usada todas as vezes que formos trabalhar com sessions  
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if(isset($_SESSION['isLogged'])): ?><!--php inline toda condição tem um : no final-->
        <p>Olá <?php echo $_SESSION['nome'];?> seu email é <?php echo $_SESSION['username'];?></p>
    <?php endif; ?><!--final da condição if-->
    <form method="post" action="./helpers/cadastro_handle.php">
        <label>Nome
        <input type="text" name="nome" />
    </label>
    <label>Email
        <input type="text" name="email"/>
    </label>
    <label>Password
        <input type="password" name="password"/>
    </label>
    <?php if(isset($_SESSION['isLogged'])): ?><!--isset() compara se existe uma variável, no caso é a $_SESSION['isLogged']-->
    <button type="submit" disabled="true">Cadastrar</button><!--bloco que renderiza somente se a condição for true-->
    <?php else: ?><!--senão (notem que é antes do endif), tanto o else quanto o elseif, quando necessário, devem aparecer antes do endif-->
    <button type="submit">Cadastrar</button>
    <?php endif;?>
    </form>
    <form method="post" action="./helpers/login_handle.php">
        <label>Email
        <input type="email" name="email" />
    </label>
    <label>Password
        <input type="password" name="password"/>
    </label>
    <button type="submit">Logar</button>
    </form>
</body>
</html>