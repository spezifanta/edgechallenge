<?php

require_once __DIR__ . '/bootstrap.php';

// start here

//$tileSet = [
//    new \Challenge\Tile('CYMk', 'A'),
//    new \Challenge\Tile('CmKm', 'B'),
//    new \Challenge\Tile('cKyM', 'C'),
//    new \Challenge\Tile('cYkY', 'D'),
//    new \Challenge\Tile('CMky', 'E'),
//    new \Challenge\Tile('ckyM', 'F'),
//    new \Challenge\Tile('CYMK', 'G'),
//    new \Challenge\Tile('CMKy', 'H'),
//    new \Challenge\Tile('Ckmy', 'I'),
//];

$tileSet = [
    $tile_a = new \Challenge\Tile('cmyk', 'A'),
    $tile_b = new \Challenge\Tile('MYkC', 'B'),
    $tile_c = new \Challenge\Tile('cYmk', 'C'),
    $tile_d = new \Challenge\Tile('MYKC', 'D'),
];

$grid = new \Challenge\Grid(2);
$rules = new \Challenge\Rules($grid);
//
//// algo starts here
//

//$a = permutations($tileSet);
$results = array();
computePermutations($tileSet, $results);


$totalRuns = count($results);

for ($i = 0; $i < $totalRuns || $grid->isFull(); $i++) {

    foreach ($results as $tileSet) {
        $i++;
        $grid->clean();
        printf('Turn ' . $i . PHP_EOL);

        foreach ($tileSet as $tile) {
            //printf("%s\n", $tile->getName());
            for ($j = 0; $j < 4; $j++) {
                if ($rules->isValid($tile)) {
                    //printf("Valid\n");
                    $grid->add($tile);
                    break;
                } else {
                    $tile->rotate();
                }
            }
        }

    }

}

printf('Solution');

foreach ($grid as $tile) {
    printf($tile . PHP_EOL);
}