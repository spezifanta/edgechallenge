<?php

require_once __DIR__ . '/bootstrap.php';


$tileSet = [
    new \Challenge\Tile('CYMk', 'A'),
    new \Challenge\Tile('CmKm', 'B'),
    new \Challenge\Tile('cKyM', 'C'),
    new \Challenge\Tile('cYkY', 'D'),
    new \Challenge\Tile('CMky', 'E'),
    new \Challenge\Tile('ckyM', 'F'),
    new \Challenge\Tile('CYMK', 'G'),
    new \Challenge\Tile('CMKy', 'H'),
    new \Challenge\Tile('Ckmy', 'I'),
];

$grid = new \Challenge\Grid(3);
$rules = new \Challenge\Rules($grid);

$i = 0;
foreach (permutations($tileSet) as $set) {
    $i++;
    $grid->reset();

    if ($i % 10000 == 0) {
        echo '.';
    }

    foreach ($set as $tile) {
        for ($j = 0; $j < 4; $j++) {
            if ($rules->isValid($tile)) {
                $grid->add($tile);
                break;
            } else {
                $tile->rotate();
            }
        }
    }

    if ($grid->isFull()) {
        break;
    }
}

printf("\nSolution\n\n");

foreach ($grid as $tile) {
    printf($tile . PHP_EOL);
}
