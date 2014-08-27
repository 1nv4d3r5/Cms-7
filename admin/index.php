 <!DOCTYPE html>
        <html lang="en">
            <head>
                <meta charset="UTF-8">
                <title>Login</title>
                 <!-- Bootstrap Core CSS -->
                <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
                <style type="text/css">
                    body{
                        padding:20px;
                    }
                </style>
                <!-- Custom CSS -->


                <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
                <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
                <!--[if lt IE 9]>
                    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
                    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
                <![endif]-->

            </head>
            <body>
                <div class="container">
                            <div class="row">

<?php
    session_start();
    include_once("../includes/connection.php");


    if(isset($_SESSION['logged_in'])){
        //display index
        ?>
    <div class="well">
        <a href="add.php" class="btn btn-success">Add article</a>
        <a href="delete.php" class="btn btn-danger">Delete an article</a>
        <a href="all.php" class="btn btn-primary">View all articles</a>
        <a href="logout.php" class="btn btn-danger">Logout</a>
        <a href="../index.php" class="btn btn-warning">View Site</a>
    </div>
    <?php }else{
        //display login
        if(isset($_POST["username"],$_POST["password"])){
            $username=$_POST["username"];
            $password=md5($_POST["password"]);
            if(empty($username) or empty($password)){
                $error="All fields required!";
            }else{
                $query=$pdo->prepare("SELECT * FROM users WHERE userName=? and userPassword=?");
                $query->bindValue(1,$username);
                $query->bindValue(2,$password);
                $query->execute();
                $num=$query->rowCount();
                if($num==1){
                    //user entered correct details
                    $_SESSION['logged_in']=true;
                    header("Location:index.php");
                    exit();
                }else{
                    //user entered  false details
                    $error="Incorrect details";
                }
            }
        }

        ?>

                                <?php
                                    if(isset($error)){
                                        ?>
                                            <div class="alert alert-danger"><?php echo $error;?></div>
                                    <?php }
                                ?>
                                <div class="col-md-4 col-md-offset-4">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Please sign in</h3>
                                        </div>
                                        <div class="panel-body">
                                            <form accept-charset="UTF-8" role="form" action="index.php" method="post">
                                            <fieldset>
                                                <div class="form-group">
                                                    <input class="form-control" placeholder="UserName" name="username" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input name="remember" type="checkbox" value="Remember Me"> Remember Me
                                                    </label>
                                                </div>
                                                <input class="btn btn-lg btn-success btn-block" type="submit" value="Login">
                                            </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                </div>

        <?php
    }
?>
                        </div>
                    </div>
            </body>
        </html>