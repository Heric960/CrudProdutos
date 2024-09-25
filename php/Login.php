<?php
require_once 'C:/xampp/htdocs/CRUD_pordutos/-CrudFullStackComPHP--main/config/databaseConnection.php';


$data = json_decode(file_get_contents('php://input'), true);


if (isset($data['username']) && isset($data['password'])) {
    $username = $data['username'];
    $password = $data['password'];

    // Prepara a consulta
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE username = :username LIMIT 1");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    
    
    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verifica a senha
        if (password_verify($password, $user['password'])) {
            echo json_encode(['status' => 'success', 'message' => 'Login bem-sucedido!']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Senha incorreta.']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Usuário não encontrado.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Dados de login não recebidos.']);
}
?>
