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

/**
 * Solutions
 *
 *  I(N)Ckmy
 *  H(E)yCMK
 *  D(W)YkYc
 *  C(E)McKy
 *  F(S)yMck
 *  E(S)kyCM
 *  G(S)MKCY
 *  A(N)CYMk
 *
 *  D(S)kYcY
 *  F(E)Mcky
 *  A(W)YMkC
 *  H(N)CMKy
 *  B(S)KmCm
 *  G(E)KCYM
 *  I(W)kmyC
 *  C(N)cKyM
 *  E(E)yCMk
 */

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
