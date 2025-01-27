<?php

class MatrixSubtraction implements MatrixOperationInterface
{
    public function execute(array $matrix1, array $matrix2): array
    {
        // Проверка на одинаковые размеры матриц
        if (count($matrix1) !== count($matrix2) || count($matrix1[0]) !== count($matrix2[0])) {
            throw new Exception("Матрицы должны быть одинакового размера.");
        }

        $result = [];
        for ($i = 0; $i < count($matrix1); $i++) {
            for ($j = 0; $j < count($matrix1[0]); $j++) {
                $result[$i][$j] = $matrix1[$i][$j] - $matrix2[$i][$j];
            }
        }

        return $result;
    }
}

?>
