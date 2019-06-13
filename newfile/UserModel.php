<?php
$mdlUser = new UserModel();
class UserModel{

	private $Id = "";
	private $FirstName = "";
	private $MiddleName = "";
	private $LastName = "";
	private $SuffixName = "";
	private $BirthDate = "";
	private $Gender_Id = "";
	private $Country_Id = "";
	private $Province_Id = "";
	private $City_Id = "";
	private $District_Id = "";
	private $ContactNumber = "";
	private $EmailAddress = "";
	private $Password = "";
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


	//FirstName
	public function getFirstName(){
		return $this->FirstName;
	}

	public function getsqlFirstName(){
		$Database = new Database();
		$conn = $Database->GetConn();
		$value = mysqli_real_escape_string($conn,$this->FirstName);
		mysqli_close($conn);
		return $value;
	}

	public function setFirstName($FirstName){
		$this->FirstName = $FirstName;
	}


	//MiddleName
	public function getMiddleName(){
		return $this->MiddleName;
	}

	public function getsqlMiddleName(){
		$Database = new Database();
		$conn = $Database->GetConn();
		$value = mysqli_real_escape_string($conn,$this->MiddleName);
		mysqli_close($conn);
		return $value;
	}

	public function setMiddleName($MiddleName){
		$this->MiddleName = $MiddleName;
	}


	//LastName
	public function getLastName(){
		return $this->LastName;
	}

	public function getsqlLastName(){
		$Database = new Database();
		$conn = $Database->GetConn();
		$value = mysqli_real_escape_string($conn,$this->LastName);
		mysqli_close($conn);
		return $value;
	}

	public function setLastName($LastName){
		$this->LastName = $LastName;
	}


	//SuffixName
	public function getSuffixName(){
		return $this->SuffixName;
	}

	public function getsqlSuffixName(){
		$Database = new Database();
		$conn = $Database->GetConn();
		$value = mysqli_real_escape_string($conn,$this->SuffixName);
		mysqli_close($conn);
		return $value;
	}

	public function setSuffixName($SuffixName){
		$this->SuffixName = $SuffixName;
	}


	//BirthDate
	public function getBirthDate(){
		return $this->BirthDate;
	}

	public function getsqlBirthDate(){
		$Database = new Database();
		$conn = $Database->GetConn();
		$value = mysqli_real_escape_string($conn,$this->BirthDate);
		mysqli_close($conn);
		return $value;
	}

	public function setBirthDate($BirthDate){
		$this->BirthDate = $BirthDate;
	}


	//Gender_Id
	public function getGender_Id(){
		return $this->Gender_Id;
	}

	public function getsqlGender_Id(){
		$Database = new Database();
		$conn = $Database->GetConn();
		$value = mysqli_real_escape_string($conn,$this->Gender_Id);
		mysqli_close($conn);
		return $value;
	}

	public function setGender_Id($Gender_Id){
		$this->Gender_Id = $Gender_Id;
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


	//ContactNumber
	public function getContactNumber(){
		return $this->ContactNumber;
	}

	public function getsqlContactNumber(){
		$Database = new Database();
		$conn = $Database->GetConn();
		$value = mysqli_real_escape_string($conn,$this->ContactNumber);
		mysqli_close($conn);
		return $value;
	}

	public function setContactNumber($ContactNumber){
		$this->ContactNumber = $ContactNumber;
	}


	//EmailAddress
	public function getEmailAddress(){
		return $this->EmailAddress;
	}

	public function getsqlEmailAddress(){
		$Database = new Database();
		$conn = $Database->GetConn();
		$value = mysqli_real_escape_string($conn,$this->EmailAddress);
		mysqli_close($conn);
		return $value;
	}

	public function setEmailAddress($EmailAddress){
		$this->EmailAddress = $EmailAddress;
	}


	//Password
	public function getPassword(){
		return $this->Password;
	}

	public function getsqlPassword(){
		$Database = new Database();
		$conn = $Database->GetConn();
		$value = mysqli_real_escape_string($conn,$this->Password);
		mysqli_close($conn);
		return $value;
	}

	public function setPassword($Password){
		$this->Password = $Password;
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
