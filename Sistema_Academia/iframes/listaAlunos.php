<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../styles/iframeListaAlunos.css">
    <link rel="stylesheet" href="../styles/iframeMudarCadastro.css">
    <title>Document</title>
</head>
<body>
    <table id="tabelaAlunos" class="tabela">
        <thead>
            <tr class="cabecalho">
                <th>Nome</th>
                <th>Email</th>
                <th>Idade</th>
                <th>Telefone</th>
                <th>Endereço</th>
                <th>Assinatura</th>
                <th>Editar</th>
                <th>Deletar</th>
            </tr>
        </thead>
        <tbody>
            <?php require '../php/listaAlunosSQL.php';?>
        </tbody>
    </table>

    <script src="../functions/listaAlunos.js"></script>
</body>
</html>