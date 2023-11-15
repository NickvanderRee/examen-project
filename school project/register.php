<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="nav.css">
        <link rel="stylesheet" href="form.css">
        <?php
            include("../school project/process_registration.php");
        ?>
    </head>
    <header>
        <?php
            require("../school project/Partials/emptyHeader.php");
        ?>
    </header>
    <main>
        <body>
            <?php 
                require("form.php");
            ?>
        </body>
    </main>
    <?php
    require("../school project/Partials/footer.php");
    ?>
</html>