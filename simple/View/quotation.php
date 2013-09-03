<?php  
require_once('../Controller/connection.php');
require_once ('../Model/Source.php');
require_once ('../Model/SourceManager.php');
?>


<html>
<head>
	<title>Add quotation</title>
	<meta charset='utf-8'>
	<link href="../css/readable.css" rel="stylesheet" media="screen">
</head>
<body>

</body>
</html>


<form action ='../Controller/add_quot.php' method ='POST'>
				Quotation here:<br>
				<textarea name="text"></textarea><br>
				<select name = "source">
					<?
					$sources = SourceManager::FindQuery();
					foreach ($sources as $source) {
						echo "<option value = '{$source->getId()}'>{$source->getName()}</option>";
					}
					?>
				</select>
				<a href="source.php">Add new source</a><br>
				<input name="submit" type="submit" value="Add quotation"/>
			</form>