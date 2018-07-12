<?php
if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];
    $all = file_get_contents('data.json');
    $all = json_decode($all, true);
    $jsonfile = $all["datalist"];
    $jsonfile = $jsonfile[$id];

    if ($jsonfile) {
        unset($all["datalist"][$id]);
        $all["datalist"] = array_values($all["datalist"]);
        file_put_contents("data.json", json_encode($all));
    }
    header("Location: index.php");
}
?>