<?php

class Select {
  /*
  this function returns the connection to the db
  */
  public static function connect(){
    $mysql_host = "localhost";
    $mysql_user = "wolf4656_1";
    $mysql_password = "root1";
    $mysql_database = "wolf4656_truefolktv";


    //create connection
    $connection = new mysqli('localhost', "wolf4656_1", "root1", "wolf4656_truefolktv");

    //check connection
    if ($connection->connect_error) {
      die("CANNOT CONNECT!:" . $connection->connect_error);
    } else {
      return $connection;
    }
 }

 public static function addSmasher($tag, $name, $region, $phoneNumber, $meleeSingles, $meleeDoubles, $meleeDoublesPartner,
                                   $wiiuSingles, $wiiuDoubles, $wiiuDoublesPartner, $meleeSetup, $wiiuSetup){
   $connection = select::connect();
   //prepare
   if(!$statement = $connection->prepare(
   "INSERT INTO participants (tag, name, region, phoneNumber, meleeSingles, meleeDoubles, meleeDoublesPartner,
     wiiuSingles, wiiuDoubles, wiiuDoublesPartner, meleeSetup, wiiuSetup)
    VALUES (?,?,?,?,?,?,?,?,?,?,?,?)")){
      die ("Smasher entry failed: " . $connection->error);
    }
    //Bind
    if(!$statement->bind_param("ssssssssssss", $tag, $name, $region, $phoneNumber, $meleeSingles, $meleeDoubles, $meleeDoublesPartner,
                        $wiiuSingles, $wiiuDoubles, $wiiuDoublesPartner, $meleeSetup, $wiiuSetup))
      die("Smasher bind failed: " . $statement->error);
    //execute
    if(!$statement->execute()) {
      die("Smasher execute failed: " . $statement->error);
   }
   return true;
 }

 public static function smashers(){
   $connection = Select::connect();

   $sql = "SELECT ID, tag, region, meleeSingles, meleeDoubles, meleeDoublesPartner, wiiuSingles, wiiuDoubles, wiiuDoublesPartner
           FROM participants";
   $smashers = $connection->query($sql);
   $connection->close();
   return $smashers;
 }

 public static function contact($name, $email, $phoneNumber, $contact){
   $connection = Select::connect();
   //prepare
   if(!$statement = $connection->prepare(
   "INSERT INTO contact (name, email, phoneNumber, contact)
    VALUES (?,?,?,?)")){
      die ("Contact entry failed: " . $connection->error);
    }
    //Bind
    if(!$statement->bind_param("ssss", $name, $email, $phoneNumber, $contact)){
      die("Contact bind failed: " . $statement->error);
    }
    //execute
    if(!$statement->execute()){
      die("Contact execute failed: " . $statement->error);
    }
   return true;
 }

 public static function signIn($adminName, $password){
   $connection = Select::connect();
   $statement = $connection->prepare("
     SELECT adminPass FROM admins WHERE adminName = ?
   ");

   if(!$statement->bind_param("s", $Name)){
    die("User bind failed: " . $statement->error);
  }
   if(!$statement->execute()){
     die("User execute failed: " . $statement->error);
   }
   $statement->bind_result($hashpassword);
   $statement->fetch();
   if($hashpassword === $password) {
     return true;
   }else{
     return false;
     }
   }


 public static function searchBlogs($query){
   $connection = Select::connect();
   $sql = "SELECT *
           FROM blog
           WHERE tags LIKE '%$query%'
           OR author LIKE '%$query%'
           OR blog LIKE '%$query%'
           OR title LIKE '%$query%'
           ORDER BY uniqueID DESC";
   $searchBlogs = $connection->query($sql);
   $connection->close();
   return $searchBlogs;
 }


 public static function participantByID($ID){
   $connection = Select::connect();
   $sql = "SELECT *
           FROM participants
           WHERE ID = $ID";
   $participant = $connection->query($sql);
   $participant = $participant->fetch_assoc();
   $connection->close();
   return $participant;
 }

 public static function events(){
 $connection = Select::connect();

 $sql = "SELECT *
         FROM events";
 $events = $connection->query($sql);
 $connection->close();
 return $events;
 }

 public static function eventsSearch($query){
   $connection = Select::connect();

   $sql = "SELECT ID, name, startTime, endTime, entryFee, playerCap
           FROM events
           WHERE name
           LIKE '%$query%'";
   $event = $connection->query($sql);
   $connection->close();
   return $event;
 }

 public static function eventByID($ID){
   $connection = Select::connect();
   $sql = "SELECT *
           FROM events
           WHERE ID = $ID";
   $event = $connection->query($sql);
   $event = $event->fetch_assoc();
   $connection->close();
   return $event;
 }

 public static function addEvent($name, $startTime, $endTime, $entryFee, $playerCap){
   $connection = Select::connect();
   //prepare
   if(!$statement = $connection->prepare(
   "INSERT INTO events (name, startTime, endTime, entryFee, playerCap)
    VALUES (?,?,?,?,?)")){
      die ("Event entry failed: " . $connection->error);
    }
    //Bind
    if(!$statement->bind_param("sssss", $name, $startTime, $endTime, $entryFee, $playerCap))
      die("Event bind failed: " . $statement->error);
    //execute
    if(!$statement->execute()) {
      die("Event execute failed: " . $statement->error);
   }
   return true;
 }

 public static function contacts(){
   $connection = Select::connect();
   $sql = "SELECT *
           FROM contact";
   $contacts = $connection->query($sql);
   $connection->close();
   return $contacts;
 }

 public static function messages($query){
   $connection = Select::connect();

   $sql = "SELECT ID, name, email, phoneNumber, contact
           FROM contact
           WHERE name
           LIKE '%$query%'";
   $contact = $connection->query($sql);
   $connection->close();
   return $contact;
 }

 public static function addMeleeSetup($tag){
   $connection = Select::connect();
   if(!$statement = $connection->prepare(
   "INSERT INTO setups (playerTag, event)
    VALUES (?, 'Melee')")){
      die ("Setup entry failed: " . $connection->error);
   }
   if(!$statement->bind_param("s", $tag)) {
     die ("Setup bind failed: " . $connection->error);
   }
   if(!$statement->execute()){
     die("Setup execute failed: " . $connection->error);
   }
   return true;
 }

 public static function addWiiuSetup($tag){
   $connection = Select::connect();
   if(!$statement = $connection->prepare(
   "INSERT INTO setups (playerTag, event)
    VALUES (?, 'WiiU')")){
      die ("Setup entry failed: " . $connection->error);
   }
   if(!$statement->bind_param("s", $tag)) {
     die ("Setup bind failed: " . $connection->error);
   }
   if(!$statement->execute()){
     die("Setup execute failed: " . $connection->error);
   }
   return true;
 }

 public static function setups(){
   $connection = Select::connect();
   $sql = "SELECT *
           FROM setups";
   $setups = $connection->query($sql);
   $connection->close();
   return $setups;
 }

 public static function setupByID($ID){
   $connection = Select::connect();
   $sql = "SELECT *
           FROM setups
           WHERE ID = $ID";
   $setup = $connection->query($sql);
   $setup = $setup->fetch_assoc();
   $connection->close();
   return $setup;
 }

 public static function setupSearch($query){
   $connection = Select::connect();

   $sql = "SELECT ID, playerTag, event
           FROM setups
           WHERE playerTag
           LIKE '%$query%'";
   $setup = $connection->query($sql);
   $connection->close();
   return $setup;
 }

 public static function logIn($userName, $password){
   $connection = Select::connect();
   $statement = $connection->prepare("
     SELECT password FROM admins WHERE userName = ?
   ");
   if(!$statement->bind_param("s", $userName)){
    die("User bind failed: " . $statement->error);
  }
   if(!$statement->execute()){
     die("User execute failed: " . $statement->error);
   }
   $statement->bind_result($hashpassword);
   $statement->fetch();
   if($hashpassword === $password) {
     return true;
   }else{
     return false;
     }
  }

  public static function addVideo($title, $link, $thumbnail, $description){
    $connection = Select::connect();
    if(!$statement = $connection->prepare(
    "INSERT INTO videos (title, link, thumbnail, description)
     VALUES (?,?,?,?)")){
       die ("Adding Video Failed: " . $connection->error);
    }
    if(!$statement->bind_param("ssss", $title, $link, $thumbnail, $description)) {
      die ("Video bind failed: " . $connection->error);
    }
    if(!$statement->execute()){
      die("Video execute failed: " . $connection->error);
    }
    return true;
  }

  public static function getVideos(){
    $connection = Select::connect();
    $sql = "SELECT *
            FROM videos
            ORDER BY ID DESC";
    $videos = $connection->query($sql);
    $connection->close();
    return $videos;

  }

  public static function getBlogs(){
    $connection = Select::connect();
    $sql = "SELECT *
            FROM blog
            ORDER BY uniqueID DESC";
    $blogs = $connection->query($sql);
    $connection->close();
    return $blogs;
  }

  public static function addBlogPost($title, $author, $postDate, $blog, $tags, $titlepic){
    $connection = Select::connect();
    if (!$statement = $connection->prepare(
      "INSERT INTO blog (title, author, postDate, blog, tags, titlePic)
      VALUES (?,?,?,?,?,?)")) {
      die ("Adding Blog Post Failed: " . $connection->error);
    }
    if (!$statement->bind_param("ssssss",$title, $author, $postDate, $blog, $tags, $titlepic)) {
      die("Blog Post Bind Failed " . $connection->error);
    }
    if (!$statement->execute()) {
      die("Blog execute failed: " . $connection->error);
    }
    return true;
  }

  public static function getBlogPost($id){
    $connection = Select::connect();
    $sql = "SELECT * FROM blog WHERE uniqueID = $id";
    $blogpost = $connection->query($sql);
    $connection->close();
    return $blogpost;
  }

  public static function deleteBlogPost($id){
    $connection = Select::connect();
    $sql = "DELETE FROM blog WHERE uniqueID = $id";
    $Blogpost = $connection->query($sql);
    $connection->close();
    return $blogpost;
  }

  public static function blogByID($ID){
    $connection = Select::connect();
    $sql = "SELECT *
            FROM blog
            WHERE uniqueID = $ID";
    $blog = $connection->query($sql);
    $blog = $blog->fetch_assoc();
    $connection->close();
    return $blog;
  }

  public static function videoByID($ID){
    $connection = Select::connect();
    $sql = "SELECT *
            FROM videos
            WHERE ID = $ID";
    $video = $connection->query($sql);
    $video = $video->fetch_assoc();
    $connection->close();
    return $video;
  }
}
 ?>
