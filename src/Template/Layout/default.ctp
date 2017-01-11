<!--<!DOCTYPE html>-->
<!--<html>-->
<!--<head>-->
<!--    --><?//= $this->Html->charset() ?>
<!--    <meta name="viewport" content="width=device-width, initial-scale=1.0">-->
<!--    <title>-->
<!--        --><?//= $this->fetch('title') ?>
<!--    </title>-->
<!--    --><?//= $this->Html->meta('icon') ?>
<!---->
<!--    --><?//= $this->Html->css('bake.css') ?>
<!--    --><?//= $this->Html->css('cake.css') ?>
<!--    --><?//= $this->fetch('meta') ?>
<!--    --><?//= $this->fetch('css') ?>
<!--    --><?//= $this->fetch('script') ?>
<!--</head>-->
<!--<body>-->
<!--        --><?//= $this->fetch('content') ?>
<!--</body>-->
<!--</html>-->

<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        TripleXL
    </title>
    <?= $this->Html->meta('icon') ?>

<<<<<<< HEAD
    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('custom.css') ?>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/sweetalert2/6.3.0/sweetalert2.min.css">

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/sweetalert2/6.3.0/sweetalert2.min.js"></script>

    <?= $this->Html->script('bootstrap.min.js') ?>
    <?= $this->Html->script('custom.js') ?>
</body>
</html>
=======
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <?= $this->Html->css('style.css') ?>
</head>
<body>


<?= $this->fetch('content') ?>
>>>>>>> origin/Sven
