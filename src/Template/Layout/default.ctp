<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

<<<<<<< HEAD
    <?= $this->Html->css('bootstrap.min.css') ?>

=======
    <?= $this->Html->css('bake.css') ?>
    <?= $this->Html->css('cake.css') ?>
>>>>>>> Sven
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<<<<<<< HEAD
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>

    <?= $this->Html->script('bootstrap.min.js') ?>
=======
        <?= $this->fetch('content') ?>
>>>>>>> Sven
</body>
</html>
