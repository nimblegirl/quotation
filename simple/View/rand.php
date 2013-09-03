<?php 
require_once('../Controller/connection.php');
require_once ('../Model/Quotation.php');
require_once ('../Model/QuotationManager.php');
 ?>
<html>
<head>
	<title>Random</title>
	<meta charset='utf-8'>
	<link href="/css/readable.css" rel="stylesheet" media="screen">
</head>
<body>
	<form action = '' method = ''>
	<?php 
	$q = QuotationManager::FindRand();
	echo $q;
	?>

	<br><input name="submit" type="submit" value="Do it random!"/>
	</form>
</body>
</html>
