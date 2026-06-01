<?php
session_start();
if(!isset($_SESSION["usuario"])){
    header("Location: ../index.php");
    exit();
    // caso alguem acesse a pgn via link, ele irá fazer igual uma barreira
}

include("../infra/db/connect.php");
    // incluir o connect feito em outra pgn

if($_SERVER["REQUEST_METHOD"] == "POST"){
    // post sempre em maiusculo
    $novoUsuario = $_POST['usuario'];
    $novaSenha = $_POST['senha'];

    $sql = "INSERT INTO usuarios (usuario,senha) 
    VALUES ('$novoUsuario','$novaSenha')";  

    if($conn->query($sql) === TRUE){
        // query -> pedido de informação enviado a um db
        echo "<script> alert('Usuário cadastrado com sucesso!')</script>";
    }else{
        echo "<script> alert('Erro ao cadastrar')</script>";
    }
    // adição de novo usuário
};

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
        <button type="submit">Cadastrar</button>
    </form>
    <hr>
    <?php
    
    include("components/table.php")

    ?>



</body>
</html>