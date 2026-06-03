<?php
session_start();
if(!isset($_SESSION["usuario"])){
    header("Location: ../index.php");
    exit();
    // caso alguem acesse a pgn via link, ele irá fazer igual uma barreira
}

include("../infra/db/connect.php");
    // incluir o connect feito em outra pgn

    if(isset($_POST["cadastrar"])){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
    $novoUsuario = $_POST['usuario'];
    $novaSenha = $_POST['senha'];

    $sql = "INSERT INTO usuarios (usuario, senha)
            VALUES ('$novoUsuario', '$novaSenha')";

    if($conn->query($sql) === TRUE){
        header("Location: home.php");
        exit();
    }
}
    }

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h3>Bem-Vindo! <?php echo $_SESSION["usuario"]; ?></h3>
    <a href="logout.php"> Sair</a>

    <hr>
    <h4>Cadastro de Novo Usuário.</h4>
    <form method="POST">
        <label>Usuário:</label>
        <input type="text" name="usuario">
        <br>
        <label>Senha:</label>
        <input type="password" name="senha">
        <br>
        <?php
        
            if(isset($erro)){
                echo $erro;
            };
        
        ?>
        <br>
        <button type="submit" name="cadastrar">Cadastrar</button>
    </form>
    <hr>
    <?php
    
    include("components/table.php")

    ?>

    <hr>


    <h3>Atualizar</h3>
            <a href="components/update.php">Atualizar</a>
    <h3>Deletar</h3>
            <a href="components/update.php">Atualizar</a>

</body>
</html>