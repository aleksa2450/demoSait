<?php
declare(strict_types=1);
error_reporting(-1);
session_start();


$dbh = new \PDO(
    'mysql:local=localhost;dbname=demo-site;charset=utf8',
    'root',
    '', [
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES'utf8'"
    ]
);



$queryCategories = "SELECT * FROM categories";
$sth = $dbh->prepare($queryCategories);
$sth->execute();
$categories = $sth->fetchAll();
echo'<pre>'; print_r($categories); echo '</pre>';

?>
<!doctype html>
<html lang="ru">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>DEMO-SITE</title>

</head>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand">DEMO-SITE</a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav mr-auto">

            <li class="nav-item active">
                <a class="nav-link" href="/">Главаная</a>
            </li>

            <li class="nav-item">
                <a class="nav-link">Категории</a>
            </li>

        </ul>

    </div>

</nav>
<div class="md-3">
<?php foreach ($categories as $key => $mass): ?>
    <?php if ($mass['alias'] == 'smartfony-i-gadzhety'):?>
        <div class="card" style="width: 18rem; margin:10px;">
            <img src="images/telef.jpg" class="card-img-top" alt="">
            <div style="text-align: center" class="card-body">
                <p><a href="<?php echo $mass['alias']?>.php">Смартфоны и гаджеты</a></p>
            </div>
        </div>

        <?php elseif ($mass['alias'] == 'noutbuki-i-kompyutery'):?>
            <div class="card" style="width: 18rem; margin:10px;">
                <img src="images/noutbuki.jpg" class="card-img-top" alt="">
                <div style="text-align: center" class="card-body">
                    <p><a href="<?php echo $mass['alias']?>.php">Ноутбуки и компьютеры</a></p>
                </div>
            </div>
        <?php elseif ($mass['alias'] == 'televizory'):?>
            <div class="card" style="width: 18rem; margin:10px;">
                <img src="images/telik.jpg" class="card-img-top" alt="">
                <div style="text-align: center" class="card-body">
                    <p><a href="<?php echo $mass['alias']?>.php">Телевизоры</a></p>
                </div>
            </div>
    <?php endif;?>
<?php endforeach; ?>
</div>


<!--<div class="card" style="width: 18rem; margin:10px;">
    <img src="images/noutbuki.jpg" class="card-img-top" alt="">
    <div style="text-align: center" class="card-body">
        <p><a href="">Компьютеры и ноутбуки</a></p>
    </div>
</div>

<div class="card" style="width: 18rem; margin:10px";>
    <img src="images/telik.jpg" class="card-img-top" alt="">
    <div style="text-align: center" class="card-body">
        <p><a href="#">Телевизоры</a></p>
    </div>
</div>-->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>
</html>
