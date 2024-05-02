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

// Função para obter parâmetros da URL
function obterParametroURL(nomeParametro) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.has(nomeParametro) ? urlParams.get(nomeParametro) : null;
}

// Verifica o status do cadastro assim que a página é carregada
document.addEventListener('DOMContentLoaded', function() {
    // Obter parâmetro 'status' da URL
    var cadastroStatus = obterParametroURL('status');
    var cpfCadastro = obterParametroURL('cpf_cadastrado');

    // Exibir mensagem com base no status do cadastro
    if (cadastroStatus === 'sucess') {
        document.querySelectorAll(".info-cadastro").forEach(info => {
            info.innerText = "Cadastrado!";
            info.style.color = "green";
        });
    
    // CPF cadastrado
    } else if (cadastroStatus === 'error' && cpfCadastro === 'true'){
        document.querySelectorAll(".info-cadastro").forEach(info => {
            info.innerText = "CPF já cadastrado!";
            info.style.color = "red";
        });

    // Erro algum campo errado
    } else if (cadastroStatus === 'error') {
        document.querySelectorAll(".info-cadastro").forEach(info => {
            info.innerText = "Erro ao cadastrar!";
            info.style.color = "red";
        });

    } else {
        document.querySelectorAll(".info-cadastro").forEach(info => {
            info.innerText = "";
        });
    }
});

// CPF/TELEFONE MASK
$(document).ready(function(){
	$('.mask-cpf').inputmask('999.999.999-99', { "placeholder": "___.___.___-__" });
});

$(document).ready(function(){
	$('.mask-fone').inputmask('(99) 99999-9999', { "placeholder": "(__) _____-____" });
});