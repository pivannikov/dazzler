<?php

namespace Matrix;
class Matrix
{
    public array $matrix = [];
    public int $rows;
    public int $columns;

    public function __construct(int $rows = 0, int $columns = 0)
    {
        $this->rows = $rows;
        $this->columns = $columns;
    }
    public function generate(): array
    {
        $this->matrix = [];
        for ($i = 0; $i < $this->rows; $i++) {
            for ($j = 0; $j < $this->columns; $j++) {
                $cell = (rand(1, 100) < 87) ? 0 : 1;
                $this->matrix[$i][$j] = $cell;
            }
        }
        return $this->matrix;
    }

    public function visualize($grid): void
    {
        $table = '<table class="table">';
        foreach ($grid as $row) {
            $tr = '<tr>';
            foreach ($row as $col) {
                $tr .= '<td>' . $col . '</td>';
            }
            $tr .= '</tr>';
            $table .= $tr;
        }
        $table .= '</table>';

        echo $table;
    }
}