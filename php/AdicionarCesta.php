<?php
header('Content-Type: application/json');

require_once 'C:/xampp/htdocs/CRUD_pordutos/-CrudFullStackComPHP--main/config/databaseConnection.php';

$data = json_decode(file_get_contents("php://input"), true);

$produto_id = $data['produto_id'];
$quantidade = $data['quantidade'];

if (empty($produto_id) || empty($quantidade)) {
    echo json_encode(['status' => 'error', 'message' => 'Produto e quantidade são obrigatórios.']);
    exit;
}

try {
    $stmt = $pdo->prepare('INSERT INTO cesta (produto_id, quantidade) VALUES (:produto_id, :quantidade)');
    $stmt->execute(['produto_id' => $produto_id, 'quantidade' => $quantidade]);
    
    echo json_encode(['status' => 'success', 'message' => 'Produto adicionado à cesta com sucesso!']);
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => 'Erro ao adicionar produto à cesta: ' . $e->getMessage()]);
}
?>
