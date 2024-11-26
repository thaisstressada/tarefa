<?php
$servername = "localhost"; // ou o IP do seu servidor
$username = "root"; // seu usuário do MySQL
$password = ""; // sua senha do MySQL
$dbname = "contato"; // nome do seu banco de dados

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Obter dados do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$mensagem = $_POST['mensagem'];

// Preparar e vincular
$stmt = $conn->prepare("INSERT INTO contato.contatos (`nome`, `email`, `senha`, `mensagem`) VALUES (?, ?, ?, ?)");

$stmt->bind_param("ssss", $nome, $email, $senha, $mensagem);

// Executar e verificar
if ($stmt->execute()) {
    echo "Cadastro realizado com sucesso!";
} else {
    echo "Erro: " . $stmt->error;
}

// Fechar conexão
$stmt->close();
$conn->close();
?>