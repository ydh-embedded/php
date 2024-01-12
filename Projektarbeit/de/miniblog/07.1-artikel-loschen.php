<?php session_start(); ?>
<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <!-- Titel
    ============================================================================================= -->
    <title>Post anlegen</title>
    <!-- Meta Information
    ============================================================================================= -->
    <?php    require_once 'includes/meta.inc.php';    ?>
</head>

<body>
<header> <h1>Post löschen</h1> </header>


<div class="container">

  

  <?php

  if (isset($_SESSION['users_lastname']) && ($_SESSION['is_logged_in'] === true)) : ?>

    <?
            require_once 'includes/init.inc.php';
    ?>
    
      <div class="PostBody" style="height:515px ";>


      <!-- <?php $loesch = mysqli_query($db, "DELETE FROM links WHERE id = '3' ");    ?> -->

      <p>
          Folgende Post-ID löschen<br>
          <input type="text" name="posts_delete" style="width: 690px"><br>
        </p>





      </div>

      </form>
    
    <?php else : ?>
    <p>Um einen Post löschen zu können müssen Sie eingeloggt sein: <a href="02-login.php">zum Login</a>.</p>
  <?php endif;

?>
  </div>

  <footer>
<?php     require_once 'includes/footer.inc.php';   ?>
</footer>

</body>

</html>