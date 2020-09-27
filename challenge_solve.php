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
    
    if (isset($_GET['id']))
    {
        $id = $_GET['id'];
        $sql = "select * from challenge where id = " .$id;
        $list_challenge= execute_result($sql);
        $quiz = $list_challenge[0];
        
        $challenge = $quiz['name'];
        $your_hint = $quiz['suggest'];
    }

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
            <textarea name="hint" id="hint" class="w3-input w3-animate-input" style="width:50%" rows="3" cols="50" placeholder="<?= $your_hint ?>" readonly></textarea>
        </div><br/>
        <div class="w3-container">
            <label for="answer">Your answer</label>
            <input required="true" type="text" class="w3-input w3-animate-input" style="width:50%" id="answer" name="answer">
        </div><br/>
        <div class="input-group">
            <input type="submit" class="button w3-right" name="submit" value="Submit"/>
        </div><br/>
        </form>
<?php 
if (isset($_POST['submit'])){
    $answer = $_POST['answer'].'.txt';
    $dir = 'uploads/challenge/' . $challenge .'/';
    $filename = $dir . $answer;

    if (file_exists($filename)){
      echo '<br/><h5 style="color:green; font-weight:bold;">Correct Answer !</h5>';
      echo '<button class="button w3-right" onclick=\'window.open("challenge_answer.php?challenge='.$filename.'","_blank")\' >Show Answer</button>';
    }
    else {
      echo "<script>alert('Incorrect Answer !');</script>";
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
