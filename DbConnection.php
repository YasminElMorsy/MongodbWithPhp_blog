<?php
   // connect to mongodb
   $m = new MongoClient();
	
   // echo "Connection to database successfully";
   // select a database
   $db = $m->mydb;	
   // echo "Database mydb selected";
   $collection = $db->createCollection("user");
   $collectionComment = $db->createCollection("comments");
   // $collection->ensureIndex(array( "userName", 1 ),array( "unique", true ));
   // $db=flush(array('safe'=>true));
   $collectionPosts= $db->createCollection("posts");
   // echo "Collection created succsessfully";
?>