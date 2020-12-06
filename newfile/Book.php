<?php
$clsBook = new Book();
class Book
{
	private $table = "book";

	public function __construct()
	{
	}

	public function Add($mdl)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "INSERT INTO `{$this->table}`
			(
				`Code`,
				`Keyword`,
				`Title`,
				`Author`,
				`Subject_Id`,
				`Synopsis`,
				`DatePublished`
			) VALUES (
				'{$db->Escape($mdl->Code)}',
				'{$db->Escape($mdl->Keyword)}',
				'{$db->Escape($mdl->Title)}',
				'{$db->Escape($mdl->Author)}',
				'{$db->Escape($mdl->Subject_Id)}',
				'{$db->Escape($mdl->Synopsis)}',
				'{$db->Escape($mdl->DatePublished)}'
			)";
		$mysqli->query($query);
		$id = $mysqli->insert_id;
		$mysqli->close();
		return $id;
	}

	public function Update($mdl)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "UPDATE `{$this->table}` SET
						`Code`='{$db->Escape($mdl->Code)}',
						`Keyword`='{$db->Escape($mdl->Keyword)}',
						`Title`='{$db->Escape($mdl->Title)}',
						`Author`='{$db->Escape($mdl->Author)}',
						`Subject_Id`='{$db->Escape($mdl->Subject_Id)}',
						`Synopsis`='{$db->Escape($mdl->Synopsis)}',
						`DatePublished`='{$db->Escape($mdl->DatePublished)}'
						WHERE `Book_Id`='{$db->Escape($mdl->Book_Id)}'";
		$mysqli->query($query);
		$rows = $mysqli->affected_rows;
		$mysqli->close();
		return $rows;
	}

	public function Delete($id)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "DELETE FROM `{$this->table}`
							WHERE `Book_Id` = '{$db->Escape($id)}';";
		$mysqli->query($query);
		$rows = $mysqli->affected_rows;
		$mysqli->close();
		return $rows;
	}

	public function Get()
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$lst = array();
		$query = "SELECT * FROM `{$this->table}`";
		$result = $mysqli->query($query);
		$mysqli->close();
		while ($obj = $result->fetch_object()) {
			$lst[] = $obj;
		}
		return $lst;
	}

	public function GetCodeByBook_Id($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT `Code` FROM `{$this->table}`
							WHERE `Book_Id` = '{$db->Escape($value)}'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object()->Code;
	}

	public function GetKeywordByBook_Id($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT `Keyword` FROM `{$this->table}`
							WHERE `Book_Id` = '{$db->Escape($value)}'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object()->Keyword;
	}

	public function GetTitleByBook_Id($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT `Title` FROM `{$this->table}`
							WHERE `Book_Id` = '{$db->Escape($value)}'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object()->Title;
	}

	public function GetAuthorByBook_Id($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT `Author` FROM `{$this->table}`
							WHERE `Book_Id` = '{$db->Escape($value)}'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object()->Author;
	}

	public function GetSubject_IdByBook_Id($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT `Subject_Id` FROM `{$this->table}`
							WHERE `Book_Id` = '{$db->Escape($value)}'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object()->Subject_Id;
	}

	public function GetSynopsisByBook_Id($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT `Synopsis` FROM `{$this->table}`
							WHERE `Book_Id` = '{$db->Escape($value)}'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object()->Synopsis;
	}

	public function GetDatePublishedByBook_Id($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT `DatePublished` FROM `{$this->table}`
							WHERE `Book_Id` = '{$db->Escape($value)}'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object()->DatePublished;
	}

	public function GetByBook_Id($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$lst = array();
		$query = "SELECT * FROM `{$this->table}`
							WHERE `Book_Id` = '{$db->Escape($value)}'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object();
	}

	public function GetByCode($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$lst = array();
		$query = "SELECT * FROM `{$this->table}`
							WHERE `Code` = '{$db->Escape($value)}'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object();
	}

	public function GetByKeyword($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$lst = array();
		$query = "SELECT * FROM `{$this->table}`
							WHERE `Keyword` = '{$db->Escape($value)}'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object();
	}

	public function GetByTitle($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$lst = array();
		$query = "SELECT * FROM `{$this->table}`
							WHERE `Title` = '{$db->Escape($value)}'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object();
	}

	public function GetByAuthor($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$lst = array();
		$query = "SELECT * FROM `{$this->table}`
							WHERE `Author` = '{$db->Escape($value)}'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object();
	}

	public function GetBySubject_Id($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$lst = array();
		$query = "SELECT * FROM `{$this->table}`
							WHERE `Subject_Id` = '{$db->Escape($value)}'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object();
	}

	public function GetBySynopsis($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$lst = array();
		$query = "SELECT * FROM `{$this->table}`
							WHERE `Synopsis` = '{$db->Escape($value)}'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object();
	}

	public function GetByDatePublished($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$lst = array();
		$query = "SELECT * FROM `{$this->table}`
							WHERE `DatePublished` = '{$db->Escape($value)}'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object();
	}

	public function GetByX_DateCreated($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$lst = array();
		$query = "SELECT * FROM `{$this->table}`
							WHERE `X_DateCreated` = '{$db->Escape($value)}'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object();
	}

	public function IsExistBook_Id($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT COUNT(*) CNT
							FROM `{$this->table}`
							WHERE `Book_Id` = '{$db->Escape($value)}'";
		$result = $mysqli->query($query);
		$mysqli->close();
		if ($result->fetch_object()->CNT > 0) {
			return true;
		}
		return false;
	}

	public function IsExistCode($value, $id = "")
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT COUNT(*) CNT
							FROM `{$this->table}`
							WHERE `Code` = '{$db->Escape($value)}'";
		if ($id != "") {
			$query .= " AND `Book_Id` != '{$db->Escape($id)}'";
		}
		$result = $mysqli->query($query);
		$mysqli->close();
		if ($result->fetch_object()->CNT > 0) {
			return true;
		}
		return false;
	}

	public function IsExistKeyword($value, $id = "")
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT COUNT(*) CNT
							FROM `{$this->table}`
							WHERE `Keyword` = '{$db->Escape($value)}'";
		if ($id != "") {
			$query .= " AND `Book_Id` != '{$db->Escape($id)}'";
		}
		$result = $mysqli->query($query);
		$mysqli->close();
		if ($result->fetch_object()->CNT > 0) {
			return true;
		}
		return false;
	}

	public function IsExistTitle($value, $id = "")
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT COUNT(*) CNT
							FROM `{$this->table}`
							WHERE `Title` = '{$db->Escape($value)}'";
		if ($id != "") {
			$query .= " AND `Book_Id` != '{$db->Escape($id)}'";
		}
		$result = $mysqli->query($query);
		$mysqli->close();
		if ($result->fetch_object()->CNT > 0) {
			return true;
		}
		return false;
	}

	public function IsExistAuthor($value, $id = "")
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT COUNT(*) CNT
							FROM `{$this->table}`
							WHERE `Author` = '{$db->Escape($value)}'";
		if ($id != "") {
			$query .= " AND `Book_Id` != '{$db->Escape($id)}'";
		}
		$result = $mysqli->query($query);
		$mysqli->close();
		if ($result->fetch_object()->CNT > 0) {
			return true;
		}
		return false;
	}

	public function IsExistSubject_Id($value, $id = "")
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT COUNT(*) CNT
							FROM `{$this->table}`
							WHERE `Subject_Id` = '{$db->Escape($value)}'";
		if ($id != "") {
			$query .= " AND `Book_Id` != '{$db->Escape($id)}'";
		}
		$result = $mysqli->query($query);
		$mysqli->close();
		if ($result->fetch_object()->CNT > 0) {
			return true;
		}
		return false;
	}

	public function IsExistSynopsis($value, $id = "")
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT COUNT(*) CNT
							FROM `{$this->table}`
							WHERE `Synopsis` = '{$db->Escape($value)}'";
		if ($id != "") {
			$query .= " AND `Book_Id` != '{$db->Escape($id)}'";
		}
		$result = $mysqli->query($query);
		$mysqli->close();
		if ($result->fetch_object()->CNT > 0) {
			return true;
		}
		return false;
	}

	public function IsExistDatePublished($value, $id = "")
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT COUNT(*) CNT
							FROM `{$this->table}`
							WHERE `DatePublished` = '{$db->Escape($value)}'";
		if ($id != "") {
			$query .= " AND `Book_Id` != '{$db->Escape($id)}'";
		}
		$result = $mysqli->query($query);
		$mysqli->close();
		if ($result->fetch_object()->CNT > 0) {
			return true;
		}
		return false;
	}

	public function IsExistX_DateCreated($value, $id = "")
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT COUNT(*) CNT
							FROM `{$this->table}`
							WHERE `X_DateCreated` = '{$db->Escape($value)}'";
		if ($id != "") {
			$query .= " AND `Book_Id` != '{$db->Escape($id)}'";
		}
		$result = $mysqli->query($query);
		$mysqli->close();
		if ($result->fetch_object()->CNT > 0) {
			return true;
		}
		return false;
	}

}
