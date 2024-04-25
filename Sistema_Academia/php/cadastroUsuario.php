<?php
require 'connectionSQL.php';

// Início sessão
session_start();

// Cadastro Aluno
function cadastrarAluno($conn){

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
        $_SESSION['cadastro-status'] = true;
    } else {
        $_SESSION['cadastro-status'] = false;
    }

    // Volta para a página
    header('Location: ../pages/listaUsuarios.html');
    exit;
}

// Cadastro Funcionário
function cadastrarFuncionario($conn){
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
        $_SESSION['cadastro-status'] = true;
    } else {
        $_SESSION['cadastro-status'] = false;
    }

    // Volta para a página
    header('Location: ../pages/listaUsuarios.html');
    exit;
}

// Verifica se existe um REQUEST
if(!empty($_POST)){
    if ($_POST['form-type'] === 'aluno') {
        cadastrarAluno($conn);
    } elseif ($_POST['form-type'] === 'funcionario') {
        cadastrarFuncionario($conn);
    }
}

// Fecha conexão
$conn->close();