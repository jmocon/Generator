<?php
$mdlPaymentType = new PaymentTypeModel();
class PaymentTypeModel{

	private $Id = "";
	private $Name = "";
	private $Status = "";
	private $DateCreated = "";

	public function __construct(){}

	//Id
	public function getId(){
		return $this->Id;
	}

	public function getsqlId(){
		$Database = new Database();
		$conn = $Database->GetConn();
		$value = mysqli_real_escape_string($conn,$this->Id);
		mysqli_close($conn);
		return $value;
	}

	public function setId($Id){
		$this->Id = $Id;
	}


	//Name
	public function getName(){
		return $this->Name;
	}

	public function getsqlName(){
		$Database = new Database();
		$conn = $Database->GetConn();
		$value = mysqli_real_escape_string($conn,$this->Name);
		mysqli_close($conn);
		return $value;
	}

	public function setName($Name){
		$this->Name = $Name;
	}


	//Status
	public function getStatus(){
		return $this->Status;
	}

	public function getsqlStatus(){
		$Database = new Database();
		$conn = $Database->GetConn();
		$value = mysqli_real_escape_string($conn,$this->Status);
		mysqli_close($conn);
		return $value;
	}

	public function setStatus($Status){
		$this->Status = $Status;
	}


	//DateCreated
	public function getDateCreated(){
		return $this->DateCreated;
	}

	public function getsqlDateCreated(){
		$Database = new Database();
		$conn = $Database->GetConn();
		$value = mysqli_real_escape_string($conn,$this->DateCreated);
		mysqli_close($conn);
		return $value;
	}

	public function setDateCreated($DateCreated){
		$this->DateCreated = $DateCreated;
	}


}
