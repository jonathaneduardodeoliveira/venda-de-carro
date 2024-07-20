<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "@sql@root@";
$dbname = "venda_de_carro";

// Cria conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    echo "Falha na conexão: " . $conn->connect_error;
    exit();
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
        echo "success";
    } else {
        echo "Erro ao inserir registro: " . $conn->error;
    }
} else {
    header("Location: erro.php");
    exit();
}

// Fecha conexão
$conn->close();
?>
