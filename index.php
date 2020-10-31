<?php
require_once 'Database.php';
require_once 'Generate.php';
require_once 'GenerateModel.php';




if (isset($_POST['db'])) {
  $dbName = $_POST['db'];
  $clsGenerate->GetTable($dbName);
  // $clsGenerateModel->GetTable($dbName);
  // copy("Image.php", "newfile/Image.php");
} else {
?>
  <form method="post">
    <input type="text" name="db" />
    <input type="submit" />
  </form>
<?php
}
?>