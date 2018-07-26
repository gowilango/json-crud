<html>
<head>
	<title>Add</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>

<body style="background-color: black;">

<style> *{color: white;}</style>

<center>
<div class="container"><br><br>
<h4>Add</h4><br>

<form action="add.php" method="POST">
  <div class="form">
    <div class="col-7">
      <input type="text" class="form-control" placeholder="title" required name="title"/>
    </div><br>
    <div class="col-7">
      <input type="text" class="form-control" placeholder="desc" name="desc"/>
    </div><br>
    <div class="col-7">
      <input type="text" class="form-control" placeholder="link" name="link"/>
    </div><br>
    <div class="col-7">
      <input type="text" class="form-control" placeholder="date" name="date"/>
    </div><br>
	<div class="col-auto">
      <input class="btn btn-outline-primary" value="Add" type="submit" name="add"/>
	  <a href="index.php" class="btn btn-outline-danger">Cancel</a>
	</div>
	</div>
</form>
</div>
</center>
</body>
</html>

<?php
if (isset($_POST["add"])) {
    $file = file_get_contents('data.json');
    $data = json_decode($file, true);
    unset($_POST["add"]);
    $data["datalist"] = array_values($data["datalist"]);
    array_push($data["datalist"], $_POST);
    file_put_contents("data.json", json_encode($data, JSON_PRETTY_PRINT));
    header("Location: index.php");
}
?>
