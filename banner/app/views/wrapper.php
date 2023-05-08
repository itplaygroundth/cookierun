<?php defined('EASYCODE') || die() ?>
<!DOCTYPE html>
<html lang="<?= language()->language_code ?>">
    <head>
        <title><?= \Easy\Title::get() ?></title>
      
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@400;600;700&display=swap" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet' type='text/css'>
     </head>
    <body>
    <div class="overlay"></div>

<div class="container-wrapper">

    <?= $this->views['header'] ?>

    <?= $this->views['sidebar'] ?>

    <div class="content-wrapper">

        <?= $this->views['content'] ?>

    </div>

</div>
    </body>
</html>