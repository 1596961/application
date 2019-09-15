<?php
$string="abcdef";
function punjabi_alternate($string) {
    $len = mb_strlen($string);
    $sploded = array(); 
    while($len-- > 0) {
        $sploded[$len] = mb_substr($string, $len, 1); 
    }
    ksort($sploded);
    $len = mb_strlen($string);
    for ($i=0; $i < $len; $i++) {
        if( strcmp($sploded[$i], "b") == 0){
            $temp = $sploded[$i];
            $sploded[$i] = $sploded[$i-1];
            $sploded[$i-1] = $temp;
        }
		else if( strcmp($sploded[$i], "c") == 0){
            $temp = $sploded[$i];
            $sploded[$i] = $sploded[$i-1];
            $sploded[$i-1] = $temp;
        }
		else if( strcmp($sploded[$i], "d") == 0){
            $temp = $sploded[$i];
            $sploded[$i] = $sploded[$i-1];
            $sploded[$i-1] = $temp;
        }
		else if( strcmp($sploded[$i], "f") == 0){
            $temp = $sploded[$i];
            $sploded[$i] = $sploded[$i-1];
            $sploded[$i-1] = $temp;
        }
    } 
    return join('', $sploded);
}
echo punjabi_alternate($string);
?>