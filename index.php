<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sabor 24 Online</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Bem-vindo à Sabor 24</h1>
    <h2>Menu</h2>

    <?php
    $host = 'localhost';
    $dbname = 'saborela_24'; 
    $user = 'seu_usuario';
    $password = 'sua_senha';
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=saborela_24", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "Erro de conexão: " . $e->getMessage();
        exit;
    }

    $sql = "SELECT * FROM produtos";
    $stmt = $pdo->query($sql);
    $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<table>";
    echo "<tr><th>Nome</th><th>Descrição</th><th>Preço</th><th>Ações</th></tr>";
    foreach ($produtos as $produto) {
        echo "<tr>";
        echo "<td>" . $produto['nome'] . "</td>";
        echo "<td>" . $produto['descricao'] . "</td>";
        echo "<td>R$ " . number_format($produto['preco'], 2, ',', '.') . "</td>";
        echo "<td>
            <a href='detalhes.php?id=" . $produto['id'] . "'>Ver</a>
            <a href='remover.php?id=" . $produto['id'] . "'>Remover</a>
            <a href='alterar.php?id=" . $produto['id'] . "'>Editar</a>
        </td>";
        echo "</tr>";
    }
    echo "</table>";
    ?>
</body>
</html>