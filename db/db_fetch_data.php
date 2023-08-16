<?php

    require('db_config.php');

    $sql = "SELECT id, name, prayer_request, date_added FROM prayer_entries WHERE accepted='1' ORDER BY id DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        $counter = 0;
        while($row = $result->fetch_assoc()) {
            if ($counter % 2 == 0) {
                echo '<div class="requests-e" id="requestContainer"><h3>'.$row['prayer_request'].'</h3><p>'.$row['name'].' - <span style="font-style:italic;">'.$row['date_added'].'</span></p></div>';
            } else {
                echo '<div class="requests-o" id="requestContainer"><h3>'.$row['prayer_request'].'</h3><p>'.$row['name'].' - <span style="font-style:italic;">'.$row['date_added'].'</span></p></div>';
            }
            $counter = $counter + 1;
        }
    } else {
        echo "0 results";
    }

    $conn->close();

?>