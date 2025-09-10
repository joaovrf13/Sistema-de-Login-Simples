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
        echo "Email não encontrado!";
        exit();
    }
    else{
        $sql ->bind_result($hash_do_banco, $nome_do_usuario);
        $sql -> fetch();

        if(password_verify($Senha,$hash_do_banco)){
        echo "Bem vindo $nome_do_usuario";
        }
        else{
            echo "Senha incorreta";
            exit();
        }
    }

}
else{
    echo "Erro no envio do formulario";
    exit();
}


?>