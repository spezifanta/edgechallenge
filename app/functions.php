<?php

/**
 * Generate all sorts of permutations of a given array.
 *
 * @param array $elements
 *
 * @return Generator weeee dont we love PHP 5.5 \o/
 *
 * @see http://stackoverflow.com/a/104436/3745311
 */
function permutations(array $elements)
{
    if (count($elements) <= 1) {
        yield $elements;
    } else {
        foreach (permutations(array_slice($elements, 1)) as $permutation) {
            foreach (range(0, count($elements) - 1) as $i) {
                $first = array_slice($permutation, 0, $i);
                $second = [$elements[0]];
                $third = array_slice($permutation, $i);

                yield array_merge($first, $second, $third);
            }
        }
    }
}