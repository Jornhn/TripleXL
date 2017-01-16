<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TripleXL</title>
    <?= $this->Html->meta('icon') ?>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <?= $this->Html->css('style.css') ?>
</head>
<body class="home">
    <nav class="navbar navbar-fixed-top navbar-default">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">
                    <b>Triple</b>XL
                </a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <?php
                    if (!is_null($this->request->session()->read('Auth.User.id'))) {
                        ?>
                        <li><?= $this->Html->link("Dashboard", ['controller' => 'Dashboard', 'action' => 'index'], ['class' => 'nav-link'])?></li>
                        <?php if ($this->request->session()->read('Auth.User.account_type') >= 2) { ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Beheren <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><?= $this->Html->link("Sollicitanten", ['controller' => 'Applicants', 'action' => 'index'])?></li>
                                    <li><?= $this->Html->link("Bedrijven", ['controller' => 'Companies', 'action' => 'index'])?></li>
                                    <li><?= $this->Html->link("CV('s)", ['controller' => 'Cvs', 'action' => 'index'])?></li>
                                    <li><?= $this->Html->link("Vacatures", ['controller' => 'Vacatures', 'action' => 'index'])?></li>
                                    <li><?= $this->Html->link("Matches", ['controller' => 'Matches', 'action' => 'index'])?></li>
                                    <?php if ($this->request->session()->read('Auth.User.account_type') == 3) { ?>
                                    <li role="separator" class="divider"></li>
                                    <li><?= $this->Html->link("Beheerders", ['controller' => 'Managers', 'action' => 'index'])?></li>
                                <?php } ?>
                                </ul>
                            </li>
                        <?php } ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $this->request->session()->read('Auth.User.email'); ?> <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <?php if ($this->request->session()->read('Auth.User.account_type') == 0 || $this->request->session()->read('Auth.User.account_type') > 1) { ?>
                                    <li><?= $this->Html->link("Mijn CV('s)", ['controller' => 'Cv', 'action' => 'index'])?></li>
                                <?php } if ($this->request->session()->read('Auth.User.account_type') >= 1) { ?>
                                    <li><?= $this->Html->link("Mijn Vacatures", ['controller' => 'Vacatures', 'action' => 'index'])?></li>
                                <?php } ?>
                                <li role="separator" class="divider"></li>
                                <li><?= $this->Html->link("Uitloggen", ['controller' => 'Users', 'action' => 'logout'], ['class' => 'menu-logout'])?></li>
                            </ul>
                        </li>
                    <?php   }
                    else {
                        ?>
                        <li><?= $this->Html->link("Inloggen", ['controller' => 'Users', 'action' => 'login'], ['class' => 'nav-link'])?></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
    <?= $this->fetch('content') ?>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <?= $this->Html->script('bootstrap.min.js') ?>
    <?= $this->Html->script('custom.js') ?>
    <script>
        $(function() {
            var pgurl = window.location.href.substr(window.location.href
                    .lastIndexOf("/")+1);
            $("nav ul li a").each(function(){
                if($(this).attr("href") == '/' + pgurl || $(this).attr("href") == '' )
                    $(this).addClass("active");

                console.log($(this).attr("href"), pgurl);
            })
        });
    </script>
</body>
</html>
