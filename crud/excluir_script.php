<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Exclusão de cadastro</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="m-5 p-5">
                <?php
                include "conexao.php";
                //inserimos conexão.php para usar a função dele
                //pegamos os dados como post do formulario;
                $id=$_POST['id'];
                $nome = $_POST["nome"];
                
                //criamos a variavel sql que contem o comando insert para inserir dados no banco de dados;
               // $sql = "insert into `pessoa`( `nome`, `endereco`, `telefone`, `email`, `data_nascimento`) values ('$nome','$endereco','$telefone','$email', '$data_nascimento')";
                 $sql = "DELETE  FROM  `pessoa` WHERE cod_pessoa=$id";
                // essa função pega a conexão e o insert a ser inseridos, e então insere os dados;
                if (mysqli_query($conn, $sql)) {
                    //função criada no conexao.php, serve para estilizar a mensagem de cadastro;
                    mensagem("$nome Excluido com sucesso", 'success');
                } else {
                    mensagem("$nome NÃO Excluido", 'danger');
                }
                ?>
                <a href="index.php" class="btn btn-primary">Voltar</a>
            </div>
        </div>
    </div>
</body>

</html>