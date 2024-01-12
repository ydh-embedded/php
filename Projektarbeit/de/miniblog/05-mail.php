<?php session_start(); ?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <!-- Titel
    ============================================================================================= -->
    <title>Mail versenden</title>
    <!-- Meta Information
    ============================================================================================= -->
    <?php    require_once 'includes/meta.inc.php';    ?>
</head>
<body>
<header> <h1>Mail versenden</h1> </header>
<div class="container">
  

  
<form action="/subscribe" method="post">
  <table>


  
  <tr>
      <td><p>Hier kannst du mit deiner Mail unseren Newsletter erhalten.</p></td>

      <td>
        <input autocomplete="email" id="address" name="address" type="text">
        <label for="address">EMail:</label>
                                                                                </td>

  </tr>
  <tr>
      <td></td>


      <td><input type="submit" value="Absenden"></td>
  </tr>
  

  </table>
</form>




<?php

$err_msg = '' ;
$error = false ;
$uname = '';

    if( ! empty($_POST) ) {
      $anrede   = $_POST['anrede'] ?? NULL ;
      $uname    = $_POST['uname'];
      $kurs     = $_POST['kurs'] ?? array();
      $status   = $_POST['status'];
      $msg      = nl2br($_POST['msg'], false);

      
      $checked_m = $anrede === 'm' ? 'checked' : '' ;
      $checked_f = $anrede === 'f' ? 'checked' : '' ;
      $checked_d = $anrede === 'd' ? 'checked' : '' ;

      foreach ( $kurs as $k ) {
        $checked_h = ( $k === 'html') ? 'checked' :  'Bitte einen Kurs verwenden';
        $checked_p = ( $k === 'php') ? 'checked' :  'Bitte einen Kurs verwenden';
        $checked_j = ( $k === 'js') ? 'checked' :  'Bitte einen Kurs verwenden';
      }


      if (is_null( $anrede )) {
        $err_msg .= 'Die Anrede bitte ausfüllen<br>';
      }

      $selected_0 = $status === '-- Bitte auswählen --' ? 'selected' : '' ;
      $selected_1 = $status === 'Anfänger' ? 'selected' : '' ;
      $selected_2 = $status === 'Fortgeschrittener' ? 'selected' : '' ;
      $selected_3 = $status === 'Profi' ? 'selected' : '' ;



      if (empty($uname)) {
        $err_msg .= 'Bitte einen Namen verwenden';
      }

      if (empty( $kurs )) {
        $err_msg .= 'Bitte das Themenfeld benennen<br>';
        $error = true;
      }
      
      if ($status === '---Bitte auswählen ---') {
        $err_msg .= 'Bitte einen Status verwenden<br>';
        $error = true;
      }
      
              if (empty( $msg )) {
                $err_msg .= 'Bitte einen Message verwenden<br>';
                $error = true;
              }
      
      

      if( false === $error ) {
        echo '<p style="color: #0a0 ;"> Ihr Daten wurden gespeichert.</p>' ;
        
      }
    }

?>
<form action="<?echo $_SERVER['PHP_SELF']; ?>" method="post">

  <p   style="color: #a00;"></p>



  <table>
      <tr>
          <td>

                                                                              </td>

          <td>
          <label><input type="radio" name="anrede" value="f" <?= $checked_f ?? NULL ;?>  >
          Frau
          </label>
          <label><input type="radio" name="anrede" value="m" <?= $checked_m ?? NULL ;?>  >
          Herr
          </label>
          <label><input type="radio" name="anrede" value="d" <?= $checked_d ?? NULL ;?>  >
          Divers
          </label>
                                                                              </td>



      </tr>
      <tr>
          <td>
          <label for="uname">Vollständiger Name *:</label>
                                                                              </td>

          <td>
          <input type="text" name="uname" id="uname" value= "<?= $uname; ?>" >
                                                                              </td>



      </tr>
      <tr>
          <td>
          <h4>Für welches Thema interessieren Sie sich?</h4>
                                                                              </td>

          <td>
          <label><input type="checkbox" name="kurs[]" value="html" <?= $checked_h ?? NULL ;?>>
          HTML / CSS
          </label>

          <label><input type="checkbox" name="kurs[]" value="php" <?= $checked_p ?? NULL ;?>>
          PHP
          </label>
                                                                              

          <label><input type="checkbox" name="kurs[]" value="js" <?= $checked_j ?? NULL ;?>>
          JavaScript
          </label>

                                                                              </td>


      </tr>
      <tr>
          <td>
          <label for="status">Welchen Tec-Status haben Sie? *</label>
                                                                              </td>

          <td>
          <select name="status" id="Status">
          <option <?= $selected_0 ?? '' ; ?> >-- Bitte auswählen --</option>
          <option <?= $selected_1 ?? '' ; ?> >Anfänger</option>
          <option <?= $selected_2 ?? '' ; ?> >Fortgeschrittener</option>
          <option <?= $selected_3 ?? '' ; ?> >Profi</option>
          </select>

                                                                              </td>


      </tr>
      <tr>
          <td>
          <label for="msg">Ihre Nachricht</label>

                                                                              </td>

          <td>
          <textarea name="msg" id="msg" cols="30" rows="10"> <?= $msg ?? '' ; ?></textarea>

                                                                              </td>


      </tr>
      <tr>
          <td>

                                                                              </td>

          <td>
          <input type="submit">

          <input type="reset">

          
                                                                              </td>


      </tr>
  </table>
</form>


























  <?php

  use PHPMailer\PHPMailer\PHPMailer;
  if(!empty($_POST)) {
    include 'PHPMailer-master/src/PHPMailer.php';

    $mail           = new PHPMailer()       ;
    $mail->From     = 'webmaster@abc.com'   ;
    $mail->FromName = 'Arnold Absender'     ;
    $mail->Subject  = $_POST['betreff']     ;

    // HTML-Variante des Mail-Textes
    $mail->Body     = '<h2>' . $_POST['thema'] . '</h2>';
    $mail->Body    .= '<p>' . nl2br($_POST['nachricht'], false) . '</p>';

    // Nur-Text-Variante
    $mail->AltBody  = 'Thema: ' . $_POST['thema'];
    $mail->AltBody .= "\r\nNachricht:\r\n";
    $mail->AltBody .= $_POST['nachricht'];

    $mail->addAddress( $_POST['empf_adresse'] );
    $mail->addCC( $_POST['cc_adresse'] );

    $mail->addAttachment( 'PHP-Projekt-Blog-2024-01.pdf' );

    if( $mail->Send() ) {
      echo '<p>Mail wurde versendet.</p>';
    } else {
      echo '<p>Mail konnte nicht versendet werden.</p>';
    }
  }
    
  ?>

</div>





<footer>
<?php     require_once 'includes/footer.inc.php';   ?>
</footer>

</body>
</html>