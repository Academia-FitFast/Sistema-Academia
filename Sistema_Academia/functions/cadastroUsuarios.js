const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});

// CPF MASK
$(document).ready(function(){
	$('#cpf').inputmask('999.999.999-99', { "placeholder": "___.___.___-__" });
});

$(document).ready(function(){
	$('#telefone').inputmask('(99) 99999-9999', { "placeholder": "(__) _____-____" });
});