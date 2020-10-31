<?php
$start_time = microtime(TRUE);

// // Test of public vs private Model
// class BranchModel{
//
//   public $Id = "";
//   public $Name = "";
//   public $Address = "";
//
//   public function __construct(){}
//
//   public function setName($Name){
// 		$this->Name = $Name;
// 	}
//
//   public function getName(){
// 		return $this->Name;
// 	}
//
// }
//
// $holder = "";
//
// for ($i=0; $i < 10000000; $i++) {
//
//   $mdlBranch = new BranchModel();
//   $mdlBranch->Name = $i;
//   $holder = $mdlBranch->Name;
// }
//
// $end_time = microtime(TRUE);

class BranchModel{

  public $Id = "";
  public $Name = "";
  public $Address = "";

  public function __construct(){}
}

$lst = array();
$holder = "";

for ($i=0; $i < 1000; $i++) {

  $mdlBranch = new BranchModel();
  $mdlBranch->Name = $i;
  $mdlBranch->Address = $i.$i;
  array_push($lst,$mdlBranch);
}
$holder = "[";
for ($i=0; $i < 1000; $i++) {
  foreach ($lst as $mdl) {
    $holder .= '{"Id":"","Name":'.$mdl->Name.',"Address":"'.$mdl->Address.'"},';
  }
}
$holder .= "]";


$end_time = microtime(TRUE);

echo $end_time - $start_time;
echo "<br />";
echo "<br />";
echo "<br />";
echo "<br />";
echo "<br />";
echo "<br />";
echo "<br />";
echo $holder;
?>
