<?php
require_once 'Vinho.php';
require_once 'Suco.php';
require_once 'Refrigerante.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tipoBebida = $_POST['tipoBebida'];
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $detalheExtra = $_POST['detalheExtra'];

    $bebida = null;
    $mensagem = "";

    switch ($tipoBebida) {
        case 'vinho':
            $bebida = new Vinho();
            $bebida->setNome($nome);
            $bebida->setPreco($preco);
            $bebida->setSafra($detalheExtra);
            $mensagem = $bebida->mostrarBebida() . "<br>" . ($bebida->verificarPreco($preco) ? "Produto em Oferta" : "Produto com preço normal");
            break;
        case 'suco':
            $bebida = new Suco();
            $bebida->setNome($nome);
            $bebida->setPreco($preco);
            $bebida->setSabor($detalheExtra);
            $mensagem = $bebida->mostrarBebida() . "<br>" . ($bebida->verificarPreco($preco) ? "Produto em Oferta" : "Produto com preço normal");
            break;
        case 'refrigerante':
            $bebida = new Refrigerante();
            $bebida->setNome($nome);
            $bebida->setPreco($preco);
            $bebida->setRetornavel($detalheExtra == 'sim');
            $mensagem = $bebida->mostrarBebida() . "<br>" . ($bebida->verificarPreco($preco) ? "Produto em Oferta" : "Produto com preço normal");
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASSAÍ</title>
</head>
<body>
    <h2>Bebidas</h2>
    <form method="POST">
        <label for="nome">Nome da bebida:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="preco">Preço:</label>
        <input type="number" id="preco" name="preco" step="0.01" required><br><br>

        <label for="tipoBebida">Tipo de bebida:</label>
        <select id="tipoBebida" name="tipoBebida" required>
            <option value="vinho">Vinho</option>
            <option value="suco">Suco</option>
            <option value="refrigerante">Refrigerante</option>
        </select><br><br>

        <label for="detalheExtra">Detalhe extra (Safra, Sabor ou Retornável):</label>
        <input type="text" id="detalheExtra" name="detalheExtra" required><br><br>

        <button type="submit">Cadastrar Bebida</button>
    </form>

    <?php if (isset($mensagem)): ?>
        <h3>Item cadastrado:</h3>
        <p><?php echo $mensagem; ?></p>
    <?php endif; ?>
</body>
</html>
