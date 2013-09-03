<?php 
class typeManager{
	
	static function Create($t){
		$query = "INSERT INTO `type`(`name`) VALUES ('{$t->getName()}')"; 
		$qresult = mysql_query($query);
		if (!$qresult){
			return false;
		}else{
			return true;
		}
	}	

	static function Find($id){
		$query = "SELECT * FROM `type` WHERE id = {$id}";
		$qresult = mysql_query($query);
		if (!$qresult || mysql_num_rows($qresult) == 0) {
			return null;
		}
		
		$res = mysql_fetch_assoc($qresult);
		$t = new Type($id, $res['name']);
		return $t;
 	}

	static function FindQuery($q_string=''){
	 		$query = "SELECT * FROM `type`".$q_string;
	 		$qresult = mysql_query($query);
	 		if (!$qresult) {
				return null;
	 		}

	 		$types = array();
	 		while($row = mysql_fetch_assoc($qresult)){
	 			$types [] = new Type($row['id'], $row['name']);
	 		}
	 		return $types;

	 	}

  	static function Save($t){
	 	$query = "UPDATE `type` SET `name` = '{$t->getName()}' WHERE id= {$t->getId()}";
		$qresult = mysql_query($query);
		if (!$qresult) {
			return false;
		}else{
			return true;
 	}
 }

 	static function Remove($t){
 		$query = "DELETE FROM `type` WHERE id = {$t->getId()}";
 		$qresult = mysql_query($query);
 		if (!$qresult) {
 			return false;
 		}else{
 			return true;
 		}
 	}	

 	static function RemoveById($id){
 		$query = "DELETE FROM `type` WHERE id = {$id}";
 		$qresult = mysql_query($query);
 		if (!$qresult) {
 			return false;
 		}else{
 			return true;
 		}
 	}	
}
?>