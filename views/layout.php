<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/assets/style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <title></title>
</head>
<body>
<header>
    <nav class="navleft">
        <h1>Coderland</h1>
        <a href="../public/">Home</a>
        <a href="../public/products">Advices</a>
        <a href="../public/front">Front-End</a>
        <a href="../public/back">Back-End</a>
        <a href="../public/rps">Exemple</a>
        <a href="../public/contact">Contact</a>
    </nav>

    <div class="navright">
            <?php if (!isset($_SESSION["user"])):?>
                <p><a href="../public/signup">Sign-Up</a></p>
                <p><a href="../public/login">Log-In</a></p>
            <?php endif; ?>

            <?php if (!empty($_SESSION["user"])):?>

                <a href="../public/logout">Log-Out</a>
                <?php if($_SESSION["user"]["role"]==="1"):?>
                    <a href="../public/admin">Admin</a>
                <?php endif; ?>
            <?php endif; ?>
        </div>
</header>
<div class="container">

    <section><?php echo $content; ?></section>
    <script src="../public/assets/app.js"></script>
    <script src="../public/assets/cube.js"></script>
</div>

<footer>
    <div class="content-wrapper">
        <p class="footertext"> © <?=date('Y')?>, All Rights Reserved.</p>
    </div>
</footer>

</body>
</html>
