<?php
$string = "101010100100100101001011";

$string2 = substr(chunk_split($string, 2," "), 0, -1);

    // $string = str_split($string, 2);  // this is a array of strings with lenght 4
    // var_dump($string); 
echo $str = $string2;


// for ($i=0; $i<strlen($str); $i++){
// 	echo $i++;
//     if ($str[$i] == '10'){
//         $str[$i] = '&';
//     }
// }
// echo $str;
// echo str_replace(" ","-",str_replace("&","","I like Tea&Coffee"));


echo "<br/>";
// echo str_replace("10","A",str_replace("11","g",$str));


echo $rep = str_replace("00","A",str_replace("11","G",str_replace("10","C",str_replace("01","T",$str))));
echo '<br/>';

echo $final_dna = str_replace(' ', '', $rep);
echo "<br/>";

echo"exclusive or converted<br/>". $xor = str_replace("A","00",str_replace("G","11",str_replace("C","10",str_replace("T","01",$final_dna))));
echo "<br/>";
echo $string;

?>