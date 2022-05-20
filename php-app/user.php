<?php
    try {
    echo "View Users from MySQL using Docker (Tanya V.1.1.0)";
    echo "<br>";

        $link = mysqli_connect("db", "root", "Admin_1jj395qu", "nt_db",3306);
        $result = mysqli_query($link, "SELECT * FROM users");
        while ($row = mysqli_fetch_assoc($result)) {
            echo $row['id'] . ' ' . $row['name'] . '<br>';
        }
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }

?>