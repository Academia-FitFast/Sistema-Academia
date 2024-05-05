<?php
    require_once '../php/connectionSQL.php';
    require_once '../php/classQuerySQL.php';

    session_start();

    $conn = (new connectionDB())->conectaDB();
    $id = (new ConsultaDB($conn))->getIdByURL();
    $dadosAluno = (new ConsultaAluno($conn))->getDadosAluno($id);
    
    function getAssinaturas($conn){
        $planos = (new ConsultaDB($conn))->getAssinaturasDB();
        // Percorre todos os planos
        foreach ($planos as $plano){
            echo '<option value="'. $plano .'">'. $plano .'</option>';
        }
        $conn->close();
    }

    // Verifique se os parâmetros de consulta são diferentes
    if ($_SESSION['error'] === false || $_SESSION['id'] === false) {
        // Redirecione de volta para a mesma página com parâmetros de consulta
        header("Location: ../pages/mudarCadastroAluno.php");
        exit();
    }

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/importGeral.css">
    <link rel="stylesheet" href="../styles/mudarCadastro.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8/jquery.inputmask.min.js" integrity="sha512-efAcjYoYT0sXxQRtxGY37CKYmqsFVOIwMApaEbrxJr4RwqVVGw8o+Lfh/+59TU07+suZn1BWq4fDl5fdgyCNkw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Mudar Cadastro</title>
</head>
<body>
    <div class="container-mudar">
        <div class="container-form">
            <form action="../php/mudarCadastroSQL.php" method="POST" class="form-mudar-cadastro">
                <p class="paragrafo">Nome:</p>
                <input type="text" name="nome" placeholder="<?php echo $dadosAluno['Nome'];?>"><br>

                <p class="paragrafo">E-mail:</p>
                <input type="email" name="email" placeholder="<?php echo $dadosAluno['Email'];?>"><br>

                <p class="paragrafo">Senha:</p>
                <input type="text" name="senha" placeholder="<?php echo $dadosAluno['Senha'];?>"><br>

                <p class="paragrafo">CPF:</p>
                <input type="text" name="cpf" placeholder="<?php echo $dadosAluno['CPF'];?>" class="mask-cpf"><br>

                <p class="paragrafo">Data Nascimento: <?php echo $dadosAluno['Data-Nascimento'];?></p>
                <input type="date" name="data-nascimento"><br>

                <p class="paragrafo">Idade:</p>
                <input type="text" name="idade" placeholder="<?php echo $dadosAluno['Idade'];?>"><br>

                <p class="paragrafo">Telefone:</p>
                <input type="text" name="telefone" placeholder="<?php echo $dadosAluno['Telefone'];?>" class="mask-fone"><br>

                <p class="paragrafo">Endereço:</p>
                <input type="text" name="endereco" placeholder="<?php echo $dadosAluno['Endereco'];?>"><br>

                <p class="paragrafo">Assinatura:</p>
                <div class="div-select">
                    <select name="assinatura" id="appearance-select">
                        <?php getAssinaturas($conn);?>
                    </select><br>
                </div>
                <br>
                <input type="hidden" name="form-type" value="aluno">
                <button class="botao-cadastro" type="submit">Atualizar Cadastro</button>
                <p class="info-cadastro"></p>
            </form>
        </div>
    </div>
    <script src="../functions/mudarCadastro.js"></script>
</body>
</html>