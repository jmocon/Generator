<?php
$clsGenerate = new Generate();

class Generate{

  private $db = '';
  private $hasStatus = false;

	public function __construct(){}

  public function GetTable($database){

    $this->db = $database;
		$Database = new Database();
		$conn = $Database->GetConn();

    $sql = "SHOW TABLES FROM $database";
    $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

    while ($row = mysqli_fetch_array($result)) {
        // echo "Table: {$row[0]}<br />";
        $this->GetColumn($row[0]);
    }
    mysqli_close($conn);
    echo "Classes Done <br />";

  }

  public function GetColumn($table){
    $tbl = '';
    $txt = '';
    $this->hasStatus=false;
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
          $txt .= "require_once (\"".$tbl."Model.php\");\n";
          $txt .= "\$cls$tbl = new $tbl();\n";
          $txt .= "class $tbl{\n";
          $txt .= "\n";
          $txt .= "\tprivate \$table = \"$table\";\n";
          $txt .= "\n";
          $txt .= "\tpublic function __construct(){}\n";
          $txt .= "\n";
        }
      }
    }
    mysqli_close($conn);

    $txt .= $this->Add($result,$tbl);
    $txt .= $this->Update($result,$tbl);
    $txt .= $this->Delete($tbl);
    $txt .= $this->IsExist($result,$tbl);
    $txt .= $this->Get($result,$tbl);
    $txt .= "}\n";

    $this->CreateFile($tbl,$txt);

  }

  public function CreateFile($tbl,$txt){

    $myfile = fopen("newfile/".$tbl.".php", "w") or die("Unable to open file!");
    fwrite($myfile, $txt);
    fclose($myfile);

  }

  public function Add($result,$tbl){
    $txt = '';
    $txt .= "\tpublic function Add(\$mdl){\n";
    $txt .= "\n";
    $txt .= "\t\t\$Database = new Database();\n";
    $txt .= "\t\t\$conn = \$Database->GetConn();\n";
    $txt .= "\t\t\$sql = \"INSERT INTO `\".\$this->table.\"`\n";
    $txt .= "\t\t\t(\n";

    $ex = array($tbl."_Id",$tbl."_DateCreated",$tbl."_Status");

    $count = 0;
    foreach ($result as $key => $value) {

      if ($value['Field']==$tbl."_Status"){
        $this->hasStatus=true;
      }
      if(!in_array($value['Field'],$ex)){
        $count++;
        if ($count > 1) {
          $txt .= ",\n";
        }
        $txt .= "\t\t\t\t`".$value['Field']."`";
      }
    }

    $txt .= "\n";
    $txt .= "\t\t\t) VALUES (\n";
    $count = 0;
    foreach ($result as $key => $value) {
      if(!in_array($value['Field'],$ex)){
        $count++;
        if ($count > 1) {
          $txt .= ",\n";
        }
        $strchar = str_replace($tbl.'_',"",$value['Field']);
        $txt .= "\t\t\t\t'\".\$mdl->getsql$strchar().\"'";
      }
    }

    $txt .= "\n";
    $txt .= "\t\t\t)\";\n";
    $txt .= "\t\t\$result=mysqli_query(\$conn,\$sql) or die(mysqli_error(\$conn));\n";
    $txt .= "\t\t\$id = mysqli_insert_id(\$conn);\n\n";
    $txt .= "\t\tmysqli_close(\$conn);\n";
    $txt .= "\t\treturn \$id;\n";
    $txt .= "\t}\n";
    $txt .= "\n";

    return $txt;
  }

  public function Update($result,$tbl){

    $txt = '';
    $txt .= "\tpublic function Update(\$mdl){\n";
    $txt .= "\n";
    $txt .= "\t\t\$Database = new Database();\n";
    $txt .= "\t\t\$conn = \$Database->GetConn();\n";
    $txt .= "\t\t\$sql=\"UPDATE `\".\$this->table.\"` SET\n";

    $num_rows = mysqli_num_rows($result);
    $i=0;

    foreach ($result as $key => $value) {

      if($value['Field'] != ($tbl."_Id") && $value['Field'] != $tbl."_DateCreated"){

        $strchar = str_replace($tbl.'_',"",$value['Field']);
        $txt .= "\t\t\t\t `".$value['Field']."`='\".\$mdl->getsql$strchar().\"'";

        if (++$i <= ($num_rows-3)){
          $txt .= ",";
        }

        $txt .=  "\n";

      }
    }

    $txt .= "\t\t WHERE `$tbl"."_Id`='\".\$mdl->getsqlId().\"'\";\n";
    $txt .= "\n";
    $txt .= "\t\t\$result=mysqli_query(\$conn,\$sql) or die(mysqli_error(\$conn));\n";
    $txt .= "\n";
    $txt .= "\t\t mysqli_close(\$conn);\n";
    $txt .= "\t}\n";
    $txt .= "\n";

    foreach ($result as $key => $value) {
      if($value['Field'] != ($tbl."_Id") && $value['Field'] != $tbl."_DateCreated"){

        $strchar = str_replace($tbl.'_',"",$value['Field']);
        $txt .= "\tpublic function Update$strchar(\$id,\$value){\n";
        $txt .= "\n";
        $txt .= "\t\t\$Database = new Database();\n";
        $txt .= "\t\t\$conn = \$Database->GetConn();\n";
        $txt .= "\n";
        $txt .= "\t\t\$value = mysqli_real_escape_string(\$conn,\$value);\n";
        $txt .= "\t\t\$id = mysqli_real_escape_string(\$conn,\$id);\n";
        $txt .= "\n";
        $txt .= "\t\t\$sql=\"UPDATE `\".\$this->table.\"` SET\n";
        $txt .= "\t\t\t`".$value['Field']."`='\".\$value.\"'\n";
        $txt .= "\t\t\tWHERE `".$tbl."_Id` = '\".\$id.\"'\";\n";
        $txt .= "\n";
        $txt .= "\t\t\$result=mysqli_query(\$conn,\$sql) or die(mysqli_error(\$conn));\n";
        $txt .= "\n";
        $txt .= "\t\tmysqli_close(\$conn);\n";
        // $txt .= "\n";
        // $txt .= "\t\treturn \$this->ListTransfer(\$result);\n";
        $txt .= "\t}\n";
        $txt .= "\n";

      }
    }

    return $txt;

  }

  public function Delete($tbl){
    $txt = '';
    $txt .= "\tpublic function Delete(\$id){\n";
    $txt .= "\n";
    $txt .= "\t\t\$Database = new Database();\n";
    $txt .= "\t\t\$conn = \$Database->GetConn();\n";
    $txt .= "\t\t\$id = mysqli_real_escape_string(\$conn,\$id);\n";
    $txt .= "\t\t\$sql=\"DELETE FROM `\".\$this->table.\"`\n";
    $txt .= "\t\t\tWHERE `$tbl"."_Id` = '\".\$id.\"'\";\n";
    $txt .= "\t\t\$result=mysqli_query(\$conn,\$sql) or die(mysqli_error(\$conn));\n";
    $txt .= "\n";
    $txt .= "\t\t\tmysqli_close(\$conn);\n";
    $txt .= "\n";
    $txt .= "\t}\n";
    $txt .= "\n";

    return $txt;
  }

  public function IsExist($result,$tbl){

    $num_rows = mysqli_num_rows($result);
    $i=0;
    $ii=0;
    $txt = '';
    $txt .= "\tpublic function IsExist(\$mdl){\n";
    $txt .= "\n";
    $txt .= "\t\t\$Database = new Database();\n";
    $txt .= "\t\t\$conn = \$Database->GetConn();\n";
    $txt .= "\n";
    $txt .= "\t\t\$val = false;\n";
    $txt .= "\t\t\$msg = \"\";\n";
    $txt .= "\n";
    // $txt .= "\t\t\$sql = \"SELECT COUNT(*) FROM `\".\$this->table.\"`\n";
    // $txt .= "\t\t\tWHERE\n";

    foreach ($result as $key => $value) {
      if($value['Field'] == ($tbl."_DateCreated") || $value['Field'] == $tbl."_Status"){
        $ii=3;
      }else {
        $ii=1;
      }
    }

    foreach ($result as $key => $value) {

      if($value['Field'] != ($tbl."_DateCreated") && $value['Field'] != $tbl."_Status"){

        $strchar = str_replace($tbl.'_',"",$value['Field']);

        $txt .= "\t\t// ".$value['Field']."\n";
        $txt .= "\t\t\$sql = \"SELECT COUNT(*) FROM `\".\$this->table.\"`\n";
        $txt .= "\t\t\tWHERE\n";
        $txt .= "\t\t\t`".$tbl."_Id` != '\".\$mdl->getsqlId().\"' AND\n";
        $txt .= "\t\t\t`".$value['Field']."` = '\".\$mdl->getsql$strchar().\"'";
        $txt .= "\n\t\t\";\n";
        $txt .= "\t\t\$result=mysqli_query(\$conn,\$sql) or die(mysqli_error(\$conn));\n";
        $txt .= "\t\t\$rows = mysqli_fetch_row(\$result);\n";
        $txt .= "\t\tif(\$rows[0] > 0)\n";
  			$txt .= "\t\t{\n";
				$txt .= "\t\t\t\$msg .= \"<p><a href='javascript:void(0)' class='alert-link' onclick='setFocus(\\\"input".$strchar."\\\")'>".$strchar."</a>: \" . \$mdl->get".$strchar."() . \"</p>\";\n";
				$txt .= "\t\t\t\$val = true;\n";
  			$txt .= "\t\t}\n";
        $txt .= "\n";
      }

    }

    $txt .= "\t\tmysqli_close(\$conn);\n";
    $txt .= "\n";
    $txt .= "\t\treturn array(\"val\"=>\"\$val\",\"msg\"=>\"\$msg\");\n\n";
    $txt .= "\t}\n";
    $txt .= "\n";

    return $txt;
  }

  public function Get($result,$tbl){

    $txt = '';
    $txt .= "\tpublic function Get(\$status=\"\"){\n";
    $txt .= "\n";
    $txt .= "\t\t\$Database = new Database();\n";
    $txt .= "\t\t\$conn = \$Database->GetConn();\n";
    $txt .= "\n";
    $txt .= "\t\t\$sql = \"SELECT * FROM `\".\$this->table.\"`\";\n";
    $txt .= "\t\tif (\$status !== \"\") {\n";
    $txt .= "\t\t\t\$sql .= \"WHERE `".$tbl."_Status` = '\".\$status.\"'\";\n";
    $txt .= "\t\t}\n";
    $txt .= "\n";
    $txt .= "\t\t\$result=mysqli_query(\$conn,\$sql) or die(mysqli_error(\$conn));\n";
    $txt .= "\n";
    $txt .= "\t\tmysqli_close(\$conn);\n";
    $txt .= "\n";
    $txt .= "\t\treturn \$this->ListTransfer(\$result);\n";
    $txt .= "\t}\n";
    $txt .= "\n";

    foreach ($result as $key => $value) {

      if($value['Field'] != ($tbl."_Id") && $value['Field'] != $tbl."_DateCreated"){

        $strchar = str_replace($tbl.'_',"",$value['Field']);

        if ($this->hasStatus){
          $txt .= "\tpublic function Get$strchar"."ById(\$id,\$status=\"\"){\n";
        }else {
          $txt .= "\tpublic function Get$strchar"."ById(\$id){\n";
        }
        $txt .= "\n";
        $txt .= "\t\t\$Database = new Database();\n";
        $txt .= "\t\t\$conn = \$Database->GetConn();\n";
        $txt .= "\n";
        $txt .= "\t\t\$value = \"\";\n";
        $txt .= "\t\t\$id = mysqli_real_escape_string(\$conn,\$id);\n";
        if ($this->hasStatus){
          $txt .= "\t\t\$status = mysqli_real_escape_string(\$conn,\$status);\n";
        }
        $txt .= "\n";
        $txt .= "\t\t\$sql = \"SELECT `".$value['Field']."` FROM `\".\$this->table.\"`\n";

        if ($this->hasStatus){
          $txt .= "\t\t\tWHERE `$tbl"."_Id` = '\".\$id.\"'\";\n";
          $txt .= "\t\tif (\$status !== \"\") {\n";
          $txt .= "\t\t\t\$sql .= \"AND `$tbl"."_Status` = '\".\$status.\"'\";\n";
          $txt .= "\t\t}\n";
        }else {
          $txt .= "\t\tWHERE `$tbl"."_Id` = '\".\$id.\"'\";\n";
        }
        $txt .= "\n";
        $txt .= "\t\t\$result=mysqli_query(\$conn,\$sql) or die(mysqli_error(\$conn));\n";
        $txt .= "\t\twhile(\$row = mysqli_fetch_array(\$result))\n";
        $txt .= "\t\t{\n";
        $txt .= "\t\t\t\$value = \$row['".$value['Field']."'];\n";
        $txt .= "\t\t}\n";
        $txt .= "\n";
        $txt .= "\t\tmysqli_close(\$conn);\n";
        $txt .= "\n";
        $txt .= "\t\treturn \$value;\n";
        $txt .= "\t}\n";
        $txt .= "\n";

      }
    }

    foreach ($result as $key => $value) {

        $strchar = str_replace($tbl.'_',"",$value['Field']);
        if ($this->hasStatus){
          $txt .= "\tpublic function GetBy$strchar(\$value,\$status=\"\"){\n";
        }else {
          $txt .= "\tpublic function GetBy$strchar(\$value){\n";
        }

        $txt .= "\n";
        $txt .= "\t\t\$Database = new Database();\n";
        $txt .= "\t\t\$conn = \$Database->GetConn();\n";
        $txt .= "\n";
        $txt .= "\t\t\$value = mysqli_real_escape_string(\$conn,\$value);\n";
        if ($this->hasStatus){
          $txt .= "\t\t\$status = mysqli_real_escape_string(\$conn,\$status);\n";
        }
        $txt .= "\n";
        $txt .= "\t\t\$sql=\"SELECT * FROM `\".\$this->table.\"`\n";

        if ($this->hasStatus){
          $txt .= "\t\t\tWHERE `".$value['Field']."` = '\".\$value.\"'\";\n";
          $txt .= "\t\tif (\$status !== \"\") {\n";
          $txt .= "\t\t\t\$sql .= \"AND `$tbl"."_Status` = '\".\$status.\"'\";\n";
          $txt .= "\t\t}\n";
        }else {
          $txt .= "\t\tWHERE `".$value['Field']."` = '\".\$value.\"'\";\n";
        }
        $txt .= "\n";
        $txt .= "\t\t\$result=mysqli_query(\$conn,\$sql) or die(mysqli_error(\$conn));\n";
        $txt .= "\n";
        $txt .= "\t\tmysqli_close(\$conn);\n";
        $txt .= "\n";
        if ($strchar != "Id"){
          $txt .= "\t\treturn \$this->ListTransfer(\$result);\n";
        }else{
          $txt .= "\t\treturn \$this->ModelTransfer(\$result);\n";
        }

        $txt .= "\t}\n";
        $txt .= "\n";

    }

    $txt .= "\tpublic function SetImage(\$image,\$id){\n";
    $txt .= "\n";
    $txt .= "\t\t\$val = true;\n";
    $txt .= "\t\t\$msg = \"\";\n";
    $txt .= "\t\t\$clsImage = new Image();\n";
    $txt .= "\t\tif(isset(\$image[\"name\"]) && (\$image[\"name\"]!=\"\"))\n";
    $txt .= "\t\t{\n";
    $txt .= "\t\t\t\$result = \$clsImage->Upload(\$image,\$this->table,\$id);\n";
    $txt .= "\t\t\tif(\$result[0] != \"\"){\n";
    $txt .= "\t\t\t\t\$msg = \$result[0];\n";
    $txt .= "\t\t\t}\n";
    $txt .= "\t\t}\n";
    $txt .= "\t\treturn array(\"val\"=>\$val,\"msg\"=>\$msg);\n";
    $txt .= "\t}\n";
    $txt .= "\n";

    $txt .= "\tpublic function ModelTransfer(\$result){\n";
    $txt .= "\n";
    $txt .= "\t\t\$mdl = new "."$tbl"."Model();\n";
    $txt .= "\t\twhile(\$row = mysqli_fetch_array(\$result))\n";
    $txt .= "\t\t{\n";
    $txt .= "\t\t\t\$mdl = \$this->ToModel(\$row);\n";
    $txt .= "\t\t}\n";
    $txt .= "\t\treturn \$mdl;\n";
    $txt .= "\t}\n";

    $txt .= "\n";
    $txt .= "\tpublic function ListTransfer(\$result){\n";
    $txt .= "\t\t\$lst = array();\n";
    $txt .= "\t\twhile(\$row = mysqli_fetch_array(\$result))\n";
    $txt .= "\t\t{\n";
    $txt .= "\t\t\t\$mdl = new "."$tbl"."Model();\n";
    $txt .= "\t\t\t\$mdl = \$this->ToModel(\$row);\n";
    $txt .= "\t\t\tarray_push(\$lst,\$mdl);\n";
    $txt .= "\t\t}\n";
    $txt .= "\t\treturn \$lst;\n";
    $txt .= "\t}\n";
    $txt .= "\n";

    $txt .= "\tpublic function ToModel(\$row){\n";
    $txt .= "\t\t\$mdl = new "."$tbl"."Model();\n";

    foreach ($result as $key => $value) {
      $strchar = str_replace($tbl.'_',"",$value['Field']);
      $txt .= "\t\t\$mdl->set".$strchar."((isset(\$row['".$value['Field']."'])) ? \$row['".$value['Field']."'] : '');\n";
    }
    $txt .= "\t\treturn \$mdl;\n";
    $txt .= "\t}\n";

    return $txt;

  }
}
?>
