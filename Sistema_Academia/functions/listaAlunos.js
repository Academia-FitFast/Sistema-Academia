// Adiciona um evento de clique para mudar o aluno
document.querySelectorAll('.mudarAluno').forEach((btn) => {
    btn.addEventListener('click', (event) => {
        // Obtém o ID do aluno associado a este botão
        var idAluno = event.target.getAttribute("data-id");
        // Exibe um prompt de confirmação para o usuário de mudar o aluno
        if (confirm("Tem certeza que deseja modificar esse aluno?")) {
            window.location.href = "../pages/mudarCadastroAluno.php?id=" + idAluno;
        }
    });
});

// Adiciona um evento de clique de excluir aluno
document.querySelectorAll('.excluirAluno').forEach((btn) => {
    btn.addEventListener('click', (event) => {
        // Obtém o ID do aluno associado a este botão
        var idAluno = event.target.getAttribute("data-id");
        // Exibe um prompt de confirmação para o usuário antes de excluir o aluno
        if (confirm("Tem certeza que deseja excluir esse aluno?")) {
            if (confirm("TEM CERTEZA MESMO?")){
                window.location.href = "../php/excluirAluno.php?id=" + idAluno;
            }
        }
    });
});