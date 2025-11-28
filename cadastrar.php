<?php include "conexao.php"; ?>

<?php
if ($_POST) {
    $nome = $_POST['nome'];
    $desc = $_POST['descricao'];
    $preco = $_POST['preco'];
    $categoria = $_POST['categoria'];

    $sql = "INSERT INTO produtos (nome, descricao, preco, categoria_id)
            VALUES ('$nome', '$desc', '$preco', '$categoria')";

    $conn->query($sql);

    header("Location: admin.php");
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <title>Cadastrar</title>
</head>
<body>

<h2>Novo Produto</h2>

<form method="POST" onsubmit="return validarFormulario()">
    Nome: <input type="text" name="nome" required><br>
    Descrição: <textarea name="descricao"></textarea><br>
    Preço: <input type="number" step="0.01" name="preco" required><br>

    Categoria:
    <select name="categoria">
        <?php
        $cat = $conn->query("SELECT * FROM categorias");
        while ($c = $cat->fetch_assoc()) {
            echo "<option value='{$c['id']}'>{$c['nome']}</option>";
        }
        ?>
    </select>

    <button type="submit">Salvar</button>
</form>

</body>
</html>