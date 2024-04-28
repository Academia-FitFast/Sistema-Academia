const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');
const botoesCadastro = document.querySelectorAll('.botao-cadastro');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
	document.querySelectorAll(".info-cadastro").forEach(info => {
		info.innerText = "";
	});
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
	document.querySelectorAll(".info-cadastro").forEach(info => {
		info.innerText = "";
	});
});

botoesCadastro.forEach(botao => {
    botao.addEventListener('click', () => {
        // Verifica o valor da variável de sessão
        var cadastroStatus = document.getElementById('cadastroStatus').value;
        console.log(cadastroStatus);

        // Exibe uma mensagem correspondente com base no valor da variável de sessão
        if (cadastroStatus) {
            document.querySelectorAll(".info-cadastro").forEach(info => {
                info.innerText = "Cadastrado!";
                info.style.color = "green";
            });
        } else {
            document.querySelectorAll(".info-cadastro").forEach(info => {
                info.innerText = "Erro ao cadastrar!";
                info.style.color = "red";
            });
        }
    });
});

// CPF MASK
$(document).ready(function(){
	$('.mask-cpf').inputmask('999.999.999-99', { "placeholder": "___.___.___-__" });
});

$(document).ready(function(){
	$('.mask-fone').inputmask('(99) 99999-9999', { "placeholder": "(__) _____-____" });
});