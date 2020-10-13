<?php
$input_line = 'play';
var_dump(mb_substr($input_line, -1));
var_dump(substr($input_line, -2));
var_dump(str_replace('y', 'ies', $input_line));
echo PHP_EOL;
// 末尾の2文字がshもしくはchの場合
// if(mb_substr($input_line, -2) === 'sh' || 'ch'){
//     echo "{$input_line}es";
//     echo PHP_EOL;
// // // 末尾の1文字がs,o,xの場合
// } elseif (mb_substr($input_line, -1) === 's' || 'o' || 'x') {
//     echo "{$input_line}es";
//     echo PHP_EOL;
// } elseif(mb_substr($input_line, -1) === 'f') {
//     $result = str_replace('f', 'es', $input_line);
//     echo "{$input_line}";
//     echo PHP_EOL;
// } elseif(mb_substr($input_line, -2) === 'fe') {
//     $result = str_replace('fe', 'es', $input_line);
//     echo "{$input_line}";
//     echo PHP_EOL;

 if(mb_substr($input_line, -1) === 'y' && (substr($input_line, -2) !== 'a'|| 'i' || 'u' || 'e' || 'o')) {
    $result = str_replace('y', 'ies', $input_line);
    echo "{$result}";
    echo PHP_EOL;
}else{
    echo "{$input_line}s";
    echo PHP_EOL;

}
?>