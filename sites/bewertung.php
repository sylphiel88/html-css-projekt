<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- load stylesheets-->
        <link rel="stylesheet" href="../css/materialize.min.css" />
        <link rel="stylesheet" href="../css/style.css" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
        <!-- page title -->
        <title>Janana - Bewerten Sie uns!</title>
    </head>
    <!-- black background -->
    <body class="black">
        <!-- get mysql data for  avarage and last msg -->
        <?php
            include 'afile.php';
            $db1 = mysqli_connect("localhost", $usern, $passwd, $database);
            if(!$db1) {
                exit("Verbindungsfehler: ".mysqli_connect_error());
            };
            $abfrage = "SELECT SUM(`rating1`) AS `value_sum` FROM `bewertungergebnisse`";
            $ergebnis = mysqli_query($db1, $abfrage);
            $daten = mysqli_fetch_assoc($ergebnis);
            $sumr1 = $daten['value_sum'];
            $abfrage2 = "SELECT COUNT(`rating1`) AS `anz_daten` FROM `bewertungergebnisse`";
            $ergebnis2 = mysqli_query($db1, $abfrage2);
            $daten2 = mysqli_fetch_assoc($ergebnis2);
            $anzr1 = $daten2['anz_daten'];
            $avr = $sumr1 / $anzr1;
            $avr1 = round($avr, 1);
            
            $abfrage = "SELECT SUM(`rating2`) AS `value_sum` FROM `bewertungergebnisse`";
            $ergebnis = mysqli_query($db1, $abfrage);
            $daten = mysqli_fetch_assoc($ergebnis);
            $sumr2 = $daten['value_sum'];
            $abfrage2 = "SELECT COUNT(`rating2`) AS `anz_daten` FROM `bewertungergebnisse`";
            $ergebnis2 = mysqli_query($db1, $abfrage2);
            $daten2 = mysqli_fetch_assoc($ergebnis2);
            $anzr2 = $daten2['anz_daten'];
            $avr = $sumr2 / $anzr2;
            $avr2 = round($avr, 1);

            $abfrage = "SELECT SUM(`rating3`) AS `value_sum` FROM `bewertungergebnisse`";
            $ergebnis = mysqli_query($db1, $abfrage);
            $daten = mysqli_fetch_assoc($ergebnis);
            $sumr3 = $daten['value_sum'];
            $abfrage2 = "SELECT COUNT(`rating3`) AS `anz_daten` FROM `bewertungergebnisse`";
            $ergebnis2 = mysqli_query($db1, $abfrage2);
            $daten2 = mysqli_fetch_assoc($ergebnis2);
            $anzr3 = $daten2['anz_daten'];
            $avr = $sumr3 / $anzr3;
            $avr3 = round($avr, 1);

            $abfrage = "SELECT `anmerkung` FROM `bewertungergebnisse` ORDER BY `id` DESC LIMIT 1";
            $ergebnis = mysqli_query($db1, $abfrage);
            $daten = mysqli_fetch_assoc($ergebnis);
            $msg = $daten;
        ?>
        <!-- dropdown menu big screen -->
        <ul id="dropdown1" class="dropdown-content blue2 white-text">
            <li><a href="aquarium1.html" class="white-text">54l Aquarium</a></li>
            <li><a href="aquarium2.html" class="white-text">180l Aquarium</a></li>
            <li><a href="aquarium3.html" class="white-text">12l Aquarium</a></li>
        </ul>
        <!-- navbar responsive-->
        <div class="navbar-fixed">
            <nav>
                <div class="nav-wrapper blue">
                    <div class="container">
                        <a href="#" class="brand-logo">Bewerten</a>
                        <a href="#" class="sidenav-trigger left" data-target="slide-out"><i class="material-icons">menu</i></a>
                        <ul class="right hide-on-med-and-down">
                            <li><a href="#" class="dropdown-trigger white-text" data-target="dropdown1">Aquarien<i class="material-icons right white-text">arrow_drop_down</i></a></li>
                            <li><a href="technik.html" class="white-text">Technik</a></li>
                            <li><a href="pflanzengallerie.html" class="white-text">Pflanzengallerie</a></li>
                            <li><a href="bewertung.php" class="white-text">Bewerten!</a></li>
                            <li><a href="../index.html" class="white-text"><i class="material-icons right white-text">home</i></a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <!-- dropdown sidenav for small screens -->
        <ul id="dropdown2" class="dropdown-content blue2 white-text">
            <li><a href="aquarium1.html" class="white-text">54l Aquarium</a></li>
            <li><a href="aquarium2.html" class="white-text">180l Aquarium</a></li>
            <li><a href="aquarium3.html" class="white-text">12l Aquarium</a></li>
        </ul>
        <!-- sidenav for small screens -->
        <ul class="sidenav blue" id="slide-out">
            <li><a href="#" class="dropdown-trigger white-text" data-target="dropdown2">Aquarien<i class="material-icons right white-text">arrow_drop_down</i></a></li>
            <li><a href="technik.html" class="white-text">Technik</a></li>
            <li><a href="pflanzengallerie.html " class="white-text">Pflanzengallerie</a></li>
            <li><a href="bewertung.php" class="white-text">Bewerten!</a></li>
            <li><a href="../index.html" class="white-text">Startseite<i class="material-icons right white-text">home</i></a></li>
        </ul>
        <!-- content starts here -->
        
        <!-- the form begins here -->
        <div class="container black white-text">
            <div class="row"></div>
            <div class="row">
                <div class="col s2 offset-s10">
                    <span class="bw">Ø</span>
                </div>
            </div>
            <form id="myForm" name="myForm">
                <!-- question one and output avrage of all database entries in column rating1 -->    
                <div class="row">
                    <div class="col s6">
                        <p class="bw">Wie gefällt Ihnen die Webseite?</p>
                    </div>
                    <div class="col s4">
                        <p class="range-field bw">
                            <input type="range" id="rating1" min="0" max="10" />
                        </p>
                    </div>
                    <div class="col s2">
                        <p class="bw" id="arating1"><?php echo $avr1 ?></p>
                    </div>
                </div>
                <!-- question two and output avrage of all database entries in column rating2 -->
                <div class="row">
                    <div class="col s6">
                        <p class="bw">Würden Sie die Seite weiterempfehlen?</p>
                    </div>
                    <div class="col s4">
                        <p class="range-field bw">
                            <input type="range" id="rating2" min="0" max="10" />
                        </p>
                    </div>
                    <div class="col s2">
                        <p class="bw" id="arating2"><?php echo $avr2 ?></p>
                    </div>
                </div>
                <!-- question three and output avrage of all database entries in column rating1 -->
                <div class="row">
                    <div class="col s6">
                        <p class="bw">Wie gefällt Ihnen das Design?</p>
                    </div>
                    <div class="col s4">
                        <p class="range-field bw">
                            <input type="range" id="rating3" min="0" max="10" />
                        </p>
                    </div>
                    <div class="col s2">
                        <p class="bw" id="arating"><?php echo $avr3 ?></p>
                    </div>
                </div>
                <!-- annotation msg and output of last msg -->
                <div class="row">
                    <p class="col s12 bw">Haben Sie Anregungen? Die letzte Anwort war: <span class="blue"><?php echo $msg['anmerkung'] ?></span></p>
                </div>

                <div class="row">
                    <div class="row">
                        <div class="input-field col s12 white-text">
                            <textarea id="textarea1" class="materialize-textarea white-text"></textarea>
                            <label for="textarea1">Anregungen?</label>
                        </div>
                    </div>
                </div>
                <!-- submit button --> 
                <div class="row">
                    <div class="col s12 center-align">
                        <button class="btn waves-effect waves-light blue" type="submit" name="action" id="submit">Abschicken
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
            </form>
            <div class="row"></div>
            <div class="row"></div>
        </div>

        <!-- Footer / Impressum -->
        <footer class="page-footer blue">
            <div class="container">
              <div class="row">
                <div class="col l12 s12">
                  <h2 class="white-text">Janana</h5>
                  <p class="grey-text text-lighten-4"><h5>Diese Webseite ist im Zusammenhang einer Projektarbeit HTML CSS im Rahmen einer Ausbildung zum Fachinformatiker / Anwendungsentwickler entstanden</h5></p>
                </div>
              </div>
            </div>
            <div class="footer-copyright">
              <div class="container">
              © 2021 Jan Ihmels, Hellerweg 51, 73728 Esslingen &nbsp;&nbsp;| &nbsp;&nbsp; enstanden für das Berufsförderwerk Schömberg, Steinbeisstraße 30, 71272 Renningen
              <a class="grey-text text-lighten-4 right" href="https://www.bfw-schoemberg.de">BfW Schömberg</a>
              </div>
            </div>
          </footer>
        
        <!-- javascript starts here -->
        <script src="../js/jquery-3.6.0.js"></script>
        <script src="../js/materialize.js"></script>
        <script>
            const slide_menu = document.querySelectorAll(".sidenav");
            M.Sidenav.init(slide_menu, {});
        </script>
        <script>
            $(document).ready(function(){
                $('.dropdown-trigger').dropdown();
            });
        </script>
        <script>
            myForm.addEventListener('submit', (event) => {
                let rating1 = document.querySelector("#rating1").value;
                let rating2 = document.querySelector("#rating2").value;
                let rating3 = document.querySelector("#rating3").value;
                let msg = document.querySelector("#textarea1").value;
                form = new FormData();
                form.append("rating1", rating1);
                form.append("rating2", rating2);
                form.append("rating3", rating3);
                form.append("msg", msg);
                fetch('bewertung.php', {method: 'POST', body: form});
            })
        </script>
        <?php
            $db2 = mysqli_connect("localhost", $usern, $passwd, $database);
            if(!$db2) {
                exit("Verbindungsfehler: ".mysqli_connect_error());
            };
            $r1 = $_POST["rating1"];
            $r2 = $_POST["rating2"];
            $r3 = $_POST["rating3"];
            $msg = $_POST["msg"];
            if(!$db2) {
                exit("Verbindungsfehler: ".mysqli_connect_error());
            };
            $eintrag = "INSERT INTO `bewertungergebnisse` (`rating1`, `rating2`, `rating3`, `anmerkung`) VALUES ('$r1', '$r2', '$r3', '$msg')";
            $eintragen = mysqli_query($db2, $eintrag);
            mysqli_close($db2);
            $db2=null;
            $db3 = mysqli_connect("localhost", "pi", "ircilv", "mysql");
            if(!$db3) {
                exit("Verbindungsfehler: ".mysqli_connect_error());
            };
            $eintrag2 = "DELETE FROM `bewertungergebnisse` WHERE `rating1` = 0";
            mysqli_query($db3, $eintrag2);
            mysqli_close($db3);
            $db3=null;

        ?>
    </body>
</html>