<?php
    $name = $prayer = $submitMsg = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(!empty($_POST['user_name'])) {
            $name = test_input($_POST['user_name']);
        } else {
            $name = "N/A";
        }

        if(!empty($_POST['user_request'])) {
            $prayer = test_input($_POST['user_request']);
        } else {
            $prayer = "";
        }

        if ($name && $prayer) {
            require('db/db_config.php');
            $sql = "INSERT INTO prayer_entries (name, prayer_request, accepted) VALUES ('$name', '$prayer', \"0\")";

            if ($conn->query($sql) === TRUE) {
                $submitMsg = "Successfully Submitted Prayer!";
            } else {
                $submitMsg = "Oopps! There was an error submitting your prayer.";
                //echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo 'cannot store data';
        }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="stylesheet" href="mobile_style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Tektur:wght@800&display=swap">
    <title>We The Sojourners</title>
</head>
<body>
    <header>
        <div>
            <h1>We The <span id="sojourners-text">Sojourners</span></h1>
            <p id="tagline">Here to pray for you.</p>
        </div>
        <div style="margin-right: 25px" id="media-links">
            <span>Check out our videos:</span>
            <section>
                <a href="https://www.tiktok.com/@wearesojourners" target="_blank"><img src="assets/tt-logo.png" alt="TikTok"></a>
                <a href="https://www.youtube.com/@wethesojourners" target="_blank"><img src="assets/yt-logo.png" alt="Youtube"></a>
            </section>
        </div>
    </header>
    <div class="prayer-input-container">
        <h1>How can we <span id="pray-text">pray</span> for you?</h1>
        <p>Enter your prayer requests below, and prayers will start coming your way!</p>
        <p style="font-style:italic;font-size:12px;">**Your prayer request will be displayed below once approved.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <input type="text" name="user_name" id="nameField" placeholder="your name (optional)">
            <input type="text" name="user_request" id="requestField" placeholder="prayer request" onkeyup="checkRequestField(this.value)">
            <input type="submit" id="requestSubmitBtn">
        </form>
        <p style="margin-top:20px;color:#4eac55;"><?php echo $submitMsg; ?></p>
    </div>
    <div class="content-003">
        <h1>Take some time to read and pray for others.</h1>
        <p style="margin-top:-15px;">Check out the prayer requests below:</p>
        <img src="assets/arrowdown.png" alt="arrowdown">
    </div>
    <div class="main-request-container">
        <?php require('db/db_fetch_data.php'); ?>
    </div>
    <script type="text/javascript">
        if (screen.width > 980) {
            document.location = "index.php";
        }

        function checkRequestField(str) {
            if (str != "") {
                document.getElementById('requestSubmitBtn').disabled = false;
            } else {
                document.getElementById('requestSubmitBtn').disabled = true;
            }
        }
    </script>
</body>
</html>