<?php

class Matrix
{
    private $data;

    // Стратегия для выполнения операции
    private $operationStrategy;

    // Конструктор, принимает данные матрицы
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    // Метод для установки стратегии операции (сложение, вычитание)
    public function setOperationStrategy(MatrixOperationInterface $operationStrategy)
    {
        $this->operationStrategy = $operationStrategy;
    }

    // Метод для получения данных матрицы
    public function getData(): array
    {
        return $this->data;
    }

    // Метод для выполнения операции с другой матрицей
    public function executeOperation(Matrix $otherMatrix): array
    {
        return $this->operationStrategy->execute($this->data, $otherMatrix->getData());
    }

    // Метод для вывода матрицы
    public function display(): void
    {
        foreach ($this->data as $row) {
            echo implode(' ', $row) . "\n";
        }
    }
}

?>
