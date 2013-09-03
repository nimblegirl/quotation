<?php 
require_once ('../Controller/connection.php');
require_once ('../Model/AuthorManager.php');
require_once ('../Model/Author.php');
?>

<html>
<head>
	<title>Add New Author</title>
	<meta charset='utf-8'>
	<link href="../css/readable.css" rel="stylesheet" media="screen">

</head>
<body>
 <form action ='../Controller/add_author.php' method ='POST'>
  	<input name="author_name" type="text" /><br>
  	<input name="submit" type="submit" value="Add new author"/>
</form>
<?
$authors = AuthorManager::FindQuery();
foreach ($authors as $author) {
	echo $author."<br>";
}
?>
</body>
</html>