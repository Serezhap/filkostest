<?php
require_once 'db.php';
$url = isset($_POST['link'])?$_POST['link']:'';

if (strpos($url, 'http') !== 0){
    $url = 'http://'.$url;
}
if (filter_var($url, FILTER_VALIDATE_URL)){
    $query = $mysql->query("SELECT token FROM links WHERE link = '{$url}'");
    $result = $query->fetch_assoc();
    if (isset($result['token'])) {
        $token = $result['token'];
    } else {
        $token = substr(str_replace(['+', '/', '='], '', base64_encode(random_bytes(32))), 0, 6);
        $query = $mysql->query("INSERT INTO links (link, token) VALUES ('{$url}', '{$token}')");
    }
    $generatedLink = 'http://'.$_SERVER['HTTP_HOST'].'/r.php?t='.$token;
} else {
    redirect('/?error="Link is not valid"');
}

function redirect($url) {
    header('Location: '.$url);
}
?>
<html>
<head>
    <title>Генератор кратких ссылок</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col s6 offset-s3">
            <h1>Генератор кратких ссылок</h1>
            Готовая краткая ссылка: <a href="<?=$generatedLink; ?>"><?=$generatedLink?></a>
        </div>
    </div>
</div>
</body>
</html>

