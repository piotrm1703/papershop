<?php

$customer['0'] = 'Peter';
$customer['2'] = 'Michael';
$customer['1'] = 'Rudy';
$customer['5'] = 'Bob';
$customer['3'] = 'Ann';
$customer['4'] = 'Kinga';

$customer1['0'] = 'Piotrek';
$customer1['2'] = 'Michał';
$customer1['1'] = 'Ada';
$customer1['3'] = 'Paulina';
$customer1['5'] = 'Ania';
$customer1['4'] = 'Jacek';

//krsort($customer);
//array_splice($customer,-1,1,'Piotrek'); // wycina i zamienia wartość
//krsort($customer);
//$customer['2'] = 'nowa wartość'; // replace jak znam klucz

$reversed = array_reverse($customer,true);
print_r($reversed);
echo '<br>';

ksort($customer1);
$slice = array_slice($customer1,1,-1,true);

$lastitem = end($slice);
echo $lastitem;
echo '<br>';

foreach ($slice as $key => $name) {
    echo $key . ' ' . $name;
    echo '<br>';
}

echo '<br>';
foreach ($customer as $key => $name){
    echo $key.' '.$name;
    echo '<br>';
}

if(array_key_exists('1',$slice)) {
    echo $slice[1];
    echo '<br>'.'<br>';
}
else{
    echo 'brak klucza w tablicy';
    echo '<br>'.'<br>';
}
ksort($customer);
$replace = array_search('Ada',$slice);
$slice[$replace] = 'Ada2';
$arraymerge = array_merge($customer,$slice);

echo '<br>';
foreach ($arraymerge as $key => $name){
    echo $key.' '.$name;
    echo '<br>';
}

echo '<br>';


$tablica = array(2,4,8,16,32,64);
$arrcount = count($tablica);
for($x = 0; $x < $arrcount; $x++){
    echo $tablica[$x];
    echo '<br>';
}
echo '<br>';
var_dump($tablica)
;
for($x=0;$x<$arrcount; $x++){
    $tablica[$x] *=2;
}
for($x=0;$x<$arrcount; $x++){
    echo $tablica[$x];
    echo '<br>';
}

var_dump($tablica);

function dodawanie($a,$b){
    return ($a + $b);
}
echo dodawanie(2,3);