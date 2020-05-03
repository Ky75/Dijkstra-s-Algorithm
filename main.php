<?php
/**
***
***     ****
***  ****
*** **
*****      ***Gonna make it better later***
*******
***   **
***    ****
***      ****

**/

function Dijkstra($array, $start, $target) {
  //removing the useless items :D
  for($i=0; $i<$start; $i++){
    unset($array[$i]);
  }

  $cost = []; //cost array to match it and find out the shortest way
  $path = []; //path array just to insert the path (way)

  if(in_array($target, $array)){ //Check if its in the main array
    return array_search($target, $array);
  }else{
    for($i=0; $i<count($array); $i++){ //fetch all of the arraies
      $cost[$i] = $i;
      $path[$i] = "$i";

      if(in_array($target, $array[$i])){
        $cost[$i] += array_search($target, $array[$i]);
        $path[$i] .= " > ".array_search($target, $array[$i]);
      }else{
        unset($cost[$i]);
        unset($path[$i]);
      }
    }

    $easiest_way = array_search(min($cost), $cost);

    return [$easiest_way, $path[$easiest_way]];
  }
}


$array = [
  [2,3,435,6,5,67,2],
  [2,4,5,8,9,1,3],
  [3,5,7,2],
  [3,25,6,2,3],
  [4,3,2,56],
  [0,9,5,2,7,1,8]
];

$start = 0;
$target = 4;

$shortestway = Dijkstra($array, $start, $target);


echo 'the choosen array: '.$shortestway[0];
echo "\n";
echo 'The shortest path: '.$shortestway[1];