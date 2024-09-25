<?php
header('Content-Type: application/json');

require_once 'C:/xampp/htdocs/CRUD_pordutos/-CrudFullStackComPHP--main/config/databaseConnection.php'; 


$input = file_get_contents('php://input');
$data = json_decode($input, true);


if (isset($data['nomeProduto']) && isset($data['precoProduto'])) {
    $nomeProduto = $data['nomeProduto'];
    $precoProduto = $data['precoProduto'];

    
    $stmt = $pdo->prepare('INSERT INTO produtos (nome, preco) VALUES (?, ?)');
    
    
    if ($stmt->execute([$nomeProduto, $precoProduto])) {
        $response = [
            'status' => 'success',
            'message' => 'Produto adicionado com sucesso!'
        ];
    } else {
        $response = [
            'status' => 'error',
            'message' => 'Erro ao adicionar produto.'
        ];
    }
} else {
    $response = [
        'status' => 'error',
        'message' => 'Dados inválidos.' 
    ];
}

echo json_encode($response);
?>

