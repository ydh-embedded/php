<?php
        define( 'DB_NAME', 'miniblog' );
        require_once 'includes/_pdo-connect.inc.php';
        require_once 'includes/_functions.inc.php';
?>


<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Beschreibung Keywords
    ============================================================================================= -->
    <meta name="viewport"       content="width=device-width, initial-scale=1.0"         >
    <meta name="description"    content="Blog Page als Miniblog für Coding Tech iOT "   >
    <meta name="keywords"       content="Blog Page als Miniblog für Coding Tech iOT "   >

    <!-- Titel
    ============================================================================================= -->
    <title>Mini-Blog</title>
    <!-- Icon
    ============================================================================================= -->
    <link rel="icon" type="images/x-icon" href="https://www.w3docs.com/favicon.ico" />
    <!-- fonts
    ============================================================================================= -->
    <link href='https://fonts.googleapis.com/css?family=Annie Use Your Telescope' rel='stylesheet'>
    <!-- Bootstrap
    ============================================================================================= -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Web-Fonts
    ============================================================================================= -->
    <link rel="stylesheet" href="css/fonts.css">
    <!-- Style-CSS
    ============================================================================================= -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Style-Buttons-CSS
    ============================================================================================= -->
    <link rel="stylesheet" href="css/style_buttons.css">


    <?php
                use PHPMailer\PHPMailer\PHPMailer;
    ?>

</head>









<body>



<!-- Überschrift miniblog in H1 -->
<header><h1>miniblog</h1></header>



<div class="container">

    <div class="TableBlog">

        <table>
                    <tr>
                        <th>Themen-ID</th>
                        <th>Thema</th>
                        <th>Inhalt</th>
                        <th>Aufrufe</th>
                        <th>Antworten</th>
                        <th>letzter Beitrag</th>
                    </tr>
        
            <?php
        
            $sql = 'SELECT
                            `categ_id`              ,
                            `categ_name`            ,
                            `categ_desc`            ,
                            `categ_view_count`      ,
                            `categ_post_count`      ,
                            `categ_last_post`       ,
        
                    //!     reihenfolge beachten
                    FROM    `tbl_categories` c
                    JOIN    `tbl_articles` a
                    ON      `a`.`artic_categ_id_ref` = `c`.`categ_id`'  ;
        
            
            try {
              if ($stmt = $pdo->query($sql)) {
                if( $stmt->rowCount() === 0 ) {
                  echo '<p>Keine Datensätze gefunden.</p>';
                } else {
                  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                    <tr>
                      <td><?= $row['categ_id']          ; ?>  </td>
                      <td><?= $row['categ_name']        ; ?>  </td>
                      <td><?= $row['categ_desc']        ; ?>  </td>
                      <td><?= $row['categ_view_count']  ; ?>  </td>
                      <td><?= $row['categ_post_count']  ; ?>  </td>
                      <td><?= $row['categ_last_post']   ; ?>  </td>
                      <td><a href="6-blog-aendern.php?a= <?= $row['categ_id']; ?> " >Ändern </a></td>
                    </tr>
                  <?php }
                }
              }
          
            $stmt = NULL;
            $pdo = NULL;
          
          
          
            } catch (PDOException $e) {
              echo 'ERROR:<br>' . $e->getMessage();
            }
              
            ?>
          </table>


































    </div>





    <div class="BlogPost">
        <h2>Blog Post Titel</h2>
        <p>Blog Post Inhalt</p>
    </div>

    <div class="BlogPost">
        <h2>Blog Post Titel</h2>
        <p>Blog Post Inhalt</p>
    </div>

</div>

































<footer>

    <div
        class="footer">
        <p>&copy; 2024 MiniBlog. Alle Angaben ohne Gewähr.</p>
        <p>
            <?php
                
                
            ?>
        </p>

    </div>


</footer>







</body>
</html>