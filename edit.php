<?php
if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];
    $getfile = file_get_contents('data.json');
    $jsonfile = json_decode($getfile, true);
    $jsonfile = $jsonfile["datalist"];
    $jsonfile = $jsonfile[$id];
}

if (isset($_POST["id"])) {
    $id = (int) $_POST["id"];
    $getfile = file_get_contents('data.json');
    $all = json_decode($getfile, true);
    $jsonfile = $all["datalist"];
    $jsonfile = $jsonfile[$id];

    $post["title"] = isset($_POST["title"]) ? $_POST["title"] : "";
    $post["desc"] = isset($_POST["desc"]) ? $_POST["desc"] : "";
    $post["link"] = isset($_POST["link"]) ? $_POST["link"] : "";
    $post["date"] = isset($_POST["date"]) ? $_POST["date"] : "";



    if ($jsonfile) {
        unset($all["datalist"][$id]);
        $all["datalist"][$id] = $post;
        $all["datalist"] = array_values($all["datalist"]);
        file_put_contents("data.json", json_encode($all, JSON_PRETTY_PRINT));
    }
    header("Location: index.php");
}
?>
<?php if (isset($_GET["id"])): ?>
<html>
	<head>
		<title>Edit ID: <?php echo $id ?></title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	</head>
	
<body style="background-color: black;">

<style> *{color: ;} </style>

<div class="container"><br><br><br>
<form action="edit.php" method="POST">
  <div class="form-row">
   <input type="hidden" value="<?php echo $id ?>" name="id"/>
    <div class="col-5">
      <input type="text" class="form-control" placeholder="title" value="<?php echo $jsonfile["title"] ?>" name="title"/>
    </div><br><br>
    <div class="col-7">
      <input type="text" class="form-control" placeholder="desc" value="<?php echo $jsonfile["desc"] ?>" name="desc"/>
    </div><br><br>
    <div class="col-7">
      <input type="text" class="form-control" placeholder="link" value="<?php echo $jsonfile["link"] ?>" name="link"/>
    </div><br><br>
    <div class="col-5">
      <input type="text" class="form-control" placeholder="date" value="<?php echo $jsonfile["date"] ?>" name="date"/> 
    </div>
    <div class="col-auto my-1">
      <input class="btn btn-outline-warning" value="Update" type="submit"/>
    </div>
    <div class="col-auto my-1">
	  <a href="index.php" class="btn btn-outline-danger">Cancel</a>
    </div>
	</div>
</form>
<?php endif; ?>
</div>
</body>
</html>