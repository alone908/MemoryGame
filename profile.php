<html>
<head>
    <link href="css/style.css" rel="stylesheet">
    <link href="css/jquery.fileupload.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Architects+Daughter' rel='stylesheet' type='text/css'>
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/jquery.ui.widget.js"></script>
    <script src="js/jquery.fileupload.js"></script>
    <script src="js/jquery.fileupload-ui.js"></script>
    <script src="js/jquery.fileupload-process.js"></script>
    <script src="js/jquery.fileupload-validate.js"></script>
    <script src="js/profile.js"></script>
</head>
<body style="background-image:url(images/background.jpg)">

<?php

if (!isset($_SESSION)) {
    session_start();
}

$playerid = $_SESSION['playerid'];
$playername = $_SESSION['playername'];

$servername = "localhost";
$username = "root";
$password = "A123456b";
$dbname = "memorygame";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    //echo "Connected successfully";
}

$sql = "SELECT * FROM player_info WHERE id='" . mysqli_real_escape_string($conn, $playerid) . "'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $country = $row['country'];
    $playeremail = $row['email'];
    $player_icon = $row['player_icon'];
} else {
    echo "Duplicate User!";
}
?>

<h1 class = 'profile_h1'><?php echo $playername; ?>'s Profile.</h1>"

<div class='info'>

    <div class='playericon fileinput-button'>
        <img id="player_avatar" src='images/playericon/<?php echo $player_icon; ?>'/>
        <input id='fileupload' type='file' name='files[]' accept='image/*' style=''>
        <div id='uploading_cover'>
            <img src='images/loading.gif' style='width: 100%; height: 100%;'/>
        </div>
    </div>

    <div class='info_detail'>
        <h2><?php echo $playername; ?></h2>
        <h3><?php echo $firstname . " " . $lastname; ?></h3>

        <table class='info_table'>
            <tr>
                <td>Country: <?php echo $country; ?></td>
            </tr>
            <tr>
                <td>Email: <?php echo $playeremail; ?></td>
            </tr>
        </table>
    </div>

</div>

<div class='history_container'>

    <div class='history'>

        <div class='history_op'>
            <ul>
                <li class='yours_li tab_up'>Your History</li>
                <li class='all_li tab_down'>All Players' History</li>
                <li class='last_li'></li>
            </ul>
        </div>

        <table class='yours_table'>

            <tr>
                <td>Username</td>
                <td>Rows</td>
                <td>Columns</td>
                <td>Total Icons</td>
                <td>Refresh Icons</td>
                <td>Bomb Icons</td>
                <td>Chance Tools</td>
                <td>Peek Tools</td>
                <td>Level</td>
                <td>Result</td>
                <td>Score</td>
                <td>Timestamp</td>
            </tr>

            <?php

                $sql = "SELECT * FROM history WHERE player_id='" . mysqli_real_escape_string($conn, $playerid) . "' order by timestamp desc";
                $result = $conn->query($sql);

                while ($row = $result->fetch_assoc()) { ?>
            <tr>
               <td><?php echo $row['username'] ?></td>
               <td><?php echo $row['rows'] ?></td>
               <td><?php echo $row['columns'] ?></td>
               <td><?php echo $row['game_size'] ?></td>
               <td><?php echo $row['refresh_icons'] ?></td>
               <td><?php echo $row['bomb_icons'] ?></td>
               <td><?php echo $row['chance_tools'] ?></td>
               <td><?php echo $row['peek_tools'] ?></td>
               <td><?php echo $row['level'] ?></td>
               <td><?php echo $row['result'] ?></td>
               <td><?php echo $row['score'] ?></td>
               <td><?php echo $row['timestamp'] ?></td>
             </tr>
            <?php
                }
            ?>

        </table>

        <table class='all_table displaynone'>

            <tr>
                <td>Username</td>
                <td>Rows</td>
                <td>Columns</td>
                <td>Total Icons</td>
                <td>Refresh Icons</td>
                <td>Bomb Icons</td>
                <td>Chance Tools</td>
                <td>Peek Tools</td>
                <td>Level</td>
                <td>Result</td>
                <td>Score</td>
                <td>Timestamp</td>
            </tr>

            <?php
                $sql = "SELECT * FROM history WHERE id <= '1000' order by timestamp desc";
                $result = $conn->query($sql);

                while ($row = $result->fetch_assoc()) { ?>
            <tr>
               <td><?php echo $row['username'] ?></td>
               <td><?php echo $row['rows'] ?></td>
               <td><?php echo $row['columns'] ?></td>
               <td><?php echo $row['game_size'] ?></td>
               <td><?php echo $row['refresh_icons'] ?></td>
               <td><?php echo $row['bomb_icons'] ?></td>
               <td><?php echo $row['chance_tools'] ?></td>
               <td><?php echo $row['peek_tools'] ?></td>
               <td><?php echo $row['level'] ?></td>
               <td><?php echo $row['result'] ?></td>
               <td><?php echo $row['score'] ?></td>
               <td><?php echo $row['timestamp'] ?></td>
            </tr>

            <?php
                }
            ?>

        </table>

    </div>

</div>

<div history_bt>
    <form class='history_form' action='index.php' method='post'>
        <button type='submit'>Go Back.</button>
    </form>
</div>

</body>

</html>
