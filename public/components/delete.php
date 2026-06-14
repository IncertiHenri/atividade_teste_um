<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar</title>
</head>

<body>

    <h3 class="titulo">Deletar dados</h3>
    <p>Escolha um id e delete os dados</p>
    <form method="POST" class="form-flex">
        <label>ID:</label>
        <input type="number" name="id">
        <br>
        <button name="deletar" type="submit" class="botao-home">Deletar</button>
    </form>

    <a href="../home.php">Home</a>

    <?php
    session_start();
    if (!isset($_SESSION["usuario"])) {
        header("Location: ../index.php");
        exit();
    }
    include("../../infra/db/connect.php");


    if (isset($_POST["deletar"])) {
        $deletarID = $_POST["id"];
        if (empty($_POST["id"])) {
            header("Location: delete.php?erro=1");
            exit();
        } else {
            if (isset($_POST["deletar"])) {

                echo "
                <h3 class='titulo'>Tem certeza que deseja deletar?</h3>

                <form method='POST' class='form-flex'>
                    <input type='hidden' name='id' value='$deletarID'>
              
                    <button type='submit' name='confirmar_deletar' class='botao-home'> Sim </button>
                </form>";

            }
        }
    }

    if (isset($_POST["confirmar_deletar"])) {

        $deletarID = $_POST["id"];

        $sql = "DELETE FROM usuarios WHERE id = '$deletarID'";

        if ($conn->query($sql) === TRUE) {
            // query -> pedido de informação enviado a um db
            header("Location: delete.php?sucesso=1");
            exit();
        } else {
            header("Location: delete.php?erro=1");
            exit();
        }
    }


    if (isset($_GET["sucesso"])) {
        echo "<script>
                        alert('Usuário deletado!');
                        window.history.replaceState({}, document.title, 'delete.php');
                        </script>";
    }
    if (isset($_GET["erro"])) {
        echo "<script>
                        alert('Insira ID válido!');
                        window.history.replaceState({}, document.title, 'delete.php');
                        </script>";
    }
    ?>

    <?php
    include("../components/table.php");
    ?>

</body>

</html>