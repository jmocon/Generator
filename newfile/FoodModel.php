<?php
$mdlFood = new FoodModel();
class FoodModel{

	private $Id = "";
	private $FoodCategory_Id = "";
	private $Name = "";
	private $Price = "";
	private $Description = "";
	private $Featured = "";
	private $BestSeller = "";
	private $Suggested = "";
	private $NotAvailable = "";
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


	//FoodCategory_Id
	public function getFoodCategory_Id(){
		return $this->FoodCategory_Id;
	}

	public function getsqlFoodCategory_Id(){
		$Database = new Database();
		$conn = $Database->GetConn();
		$value = mysqli_real_escape_string($conn,$this->FoodCategory_Id);
		mysqli_close($conn);
		return $value;
	}

	public function setFoodCategory_Id($FoodCategory_Id){
		$this->FoodCategory_Id = $FoodCategory_Id;
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


	//Price
	public function getPrice(){
		return $this->Price;
	}

	public function getsqlPrice(){
		$Database = new Database();
		$conn = $Database->GetConn();
		$value = mysqli_real_escape_string($conn,$this->Price);
		mysqli_close($conn);
		return $value;
	}

	public function setPrice($Price){
		$this->Price = $Price;
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


	//Featured
	public function getFeatured(){
		return $this->Featured;
	}

	public function getsqlFeatured(){
		$Database = new Database();
		$conn = $Database->GetConn();
		$value = mysqli_real_escape_string($conn,$this->Featured);
		mysqli_close($conn);
		return $value;
	}

	public function setFeatured($Featured){
		$this->Featured = $Featured;
	}


	//BestSeller
	public function getBestSeller(){
		return $this->BestSeller;
	}

	public function getsqlBestSeller(){
		$Database = new Database();
		$conn = $Database->GetConn();
		$value = mysqli_real_escape_string($conn,$this->BestSeller);
		mysqli_close($conn);
		return $value;
	}

	public function setBestSeller($BestSeller){
		$this->BestSeller = $BestSeller;
	}


	//Suggested
	public function getSuggested(){
		return $this->Suggested;
	}

	public function getsqlSuggested(){
		$Database = new Database();
		$conn = $Database->GetConn();
		$value = mysqli_real_escape_string($conn,$this->Suggested);
		mysqli_close($conn);
		return $value;
	}

	public function setSuggested($Suggested){
		$this->Suggested = $Suggested;
	}


	//NotAvailable
	public function getNotAvailable(){
		return $this->NotAvailable;
	}

	public function getsqlNotAvailable(){
		$Database = new Database();
		$conn = $Database->GetConn();
		$value = mysqli_real_escape_string($conn,$this->NotAvailable);
		mysqli_close($conn);
		return $value;
	}

	public function setNotAvailable($NotAvailable){
		$this->NotAvailable = $NotAvailable;
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
