<? 
	require_once('connection.php');
	require_once ('Helpers.php');
	require_once('/Model/Quotation.php');
	require_once('/Model/QuotationManager.php');
?>
<!doctype html>
<html>
<head>
	<title>Edit</title>
	<meta charset=utf-8>
	<link href="css/readable.css" rel="stylesheet" media="screen">
</head>
<body>
<?
	$id = gValidateID('qid', -1);
	if ($id == -1){
		Redirect('error.php', 'Not correct id, sir', 'index.php');
	}
	$text = '';

	$quote = QuotationManager::Find($id);
	if ($quote == null) {
		die('Error (Quotation not found) '.mysql_error());
	}

?>

<form action ='save_qout.php' method ='POST'>
	Quotation here:<br>
	<textarea name="text"><?echo $quote->getText();?></textarea><br>
	<input name="id" type="hidden" value="<? echo $quote->getId();?>"/>
	<input name="submit" type="submit" value="Save quotation"/>
</form>

</body>
</html>