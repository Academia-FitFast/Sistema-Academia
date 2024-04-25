const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const botaoCadastro = document.getElementById('botao-cadastro');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});

botaoCadastro.addEventListener('click', () => {
	// Verifica o valor da variável de sessão
	var cadastroStatus = "<?php echo isset($_SESSION['cadastro_status']) ? $_SESSION['cadastro_status'] : ''; ?>";

	// Exibe uma mensagem correspondente com base no valor da variável de sessão
	if (!cadastroStatus) {
		document.getElementById("info-cadastro").innerHTML = "Cadastrado!";
		document.getElementById("info-cadastro").style.color = "green";
	} else if (cadastroStatus) {
		document.getElementById("info-cadastro").innerText = "Erro ao cadastrar!";
		document.getElementById("info-cadastro").style.color = "red";
	}
})

// CPF MASK
$(document).ready(function(){
	$('#cpf').inputmask('999.999.999-99', { "placeholder": "___.___.___-__" });
});

$(document).ready(function(){
	$('#telefone').inputmask('(99) 99999-9999', { "placeholder": "(__) _____-____" });
});