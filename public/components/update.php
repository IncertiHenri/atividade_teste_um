<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h3>Atualizar dados</h3>
            <p>Escolha um id e atualize os dados</p>
            <form method="POST">
                <label>ID:</label>
                <input type="number" name="id" id="id">
                <br>
                <label>Usuário atualizado:</label>
                <input type="name"name="usuarioAtualizado" id="usuarioAtualizado">
                <br>
                <label>Senha atualizada:</label>
                <input type="password"name="senhaAtualizada" id="senhaAtualizada">
                <br>
                <button name="atualizar" type="submit">Atualizar</button>
            </form>


            <a href="../home.php">Home</a>
            
<?php
            session_start();
    if(!isset($_SESSION["usuario"])){
            header("Location: ../index.php");
            exit();
        }
            include("../../infra/db/connect.php");

             if(isset($_POST["atualizar"])){

                $id = $_POST["id"];
                $usuario = $_POST["usuarioAtualizado"];
                $senha = $_POST["senhaAtualizada"];

                if(strlen($usuario) <= 0 || strlen($senha) <= 0 || strlen($id) <= 0){
                    header("Location: update.php?erro=1");
                    exit();
                } else {
                    $sql = "UPDATE usuarios SET usuario = '$usuario', senha = '$senha' WHERE id = '$id'";

                    if($conn->query($sql) === TRUE){
                    header("Location: update.php?sucesso=1");
                    exit();
                        }
                    }
                }

    if(isset($_GET["sucesso"])){
        echo "<script>
            alert('Usuário atualizado!');
            window.history.replaceState({}, document.title, 'update.php');
            </script>";
    } 
    if(isset($_GET["erro"])) {
        echo "<script>
            alert('Insira usuário, senha e ID válidos!');
            window.history.replaceState({}, document.title, 'update.php');
            </script>";
    }

?>
<?php
            include("../components/table.php");

?>
</body>
</html>