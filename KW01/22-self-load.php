<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formular: Auswertung in der selben Datei</title>
</head>
<body>
  <h2>Formular: Auswertung in der selben Datei</h2>
  
  <!--  Formularauswertung vor dem absenden -->
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

        // selected Attribut vorauswahl
        $selected_0 = $status === '-- Bitte auswählen --' ? 'selected' : '' ;
        $selected_1 = $status === 'Anfänger' ? 'selected' : '' ;
        $selected_2 = $status === 'Fortgeschrittener' ? 'selected' : '' ;
        $selected_3 = $status === 'Profi' ? 'selected' : '' ;

//        if (empty( $uname )) {
//          $err_msg .= 'Bitte einen Namen verwenden';
//        }

        if (empty($uname)) {
          $err_msg .= 'Bitte einen Namen verwenden';
        }

        if (empty( $kurs )) {
          $err_msg .= 'Bitte einen Kurs verwenden<br>';
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
  <!-- Wir verwenden das checked um den input zu speichern -->
  <!-- Wir erstellen eine Variable um das checked dynamisch zu gestalten -->

  
  
  <!-- <form action="" method="post"> -->
    <!-- <form action="#" method="post"> -->
      <!-- <form action="22-self-load.php" method="post"> -->
        <!-- var_dump($_SERVER) -->

  <form action="<?= $_SERVER['SCRIPT_NAME']; ?>" method="post">

    <p style="color: #a00;"></p>

    <p>Mit * gekennzeichnete Elemente müssen ausgewählt werden!</p>

    <p>
      <label>
        <input type="radio" name="anrede" value="m" <?= $checked_m ?? NULL ;?>  >
        Herr
      </label>
      <label>
        <input type="radio" name="anrede" value="f" <?= $checked_f ?? NULL ;?>  >
        Frau
      </label>
      <label>
        <input type="radio" name="anrede" value="d" <?= $checked_d ?? NULL ;?>  >
        Divers
      </label>
    </p>

    <p>
      <label for="uname">Vollständiger Name *:</label>
      <input type="text" name="uname" id="uname" value= "<?= $uname; ?>" >
    </p>

    <p>Welche Kurse möchten Sie belegen? *
      <label>
        <input type="checkbox" name="kurs[]" value="html" <?= $checked_h ?? NULL ;?>>
        HTML / CSS
      </label>
      <label>
        <input type="checkbox" name="kurs[]" value="php" <?= $checked_p ?? NULL ;?>>
        PHP
      </label>
      <label>
        <input type="checkbox" name="kurs[]" value="js" <?= $checked_j ?? NULL ;?>>
        JavaScript
      </label>
    </p>

    <p>
      <label for="status">Welchen Status haben Sie? *</label>
      <select name="status" id="Status">
        <option <?= $selected_0 ?? '' ; ?> >-- Bitte auswählen --</option>
        <option <?= $selected_1 ?? '' ; ?> >Anfänger</option>
        <option <?= $selected_2 ?? '' ; ?> >Fortgeschrittener</option>
        <option <?= $selected_3 ?? '' ; ?> >Profi</option>
      </select>
    </p>

    <p>
      <label for="msg">Ihre Nachricht</label>
      <textarea name="msg" id="msg" cols="30" rows="10"> <?= $msg ?? '' ; ?></textarea>
    </p>

    <p>
      <input type="submit">
      <input type="reset">
    </p>

  </form>


  <?php
    

    
  ?>

</body>
</html>