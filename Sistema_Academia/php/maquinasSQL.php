<?php
require_once 'connectionSQL.php';

$conn = (new connectionDB())->conectaDB();

// Consulta SQL para obter os alunos
$sql = "SELECT tb_equipamentos.*, tb_condicao_equip.condicao
        FROM tb_equipamentos
        JOIN tb_condicao_equip ON tb_equipamentos.Condicao_equip = tb_condicao_equip.ID_condicao_pk
        ORDER BY tb_equipamentos.ID_equipamento_pk";

// Verifica se a query esta certa e possui resultados
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Exibe os dados dos alunos
    while($row = $result->fetch_assoc()) {
        if ($row['Nome'] === 'Esteira'){
            echo '
            <div class="card">
                <div class="dropdown">
                <button class="dropbtn"><i class="fa-solid fa-ellipsis-vertical fa-lg"></i></button>
                <div class="dropdown-content">
                    <p onclick="displayDisponivel(`'. $row["ID_equipamento_pk"] . '`)">Disponível</p>
                    <p onclick="displayManutencao(`'. $row["ID_equipamento_pk"] . '`)">Manutenção</p>
                    <p onclick="displayQuebrado(`'. $row["ID_equipamento_pk"] . '`)">Quebrado</p>
                </div>
                </div>
                <div class="card-img"><i class="fa-solid fa-person-running fa-2xl"></i></div>
                <div class="card-info">
                    <p class="text-title">'. $row['Nome'] .' '. $row['ID_equipamento_pk'] . '</p>
                    <p id="'. $row["ID_equipamento_pk"] .'">'. $row["condicao"] .'</p>
                </div>
            </div>
            ';

        } else if ($row['Nome'] === 'Bicicleta'){
            echo '
            <div class="card">
                <div class="dropdown">
                <button class="dropbtn"><i class="fa-solid fa-ellipsis-vertical fa-lg"></i></button>
                <div class="dropdown-content">
                    <p onclick="displayDisponivel(`'. $row["ID_equipamento_pk"] . '`)">Disponível</p>
                    <p onclick="displayManutencao(`'. $row["ID_equipamento_pk"] . '`)">Manutenção</p>
                    <p onclick="displayQuebrado(`'. $row["ID_equipamento_pk"] . '`)">Quebrado</p>
                </div>
                </div>
                <div class="card-img"><i class="fa-solid fa-person-biking fa-2xl"></i></div>
                <div class="card-info">
                    <p class="text-title">'. $row['Nome'] .' '. $row['ID_equipamento_pk'] . '</p>
                    <p id="'. $row["ID_equipamento_pk"] .'">'. $row["condicao"] .'</p>
                </div>
            </div>
            ';
        }
    }
} else {
    echo "Nenhum equipamento encontrado.";
}

// Fecha a conexão
$conn->close();