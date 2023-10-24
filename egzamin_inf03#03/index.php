<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Sklep dla uczniów</title>
<link rel="stylesheet" href="styl.css">
</head>
<body>
    
<header>
<h1>Dzisiejsze promocje naszego sklepu</h1>
</header>
    
<main>

<section class="lewy">
    <h2>Taniej o 30%</h2>
    <ol type="a">
        <?php
        $baza = mysqli_connect('localhost', 'root', '', 'sklep');
        $q = "SELECT nazwa FROM towary where promocja = 1";
        $w = mysqli_query($baza, $q);
        if (mysqli_num_rows($w) > 0) {
            while ($r = mysqli_fetch_assoc($w)) {
                echo "<li>" . $r['nazwa'] . "</li>";
            }
        }
        mysqli_close($baza);
        ?>
    </ol>
</section>

<section class="srodkowy">
    <h2>Sprawdź cenę</h2>
    <form method="post">
        <select name="towar">
            <option value="Gumka do mazania">Gumka do mazania</option>
            <option value="Cienkopis">Cienkopis</option>
            <option value="Pisaki 60 szt.">Pisaki 60 szt.</option>
            <option value="Markery 4 szt.">Markery 4 szt.</option>
        </select>
        <input type="submit" name="submit" value="SPRAWDŹ">
    </form>
    <section class="wynik">
        <?php
        if (isset($_POST['submit'])) {
            $towar = $_POST['towar'];

            $baza = mysqli_connect('localhost', 'root', '', 'sklep');
            $q = "SELECT cena FROM towary WHERE nazwa = '$towar'";
            $w = mysqli_query($baza, $q);

            if ($r = mysqli_fetch_assoc($w)) {
                $cena = $r['cena'];
                $cena_promocyjna = $cena - ($cena * 0.30); 
                echo "Cena regularna: $cena<br>";
                echo "Cena w promocji 30%: $cena_promocyjna";
            } 
            mysqli_close($baza);
        }
        ?>
    </section>
</section>

<section class="prawy">
<h2>Kontakt</h2>
<p>e-mail: <a href="mailto:bok@sklep.pl">bok@sklep.pl</a></p>
<img src="promocja.png" alt="promocja">
</section> 
</main>
    
<footer>
<h4>Autor strony: 00000000000</h4>
</footer>
    
</body>
</html>