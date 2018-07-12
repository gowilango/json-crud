<form action="add.php" method="POST">
    <input type="text" name="title" placeholder="title"/>
    <input type="text" name="desc" placeholder="desc"/>
    <input type="text" name="link" placeholder="link"/>
    <input type="text" name="date" placeholder="date"/>
    <input type="submit" name="add"/>
</form>
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
