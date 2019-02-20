<?php
require_once 'Database.php';
require_once 'Generate.php';
require_once 'GenerateModel.php';


$dbName = 'designbuild3';

$clsGenerate->GetTable($dbName);
$clsGenerateModel->GetTable($dbName);

copy("Image.php","newfile/Image.php");
?>
