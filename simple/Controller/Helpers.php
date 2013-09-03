<?

function is_correct_id($id){
	if (!is_numeric($id)){
		return false;
	}else{
		if ($id <= 0){
			return false;
		}
	}

	return true;
}

function gValidateID($varName, $default){
	if (isset($_GET[$varName])){ 
		$var = $_GET[$varName];
		if (is_correct_id($var)){
			return $var;
		}
	}
	
	return $default;
}

function pValidateID($varName, $default){
	if (isset($_POST[$varName])){ 
		$var = $_POST[$varName];
		if (is_correct_id($var)){ 
			return $var; 
		}
	}
	
	return $default;
}

function pValidateStr($varName, $default){
	if (isset($_POST[$varName])){
		$var = $_POST[$varName];
		$var = mysql_escape_string($var);
		$var = htmlspecialchars($var);
		return $var;
	}

	return $default;
}

function GetCurrentURL(){
	return 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
}

function Redirect($where, $message, $backlink){
	session_start();
	$_SESSION['message'] = $message;
	$_SESSION['backlink'] = $backlink;
	header("Location:{$where}");
	exit;
}
?>