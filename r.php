<?php
require_once 'db.php';
$token = isset($_GET['t'])?$_GET['t']:'';
$query = $mysql->query("SELECT link FROM links WHERE token = '{$token}'");
if ($result = $query->fetch_assoc()) {
    if (isset($result['link'])) {
        header('Location: '.$result['link']);
    }
}
?>

<html>
    <body>
        Token is not found
    </body>
</html>
