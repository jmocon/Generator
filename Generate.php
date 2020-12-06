<?php
$clsGenerate = new Generate();

class Generate
{

  private $db = '';
  private $hasStatus = false;

  public function __construct()
  {
  }

  public function GetTable($database)
  {

    $this->db = $database;
    $Database = new Database();
    $conn = $Database->GetConn();

    $sql = "SHOW TABLES FROM {$database}";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    while ($row = mysqli_fetch_array($result)) {
      // echo "Table: {$row[0]}<br />";
      $this->GetColumn($row[0]);
    }
    mysqli_close($conn);
    echo "Classes Done <br />";
  }

  public function GetColumn($table)
  {
    $tbl = '';
    $txt = '';
    $this->hasStatus = false;
    $Database = new Database($this->db);
    $conn = $Database->GetConn();

    $sql = "SHOW COLUMNS FROM {$table}";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    while ($row = mysqli_fetch_array($result)) {
      if ($tbl == '') {
        $temptbl = preg_replace('/_Id$/', '', $row['Field']);
        if ($table == strtolower($temptbl)) {
          $tbl = $temptbl;
          $txt .= "<?php\n";
          $txt .= "\$cls$tbl = new $tbl();\n";
          $txt .= "class $tbl\n";
          $txt .= "{\n";
          $txt .= "\tprivate \$table = \"$table\";\n";
          $txt .= "\n";
          $txt .= "\tpublic function __construct()\n";
          $txt .= "\t{\n";
          $txt .= "\t}\n";
          $txt .= "\n";
        }
      }
    }
    mysqli_close($conn);

    $txt .= $this->Add($result, $tbl);
    $txt .= $this->Update($result, $tbl);
    $txt .= $this->Delete($tbl);
    $txt .= $this->Get($result, $tbl);
    $txt .= $this->IsExist($result, $tbl);
    $txt .= "}\n";

    $this->CreateDatabase($tbl);
    $this->CreateFile($tbl, $txt);
  }

  public function CreateDatabase($tbl)
  {
    $txt = "";
    $txt .= "<?php\n";
    $txt .= "class Database\n";
    $txt .= "{\n";
    $txt .= "\tprivate \$conn;\n";
    $txt .= "\tpublic \$mysqli;\n";
    $txt .= "\n";
    $txt .= "\tpublic function Database()\n";
    $txt .= "\t{\n";
    $txt .= "\n";
    $txt .= "\t\t\$dbhost = 'localhost';\n";
    $txt .= "\t\t\$dbuser = 'root';\n";
    $txt .= "\t\t\$dbpass = '';\n";
    $txt .= "\t\t\$dbname = '" . $this->db . "';\n";
    $txt .= "\n";
    $txt .= "\t\t\$this->mysqli = new mysqli(\$dbhost, \$dbuser, \$dbpass, \$dbname);\n";
    $txt .= "\t\tif (\$this->mysqli->connect_errno) {\n";
    $txt .= "\t\t\tdie(\"Failed to connect to MySQL: \" . \$this->mysqli->connect_error);\n";
    $txt .= "\t\t}\n";
    $txt .= "\t}\n";
    $txt .= "\n";
    $txt .= "\tpublic function GetConn()\n";
    $txt .= "\t{\n";
    $txt .= "\t\treturn \$this->conn;\n";
    $txt .= "\t}\n";
    $txt .= "\tpublic function Escape(\$value)\n";
    $txt .= "\t{\n";
    $txt .= "\t\treturn \$this->mysqli->real_escape_string(\$value);\n";
    $txt .= "\t}\n";
    $txt .= "}\n";
    $myfile = fopen("newfile/Database.php", "w") or die("Unable to open file!");
    fwrite($myfile, $txt);
    fclose($myfile);
  }

  public function CreateFile($tbl, $txt)
  {

    $myfile = fopen("newfile/" . $tbl . ".php", "w") or die("Unable to open file!");
    fwrite($myfile, $txt);
    fclose($myfile);
  }

  public function Add($result, $tbl)
  {
    $txt = '';
    $txt .= "\tpublic function Add(\$mdl)\n";
    $txt .= "\t{\n";
    $txt .= "\t\t\$db = new Database();\n";
    $txt .= "\t\t\$mysqli = \$db->mysqli;\n";
    $txt .= "\t\t\$query = \"INSERT INTO `{\$this->table}`\n";
    $txt .= "\t\t\t(\n";
    $ex = array($tbl . "_Id", "X_DateCreated", "X_Status");
    $count = 0;
    foreach ($result as $key => $value) {
      if ($value['Field'] == "X_Status") {
        $this->hasStatus = true;
      }
      if (!in_array($value['Field'], $ex)) {
        $count++;
        if ($count > 1) {
          $txt .= ",\n";
        }
        $txt .= "\t\t\t\t`" . $value['Field'] . "`";
      }
    }
    $txt .= "\n";
    $txt .= "\t\t\t) VALUES (\n";
    $count = 0;
    foreach ($result as $key => $value) {
      if (!in_array($value['Field'], $ex)) {
        $count++;
        if ($count > 1) {
          $txt .= ",\n";
        }
        $strchar = str_replace($tbl . '_', "", $value['Field']);
        $txt .= "\t\t\t\t'{\$db->Escape(\$mdl->$strchar)}'";
      }
    }

    $txt .= "\n";
    $txt .= "\t\t\t)\";\n";
    $txt .= "\t\t\$mysqli->query(\$query);\n";
    $txt .= "\t\t\$id = \$mysqli->insert_id;\n";
    $txt .= "\t\t\$mysqli->close();\n";
    $txt .= "\t\treturn \$id;\n";
    $txt .= "\t}\n";
    $txt .= "\n";

    return $txt;
  }

  public function Update($result, $tbl)
  {

    $txt = '';
    $txt .= "\tpublic function Update(\$mdl)\n";
    $txt .= "\t{\n";
    $txt .= "\t\t\$db = new Database();\n";
    $txt .= "\t\t\$mysqli = \$db->mysqli;\n";
    $txt .= "\t\t\$query = \"UPDATE `{\$this->table}` SET\n";

    $num_rows = mysqli_num_rows($result);
    $i = 0;

    foreach ($result as $key => $value) {

      if ($value['Field'] != ($tbl . "_Id") && $value['Field'] != "X_DateCreated") {

        $strchar = str_replace($tbl . '_', "", $value['Field']);
        $txt .= "\t\t\t\t\t\t`" . $value['Field'] . "`='{\$db->Escape(\$mdl->$strchar)}'";

        if (++$i <= ($num_rows - 3)) {
          $txt .= ",";
        }

        $txt .=  "\n";
      }
    }

    $txt .= "\t\t\t\t\t\tWHERE `$tbl" . "_Id`='{\$db->Escape(\$mdl->$tbl" . "_Id)}'\";\n";
    $txt .= "\t\t\$mysqli->query(\$query);\n";
    $txt .= "\t\t\$rows = \$mysqli->affected_rows;\n";
    $txt .= "\t\t\$mysqli->close();\n";
    $txt .= "\t\treturn \$rows;\n";
    $txt .= "\t}\n";
    $txt .= "\n";

    // foreach ($result as $key => $value) {
    //   if ($value['Field'] != ($tbl . "_Id") && $value['Field'] != $tbl . "_DateCreated") {

    //     $strchar = str_replace($tbl . '_', "", $value['Field']);
    //     $txt .= "\tpublic function Update$strchar(\$id,\$value){\n";
    //     $txt .= "\n";
    //     $txt .= "\t\t\$Database = new Database();\n";
    //     $txt .= "\t\t\$conn = \$Database->GetConn();\n";
    //     $txt .= "\n";
    //     $txt .= "\t\t\$value = mysqli_real_escape_string(\$conn,\$value);\n";
    //     $txt .= "\t\t\$id = mysqli_real_escape_string(\$conn,\$id);\n";
    //     $txt .= "\n";
    //     $txt .= "\t\t\$sql=\"UPDATE `\".\$this->table.\"` SET\n";
    //     $txt .= "\t\t\t`" . $value['Field'] . "`='\".\$value.\"'\n";
    //     $txt .= "\t\t\tWHERE `" . $tbl . "_Id` = '\".\$id.\"'\";\n";
    //     $txt .= "\n";
    //     $txt .= "\t\t\$result=mysqli_query(\$conn,\$sql) or die(mysqli_error(\$conn));\n";
    //     $txt .= "\n";
    //     $txt .= "\t\tmysqli_close(\$conn);\n";
    //     // $txt .= "\n";
    //     // $txt .= "\t\treturn \$this->ListTransfer(\$result);\n";
    //     $txt .= "\t}\n";
    //     $txt .= "\n";
    //   }
    // }

    return $txt;
  }

  public function Delete($tbl)
  {
    $txt = '';
    $txt .= "\tpublic function Delete(\$id)\n";
    $txt .= "\t{\n";
    $txt .= "\t\t\$db = new Database();\n";
    $txt .= "\t\t\$mysqli = \$db->mysqli;\n";
    $txt .= "\t\t\$query = \"DELETE FROM `{\$this->table}`\n";
    $txt .= "\t\t\t\t\t\t\tWHERE `$tbl" . "_Id` = '{\$db->Escape(\$id)}';\";\n";
    $txt .= "\t\t\$mysqli->query(\$query);\n";
    $txt .= "\t\t\$rows = \$mysqli->affected_rows;\n";
    $txt .= "\t\t\$mysqli->close();\n";
    $txt .= "\t\treturn \$rows;\n";
    $txt .= "\t}\n";
    $txt .= "\n";

    return $txt;
  }

  public function Get($result, $tbl)
  {

    $txt = '';
    $txt .= "\tpublic function Get()\n";
    $txt .= "\t{\n";
    $txt .= "\t\t\$db = new Database();\n";
    $txt .= "\t\t\$mysqli = \$db->mysqli;\n";
    $txt .= "\t\t\$lst = array();\n";
    $txt .= "\t\t\$query = \"SELECT * FROM `{\$this->table}`\";\n";
    $txt .= "\t\t\$result = \$mysqli->query(\$query);\n";
    $txt .= "\t\t\$mysqli->close();\n";
    $txt .= "\t\twhile (\$obj = \$result->fetch_object()) {\n";
    $txt .= "\t\t\t\$lst[] = \$obj;\n";
    $txt .= "\t\t}\n";
    $txt .= "\t\treturn \$lst;\n";
    $txt .= "\t}\n";
    $txt .= "\n";

    // GET by Table Id - Start
    foreach ($result as $key => $value) {

      if ($value['Field'] != ($tbl . "_Id") && $value['Field'] != "X_DateCreated") {

        $strchar = str_replace($tbl . '_', "", $value['Field']);

        if ($this->hasStatus) {
          $txt .= "\tpublic function Get$strchar" . "By$tbl" . "_Id(\$value, \$status = \"\")\n";
        } else {
          $txt .= "\tpublic function Get$strchar" . "By$tbl" . "_Id(\$value)\n";
        }
        $txt .= "\t{\n";
        $txt .= "\t\t\$db = new Database();\n";
        $txt .= "\t\t\$mysqli = \$db->mysqli;\n";
        $txt .= "\t\t\$query = \"SELECT `" . $value['Field'] . "` FROM `{\$this->table}`\n";
        $txt .= "\t\t\t\t\t\t\tWHERE `$tbl" . "_Id` = '{\$db->Escape(\$value)}'\";\n";

        if ($this->hasStatus) {
          $txt .= "\t\tif (\$status !== \"\") {\n";
          $txt .= "\t\t\t\$query .= \"AND `X_Status` = '{\$db->Escape(\$status)}'\";\n";
          $txt .= "\t\t}\n";
        }
        $txt .= "\t\t\$result = \$mysqli->query(\$query);\n";
        $txt .= "\t\t\$mysqli->close();\n";
        $txt .= "\t\treturn \$result->fetch_object()->" . $value['Field'] . ";\n";
        $txt .= "\t}\n";
        $txt .= "\n";
      }
    }
    // GET by Table Id - End

    // GET by Table Column - Start
    foreach ($result as $key => $value) {
      if ($this->hasStatus) {
        $txt .= "\tpublic function GetBy" . $value['Field'] . "(\$value, \$status = \"\")\n";
      } else {
        $txt .= "\tpublic function GetBy" . $value['Field'] . "(\$value)\n";
      }
      $txt .= "\t{\n";
      $txt .= "\t\t\$db = new Database();\n";
      $txt .= "\t\t\$mysqli = \$db->mysqli;\n";
      $txt .= "\t\t\$lst = array();\n";
      $txt .= "\t\t\$query = \"SELECT * FROM `{\$this->table}`\n";
      $txt .= "\t\t\t\t\t\t\tWHERE `" . $value['Field'] . "` = '{\$db->Escape(\$value)}'\";\n";

      if ($this->hasStatus) {
        $txt .= "\t\tif (\$status !== \"\") {\n";
        $txt .= "\t\t\t\$query .= \" AND `X_Status` = '{\$db->Escape(\$status)}'\";\n";
        $txt .= "\t\t}\n";
      }
      $txt .= "\t\t\$result = \$mysqli->query(\$query);\n";
      $txt .= "\t\t\$mysqli->close();\n";
      $txt .= "\t\treturn \$result->fetch_object();\n";
      $txt .= "\t}\n";
      $txt .= "\n";
    }
    // GET by Table Column - End

    return $txt;
  }


  public function IsExist($result, $tbl)
  {
    $txt = '';
    foreach ($result as $key => $value) {
      $txt .= "\tpublic function IsExist" . $value['Field'] . "(\$value";
      if ($value['Field'] != $tbl . "_Id") {
        $txt .= ", \$id = \"\"";
      }
      if ($this->hasStatus) {
        $txt .= ", \$status = \"\"";
      }
      $txt .= ")\n";
      $txt .= "\t{\n";
      $txt .= "\t\t\$db = new Database();\n";
      $txt .= "\t\t\$mysqli = \$db->mysqli;\n";
      $txt .= "\t\t\$query = \"SELECT COUNT(*) CNT\n";
      $txt .= "\t\t\t\t\t\t\tFROM `{\$this->table}`\n";
      $txt .= "\t\t\t\t\t\t\tWHERE `" . $value['Field'] . "` = '{\$db->Escape(\$value)}'\";\n";
      if ($value['Field'] != $tbl . "_Id") {
        $txt .= "\t\tif (\$id != \"\") {\n";
        $txt .= "\t\t\t\$query .= \" AND `$tbl" . "_Id` != '{\$db->Escape(\$id)}'\";\n";
        $txt .= "\t\t}\n";
      }
      if ($this->hasStatus) {
        $txt .= "\t\tif (\$status != \"\") {\n";
        $txt .= "\t\t\t\$query .= \" AND `X_Status` = '{\$db->Escape(\$status)}'\";\n";
        $txt .= "\t\t}\n";
      }
      $txt .= "\t\t\$result = \$mysqli->query(\$query);\n";
      $txt .= "\t\t\$mysqli->close();\n";
      $txt .= "\t\tif (\$result->fetch_object()->CNT > 0) {\n";
      $txt .= "\t\t\treturn true;\n";
      $txt .= "\t\t}\n";
      $txt .= "\t\treturn false;\n";
      $txt .= "\t}\n";
      $txt .= "\n";
    }

    return $txt;
  }
}
