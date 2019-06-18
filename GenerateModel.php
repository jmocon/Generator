<?php
$clsGenerateModel = new GenerateModel();

class GenerateModel{

  private $db = '';

	public function __construct(){}

  public function GetTable($database){

    $this->db = $database;
		$Database = new Database();
		$conn = $Database->GetConn();

    $sql = "SHOW TABLES FROM $database";
    $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

    while ($row = mysqli_fetch_array($result)) {
      $this->GetColumn($row[0]);
    }
    mysqli_close($conn);
  }

  public function GetColumn($table){
    $tbl = '';
    $txt = '';
    $Database = new Database($this->db);
    $conn = $Database->GetConn();

    $sql = "SHOW COLUMNS FROM $table";
    $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

    while ($row = mysqli_fetch_array($result)) {
      if ($tbl == '') {
        $temptbl = preg_replace('/_Id$/', '', $row['Field']);
        if ($table == strtolower($temptbl)) {
          $tbl = $temptbl;
          $txt .= "<?php\n";
          $txt .= "\$mdl$tbl = new "."$tbl"."Model();\n";
          $txt .= "class "."$tbl"."Model{\n";
          $txt .= "\n";
        }
      }else {
      }
        // echo "Column: {$row[0]}<br />";
    }
    mysqli_close($conn);
    $txt .= $this->get_getsql_set($result,$tbl);

    $txt .= "}\n";
    if ($tbl == '') {
      echo "Model for Table ".$table." was not created due to naming of columns was not the same<br />";
    }else{
      $this->CreateFile($tbl,$txt);
    }
  }

  public function CreateFile($tbl,$txt){
    $myfile = fopen("newfile/".$tbl."Model.php", "w") or die("Unable to open file!");
    fwrite($myfile, $txt);
    fclose($myfile);
  }

  public function get_getsql_set($result,$tbl){
    $txt = '';
    $strlen = strlen($tbl) + 1;

    foreach ($result as $key => $value) {
        if (substr($value['Field'],0,$strlen) == ($tbl."_")){
          $strchar = substr($value['Field'],$strlen);
          $txt .= "\tprivate $".$strchar." = \"\";\n";
        }else {
          $txt .= "\tprivate $".$value['Field']." = \"\";\n";
        }
    }

    $txt .= "\n";
    $txt .= "\tpublic function __construct(){}\n";
    $txt .= "\n";


      foreach ($result as $key => $value) {
        // $strchar = ltrim($value['Field'],$tbl.'_');

        $prefix = $tbl.'_';
        $strchar = $value['Field'];
        if (substr($strchar, 0, strlen($prefix)) == $prefix) {
          $strchar = substr($strchar, strlen($prefix));
        }
          $txt .= "\t//".$strchar."\n";
          $txt .= "\tpublic function get".$strchar."(){\n";
          $txt .= "\t\treturn \$this->".$strchar.";\n";
          $txt .= "\t}\n";
          $txt .= "\n";

          $txt .= "\tpublic function getsql".$strchar."(){\n";
          $txt .= "\t\t\$Database = new Database();\n";
          $txt .= "\t\t\$conn = \$Database->GetConn();\n";
          $txt .= "\t\t\$value = mysqli_real_escape_string(\$conn,\$this->".$strchar.");\n";
          $txt .= "\t\tmysqli_close(\$conn);\n";
          $txt .= "\t\treturn \$value;\n";
          $txt .= "\t}\n";
          $txt .= "\n";

          $txt .= "\tpublic function set".$strchar."($".$strchar."){\n";
          $txt .= "\t\t\$this->".$strchar." = $".$strchar.";\n";
          $txt .= "\t}\n";
          $txt .= "\n";
          $txt .= "\n";

      }

    return $txt;
  }

}
?>
