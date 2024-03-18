<?php
$server = "localhost";
$user = "root";
$senha = "1234";
$banco = "empresaCrud";
// Passamos os comandos para a variavel para ser possivel a conexão entre mysql e php;
$conn = mysqli_connect($server, $user, $senha, $banco);

function mensagem($texto, $tipo)
{
    echo "<div class='alert alert-$tipo role='alert'>
          $texto
       </div>";
}

function mostraData($data){ //pegamos a data e dividimos em partes
    $d=explode('-',$data);  // O exemplo abaixo utiliza a função explode, separa as strings por espaço e os guarda em indices.
    /* $pizza  = "piece1 piece2 piece3 piece4 piece5 piece6";
    $pieces = explode(" ", $pizza);
    echo $pieces[0]; // piece1
    echo $pieces[1]; // piece2 */
    $escreve=$d[2]. "/".$d[1]."/".$d[0]; // com as partes colocamos na ordem utilizada no brasil
    return $escreve;
}