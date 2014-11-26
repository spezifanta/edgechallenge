# Edge Matching Challenge

Found this challenge on Reddit. I use to hate those card games when I was a kid.
It might be time for a retry solving it by using something I hate event more - PHP.


PHP, you ask? I combined this challenge with an extra to see how long it would
take me to setup a new PHP project using composer and PHPUnit.

http://www.reddit.com/r/dailyprogrammer/comments/2ip1gj/10082014_challenge_183_intermediate_edge_matching


## Install

```composer install```


## Run Challenge

```php -d memory_limit=-1 app/challenge.php```


## Test

```bin/phpunit --bootstrap app/bootstrap.php --colors ./tests```


## Solutions found
```
 *  I(N)Ckmy
 *  H(E)yCMK
 *  D(W)YkYc
 *  C(E)McKy
 *  F(S)yMck
 *  E(S)kyCM
 *  G(S)MKCY
 *  A(N)CYMk
 ```
 ```
 *  D(S)kYcY
 *  F(E)Mcky
 *  A(W)YMkC
 *  H(N)CMKy
 *  B(S)KmCm
 *  G(E)KCYM
 *  I(W)kmyC
 *  C(N)cKyM
 *  E(E)yCMk
 ```