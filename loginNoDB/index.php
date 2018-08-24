<?php
    $error = "";
    if(isset($_POST['username'],$_POST['password'])){
 
        /*** Credentials change over here ***/
        $user = array(
                        "user" => "demo",
                        "pass"=>"demo"          
                );
        $username = $_POST['username'];
        $pass = $_POST['password'];
        if($username == $user['user'] && $pass == $user['pass']){
            session_start();
            $_SESSION['simple_login'] = $username;
            header("Location: home.php");
            exit();
        }else{
            $error = '<div class="alert alert-danger">Invalid Login</div>';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Simple php login without database by php-gym.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
     
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        body{padding-top:20px;}
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please sign in</h3>
                </div>
                <div class="panel-body">
                    <?php echo $error; ?>
                    <form accept-charset="UTF-8" role="form" method="post" action="index.php">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Username" name="username" type="text">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" value="">
                            </div>
                                <input class="btn btn-lg btn-success btn-block" type="submit" value="Login">
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
</body>
</html>
