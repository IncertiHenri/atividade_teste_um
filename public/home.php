<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: ../index.php");
    exit();
    // caso alguem acesse a pgn via link, ele irá fazer igual uma barreira
}

include("../infra/db/connect.php");
// incluir o connect feito em outra pgn
if (isset($_POST["cadastrar"])) {

    $novoUsuario = $_POST['usuario'];
    $novaSenha = $_POST['senha'];

    if (strlen($novoUsuario) <= 0 || strlen($novaSenha) <= 0) {
        header("Location: home.php?erro=1");
        exit();
    } else {
        $sql = "INSERT INTO usuarios (usuario, senha)
                VALUES ('$novoUsuario', '$novaSenha')";

        if ($conn->query($sql) === TRUE) {
            header("Location: home.php?sucesso=1");
            exit();
        }
    }
}

if (isset($_GET["sucesso"])) {
    echo "<script>
            alert('Usuário cadastrado');
            window.history.replaceState({}, document.title, 'home.php');
            </script>";
}
if (isset($_GET["erro"])) {
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
    <link rel="stylesheet" href="../assets/style.css">
    <title>Home</title>
</head>

<body id="home">
    <h3 class="titulo">Bem-Vindo! <?php echo $_SESSION["usuario"]; ?></h3>
    <form method="get">
        <button type="submit" name="sair" class="botao-home">Sair</button>
    </form>

    <?php

    if (isset($_GET["sair"])) {
        echo "
                <h3 class='titulo'>Tem certeza que deseja sair?</h3>

                <form method='get'>
                    <button type='submit' name='confirmar_sair' class='botao-home'> Sim </button>
                </form>";
    }

    if (isset($_GET["confirmar_sair"])) {
        header("Location: logout.php");
    }
    ?>

    <hr>
    <h4 class="titulo">Cadastro de Novo Usuário</h4>
    <form method="POST" class="form-flex">
        <label>Usuário:</label>
        <input type="text" name="usuario">
        <br>
        <label>Senha:</label>
        <input type="password" name="senha">
        <?php
        if (isset($erro)) {
            echo $erro;
        }
        ;
        ?>
        <br>
        <button type="submit" name="cadastrar" class="botao-home">Cadastrar</button>
    </form>
    <hr>

    <?php

    include("components/table.php")

        ?>

    <hr>

    <h3 class="titulo">Atualizar</h3>
    <a href="components/update.php">Atualizar</a>
    <hr>
    <h3 class="titulo">Deletar</h3>
    <a href="components/delete.php">Deletar</a>

</body>

</html>