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
        $data=$collectionPosts->insert(array('title'=>$_POST['title'],'content'=>$_POST['postData'],'publishedAt'=>new MongoDate(),'publishedBy' =>$_SESSION['user_name']));
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

    <title>Admin Panel</title>

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
                    <table id="tab" name="tab">
                        <caption>All Posts</caption>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>UserName</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i=1;
                            $name =$collectionPosts->find();
                            foreach ($name as $key) {
                        ?>
                            <tr>
                                <td><?php echo $i++ ?></td>
                                <td><?php echo $key['title']?></td>
                                <td><?php echo $key['publishedBy']?></td>
                            <!-- // $key['_id']; -->

                                <td><a href="admin.php?action=approve&id=<?php echo $key['_id']?>">Approve</a></td>
                                <td><a href="admin.php?action=delete&id=<?php echo $key['_id']?>">Delete</a></td>
                            </tr>
                        <?php
                            }
                        ?>
                        <?php
                            if (@$_GET['action']=='approve') {
                                // var_dump($_GET['id']);
                                $coll=$collectionPosts->update(array("_id"=>new MongoId($_GET['id'])),array('$set' => array("is_approved"=>'1')));
                                print_r('Approved');
                            }else if(@$_GET['action']=='delete'){
                                // print_r('welcome delete');
                                $coll=$collectionPosts->remove(array("_id"=>new MongoId($_GET['id'])));

                            }
                        ?>
                        </tbody>
                    </table>   

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
