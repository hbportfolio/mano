<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=`device-width`, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>Novaturas task</title>
    <!-- <script src="/js/script.js" defer></script> -->
</head>
<body>
    <?php
        if(isset($_GET['message'])){
            echo $_GET['message'];
        }
    ?>
    <?php include 'nav.php'; ?>

    <main>
        {{content}}
    </main>
</body>
</html>