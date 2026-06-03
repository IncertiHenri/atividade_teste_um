<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h3>Atualizar dados</h3>
            <p>Escolha um id e atualize os dados</p>
            <form method="POST" id="atualizar" name="atualizar">
                <label>ID:</label>
                <input type="number" name="id" id="id">
                <br>
                <label>Usuário atualizado:</label>
                <input type="name"name="usuarioAtualizado" id="usuarioAtualizado">
                <br>
                <label>Senha atualizada:</label>
                <input type="password"name="senhaAtualizada" id="senhaAtualizada">
                <br>
                <button name="atualizar" id="atualizar" type="submit">Atualizar</button>
            </form>


            <a href="../home.php">Home</a>
<?php
            session_start();

            include("../../infra/db/connect.php");

             if(isset($_POST["atualizar"])){
                $id = $_POST["id"];
                $usuario = $_POST["usuarioAtualizado"];
                $senha = $_POST["senhaAtualizada"];

                $sql = "UPDATE usuarios SET usuario = '$usuario', senha = '$senha' WHERE id = '$id'";

                if($conn->query($sql) === TRUE){
               // query -> pedido de informação enviado a um db
                   echo "<script> alert('Usuário atualizado com sucesso!')</script>";
               }else{
                   echo "<script> alert('Erro ao atualizar')</script>";
               }
             }



?>
<?php
            include("../components/table.php");

?>
</body>
</html>