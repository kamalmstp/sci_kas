<?php

$target  = '/home/digipenk/public_html/kas/storage/app/public';
$link    = '/home/digipenk/public_html/kas/public/storage';

if(symlink($target, $link)){
    echo "Berhasil";
}else{
    echo "Gagal";
}

?>