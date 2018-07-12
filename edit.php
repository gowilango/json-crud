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
    <form action="edit.php" method="POST">
        <input type="hidden" value="<?php echo $id ?>" name="id"/>
        <input type="text" value="<?php echo $jsonfile["title"] ?>" name="title"/>
        <input type="text" value="<?php echo $jsonfile["desc"] ?>" name="desc"/>
        <input type="text" value="<?php echo $jsonfile["link"] ?>" name="link"/>
        <input type="text" value="<?php echo $jsonfile["date"] ?>" name="date"/>
        <input type="submit"/>
    </form>
<?php endif; ?>
