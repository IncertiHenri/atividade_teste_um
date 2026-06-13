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

    $novoUsuario = $_POST['usuario'];
    $novaSenha = $_POST['senha'];

    if(strlen($novoUsuario) <= 0 || strlen($novaSenha) <= 0){
        header("Location: home.php?erro=1");
        exit();
    } else {
        $sql = "INSERT INTO usuarios (usuario, senha)
                VALUES ('$novoUsuario', '$novaSenha')";

        if($conn->query($sql) === TRUE){
        header("Location: home.php?sucesso=1");
        exit();
            }
        }
    }

    if(isset($_GET["sucesso"])){
        echo "<script>
            alert('Usuário cadastrado');
            window.history.replaceState({}, document.title, 'home.php');
            </script>";
    } 
    if(isset($_GET["erro"])) {
        echo "<script>
            alert('Insira usuário e senha válidos!');
            window.history.replaceState({}, document.title, 'home.php');
            </script>";
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
            <a href="components/delete.php">Deletar</a>

</body>
</html>