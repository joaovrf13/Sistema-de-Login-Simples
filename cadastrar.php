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
        echo "Este email já está cadastrado!!!!!";
    }
    else{
        $sql = "INSERT INTO usuario(nome, email, senha, criado_em)VALUES('$Nome', '$Email', '$hash', '$Criado_Em')";
   //executa a querry
    if($connection->query($sql)  == true){
        echo "Usuario Cadastrado com Sucesso!";
    }
    else{
        echo "Erro ao cadastrar usuario";
    }

    }
 

}
else{
    echo "Nenhum dado foi enviado";
} 




?>