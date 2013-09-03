<?php 
require_once ('connection.php');
require_once ('Helpers.php');
require_once ('../Model/QuotationManager.php');
require_once ('../Model/Quotation.php');

$id = pValidateID('id', -1);
if ($id == -1){
	Redirect('../View/error.php', 'Not correct id, sir', getCurrentURL());
	//die('Error: Not correct id, sir');
}

$text = pValidateStr('text', '@'); 
if ($text == '@'){
	die('Error: Maybe you lose your text, sir?');
}

$q = QuotationManager::Find($id);
if ($q == null){
	die('Error: Quotation with id='.$id.' does not exists');
}
$q-> setText($text);
if (!QuotationManager::Save($q)) {
	die("Error while saving:".mysql_error());
}

header('Location: ../index.php');

?>