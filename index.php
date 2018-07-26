<?php
$getfile = file_get_contents('data.json');
$jsonfile = json_decode($getfile);
?>
<html>
	<head>
		<title> PHP CURD - JSON </title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	</head>

<body style="background-color: black;">

<style> *{ color: white; }</style><br>

<div class="container">
<h3>PHP CRUD using JSON &nbsp; <a class="btn btn-outline-primary" href="add.php">Add</a></h3>

<table class="table">
<br>
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">title</th>
      <th scope="col">desc</th>
      <th scope="col">link</th>
	  <th scope="col">date</th>
	  <th></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($jsonfile->datalist as $index => $var): ?>
    <tr>
	  <td><?php echo $index+1; ?></td>
      <td><?php echo $var->title; ?></td>
      <td><?php echo $var->desc; ?></td>
	  <td><?php echo $var->link; ?></td>
	  <td><?php echo $var->date; ?></td>
	  <td>
	  	<a class="btn btn-outline-warning" href="edit.php?id=<?php echo $index; ?>">Edit</a>
	  	<a class="btn btn-outline-danger" href="delete.php?id=<?php echo $index; ?>">Delete</a>
	  </td>
    </tr>
	 <?php endforeach; ?>
		<td></td><td></td><td></td><td></td><td></td><td></td>
  </tbody>
</table>
</div>
</body>
</html>
