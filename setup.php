<?php
/**
* Created by PhpStorm.
* @author Zachary Hughes
<zhughes3@gmail.com>
* Date: 3/15/2016
* Time: 10:42 PM
* Description: Set up the MySQL tables to use in the social networking site.
*      Tables created are:
*      1) members: username 'user' (indexed), password 'pass'
*      2) messages: ID 'id' (indexed), author 'auth' (indexed), recipient 'recip', message type 'pm', message 'message'
*      3) friends: username 'user' (indexed), friend's username 'friend'
*      4) profiles: username 'user' (indexed), "about me" 'text'
*/
?>

<!DOCTYPE html>
<html>
<head>
    <title>Setting up database</title>
</head>
<body>
    <h3>Setting up...</h3>

    <?php
    require_once 'functions.php';

    createTable('members',
        'user VARCHAR(16),
        pass VARCHAR(16),
        INDEX(user(6))');

    createTable('messages',
        'id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        auth VARCHAR(16),
        recip VARCHAR(16),
        pm CHAR(1),
        time INT UNSIGNED,
        message VARCHAR(4096),
        INDEX(auth(6)),
        INDEX(recip(6))');

    createTable('friends',
        'user VARCHAR(16),
        friend VARCHAR(16),
        INDEX(user(6)),
        INDEX(friend(6))');

    createTable('profiles',
        'user VARCHAR(16),
        text VARCHAR(4096),
        INDEX(user(6))');

    ?>

    <br> ...done.
</body>
</html>