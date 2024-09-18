<?php
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=saborela_2024", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "Erro de conexão: " . $e->getMessage();
        exit;
    }$id = $_POST['id'];
$nome = $_POST['nome'];
$descricao= $_POST['descricao'];
$valor = $_POST['valor'];

$sql = "UPDATE produtos SET nome = :nome, ... WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute();

header('Location: produtos.php');
exit;