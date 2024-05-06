function displayDisponivel(id) {
  var paragraph = document.getElementById(id);
  var newName = "Disponível"
  paragraph.textContent = newName;
  window.location.href = "../php/mudarCondicaoEquip.php?id=" + id + "&condicao=" + 1;
}

function displayManutencao(id){
  var paragraph = document.getElementById(id);
  var newName = "Manutencao"
  paragraph.textContent = newName;
  window.location.href = "../php/mudarCondicaoEquip.php?id=" + id + "&condicao=" + 2;
}

function displayQuebrado(id) {
  var paragraph = document.getElementById(id);
  var newName = "Quebrado"
  paragraph.textContent = newName;
  window.location.href = "../php/mudarCondicaoEquip.php?id=" + id + "&condicao=" + 3;
}