<?php

$host = '127.0.0.1';
$db   = 'test';
$user = 'root';
$pass = '';
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

function CreateConnObj($dsn,$user,$pass,$opt){
return new PDO($dsn, $user, $pass, $opt);

}
function InsertData($pdo,$table,$value){

if (isset($values['name'])) $name = $values['name'];
print($name);
$sql = $pdo->prepare("INSERT INTO ". $table ." (name) VALUES(?)");
$sql->bindParam(1,$name);
$sql->execute();
if ($sql){ return true; } else return false;
}

function GetPicByName($pdo,$tableName,$value){

if (isset($value)) $name = $value;
print($name);

$sql = $pdo->prepare("SELECT * FROM ". $tableName ." WHERE name=?");
$sql->execute(array($name));
$result = $sql->fetchAll();
print_r($result);
return result;
}

function GetALL($pdo,$tableName){

$sql = $pdo->prepare("SELECT * FROM ". $tableName);
$sql->execute();
$result = $sql->fetchAll();
print_r($result);
return result;
}

function UpdateField($pdo,$tableName,$values){

if (isset($values['name'])) $name = $values['name'];
if (isset($values['id'])) $id = $values['id'];

$sql = $pdo->prepare("UPDATE ".$tableName." SET name = ? WHERE id = ?");
$sql->bindParam(1,$name);
$sql->bindParam(2,$id);
$sql->execute();
if ($sql){ return true; } else return false;

}

function DeleteField($pdo,$tableName,$IDvalue){

if (isset($IDvalue)) $id = $IDvalue;

$sql = $pdo->prepare("DELETE FROM ".$tableName." WHERE id = ?");
$sql->bindParam(1,$id);
$sql->execute();
if ($sql){ return true; } else return false;

}

public fuction insertBLOB($pdo,$tabName,$filesTable)
{
if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) 
	{ 
		$tmpName  = $_FILES['image']['tmp_name'];  

		$fp = fopen($tmpName, 'rb'); // read binary
	} 

	try
		{
			$stmt = $pdo->prepare("INSERT INTO ".$tabName." ( picture ) VALUES ( ? )");
			$stmt->bindParam(1, $fp, PDO::PARAM_LOB);
			$pdo->errorInfo();
			$stmt->execute();
		}
		catch(PDOException $e)
		{
			'Error : ' .$e->getMessage();
		}
	}
public function selectBlob($pdo,$tableName,$id) {
 
        $sql = "SELECT pict,
                       nazwa,
					   opis
                   FROM "$tableName."
                  WHERE id = :id;";
 
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(":id" => $id));
        $stmt->bindColumn(1, $pict,PDO::PARAM_LOB);
        $stmt->bindColumn(2, $nazwa);
		$stmt->bindColumn(3, $opis);
 
        $stmt->fetch(PDO::FETCH_BOUND);
 
        return array("pict" => $pict,
            "nazwa" => $nazwa, "opis" => $opis);
    }
//$pdo = CreateConnObj($dsn, $user, $pass, $opt);
//$status = InsertData($pdo,'test',$value);
//var_dump($status);
//GetPicByName($pdo,'test','Pawel')
//GetALL($pdo,'test');
//$values = Array();
//$values['name'] = 'Pawel';
//$values['id'] = 2;
//$status = UpdateField($pdo,'test',$values);
//var_dump($status);
//$IDvalue = 6;
//$status = DeleteField($pdo,'test',$IDvalue);
//var_dump($status);
?>