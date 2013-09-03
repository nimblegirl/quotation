<?
require_once('connection.php');
require_once ('../Model/QuotationManager.php');
require_once ('../Model/Quotation.php');
require_once ('Helpers.php');

	$text = pValidateStr('text','@'); 
	$source_id = pValidateId('source', -1);
	if ($text == '@' || $source_id == -1) {
		Redirect('../View/error.php', 'Not correct source', "../index.php");

	}
	
	$q = new Quotation(0, $text, $source_id);
	if (!QuotationManager::Create($q)){
		die("Error while saving:".mysql_error());		
	}

	header('Location: ../index.php');
?>