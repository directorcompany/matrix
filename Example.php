<?php

// Подключаем необходимые файлы
require_once './Matrix.php';
require_once './MatrixAddition.php';
require_once './MatrixSubtraction.php';

?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Операции с матрицами</title>
    <!-- Подключаем Bootstrap через CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJ2Q6mD2M8S3a28kcL5F31FzAikHfn6K2fFf0/z5y1GoKbHzD0dYJ8eP28bD" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Операции с матрицами</h1>

        <?php
        try {
            // Создаем две матрицы
            $matrix1 = new Matrix([
                [1, 2, 3],
                [4, 5, 6]
            ]);

            $matrix2 = new Matrix([
                [6, 5, 4],
                [3, 2, 1]
            ]);

            // Выводим первую матрицу
            echo "<h3>Матрица 1</h3>";
            echo '<table class="table table-bordered table-striped">';
            foreach ($matrix1->getData() as $row) {
                echo "<tr>";
                foreach ($row as $item) {
                    echo "<td>$item</td>";
                }
                echo "</tr>";
            }
            echo "</table>";

            // Выводим вторую матрицу
            echo "<h3>Матрица 2</h3>";
            echo '<table class="table table-bordered table-striped">';
            foreach ($matrix2->getData() as $row) {
                echo "<tr>";
                foreach ($row as $item) {
                    echo "<td>$item</td>";
                }
                echo "</tr>";
            }
            echo "</table>";

            // Сложение матриц с использованием стратегии
            $matrix1->setOperationStrategy(new MatrixAddition());
            $sumMatrix = $matrix1->executeOperation($matrix2);
            echo "<h3>Результат сложения</h3>";
            echo '<table class="table table-bordered table-success">';
            foreach ($sumMatrix as $row) {
                echo "<tr>";
                foreach ($row as $item) {
                    echo "<td>$item</td>";
                }
                echo "</tr>";
            }
            echo "</table>";

            // Вычитание матриц с использованием стратегии
            $matrix1->setOperationStrategy(new MatrixSubtraction());
            $subMatrix = $matrix1->executeOperation($matrix2);
            echo "<h3>Результат вычитания</h3>";
            echo '<table class="table table-bordered table-danger">';
            foreach ($subMatrix as $row) {
                echo "<tr>";
                foreach ($row as $item) {
                    echo "<td>$item</td>";
                }
                echo "</tr>";
            }
            echo "</table>";

        } catch (Exception $e) {
            // Обработка ошибок
            echo "<div class='alert alert-danger' role='alert'>Ошибка: " . $e->getMessage() . "</div>";
        }
        ?>

    </div>

    <!-- Подключаем Bootstrap JavaScript и необходимые скрипты -->
    <script src="https://cdn.jsdelivr.net/npm/
