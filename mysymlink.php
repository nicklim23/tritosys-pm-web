<?php
$targetFolder = $_SERVER['DOCUMENT_ROOT'].'/storage/app/public';
$linkFolder = $_SERVER['DOCUMENT_ROOT'].'/public/storage';

echo $targetFolder."<br>";
echo $linkFolder."<br>";
symlink($targetFolder,$linkFolder);
echo 'Symlink completed';