<?php
// Permitir acesso de qualquer origem
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

// Incluir o arquivo de conexão com o banco de dados
require_once 'C:/xampp/htdocs/CRUD_pordutos/-CrudFullStackComPHP--main/config/databaseConnection.php';




// Capturar e decodificar os dados recebidos no formato JSON
$data = json_decode(file_get_contents('php://input'), true);

// Verificar se os dados foram recebidos
if ($data) {
    $nome = $data['nome'];
    $senha = $data['senha'];

    // Validar os campos
    if (!empty($nome) && !empty($senha)) {
        // Criar um hash seguro da senha
        $senhaHash = password_hash($senha, PASSWORD_BCRYPT);

        try {
            // Preparar a consulta SQL para inserir os dados
            $stmt = $pdo->prepare("INSERT INTO funcionarios (nome, senha) VALUES (?, ?)");

            // Executar a consulta e verificar o resultado
            if ($stmt->execute([$nome, $senhaHash])) {
                echo json_encode(["status" => "success", "message" => "Funcionário adicionado com sucesso."]);
            } else {
                echo json_encode(["status" => "error", "message" => "Erro ao adicionar funcionário."]);
            }
        } catch (PDOException $e) {
            // Logar o erro para análise
            error_log("Erro no banco de dados: " . $e->getMessage());
            echo json_encode(["status" => "error", "message" => "Erro no banco de dados: " . $e->getMessage()]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Dados incompletos."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Nenhum dado enviado."]);
}
?>
