<?php 
class TagManager{
	
	static function Create($g){
		$query = "INSERT INTO `tag`(`name`) VALUES ('{$g->getName()}')"; 
		$qresult = mysql_query($query);
		if (!$qresult){
			return false;
		}else{
			return true;
		}
	}	

	static function Find($id){
		$query = "SELECT * FROM `tag` WHERE id = {$id}";
		$qresult = mysql_query($query);
		if (!$qresult || mysql_num_rows($qresult) == 0) {
			return null;
		}
		
		$res = mysql_fetch_assoc($qresult);
		$g = new Tag($id, $res['name']);
		return $g;
 	}

	static function FindQuery($q_string=''){
	 		$query = "SELECT * FROM `tag`".$q_string;
	 		$qresult = mysql_query($query);
	 		if (!$qresult) {
				return null;
	 		}

	 		$tags = array();
	 		while($row = mysql_fetch_assoc($qresult)){
	 			$tags [] = new Tag($row['id'], $row['name']);
	 		}
	 		return $tags;

	 	}

  	static function Save($g){
	 	$query = "UPDATE `tag` SET `name` = '{$g->getName()}' WHERE id= {$g->getId()}";
		$qresult = mysql_query($query);
		if (!$qresult) {
			return false;
		}else{
			return true;
 	}
 }

 	static function Remove($g){
 		$query = "DELETE FROM `tag` WHERE id = {$g->getId()}";
 		$qresult = mysql_query($query);
 		if (!$qresult) {
 			return false;
 		}else{
 			return true;
 		}
 	}	

 	static function RemoveById($id){
 		$query = "DELETE FROM `tag` WHERE id = {$id}";
 		$qresult = mysql_query($query);
 		if (!$qresult) {
 			return false;
 		}else{
 			return true;
 		}
 	}	
}
?>