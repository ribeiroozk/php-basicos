<!-- Passar id via URL -->
<!-- http://localhost/php-basicos/12_atualizar.php?id=1-->


<?php
// Conecta ao banco de dados
$servername = "localhost";
$username = "root";
$password = "Senai@118";
$dbname = "exercicio";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

//  Inicializa a variável $cliente como null
$cliente = null;

// Verifica se um ID foi passado via URL para edição 
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM clientes WHERE id='$id'";
    $result = $conn->query($sql);


// Verifica se encontrou um registro no banco de dados
if ($result->num_rows > 0) {
    $cliente = $result->fetch_assoc();
 } else {
    echo "Cliente não encontrado. ";
    exit();
 }
}