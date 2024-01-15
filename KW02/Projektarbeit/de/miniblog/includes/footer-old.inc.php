<div class="footer">
    <p>&copy; 2024 MiniBlog. Alle Angaben ohne Gewähr.</p>

    <div class="nav">

        <?php
        if (! $_SESSION['is_logged_in'] === true) {
        
        ?>
        <th>

            <td><a href="01-registrierung.php"    >__Registrieren</a>           </td>
            <td><a href="02-login.php"            >__Login</a>                  </td>
            <td><a href="05-mail.php"             >__Mail</a>                   </td>
            <td><a href="10-kategorie.php"        >__Thema_bearbeiten</a>       </td>
            <td><a href="99-cookies.php"          >__Datenschutz_Bestimmung</a> </td>
            
        </th>
            <?php } else { ?>
        <th>

            <td><a href="03-logout.php"           >__Logout</a>                 </td>
            <td><a href="04-sichere-seite.php"    ></a>                         </td>
            <td><a href="05-mail.php"             >__Mail</a>                   </td>
            <td><a href="06-artikel-aendern.php"  >__Post_ändern</a>            </td>
            <td><a href="07-artikel-anlegen.php"  >__Post_anlegen</a>           </td>
            <td><a href="08-kategorie-aendern.php">__Thema_ändern</a>           </td>
            <td><a href="09-kategorie-anlegen.php">__Thema_anlegen</a>          </td>
            <td><a href="10-kategorie.php"        >__Thema_bearbeiten</a>       </td>
            <td><a href="99-cookies.php"          >__Datenschutz_Bestimmung</a> </td>
        </th>

        <?php } ?>
    
    </div>

</div>