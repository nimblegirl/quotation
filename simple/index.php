<? 
require_once('/Controller/connection.php');
require_once ('/Model/Quotation.php');
require_once ('/Model/QuotationManager.php');
require_once ('/Model/SourceManager.php');
require_once ('/Model/Source.php');
require_once ('/Model/TypeManager.php');
require_once ('/Model/Type.php');
require_once ('/Model/AuthorManager.php');
require_once ('/Model/Author.php');
require_once ('/Model/TagManager.php');
require_once ('/Model/Tag.php');

?>


<!doctype html>
<html>
<head>
	<title>Quotations</title>
	<meta charset='utf-8'>
	<link href="css/readable.css" rel="stylesheet" media="screen">

</head>
<body>

 <div class="container">
		<div class="page-header">
 			<h1 align="center" class="colour">Free good thougths<small></small></h1>
		</div>
		<div class="row">
			<div class="span3">
				<div class="sidebar-nav well">
		            <ul class="nav nav-list">
		              <li class="nav-header">Navigate</li>
		              <li><a href="index.php">Quotations</a></li>
		              <li><a href="View/quotation.php">Add new quotation</a></li>
		              <li><a href="View/rand.php">Random</a></li>
		            </ul>
		  		</div>	
			</div>				
			<div class="span8 well">
				<?	
					
					echo "<div><ul>";
					$quotations = QuotationManager::FindQuery();

					foreach ($quotations as $quote) {
						$source = SourceManager::Find($quote->getSourceId());
						$authors = SourceManager::GetAuthors($source);
						$type = TypeManager::Find($source->getTypeId());
						$tags = QuotationManager::GetTags($quote); 
						
						
						echo "<li>".$quote->printable()." ({$source->getName()}) ({$type->getName()})";
						foreach ($authors as $author) {
								echo $author->getName();
						}
						echo "</li>";

						foreach ($tags as $tag) {
							echo $tag->getName();
						}
					}
					echo "</ul></div>";
			?>
			<hr>
			
					
			</div>
		</div>
	</div>
</body>
</html>