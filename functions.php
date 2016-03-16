<?php
/**
 * Created by PhpStorm.
 * @author Zachary Hughes <zhughes3@gmail.com>
 * Date: 3/15/2016
 * Time: 9:36 PM
 */
$dbhost = 'localhost';
$dbname = 'social';
$dbuser = 'root';
$dbpass = '';
$appname = 'A Social Network';

//create connection to mysqli database
$connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

//if there is an error with connection
if ($connection->connect_error) {
    die($connection->connect_error);
}

//checks whether a table exists and, if not, creates it
function createTable($name, $query)
{
    queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
    echo "Table '$name' created or already exists.<br>";
}

//issues a query to MySQL, outputting an error msg if it fails
function queryMysql($query)
{
    global $connection;
    $result = $connection->query($query);
    if (!$result) {
        die($connection->error);
    }
    return $result;
}

//destroys a PHP session and clears its data to log users out
function destroySession()
{
    $_SESSION = array();

    if (session_id() != "" || isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time() - 2592000, '/');
    }

    session_destroy();
}

//removes potentially malicious code or tags from user input
function sanitizeString($var)
{
    global $connection;
    $var = strip_tags($var);
    $var = htmlentities($var);
    $var = stripslashes($var);
    return $connection->real_escape_string($var);
}

//display's a user's image and "about me" message if person has one
function showProfile($user)
{
    if (file_exists("user.jpg")) {
        echo "<img src = '$user.jpg' style = 'float: left;'>";
    }

    $result = queryMysql("SELECT * FROM profiles WHERE user = '$user'");

    if ($result->num_rows) {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        echo stripslashes($row['text']) . "<br style = 'clear: left;'><br>";
    }
}

?>