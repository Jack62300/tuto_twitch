<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/custom.css">

  </head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Page 1</a></li>
      <li><a href="#">Page 2</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>
<div class="container">
<?php
require_once('inc/config.php');


$news = $bdd->query('SELECT * FROM news ');

while($donnees = $news->fetch())
{
?>


  <div class="panel panel-default">
  <div class="panel-heading"><?php echo $donnees['Title'];   ?><p class="author"><?php echo $donnees['auteur'];   ?></p></div>
  <div class="panel-body"><div ><img class="img-right" src="<?php echo $donnees['banner'];   ?>"></div><p class="contenue"><?php echo $donnees['contenue'];   ?></p><a href="?action=delete&id=<?php echo $donnees['ID'];  ?>"><button type="button" class="btn btn-info button_lire">Supprimer</button></a></div>
</div>
  <?php
}

if(isset($_GET['action']))
{
	
	if($_GET['action'] == "delete")
	{
		
		$delete = $bdd->query('DELETE FROM news WHERE id="'.$_GET['id'].'"');
		echo 'News supprimé avec succées';
		
	}
	
}

?>
  

</div>

</body>
</html>