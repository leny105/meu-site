<?php include "conexao.php"; ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Produtos</title>
</head>
<body>

<header>
    <h1>Produtos</h1>
</header>

<main>
<?php
$sql = "SELECT produtos.*, categorias.nome AS categoria
        FROM produtos
        LEFT JOIN categorias ON produtos.categoria_id = categorias.id";

$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    echo "<div class='produto'>
            <h3>{$row['nome']}</h3>
            <p>{$row['descricao']}</p>
            <p><strong>Preço:</strong> R$ {$row['preco']}</p>
            <p><strong>Categoria:</strong> {$row['categoria']}</p>
        </div>";
}
?>
</main>

</body>
</html>