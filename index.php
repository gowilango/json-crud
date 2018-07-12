<?php
$getfile = file_get_contents('data.json');
$jsonfile = json_decode($getfile);
?>
<a href="add.php">Add</a>

<table align="center">
    <tr>
        <th>title</th>
        <th>desc</th>
        <th>link</th>
        <th>date</th>
        <th></th>
    </tr>
    <tbody>
        <?php foreach ($jsonfile->datalist as $index => $var): ?>
            <tr>
                <td><?php echo $var->title; ?></td>
                <td><?php echo $var->desc; ?></td>
                <td><?php echo $var->link; ?></td>
                <td><?php echo $var->date; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $index; ?>">Edit</a>
                    <a href="delete.php?id=<?php echo $index; ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
