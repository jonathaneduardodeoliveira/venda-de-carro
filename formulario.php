<?php
// Conexão com o banco de dados
$servername = "localhost"; // Nome do servidor MySQL (se estiver em localhost)
$username = "root"; // Nome de usuário do MySQL
$password = "@sql@root@"; // Senha do MySQL
$dbname = "venda_de_carro"; // Nome do banco de dados

// Cria conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário e evita ataques de injeção de SQL
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $telefone = mysqli_real_escape_string($conn, $_POST['telefone']);

    // Prepara e executa a consulta SQL de inserção
    $sql = "INSERT INTO clientes (nome, email, telefone) VALUES ('$nome', '$email', '$telefone')";
    if ($conn->query($sql) === TRUE) {
        // Retorna uma resposta de sucesso para o JavaScript
        echo "success";
    } else {
        // Retorna uma mensagem de erro para o JavaScript
        echo "Erro ao inserir registro: " . $conn->error;
    }
} else {
    // Se o método de requisição não for POST, redireciona para uma página de erro
    header("Location: erro.php");
    exit(); // Encerra o script para evitar execução adicional
}

// Fecha conexão
$conn->close();
?>
