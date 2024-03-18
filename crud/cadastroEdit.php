<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Alteração de cadastros</title>
</head>

<body>
    <?php 
     include "conexao.php";
     $id= $_GET['id']?? "";
     $sql="SELECT * FROM  pessoa WHERE cod_pessoa=$id";
     $dados=mysqli_query($conn, $sql);
     $linha=mysqli_fetch_assoc($dados);
    ?>
    <div class="container">
        <div class="row">
            <div class=col>
                <h1>Cadastro</h1>
                <form action="edit_script.php" method="POST">
                    <div class="form-group">
                        <label for="nome" class="form-label">Nome Completo</label>
                        <input type="text" class="form-control" name="nome" required
                            value="<?php echo $linha['nome']; ?>">
                    </div>
                    <div class=" form-group">
                        <label for="endereco" class="form-label">Endereço</label>
                        <input type="text" class="form-control" name="endereco"
                            value="<?php echo $linha['endereco']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="telefone" class="form-label">Telefone</label>
                        <input type="text" class="form-control" name="telefone" required
                            value="<?php echo $linha['telefone']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" required
                            value="<?php echo $linha['email']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="datNascimento" class="form-label">Data de Nascimento</label>
                        <input type="date" class="form-control" name="data_nascimento" required
                            value="<?php echo $linha['data_nascimento']; ?>">
                    </div>
                    <div class="form-group m-3">
                        <input type="submit" class="btn btn-success" value="Salvar Alterações">
                        <input type="hidden" name="id" value="<?php echo $linha['cod_pessoa']; ?>">
                    </div>
                </form>
                <a href="index.php" class="btn btn-primary">Voltar para o inicio</a>
            </div>
        </div>
    </div>
</body>

</html>