<?php
$mdlTavern = new TavernModel();
class TavernModel{

	private $Id = "";
	private $Name = "";
	private $Description = "";
	private $Country_Id = "";
	private $Province_Id = "";
	private $City_Id = "";
	private $District_Id = "";
	private $GoogleMap = "";
	private $DateCreated = "";
	private $Status = "";

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


	//Description
	public function getDescription(){
		return $this->Description;
	}

	public function getsqlDescription(){
		$Database = new Database();
		$conn = $Database->GetConn();
		$value = mysqli_real_escape_string($conn,$this->Description);
		mysqli_close($conn);
		return $value;
	}

	public function setDescription($Description){
		$this->Description = $Description;
	}


	//Country_Id
	public function getCountry_Id(){
		return $this->Country_Id;
	}

	public function getsqlCountry_Id(){
		$Database = new Database();
		$conn = $Database->GetConn();
		$value = mysqli_real_escape_string($conn,$this->Country_Id);
		mysqli_close($conn);
		return $value;
	}

	public function setCountry_Id($Country_Id){
		$this->Country_Id = $Country_Id;
	}


	//Province_Id
	public function getProvince_Id(){
		return $this->Province_Id;
	}

	public function getsqlProvince_Id(){
		$Database = new Database();
		$conn = $Database->GetConn();
		$value = mysqli_real_escape_string($conn,$this->Province_Id);
		mysqli_close($conn);
		return $value;
	}

	public function setProvince_Id($Province_Id){
		$this->Province_Id = $Province_Id;
	}


	//City_Id
	public function getCity_Id(){
		return $this->City_Id;
	}

	public function getsqlCity_Id(){
		$Database = new Database();
		$conn = $Database->GetConn();
		$value = mysqli_real_escape_string($conn,$this->City_Id);
		mysqli_close($conn);
		return $value;
	}

	public function setCity_Id($City_Id){
		$this->City_Id = $City_Id;
	}


	//District_Id
	public function getDistrict_Id(){
		return $this->District_Id;
	}

	public function getsqlDistrict_Id(){
		$Database = new Database();
		$conn = $Database->GetConn();
		$value = mysqli_real_escape_string($conn,$this->District_Id);
		mysqli_close($conn);
		return $value;
	}

	public function setDistrict_Id($District_Id){
		$this->District_Id = $District_Id;
	}


	//GoogleMap
	public function getGoogleMap(){
		return $this->GoogleMap;
	}

	public function getsqlGoogleMap(){
		$Database = new Database();
		$conn = $Database->GetConn();
		$value = mysqli_real_escape_string($conn,$this->GoogleMap);
		mysqli_close($conn);
		return $value;
	}

	public function setGoogleMap($GoogleMap){
		$this->GoogleMap = $GoogleMap;
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


}
