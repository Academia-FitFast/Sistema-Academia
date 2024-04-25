<?php
require 'connectionSQL.php';

// Cadastro Aluno
function cadastrarAluno(){
    // ATRIBUTOS
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $data_nascimento = $_POST['data-nascimento'];
    // Gera senha com base na data de nascimento
    $senha_inicial = date('dmY', strtotime($data_nascimento));
    $idade = $_POST['idade'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];

    // SQL QUERY
    $sql = "INSERT INTO tb_alunos(Nome, Email, Senha, CPF, Data_Nascimento, Idade, Telefone, Endereco)
            VALUES ('$nome', '$email', '$senha_inicial', '$cpf', '$data_nascimento', $idade, '$telefone', '$endereco')";

    // Verifica se a QUERY está certa
    if ($conn->query($sql)){
        echo "Aluno cadastrado!";
    } else {
        echo "Aluno não cadastrado!";
    }
}

// Cadastro Funcionário
function cadastrarFuncionario(){
    // ATRIBUTOS
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    // RGM de 8 digitos aleatório
    $rgm = rand(10000000, 99999999);
    $data_nascimento = $_POST['data-nascimento'];
    // Gera senha com base na data de nascimento
    $senha_inicial = date('dmY', strtotime($data_nascimento));
    $idade = $_POST['idade'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $salario = $_POST['salario'];
    $cargo = $_POST['cargo'];

    // SQL QUERY
    $sql = "INSERT INTO tb_funcionarios(Nome, Email, Senha, CPF, RGM, Data_Nascimento, Idade, Telefone, Endereco, Salario, Cargo)
            VALUES ('$nome', '$email', '$senha_inicial', '$cpf', '$rgm', '$data_nascimento', $idade, '$telefone', '$endereco', $salario, '$cargo')";

    // Verifica se a QUERY está certa
    if ($conn->query($sql)){
        echo "Funcionário cadastrado!";
    } else {
        echo "Funcionário não cadastrado!";
    }
}

// Verifica se o form não está vazio
if(!empty($_POST)){
    if (isset($_POST['form-funcionario'])){
        cadastrarFuncionario();
    } else if (isset($_POST['form-aluno'])){
        cadastrarAluno();
    }
}

// Fecha conexão
$conn->close();