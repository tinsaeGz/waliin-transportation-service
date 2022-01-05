<?php 
    use app\core\Application;
    // var_dump(Application::$app->user);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Page</title>
</head>

<body style="background-color:white">
    
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Waliin Transporation Service</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="/">Home</a></li>
                <li><a href="/contact">Contact</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if(Application::$app->user): ?>
                    <li> <a href="/logout"><?php echo Application::$app->user->name; ?> Logout</a></li>
                <?php else: ?>
                <li><a href="/login"><span class="glyphicon glyphicon-user"></span> Login</a></li>
                <li><a href="/register"><span class="glyphicon glyphicon-log-in"></span> Register</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav> 
                

    <div class="container">
        <?php if (Application::$app->session->getFlash('success')): ?>
            <div class="alert alert-success">
                <?php echo Application::$app->session->getFlash('success');?>
            </div>
        <?php endif; ?>
        {{content}}
    </div>
     


    <footer  style="padding:50px 0;color:#f0f9ff;background-color:#282d32">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-3 item">
                    <h3>Services</h3>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Contact us</a></li>
                        <li><a href="#">Hosting</a></li>
                    </ul>
                </div>
            </div>
            <p class="copyright">Company Name © 2021</p>
        </div>
    </footer>
</body>

</html>
 



