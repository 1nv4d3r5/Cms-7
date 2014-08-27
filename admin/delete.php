<?php
    session_start();
    include_once("../includes/connection.php");
    include_once("../includes/article.php");

    $article=new Article();

    if(isset($_SESSION['logged_in'])){
        //display page
        if(isset($_GET["id"])){
            $id=$_GET["id"];
            $query=$pdo->prepare('DELETE  FROM articles WHERE articleId=?');
            $query->bindValue(1,$id);
            $query->execute();

        }
        $articles=$article->fetch_all();
        ?>
<!DOCTYPE html>
        <html lang="en">
            <head>
                <meta charset="UTF-8">
                <title>Login</title>
                 <!-- Bootstrap Core CSS -->
                <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
                <style type="text/css">
                body{
                    padding:30px;
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
                    <div class="col-md-6">
                        <div class="well well-sm">
                            <form method="get" action="delete.php">
                            <select name="id" id="" class="form-control">
                                <?php foreach ($articles as $article) {?>
                                    <option value="<?php echo $article['articleId'];?>"><?php echo $article['articleTitle'];?></option>
                                <?php } ?>
                            </select><br>
                            <button type="submit" class="btn btn-danger">Delete selected item</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
             </body>
</html>

    <?php }else{
        header('Location:index.php');
    }


?>