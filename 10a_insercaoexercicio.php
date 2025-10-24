<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>
</head>
<body>
    <h2>Cadastro de Produtos</h2>

    <form method="post" action="">
        <label for="nome">Nome do Produto:</label>
        <input type="text" name="nome" required><br><br>

        <label for="preco">Preço:</label>
        <input type="number" name="preco" step="0.01" required><br><br>

        <button type="submit">Cadastrar Produtos</button>
    </form>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nome = trim($_POST['nome']);
    $preco = $_POST['preco'];

   
    if (empty($nome)) {
        echo "<p style='color: crimson;'>Erro: O nome do produto não pode estar vazio.</p>";
    } elseif (!is_numeric($preco) || $preco <= 0) {
        echo "<p style='color: crimson;'>Erro: O preço deve ser um número positivo.</p>";
    } else {
      
        $servername = "localhost";
        $username = "root";
        $password = "Senai@118"; 
        $dbname = "exercicio";

        $conn = new mysqli($servername, $username, $password, $dbname);

       
        if ($conn->connect_error) {
            die("<p style='color: crimson;'>Falha na conexão: " . $conn->connect_error . "</p>");
        }


        $sql = "INSERT INTO produtos (nome, preco) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sd", $nome, $preco);

        if ($stmt->execute()) {
            echo "<p style='color: green;'>Produto cadastrado com sucesso!</p>";
        } else {
            echo "<p style='color: crimson;'>Erro ao cadastrar produto: " . $conn->error . "</p>";
        }

        $stmt->close();
        $conn->close();
    }
}
?> 
</body>
</html>