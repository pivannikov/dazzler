<?php
declare(strict_types=1);
//ini_set('display_errors', '1');
//ini_set('display_startup_errors', '1');
//error_reporting(E_ALL);


spl_autoload_register(function (string $className) {
    require_once __DIR__ . '/classes/' . str_replace('\\', '/', $className) . '.php';
});

use Coffee\CoffeePull;
use Matrix\Matrix;

$matrix  = new Matrix(20, 20);
$grid = $matrix->generate();
$matrix->visualize($grid);

$coffee = new CoffeePull();
$result = $coffee->pullCount($grid);


$tetris_box = $result[1];
$total = $result[0];

$max = 0;
$position = 0;
for ($i = 0; $i < count($tetris_box); $i++) {
    if (isset($tetris_box[$i+1])) {
        if (($tetris_box[$i+1] - $tetris_box[$i]) > $max) {
            $max = $tetris_box[$i+1] - $tetris_box[$i];
            $position = $i+2;
        }
    }
}
echo 'Najväčšia kávová kaluž je s číslom ' . $position . '<br>';
echo 'Kaluž je veľká ' . $max . ' políčok' . '<br>';
echo 'Počet kaluží je: ' . $total . '<br>';



?>
<style>
    .table {
        width: 600px;
        margin-bottom: 20px;
        border: 1px solid #dddddd;
        border-collapse: collapse;
    }
    .table th {
        font-weight: bold;
        padding: 5px;
        background: #efefef;
        border: 1px solid #dddddd;
    }
    .table td {
        border: 1px solid #dddddd;
        padding: 5px;
    }
</style>
<script>
    let td = document.querySelectorAll('td');
    td.forEach((el) => {
        if (el.textContent == 1) {
            el.style.background = 'green'
        }
        el.addEventListener('click', () => {
            el.style.background = 'red'
        })
    })
</script>
