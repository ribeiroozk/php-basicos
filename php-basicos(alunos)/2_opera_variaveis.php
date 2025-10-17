<?php

// Montagem da url

// https://localhost/php-basicos(alunos)/2_opera_variaveis.php?numero1=10&numero2=5

// Varriavel que recebem valores pela URL(Metodo GET)
$numero1 = $_GET['numero1'];
$numero2 = $_GET['numero2'];

// Verifica se os valores foram passados (isset)
// e converte para números inteiros

if (isset ($numero1) && ($numero2)) {
    $numero1 = (int)$numero1;
    $numero2 = (int)$numero2;
}

// Cálculos
$soma = $sumero1 + $numeros2;

//Exibe

echo "Soma <br>";

?>