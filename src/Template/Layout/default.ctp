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

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <?= $this->Html->css('style.css') ?>
</head>
<body>


<?= $this->fetch('content') ?>