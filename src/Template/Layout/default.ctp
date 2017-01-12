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
                    <li><a class="nav-link" href="#">Home</a></li>
                    <?php
                    if (!is_null($this->request->session()->read('Auth.User.id'))) {
                        ?>
                        <li><a class="nav-link" href="/dashboard">Dashboard</a></li>
                        <li><a class="nav-link" href="/cv">Mijn CV('s)</a></li>
                        <li><a class="nav-link" href="/users/logout">Logout</a></li>
                        <p class="navbar-text"><b>Ingelogd als:  <?php echo $this->request->session()->read('Auth.User.email'); ?></b></p>
                    <?php   }
                    else {
                        ?>
                        <li><a class="nav-link active" href="#">Home</a></li>
                        <li><a class="nav-link" href="/users/login">Login</a></li>
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
