<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Pesquisa</title>
</head>

<body>
    <?php 
     
        $pesquisa=$_POST['busca'] ?? '';   
     
     include "conexao.php";
         $sql="SELECT * FROM  pessoa WHERE nome Like '%$pesquisa%'"; //seleciona os dados do nome digita no input pesquisa
         $dados=mysqli_query($conn,$sql); //a variavel dados recebe do banco  os dados;
    ?>
    <div class="container">
        <div class="row">
            <div class=col>
                <h1>Pesquisa</h1>
                <nav class="navbar bg-body-tertiary">
                    <div class="container-fluid">
                        <form class="d-flex" action="pesquisa.php" method="post">
                            <input class="form-control me-2" name="busca" type="search" placeholder="Nome.."
                                aria-label="Search" autofocus>
                            <button class="btn btn-outline-success" type="submit">Pesquisar</button>
                        </form>
                    </div>
                </nav>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Endereço</th>
                            <th scope="col">Email</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">Data de nascimento</th>
                            <th scope="col">Funções</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php 
                         while($linha=mysqli_fetch_assoc($dados)){ //percorre o vetor, todos os registros
                            $cod=$linha['cod_pessoa'];   // a cada tupla será mostrado as informações da pessoa
                            $nome=$linha['nome'];
                            $endereco=$linha['endereco'];
                            $email=$linha['email'];
                            $telefone=$linha['telefone'];
                            $data_nascimento=$linha['data_nascimento']; 
                            $data_nascimento=mostraData($data_nascimento);
                            echo "   
                            <tr>
                            <th scope='row'>$nome</th>
                            <td>$endereco</td>
                            <td>$email</td>
                            <td>$telefone</td>
                            <td>$data_nascimento</td>
                            <td width=200px> <a href='cadastroEdit.php?id=$cod'class='btn btn-success'>Editar</a>
                             <a href='#'class='btn btn-danger'  data-bs-toggle='modal'
                              data-bs-target='#confirma' onclick=".'"'."getDados($cod,'$nome')".'"'.">Excluir</a></td>
                            </tr>";
                        }
                          
                      ?>
                    </tbody>
                </table>

                <a href="index.php" class="btn btn-primary">Voltar para o inicio</a>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="confirma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmação de exclusão</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="excluir_script.php" method="post">
                        <p>Deseja realmente excluir? <b id="nome_pessoa">Nome da pessoa</b></p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                    <input type="hidden" name="nome" id="nome_pessoa_1" value="">
                    <input type="hidden" name="id" id="cod_pessoa" value="">
                    <input type="submit" class="btn btn-primary" value="Sim">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
    function getDados(id, nome) {
        document.querySelector('#nome_pessoa').innerHTML = nome;
        document.querySelector('#nome_pessoa').value = nome;
        document.querySelector('#cod_pessoa').value = id;
    }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>