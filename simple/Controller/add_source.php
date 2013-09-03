<? 
require_once('connection.php');
require_once ('../Model/SourceManager.php');
require_once ('../Model/Source.php');
require_once ('../Model/AuthorManager.php');
require_once ('../Model/Author.php');
require_once ('/Helpers.php');
require_once ('../View/source.php');

	$name = pValidateStr('source_name',''); 
	$author_id = pValidateId('source_author_id', -1);
	$type_id = pValidateId('source_type_id', -1);
	if ($name == '' || $author_id == -1 || $type_id == -1){ 
		Redirect('../View/error.php', 'Not correct Author or source or name is empty', '../View/source.php');
	}
	
	$source = new Source(0, $name, $type_id);
	if (!SourceManager::Create($source))	{
		Redirect('../View/error.php', 'Error while saving', '../View/source.php');
	}

	//add link between author and source
	
	if (!SourceManager::AddAuthorById($source, $author_id)){
		Redirect('../View/error.php', "Error. Link between author and source was not created. <hr>(".mysql_error().")", '../View/source.php');
	}


	header('Location: ../index.php');
?>