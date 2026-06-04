<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar</title>
</head>

<body>

        <h3>Deletar dados</h3>
        <p>Escolha um id e delete os dados</p>
        <form method="POST">
            <label>ID:</label>
            <input type="number" name="id" id="id">
            <button name="deletar" type="submit">Deletar</button>
        </form>

        <a href="../home.php">Home</a>

        <?php
        session_start();
        include("../../infra/db/connect.php");

        if(isset($_POST["deletar"])){
        $deletar = $_POST["id"];

        $sql = "DELETE FROM usuarios WHERE id = '$deletar'";

        if($conn->query($sql) === TRUE){
               // query -> pedido de informação enviado a um db
                   echo "<script> alert('Usuário deletado com sucesso!')</script>";
               }else{
                   echo "<script> alert('Erro ao deletar')</script>";
               }
        }

        ?>

        <?php
            include("../components/table.php");
        ?>

</body>

</html>