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
                <form method="post" action="/link_add.php">
                    <?php if (isset($_GET['error'])): ?>
                        <p class="red-text text-accent-4"><?='Error: '.$_GET['error']; ?></p>
                    <?php endif; ?>
                    <input type="text" name="link" placeholder="Введите краткую ссылку">
                    <button class="btn waves-effect waves-light" type="submit">Сгенерировать</button>
                </form>
            </div>
        </div>
    </div>
    </body>
</html>
