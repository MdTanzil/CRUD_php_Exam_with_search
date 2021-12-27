<?php
include_once("config.php");
?>
<html>

<head>
    <title>Homepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <a href="add.html" class="btn btn-primary">Add New Data</a>
    <a href="search.html" class="btn btn-primary">Search Data</a><br /><br />


    <table class="table table-dark table-striped">

        <tr>
            <td>Name</td>
            <td>Age</td>
            <td>Email</td>
            <td>Update</td>
        </tr>
        <?php

        if ($_REQUEST['submit']) {
            $name = $_POST['name'];

            if (empty($name)) {
                $make = '<h4>You must type a word to search!</h4>';
            } else {
                $make = '<h4>No match found!</h4>';
                $sele = "SELECT * FROM users WHERE name LIKE '%$name%'";
                $result = mysqli_query($mysqli, $sele);

                if ($row = mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        // echo '<h4> Id						: ' . $row['id'];
                        // echo '<br> name						: ' . $row['name'];
                        // echo '</h4>';
                        echo "<tr>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['age'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td><a class='btn btn-primary' href=\"edit.php?id=$$row[id]\">Edit</a> || <a class='btn btn-danger' href=\"delete.php?id=$$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
                    }
                } else {
                    echo '<h2> Search Result</h2>';

                    print($make);
                }
            }
        }
        ?>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>