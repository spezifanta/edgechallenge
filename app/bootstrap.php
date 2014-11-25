<?php

require_once  __DIR__ . '/../vendor/autoload.php';

function pc_permute($items, $perms = array( )) {
    if (empty($items)) {
        //print join(' ', $perms) . "\n";
        return $perms;
    }  else {
        for ($i = count($items) - 1; $i >= 0; --$i) {
            $newitems = $items;
            $newperms = $perms;
            list($foo) = array_splice($newitems, $i, 1);
            array_unshift($newperms, $foo);
            pc_permute($newitems, $newperms);
        }
    }
}

function computePermutations(&$array, &$results, $start_i = 0) {
    if ($start_i == sizeof($array)-1) {
        array_push($results, $array);
    }
    for ($i = $start_i; $i<sizeof($array); $i++) {
        //Swap array value at $i and $start_i
        $t = $array[$i]; $array[$i] = $array[$start_i]; $array[$start_i] = $t;

        //Recurse
        computePermutations($array, $results, $start_i+1);

        //Restore old order
        $t = $array[$i]; $array[$i] = $array[$start_i]; $array[$start_i] = $t;
    }
}





function permutations(array $elements)
{

    if (count($elements) <= 1) {
        yield $elements;
    }

    else {
        foreach (permutations(array_slice($elements, 1)) as $perm) {
            foreach (range(0, count($elements) - 1) as $i) {
                echo "IIIIIIIIIIIIII$i";
                $first = array_slice($perm, 0, $i);
               // $second = [$elements[0]];
                $second = array_slice($elements, 0, 1);
                //$second = [];
                //var_dump($second);
                $thid = array_slice($perm, $i);

                $thid = [];
               yield array_merge($first,  $second , $thid);
            }
        }
    }

//    if len(elements) <=1:
//        yield elements
//    else:
//        for perm in all_perms(elements[1:]):
//            for i in range(len(elements)):
//                # nb elements[0:1] works in both string and list contexts
//                yield perm[:i] + elements[0:1] + perm[i:]
}