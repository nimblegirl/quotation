<?php 
require_once ('../Model/SourceManager.php');
require_once ('../Model/Source.php');
require_once ('../Controller/connection.php');
require_once ('../Model/AuthorManager.php');
require_once ('../Model/Author.php');
require_once ('../Model/TypeManager.php');
require_once ('../Model/Type.php');

 ?>
<html>
<head>
	<title>Add new source</title>
	<meta charset='utf-8'>
	<link href="../css/readable.css" rel="stylesheet" media="screen">

</head>
<body>
 <form action ='../Controller/add_source.php' method ='POST'>
  	<input name="source_name" type="text" /><br>
 	<select name="source_author_id">
	<?
	$authors = AuthorManager::FindQuery();
	foreach ($authors as $author) {
		echo "<option value='{$author->getId()}'>{$author->getName()}</option>";
	}
	?>
 	</select><a href="author.php">Add new author</a><br>
 	<select name="source_type_id"> 
 	<?php 
 	$types = TypeManager::FindQuery();
 	foreach ($types as $type) {
 		echo "<option value='{$type->getId()}'>{$type->getName()}</option>";
 	}
 	?>
 	</select><br>
 	<input name="submit" type="submit" value="Add source"/>
</form>
<?
$sources = SourceManager::FindQuery();
foreach ($sources as $source) {
	echo $source."<br>";
}
?>
</body>
</html>