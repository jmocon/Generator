<?php
require_once 'Database.php';
require_once 'Generate.php';
require_once 'GenerateModel.php';


$dbName = 'phproperty';

$clsGenerate->GetTable($dbName);
$clsGenerateModel->GetTable($dbName);

copy("Image.php","newfile/Image.php");
?>