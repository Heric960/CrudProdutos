<?php
header('Content-Type: application/json');

require_once 'C:/xampp/htdocs/CRUD_pordutos/-CrudFullStackComPHP--main/config/databaseConnection.php'; 

function obterCesta($pdo) {
    
    $stmt = $pdo->query('
        SELECT p.id, p.nome, p.preco, c.quantidade 
        FROM cesta c 
        INNER JOIN produtos p ON c.produto_id = p.id
    ');
    
    
    return $stmt->fetchAll(PDO::FETCH_ASSOC); 
}


$produtosCesta = obterCesta($pdo);


echo json_encode([
    'status' => 'success',
    'data' => $produtosCesta
]);
?>
