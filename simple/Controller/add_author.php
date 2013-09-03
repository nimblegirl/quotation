<? 
require_once('connection.php');
require_once ('../Model/AuthorManager.php');
require_once ('../Model/Author.php');
require_once ('Helpers.php');

	$name = pValidateStr('author_name',''); 
	if ($name == '' ){ 
		Redirect('../View/error.php', 'Not correct. Author name is empty', '../View/author.php');
	}
	
	$author = new Author(0, $name);
	if (!AuthorManager::Create($author))	{
		Redirect('../View/error.php', 'Error while saving Author', '../View/author.php');
	}

	header('Location: ../View/source.php');
?>