<?php

// // function write_file(
// //     string $path,
// //     string $value
// // ) {
// //     if (file_exists($path)) {
// //         $file=fopen($path,'a+');
// //         fwrite($file,$value);
// //         fclose($file);
// //     }
// // }

// function open_file(string $path)
// {
//     if (file_exists($path)) {
//         $file = fopen($path, 'a+');
//         return $file;
//     }
// }

// function write_file(string $path, string $value)
// {
//     fwrite($path, $value);
// }
// function close_file( string $path){
//     fclose($path);
// }

function putfile($path,$value){
    if(file_exists($path)){
        // die(var_dump($path));
        file_put_contents($path,$value);
    }
}
function getfile(string $path)
{
    if (file_exists($path)) {
        $file = file_get_contents($path);
        return $file;
    }
}
?>