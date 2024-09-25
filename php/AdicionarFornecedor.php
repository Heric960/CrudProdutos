<?php
header('Content-Type: application/json');

require_once 'C:/xampp/htdocs/CRUD_pordutos/-CrudFullStackComPHP--main/config/databaseConnection.php';


$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (isset($data['nomeFrnecedor']) && isset($data['contatoFornecedor'])) {
    $nomeFornecedor = $data['nomeFrnecedor']; 
    $contatoFornecedor = $data['contatoFornecedor'];

   
    $stmt = $pdo->prepare('INSERT INTO fornecedor (nome, contato) VALUES (?, ?)');
    
    
    if ($stmt->execute([$nomeFornecedor, $contatoFornecedor])) {
        $response = [
            'status' => 'success',
            'message' => 'Fornecedor adicionado com sucesso!' 
        ];
    } else {
        $response = [
            'status' => 'error',
            'message' => 'Erro ao adicionar fornecedor.' 
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
