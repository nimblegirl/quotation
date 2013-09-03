<?
  session_start();
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Error page</title>
</head>
<body style="margin: 0px auto; width: 300px; background: #f2f2f2; border: 1px solid #efefef;">
	<img src="img/cat_tied.png" />

<h1 style="font-size: 2.2em; color: #333;"><?echo $_SESSION['message'];?></h1>

<a href="<? echo $_SESSION['backlink']?>">Back</a>

</body>
</html>