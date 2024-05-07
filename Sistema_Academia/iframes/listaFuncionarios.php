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
        <tr class="cabecalho">
            <thead>
                <th>Nome</th>
                <th>Email</th>
                <th>Idade</th>
                <th>Telefone</th>
                <th>Endereço</th>
                <th>Salario</th>
                <th>Cargo</th>
                <th>Editar</th>
                <th>Deletar</th>
            </thead>
            <tbody>
                <?php require '../php/listaFuncionariosSQL.php';?>
            </tbody>
        </tr>
    </table>

    <script src="../functions/listaFuncionarios.js"></script>
</body>
</html>