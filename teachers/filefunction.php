<?php

function write_file(
    string $path,
    string $value
) {
    if (file_exists($path)) {
        $file=fopen($path,'a+');
        fwrite($file,$value);
        fclose($file);
    }
}
function getfile(string $path){
    if (file_exists($path)) {
        $file=file_get_contents($path);
        return $file;
    }
}
?>