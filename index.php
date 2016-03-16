<?php
/**
 * Created by PhpStorm.
 * @author Zachary Hughes <zhughes3@gmail.com>
 * Date: 3/15/2016
 * Time: 10:56 PM
 * Description: Landing page for the site where you can "sell" the best parts of your site to encourage signups.
 */

require_once 'header.php';

echo "<br><span class = 'main'>Welcome to $appname,";

if ($loggedin) {
    echo " $user, you are logged in.";
} else {
    echo ' please sign up and/or log in to join in all the fun!';
}

?>

    </span><br><br>
</body>
</html>
