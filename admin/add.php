<?php
        session_start();
        include_once("../includes/connection.php");

        if(isset($_SESSION["logged_in"])){
            //display add page
            if(isset($_POST['title'],$_POST['content'])){
                $title=$_POST['title'];
                $content=$_POST['content'];

                if(empty($title) or empty($content)){
                    $error="All fileds are required";
                }else{
                    $query=$pdo->prepare('INSERT INTO articles (articleTitle,articleContent,articleDate) VALUES (?,?,?)');
                    $query->bindValue(1,$title);
                    $query->bindValue(2,$content);
                    $query->bindValue(3,time());

                    $query->execute();

                    header("Location:index.php");
                }
            }
            ?>
        <!DOCTYPE html>
        <html lang="en">
            <head>
                <meta charset="UTF-8">
                <title>Login</title>
                 <!-- Bootstrap Core CSS -->
                <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
                <style type="text/css">
                   .jumbotron {
                        background: #358CCE;
                        color: #FFF;
                        border-radius: 0px;
                        }
                        .jumbotron-sm { padding-top: 24px;
                        padding-bottom: 24px; }
                        .jumbotron small {
                        color: #FFF;
                        }
                        .h1 small {
                        font-size: 24px;
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
                <div class="jumbotron jumbotron-sm">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 col-lg-12">
                                <h1 class="h1">
                                    Add article<small>Feel free to write</small></h1>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                  <?php
                                    if(isset($error)){
                                        ?>
                                            <div class="alert alert-danger"><?php echo $error;?></div>
                                    <?php }
                                ?>
                                <div class="well well-sm">
                                    <form action="add.php" method="post">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="title">
                                                    Title</label>
                                                <input type="text" class="form-control" id="title" placeholder="Enter Title" name="title"/>
                                            </div>
                                            <div class="form-group">
                                                <label for="subject">
                                                    Subject</label>
                                                <select id="subject" name="subject" class="form-control"
                                                    <option value="na" selected="">Choose One:</option>
                                                    <option value="service">General Customer Service</option>
                                                    <option value="suggestions">Suggestions</option>
                                                    <option value="product">Product Support</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="content">
                                                    Content</label>
                                                <textarea name="content" id="content" class="form-control" rows="9" cols="25" placeholder="Content"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary pull-right" id="btnContactUs">Add article</button>
                                                <a href="index.php" class="btn btn-danger">Cancel</a>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>

            </body>
        </html>
        <?php }else{
            header("Location:index.php");
        }

?>