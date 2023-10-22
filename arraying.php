<?php

$array_1 = [4,5,6,7,"kazi", 8];
  echo $array_1[4]."<br>";// numbering index

$count=0;
for ($i = 0; $i<10; $i = $i + 1) {
$count = $count + $i;
  echo $count."<br>";
}
  echo $count."<br>"."<br>";
// Asscociative array

$asso1 = ["Serial"=>"3", "Name"=>"kazi", "Roll"=>"D232"];

foreach($asso1 as $key => $val ){
echo $key.'-'.$val."<br>";
}

echo '<br>';
foreach($asso1 as $key){
echo $key.'-'.$val."<br>";
}

echo "<br>";
for ($i = 4; $i<5; $i = $i + 1) {
  if ($i == 5) {
    break;
  } 
    echo $i."<br>";
}


?>
