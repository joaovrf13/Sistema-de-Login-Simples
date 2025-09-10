
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/retornocadastro.css">

    <title>Document</title>
</head>
<body>
    <div class="container">
            <?php 

    require('conexao.php');

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $Nome = $_POST['nome'];
        $Email = $_POST['email'];
        $Senha = $_POST['senha'];
        $Criado_Em = date('Y-m-d');
        $hash = password_hash($Senha, PASSWORD_DEFAULT);

        $verify ="SELECT * FROM usuario WHERE email = '$Email' " ;
        $result = mysqli_query($connection, $verify);
        
        if(mysqli_num_rows($result) > 0){
            echo "<p class='email-cadastrado'>Este email já está cadastrado!!!!!</p>";
        }
         else{
                $sql = "INSERT INTO usuario(nome, email, senha, criado_em)VALUES('$Nome', '$Email', '$hash', '$Criado_Em')";
                //executa a querry
                if($connection->query($sql)  == true){
                    echo "<p class='usuario-cadastrado'>Usuario Cadastrado com Sucesso!</p>";
                }
                else{
                    echo "<p class='erro-cadastrar-usuario'>Erro ao cadastrar usuario</p>";
                }

            }
        }
     else{
            echo "Nenhum dado foi enviado";
        } 
    ?>
    </div>
</body>
</html>


