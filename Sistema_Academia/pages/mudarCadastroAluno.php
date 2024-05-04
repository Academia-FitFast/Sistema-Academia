<?php
    require '../php/connectionSQL.php';

    function getID($conn){
        // Obtém a URL atual
        $url = $_SERVER['REQUEST_URI'];
        
        // Analisa a URL para obter os componentes
        $parts = parse_url($url);
        
        // Obtém os parâmetros da query string, se houver
        $queryParams = [];
        if (isset($parts['query'])) {
            parse_str($parts['query'], $queryParams);
        }

        // Verifica se existe um parâmetro 'id' na query string
        if (isset($queryParams['id'])) {
            $id = $queryParams['id'];

            // Escapa o ID para evitar injeção de SQL
            $escaped_id = $conn->real_escape_string($id);

            // // Query SQL para mudar dados do aluno
            // $result = $conn->query("UPDATE tb_alunos SET '$coluna' = '$dado' WHERE ID_usuarios_pk = '$escaped_id'");

            // // Verifica se a consulta foi bem-sucedida
            // if ($result) {
            //     echo "Aluno alterado com sucesso.";
            // } else {
            //     echo "Ocorreu um erro ao alterar o aluno.";
            // }
            return $escaped_id;
        } else {
            echo "A URL não contém um parâmetro 'id'.";
        }
    }

    function getDadosAluno($conn, $id){
        $result = $conn->query("SELECT tb_alunos.*, tb_assinatura.Plano
                                FROM tb_alunos
                                JOIN tb_assinatura
                                ON tb_alunos.Plano_Adesao = tb_assinatura.ID_ASSINATURA_PK
                                WHERE ID_usuarios_pk = '$id'");

        // Array com dados
        $dados = array();
        if ($result->num_rows > 0) {
            // Se houver pelo menos uma linha de resultado
            $row = $result->fetch_assoc();
            // Armazena os dados do aluno na matriz $dados
            $dados['Nome'] = $row['Nome'];
            $dados['Email'] = $row['Email'];
            $dados['Senha'] = $row['Senha'];
            $dados['CPF'] = $row['CPF'];
            $dados['Data-Nascimento'] = $row['Data_nascimento'];
            $dados['Idade'] = $row['Idade'];
            $dados['Telefone'] = $row['Telefone'];
            $dados['Endereco'] = $row['Endereco'];
            $dados['Assinatura'] = $row['Plano'];
            // Adicione outros campos conforme necessário
        } else {
            // Se não houver resultados, define $dados como nulo ou retorna uma mensagem de erro
            $dados = null;
            echo "Dados não encontrados!";
        }
        return $dados;
    }

    function getAssinaturas($conn){
        $result = $conn->query("SELECT *
                                FROM tb_assinatura");

        $planos = array();
        if ($result->num_rows > 0){
            // Se houver pelo menos uma linha de resultado
            while($row = $result->fetch_assoc()) {
                $planos[] = $row['Plano'];
            }
        } else {
            echo "Planos não encontrados!";
            $planos = null;
        }

        // Percorre todos os planos
        foreach ($planos as $plano){
            echo '<option value="'. $plano .'">'. $plano .'</option>';
        }
    }
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/importGeral.css">
    <title>Mudar Cadastro</title>
</head>
<body>
    <form action="../php/mudarCadastroSQL.php" method="POST" class="Form-MudarAluno">
        <label for="nome"><?php echo getDadosAluno($conn, getID($conn))['Nome'];?></label><br>
        <input type="text" id="nome" value=""><br>

        <label for="email"><?php echo getDadosAluno($conn, getID($conn))['Email'];?></label><br>
        <input type="email" id="email" value=""><br>

        <label for="senha"><?php echo getDadosAluno($conn, getID($conn))['Senha'];?></label><br>
        <input type="text" id="senha" value=""><br>

        <label for="cpf"><?php echo getDadosAluno($conn, getID($conn))['CPF'];?></label><br>
        <input type="text" id="cpf" value=""><br>

        <label for="data-nascimento"><?php echo getDadosAluno($conn, getID($conn))['Data-Nascimento'];?></label><br>
        <input type="date" id="data-nascimento" value=""><br>

        <label for="idade"><?php echo getDadosAluno($conn, getID($conn))['Idade'];?></label><br>
        <input type="number" id="idade" value=""><br>

        <label for="telefone"><?php echo getDadosAluno($conn, getID($conn))['Telefone'];?></label><br>
        <input type="tel" id="telefone" value=""><br>

        <label for="endereco"><?php echo getDadosAluno($conn, getID($conn))['Endereco'];?></label><br>
        <input type="text" id="endereco" value=""><br>

        <label for="assinatura"><?php echo getDadosAluno($conn, getID($conn))['Assinatura'];?></label><br>
        <select name="assinaturas" id="assinaturas">
            <?php getAssinaturas($conn);?>
        </select><br>
        <br>
        <button type="submit" id="atualizarCadastro">Atualizar Cadastro</button>
    </form>
</body>
</html>