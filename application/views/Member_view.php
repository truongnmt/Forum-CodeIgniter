<!DOCTYPE html>
<html lang = "en">

<head>
    <meta charset = "utf-8">
    <title>Member Example</title>
</head>

<body>
<a href = "<?php echo base_url(); ?>
         index.php/stud/add_member">Add</a>

<table border = "1">
    <?php
    $i = 1;
    echo "<tr>";
    echo "<td>Sr#</td>";
    echo "<td>MemberID</td>";
    echo "<td>Name</td>";
    echo "<td>Pass</td>";
    echo "<td>Email</td>";
    echo "<tr>";

    foreach($records as $r) {
        echo "<tr>";
        echo "<td>".$i++."</td>";
        echo "<td>".$r->mem_id."</td>";
        echo "<td>".$r->mem_name."</td>";
        echo "<td>".$r->mem_pass."</td>";
        echo "<td>".$r->mem_email."</td>";
        echo "<td><a href = '".base_url()."index.php/member/edit/"
            .$r->mem_id."'>Edit</a></td>";
        echo "<td><a href = '".base_url()."index.php/member/delete/"
            .$r->mem_id."'>Delete</a></td>";
        echo "<tr>";
    }
    ?>
</table>

</body>

</html>