<!doctype html>
<html lang="ru">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="static/css/bootstrap.min.css">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="static/css/custom.css">
        <title>ООО "ЖКС №2 Кировского района"</title>
    </head>
    <body>
        <!-- Header -->
        <div class="jumbotron logo">
            <img class="mobile" src="/static/img/mobile_logo.png">
            <img class="desktop" src="/static/img/desktop_logo.png">
        </div>
        <!-- Navigation -->
        <?php echo $this->render('navigation-bar.htm',NULL,get_defined_vars(),0); ?>
        <!-- Content -->
        <div class="container-fluid">
            <?php if (array_pop($SESSION['message']) == 'success'): ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    Вы успешно отправили сообщение!
                </div>
            <?php endif; ?>
            <div class="content">
                <?php echo $this->render($content,NULL,get_defined_vars(),0); ?>
            </div>
        </div>
        <!-- Footer -->
        <nav class="navbar navbar-default navbar-fixed-bottom">
            <div class="container-fluid"> 
                <p class="navbar-text">ofen <?= (date('Y')) ?> <?php echo $PATH ?></p>
            </div>
        </nav>
        <!-- jQuery and Bootstrap JS -->
        <script src="static/js/jquery-3.3.1.min.js"></script>
        <script src="static/js/bootstrap.min.js"></script>
        <script src="static/js/custom.js"></script>
    </body>
</html>