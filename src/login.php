
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/retornologin.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
    
    <?php 

    require ('conexao.php');

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $Email = $_POST['email'];
        $Senha = $_POST['senha'];

        if (empty($Email) || empty($Senha)){
            echo "Preencha todos os campos";
            exit();
        }

        $sql = $connection -> prepare("SELECT senha, nome FROM usuario WHERE email = ?");
        $sql ->bind_param("s", $Email);
        $sql -> execute();
        $sql -> store_result();


        if($sql ->num_rows == 0){
            echo "<p class='email-nao-encontrado'>Email não encontrado!</p>";
            exit();
        }
        else{
            $sql ->bind_result($hash_do_banco, $nome_do_usuario);
            $sql -> fetch();

            if(password_verify($Senha,$hash_do_banco)){
            echo "<p class = 'mensagem-sucesso'>Bem vindo $nome_do_usuario!</p>";
            }
            else{
                echo "<p class = 'mensagem-erro'>Senha incorreta</p>";
                exit();
            }
        }

    }
    else{
        echo "Erro no envio do formulario";
        exit();
    }


    ?>

    </div>
</body>
</html>

