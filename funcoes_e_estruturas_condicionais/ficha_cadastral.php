<?php
$name = 'João Silva';
$age = 25;
$sex = 'M';
$monthSalary = 2210.30;
$annualSalary = $monthSalary * 12;
$isEmployment = false;
$portfolioTime = 63;
$skills = ['PHP', 'JavaScript', 'HTML', 'CSS'];

$yearsUntilRetirement = 0;

if ($sex == 'M' && $portfolioTime <= 65) {
    $yearsUntilRetirement = 65 - $portfolioTime;
} elseif ($sex == 'F' && $portfolioTime <= 62) {
    $yearsUntilRetirement = 62 - $portfolioTime;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explorando Variáveis em PHP</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .card {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 400px;
            text-align: center;
        }

        h1 {
            color: #333;
        }

        p {
            color: #666;
            font-size: 1.1em;
        }

        strong {
            color: #000;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <h1>Ficha Cadastral</h1>
            <p>Nome: <strong><?= $name ?></strong></p>
            <p>Idade: <strong><?= $age ?></strong></p>
            <p>Sexo: <strong><?= $sex ?></strong></p>
            <p>Salário Mensal: <strong>R$ <?= number_format($monthSalary, 2, ',', '.') ?></strong></p>
            <p>Salário Anual: <strong>R$ <?= number_format($annualSalary, 2, ',', '.') ?></strong></p>
            <p>Status de Emprego:
                <strong>
                    <?= $isEmployment ? 'Empregado' : 'Desempregado' ?>
                </strong>
            </p>
            <p>Tempo de carteira assinada: <strong><?= $portfolioTime ?> anos</strong></p>
            <p>Anos para Aposentadoria:
                <strong>
                    <?=
                    $yearsUntilRetirement ? $yearsUntilRetirement : 'Parabéns! você já pode se aposentar'
                    ?>
                </strong>
            </p>
            <p>Habilidades: <strong><?= implode(', ', $skills) ?></strong></p>
        </div>
    </div>
</body>

</html>