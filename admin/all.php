<!DOCTYPE html>
        <html lang="en">
            <head>
                <meta charset="UTF-8">
                <title>Login</title>
                 <!-- Bootstrap Core CSS -->
                <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
                <style type="text/css">
                        .row{
                            margin-top:40px;
                            padding: 0 10px;
                            }
                            .clickable{
                                cursor: pointer;
                            }

                            .panel-heading div {
                                margin-top: -18px;
                                font-size: 15px;
                            }
                            .panel-heading div span{
                                margin-left:5px;
                            }
                            .panel-body{
                                display: none;
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
                    <div class="col-md-10">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Developers</h3>
                                <div class="pull-right">
                                    <span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
                                        <i class="glyphicon glyphicon-filter"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="panel-body">
                                <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filter Developers" />
                            </div>
                            <table class="table table-hover" id="dev-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Username</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Kilgore</td>
                                        <td>Trout</td>
                                        <td>kilgore</td>
                                        <td class="text-center"><a class='btn btn-info btn-xs' href="#"><span class="glyphicon glyphicon-edit"></span> Edit</a> <a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</a></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Bob</td>
                                        <td>Loblaw</td>
                                        <td>boblahblah</td>
                                        <td class="text-center"><a class='btn btn-info btn-xs' href="#"><span class="glyphicon glyphicon-edit"></span> Edit</a> <a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <a class="btn btn-primary" href="index.php"><span class="glyphicon glyphicon-chevron-left"></span>&nbsp;&nbsp;&nbsp;Back</a>
                    </div>
                </div>
            </div>
             </body>
</html>