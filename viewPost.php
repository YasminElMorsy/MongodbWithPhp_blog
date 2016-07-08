<?php
	session_start();
	var_dump($_SESSION['user_name']);
	if (!isset($_SESSION)||empty($_SESSION['user_name'])) {
        echo "<meta http-equiv='Refresh' content='0;url=login.php#tologin' />"; 
    } 
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Post - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/blog-post.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Start Bootstrap</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                    <li>
                        <a href="logOut.php">LogOut</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">
            	<?php 
            		// var_dump($_GET['id']);
            		require 'DbConnection.php';
            		
            		@$id=split("'",$_GET['id']);
            		// print_r($y);
		         	$data=$collectionPosts->find(array('_id' =>new MongoId($id[1]),'is_approved'=>'1'));
		         	foreach ($data as $key) {
		         		// var_dump($key);
		         	
            	?>
                <!-- Blog Post -->

                <!-- Title -->
                
                <?php echo $key['publishedAt'] ?>

                
                <h1><?php echo $key['title'] ?></h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#"><?php echo $key['publishedBy'] ?></a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span><?php echo $key['publishedAt'] ?></p>

                <hr>

                <!-- Preview Image -->

                <hr>

                <!-- Post Content -->
                <p clasاغنية مسلسل قسمة ونصيبs="lead"><?php echo $key['content'] ?></p>
                
                
                <?php
                	}
                ?>
                <!-- Blog Comments -->
                <h2><p>Comments</p></h2>
                <?php
                    $comments=$collectionComment->find(array('post_id'=>$id[1],'user_id'=>$_SESSION['user_name']));
                    foreach ($comments as $variable) {
                            // echo 'hellow';
                        ?>
                        <h2><?php echo $variable['user_id'] ?></h2>
                        <p><?php @print_r($variable['comment'])  ?></p>
                        <hr>
                        <?php
                    }
                ?>
                <?php

                	if (isset($_POST['addComent'])&&!empty($_POST['commentArea']))
                    {
                		// $coll=$collectionPosts->update(array("_id"=>new MongoId($id[1])),array('$push' => array("comment"=>$_POST['commentArea'])));
                        $coll=$collectionComment->insert(array('post_id'=>$id[1],'user_id'=>$_SESSION['user_name'],'comment'=>$_POST['commentArea'],'date'=>new MongoDate()));
                        print_r("done");
                    }
                ?>
                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" action="#" method="post">
                        <div class="form-group">
                            <textarea class="form-control" id="commentArea" name="commentArea" rows="3"></textarea>
                        </div>
                        <button type="submit" id="addComent" name="addComent" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
