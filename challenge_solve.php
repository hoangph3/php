<?php require_once 'utils.php';
session_start();
if (empty($_SESSION['id']) && empty($_SESSION['username'])) {
  header("location: index.php");
}
else {
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
  <title>Challenge</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/w3.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  </head>
  <body>

  <div class="header">
    <h1>Viettel Cyber Security</h1>
    <p>BigData and Machine Learning</p>
  </div>

  <ul>
    <?php 
    if ($_SESSION['id']<500) echo '<li><a href="admin.php">Home</a></li>';
    else echo '<li><a href="user.php">Home</a></li>';
    
    $id = $_GET['id'];
    $sql = "select * from challenge where id=" .$id;
    $list_suggest = execute_result($sql);
    $idea = $list_suggest[0];
    $your_hint = $idea['suggest'];

    ?>
    <div class="navbar">
      <a href="log_out.php" class="right">Log out</a>
    </div>
  </ul>

  <div class="row">
    <div class="side">
      <h2>About Me</h2>
      <h5>Photo of me:</h5>
      <img src="/css/hack.png" width="250px" height="250px">
      <p>While hack we dev - While dev we hack</p>
    </div>
    <div class="main">
      <h2>Solve Challenge</h2>
        <form method="post" action="">
        <div class="w3-container">
            <label for="hint">Suggestion</label>
            <textarea name="hint" id="hint" class="w3-input w3-animate-input" style="width:50%" rows="3" cols="50" placeholder="<?= $your_hint ?>"></textarea>
        </div><br/>
        <div class="w3-container">
            <label for="answer">Your answer</label>
            <input required="true" type="text" class="w3-input w3-animate-input" style="width:50%" id="answer" name="answer">
        </div><br/>
        <div class="input-group">
            <input type="submit" class="button w3-right" name="submit" value="Submit"/>
        </div>
        </form>
<?php 
if (isset($_POST['submit'])){
    $answer = $_POST['answer'].'.txt';
    $dir = './admin/challenge/';
    $filename = $dir . $answer;
    
    if (file_exists($filename)){
        echo 'Correct ! <br/>';
        echo 'Answer: <br/>';
        $myfile = fopen($filename,"r") or die("Can't open this file !");
        echo fread($myfile, filesize($filename));
        fclose($myfile);
    }
    else {
        echo 'Wrong !';
    }
}
?>
    </body>
  </html>
  </div>
</div>
<div class="footer">
  <h2>Contact me</h2>
  <p>Viettel Cyber Security, 41st Floor, Keangnam 72 Landmark Building, Pham Hung Str., Nam Tu Liem Dist., Hanoi</p>
</div>

<?php 
}
