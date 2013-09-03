<?php 
class SourceManager{
	
	static function Create($s){
		$query = "INSERT INTO `source`(`name`, `type_id`) VALUES ('{$s->getName()}', {$s->getTypeId()})"; 
		$qresult = mysql_query($query);
		if (!$qresult){
			return false;
		}else{
			$s->setId(mysql_insert_id());
			return true;
		}
	}	

	static function Find($id){
		$query = "SELECT * FROM `source` WHERE id = {$id}";
		$qresult = mysql_query($query);
		if (!$qresult || mysql_num_rows($qresult) == 0) {
			return null;
		}
		
		$res = mysql_fetch_assoc($qresult);
		$s = new Source($id, $res['name'], $res['type_id']);
		return $s;
 	}

	static function FindQuery($q_string=''){
	 		$query = "SELECT * FROM `source`".$q_string;
	 		$qresult = mysql_query($query);
	 		if (!$qresult) {
				return null;
	 		}

	 		$sources = array();
	 		while($row = mysql_fetch_assoc($qresult)){
	 			$sources [] = new Source($row['id'], $row['name'], $row['type_id']);
	 		}
	 		return $sources;

	 	}

  	static function Save($s){
	 	$query = "UPDATE `source` SET `name` = '{$s->getName()}', `type_id` = {$s->getTypeId()} WHERE id= {$s->getId()}";
		$qresult = mysql_query($query);
		if (!$qresult) {
			return false;
		}else{
			return true;
 	}
 }

 	static function Remove($s){
 		$query = "DELETE FROM `source` WHERE id = {$s->getId()}";
 		$qresult = mysql_query($query);
 		if (!$qresult) {
 			return false;
 		}else{
 			return true;
 		}
 	}	

 	static function RemoveById($id){
 		$query = "DELETE FROM `source` WHERE id = {$id}";
 		$qresult = mysql_query($query);
 		if (!$qresult) {
 			return false;
 		}else{
 			return true;
 		}
 	}

 	//author
 	 static function AddAuthor($source, $author){
 	 	$query = "INSERT INTO `source_author`(`source_id`, `author_id`) VALUES ({$source->getId()}, {$author->getId()})";
 	 	$qresult = mysql_query($query);
		if (!$qresult){
			return false;
		}else{
			return true;
		}
 	 }

 	 static function AddAuthorById($source, $author_id){
 	 	$query = "INSERT INTO `source_author`(`source_id`, `author_id`) VALUES ({$source->getId()}, {$author_id})";
 	 	$qresult = mysql_query($query);
		if (!$qresult){
			return false;
		}else{
			return true;
		}
 	}

 	 static function AddAuthorByIds($source_id, $author_id){
 	 	$query = "INSERT INTO `source_author`(`source_id`, `author_id`) VALUES ({$source_id}, {$author_id})";
 	 	$qresult = mysql_query($query);
		if (!$qresult){
			return false;
		}else{
			return true;
		}
 	}

 	static function GetAuthorsById($source_id){
	 	$query = "SELECT a.* FROM `source_author` as s_a ";
	  	$query .= "JOIN `author` a ON s_a.author_id = a.id ";
	    $query .= "AND s_a.source_id = {$source_id} ";

		$qresult = mysql_query($query);
	  	if (!$qresult) {
	   		return null;
	   	}

	   	$authors = array();
	   	while($row = mysql_fetch_assoc($qresult)){
	    	$authors [] = new Author($row['id'], $row['name']);
	   	}
   		return $authors;
 	}

 	static function GetAuthors($source){
 		return SourceManager::GetAuthorsById($source->getId());
 		
 	}
}
?>