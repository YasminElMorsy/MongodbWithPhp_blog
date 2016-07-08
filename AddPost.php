<?php
    session_start();
    var_dump($_SESSION['user_name']);
    if (!isset($_SESSION)||empty($_SESSION['user_name'])) {
        echo "<meta http-equiv='Refresh' content='0;url=login.php#tologin' />"; 
    }   
?>
<?php
    require 'DbConnection.php';
    if(isset($_POST['addPost'])&&!empty($_POST['title'])&&!empty($_POST['postData']))
    {
        $data=$collectionPosts->insert(array('title'=>$_POST['title'],'content'=>$_POST['postData'],'publishedAt'=>new MongoDate(),'publishedBy' =>$_SESSION['user_name'],'is_approved'=>'0'));
        print_r("done");
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

                <!-- Blog Post -->

                <!-- Preview Image -->
                
                <!-- Post Content -->
                

                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Add Post</h4>
                    <form role="form" action="#" method="post">
                        <div class="form-group">
                            <table>
                            <tr>
                            <td>
                                Title
                            </td>
                            <td>
                                :
                            </td>
                            <td>
                                <input type="text" name="title" id="title" value="" placeholder="">
                            </td>
                            </tr>
                            
                            
                            <br>
                            <textarea name="postData" id="postData" class="form-control" rows="3"></textarea>
                            </table>
                            </div>
                        <button type="submit" name="addPost" id="addPost" class="btn btn-primary">Add Post</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                
                            </div>
                        </div>
                        <!-- End Nested Comment -->
                    </div>
                </div>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            

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
