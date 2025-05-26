<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Komis aut</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <section class="baner">
        <h1><strong><i>KupAuto!</i></strong> Internetowy Komis Samochodowy</h1>
    </section>
    <section class=" glowny glowny1">
        <!-- SCRIPT -->
        <?php
            $conn = new mysqli("localhost", "root","","kupauto");
            $query = "SELECT model, rocznik, przebieg, paliwo, cena, zdjecie FROM samochody WHERE id = 10;";
            if($res = $conn->query($query)){
                $row = $res->fetch_assoc();
           
                echo "<img src='".$row['zdjecie']."' alt='oferta dnia'/>";
                echo"<h4>Oferta Dnia: Toyota ".$row["model"]."</h4>";
                echo"<p>Rocznik: ".$row["rocznik"].", przebieg: ".$row["przebieg"].", rodzaj paliwa: ".$row["paliwo"]."</p>";
                echo"<h4>Cena: ".$row["cena"]."</h4>";

            }
        ?>
    </section>
    <section class="glowny">
        <h2>Oferty Wyróżnione</h2>
        <?php
            $query = "SELECT marki.nazwa, samochody.model, samochody.rocznik, samochody.cena, samochody.zdjecie FROM samochody JOIN marki ON marki.id = samochody.marki_id WHERE samochody.wyrozniony = 1 LIMIT 4;";
            if($res = $conn->query($query)){
                // echo "<div class='offers_wrapper' >";

                while( $row = $res->fetch_assoc() ){
                echo "<div class='offer_block' >";
                echo "<img src='".$row['zdjecie']."' alt='".$row["model"]."'/>";
                echo"<h4>".$row['nazwa']." ".$row["model"]."</h4>";
                echo"<p>Rocznik: ".$row["rocznik"]."</p>";
                echo"<h4>Cena: ".$row["cena"]."</h4>";
                echo "</div >";
            }
            // echo "</div >";

            }

        ?>
     </section>
    <section class="glowny">
        <h2>Wybierz markę</h2>
        <form action="" method="POST">
            <select name="select_mark"  >
            <?php
                $query = "SELECT marki.nazwa FROM marki;";
                if($res = $conn->query($query)){
                    while( $row = $res->fetch_assoc() ){
                    echo "<option value='".$row["nazwa"]."'>";
                    echo $row["nazwa"];
                    echo "</option >";
                }

            }

            ?>
             </select>
            <button type="submit">Wyszukaj</button>

        </form>
            <?php
                if(isset($_POST["select_mark"]) && $_POST["select_mark"]){
                    $selected_mark = $_POST["select_mark"];
                    $query = 'SELECT samochody.model, samochody.cena, samochody.zdjecie, marki.nazwa FROM samochody JOIN marki ON marki.id = samochody.marki_id WHERE marki.nazwa = "'.$selected_mark.'";';
                    if($res = $conn->query($query)){
                    // echo "<div class='offers_wrapper' >";
                    while( $row = $res->fetch_assoc() ){
                        echo "<div class='offer_block' >";
                        echo "<img src='".$row['zdjecie']."' alt='".$row["model"]."'/>";
                        echo"<h4>".$row['nazwa']." ".$row["model"]."</h4>";
                        echo"<h4>Cena: ".$row["cena"]."</h4>";
                        echo "</div >";
                    }
                    // echo "</div >";
                }
            }
            ?>
    </section>
    <section class="stopka">
        <p>Stronę wykonał:0000000000</p><p><a href="http://firmy.pl/komis">Znajdź nas także</a></p>
    </section>
</body>
</html>