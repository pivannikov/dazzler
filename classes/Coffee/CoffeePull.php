<?php

namespace Coffee;
class CoffeePull
{
    private static $tetris;
    public function pullCount($grid): array|null
    {
        if (empty($grid)) {
            return null;
        }

        $rows = count($grid);
        $cols = count($grid[0]);
        $countPull = 0;

        $tetris_box = [];

        for ($row = 0; $row < $rows; $row++) {
            for ($col = 0; $col < $cols; $col++) {
                if ($grid[$row][$col] == 1) {
                    $countPull++;
                    $count = $this->searchActiveNeighbors($grid, $row, $col);
                    $tetris_box[] = $count;
                }
            }
        }

        return [$countPull, $tetris_box];
    }

    public function searchActiveNeighbors(&$grid, $row, $col): int|bool
    {

        if ($row < 0 || $row >= count($grid) || $col < 0 || $col >= count($grid[0]) || $grid[$row][$col] == 0) {
            return false;
        }
        self::$tetris++;
        $grid[$row][$col] = 0;

        $neighbor_location = [
            [-1, 0],
            [1, 0],
            [0, -1],
            [0, 1],
            [-1, -1],
            [-1, 1],
            [1, -1],
            [1, 1]
        ];

        foreach ($neighbor_location as $location) {
            $newRow = $row + $location[0];
            $newCol = $col + $location[1];
            $this->searchActiveNeighbors($grid, $newRow, $newCol);
        }
        return self::$tetris;
    }


}
