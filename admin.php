<?php include "conexao.php"; ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Administração</title>
</head>
<body>

<header>
    <h1>Painel Administrativo</h1>
    <a href="cadastrar.php" class="btn">Cadastrar Produto</a>
</header>

<main>
<table>
    <tr>
        <th>ID</th><th>Nome</th><th>Preço</th><th>Categoria</th><th>Ações</th>
    </tr>

<?php
$sql = "SELECT produtos.*, categorias.nome AS categoria
        FROM produtos
        LEFT JOIN categorias ON produtos.categoria_id = categorias.id";

$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    echo "
    <tr>
        <td>{$row['id']}</td>
        <td>{$row['nome']}</td>
        <td>R$ {$row['preco']}</td>
        <td>{$row['categoria']}</td>
        <td>
            <a href='editar.php?id={$row['id']}'>Editar</a> |
            <a href='excluir.php?id={$row['id']}' onclick='return confirm(\"Excluir?\")'>Excluir</a>
        </td>
    </tr>";
}
?>
</table>
</main>

</body>
</html>