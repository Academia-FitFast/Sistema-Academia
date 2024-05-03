document.getElementById('openCadastrar').addEventListener('click', function() {
    document.getElementById('iframeCadastro').style.display = 'block';
    document.getElementById('closeCadastrar').style.display = 'block'
    document.getElementById('openCadastrar').style.display = 'none'
});

document.getElementById('closeCadastrar').addEventListener('click', function() {
    document.getElementById('iframeCadastro').style.display = 'none';
    document.getElementById('closeCadastrar').style.display = 'none'
    document.getElementById('openCadastrar').style.display = 'block'
});