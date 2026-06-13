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
            <input type="number" name="id">
            <button name="deletar" type="submit">Deletar</button>
        </form>

        <a href="../home.php">Home</a>

        <?php
        session_start();
        if(!isset($_SESSION["usuario"])){
            header("Location: ../index.php");
            exit();
        }
        include("../../infra/db/connect.php");


        if(isset($_POST["deletar"])){
        $deletarID = $_POST["id"];
        if(empty($_POST["id"])){
        header("Location: delete.php?erro=1");
        exit();
        } else {
        if(isset($_POST["deletar"])){

                echo "
                <h3>Tem certeza que deseja deletar?</h3>

                <form method='POST'>
                    <input type='hidden' name='id' value='$deletarID'>
                    <button type='submit' name='confirmar_deletar'> Sim </button>
                </form>";
        
                }
            }     
        } 
                
                if(isset($_POST["confirmar_deletar"])){
                
                $deletarID = $_POST["id"];
        
                $sql = "DELETE FROM usuarios WHERE id = '$deletarID'";

                if($conn->query($sql) === TRUE){
                       // query -> pedido de informação enviado a um db
                           header("Location: delete.php?sucesso=1");
                            exit();
                       }else{
                           header("Location: delete.php?erro=1");
                        exit();
                       }
                }
        
        
                if(isset($_GET["sucesso"])) {
                    echo "<script>
                        alert('Usuário deletado!');
                        window.history.replaceState({}, document.title, 'delete.php');
                        </script>";
                } 
                if(isset($_GET["erro"])) {
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