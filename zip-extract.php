<?php

$file = 'test.zip';

$zip = new ZipArchive;

if ($zip->open($file) === true) {

    for ($i = 0; $i < $zip->numFiles; $i++) {
        $filename = $zip->getNameIndex($i);
        copy("zip://".$file."#".$filename, $filename);
    }

    $zip->close();
}