<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes dos produtos</title>

    <h1>Veja aqui detalhes dos nosso produtos</h1>
    <h2>Ingredientes e informações nutricionais</h2>
</head>
<body>
<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=saborela_2024", "seu_usuario", "sua_senha");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Erro de conexão: " . $e->getMessage();
    exit;
}

$idProduto = $_GET['id'];


$produtos = [
    [
        'id' => 777,
        'nome' => 'Snack Saudável',
        'descricao' => 'Snack feito com frutas desidratadas.Barra de cereal de frutas tropicais selecionadas, com apenas 55kcal/porção.Perfeito durante e depois do treino' ,
        'preco' => 15.90,
        'url' => 'detalhes.php'
    ],
    [
        'id' => 444,
        'nome' => 'Refeição Congelada Fitness',
        'descricao' => 'Refeição balanceada, rica em proteinas. Com filé de frango grelhado e de baixo teor de gordura. 280kcal/porção, acompanha arroz intregral e salada',
        'preco' => 25.99,
        'url' => 'detalhes.php'
    ],
    [
        'id' => 333,
        'nome' => 'Suco Natural Detox',
        'descricao' => 'Suco natural a base de frutas e vegetais. todas as vitanimas necessárias pro seu corpo durante o dia num único super suco detox. 70kcal/700ml.Opções com ou sem leite.',
        'preco' => 8.75,
        'url' => 'detalhes.php'
    ]
];

foreach ($produtos as $produto) {
    if ($produto['id'] == $idProduto) {
        $produtoSelecionado = $produto;
        break;
    }
}
if ($produtoSelecionado) {
    echo "<h2>Detalhes do Produto</h2>";
    echo "<p>Nome: " . $produtoSelecionado ['nome'] . "</p>";
    echo "<p>Descrição: " . $produtoSelecionado['descricao'] . "</p>";
    echo "<p>Preço: R$" . $produtoSelecionado['preco'] . "</p>";
    
} else {
    echo "Produto não encontrado.";
}
?>

    
    
</body>
</html>