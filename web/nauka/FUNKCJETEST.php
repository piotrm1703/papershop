<?php

function add($a,$b){
    $c=$a+$b;
    return $c;
}

function sub($a,$b){
    $c = $a-$b;
    return $c;
}

function multi($a, $b){
    $result = $a*$b;
    return $result;
}

function div($a,$b){
    if($b ==0){
        return 'Nie można dzielić przez 0!!!';
    }
    else{
        $c= $a/$b;
        return $c;
    }

}

$a= add(2,4);
$b = sub($a,2);
echo $a.' '.$b;
echo '<br>';


function math($a,$b)
{
    if ($b == 0) {
        return 'Nie można dzielić przez 0!!!';
    } else {
        $c = add($a, $b);
        $d = sub($a, $b);
        $e = multi($a, $b);
        $f = div($a, $b);
        return multi($c, $d) / div($e, $f);
    }
}
echo math(6,3);

