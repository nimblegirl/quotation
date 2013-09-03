<?php 
class QuotationManager{
	
	static function Create($q){
		$query = "INSERT INTO `quotation`(`text`, `source_id`) VALUES ('{$q->getText()}', {$q->getSourceId()})"; 
		$qresult = mysql_query($query);
		if (!$qresult){
			return false;
		}else{
			return true;
		}
	}	

	static function Find($id){
		$query = "SELECT * FROM `quotation` WHERE id = {$id}";
		$qresult = mysql_query($query);
		if (!$qresult || mysql_num_rows($qresult) == 0) {
			return null;
		}
		
		$res = mysql_fetch_assoc($qresult);
		$q = new Quotation($id, $res['text'], $res['source_id']);
		return $q;
 	}

 	static function FindQuery($q_string=''){
 		$query = "SELECT * FROM `quotation`".$q_string;
 		$qresult = mysql_query($query);
 		if (!$qresult) {
			return null;
 		}

 		$quotations = array();
 		while($row = mysql_fetch_assoc($qresult)){
 			$quotations [] = new Quotation($row['id'], $row['text'], $row['source_id']);
 		}
 		return $quotations;

 	}

 	static function FindRand(){
 		$res = QuotationManager::FindQuery("ORDER BY RAND() LIMIT 1");
 		return $res[0];
 	}


 	static function Save($q){
	 	$query = "UPDATE `quotation` SET `text` = '{$q->getText()}', `source_id` = {$q->getSourceId()} WHERE id= {$q->getId()}";
		$qresult = mysql_query($query);
		if (!$qresult) {
			return false;
		}else{
			return true;
 	}
 }

 	static function Remove($q){
 		$query = "DELETE FROM `quotation` WHERE id = {$q->getId()}";
 		$qresult = mysql_query($query);
 		if (!$qresult) {
 			return false;
 		}else{
 			return true;
 		}
 	}	

 	static function RemoveById($id){
 		$query = "DELETE FROM `quotation` WHERE id = {$id}";
 		$qresult = mysql_query($query);
 		if (!$qresult) {
 			return false;
 		}else{
 			return true;
 		}
 	}

 	static function AddTag($quotation, $tag){
 	 	$query = "INSERT INTO `quotation_tag`(`quotation_id`, `tag_id`) VALUES ({$quotation->getId()}, {$tag->getId()})";
 	 	$qresult = mysql_query($query);
		if (!$qresult){
			return false;
		}else{
			return true;
		}
 	 }

 	 static function AddTagById($quotation, $tag_id){
 	 	$query = "INSERT INTO `quotation_tag`(`quotation_id`, `tag_id`) VALUES ({$quotation->getId()}, {$tag_id})";
 	 }

 	 static function AddTagByIds($quotation_id, $tag_id){
 	 	$query = "INSERT INTO `quotation_tag`(`quotation_id`, `tag_id`) VALUES ({$quotation_id}, {$tag_id})";
 	 }

 	static function GetTagsById($quotation_id){
 	$query = "SELECT g.* FROM `quotation_tag` as q_t ";
  	$query .= "JOIN `tag` g ON q_t.tag_id = g.id ";
    $query .= "AND q_t.quotation_id = {$quotation_id} ";

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

 	static function GetTags($quotation){
 		return QuotationManager::GetTagsById($quotation->getId());
 		
 	}	
}
?>