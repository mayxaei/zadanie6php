<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8">
<title>Zadanie 6</title>
</head>
<body>
<h3>1. SUMA</h3>
<form method="post">
  <input type="number" required name="a">
  <input type="number" required name="b">
  <button name="suma">Oblicz</button>
</form>

<?php
function suma($a, $b) {
    echo "Suma: " . ($a + $b);
}
if (isset($_POST["suma"])) {
    suma($_POST["a"], $_POST["b"]);
}
?>

<h3>2. PODSTAWY</h3>
<form method="post">
  <input type="number" required name="a">
  <input type="number" required name="b">
  <button name="podstawy">Oblicz</button>
</form>

<?php
function podstawy($a, $b) {
    echo "Różnica: " . ($a - $b) . "<br>";
    echo "Iloczyn: " . ($a * $b) . "<br>";
    if ($b == 0) {
        echo "Iloraz: nie można dzielić przez 0";
    } else {
        echo "Iloraz: " . ($a / $b);
    }
}
if (isset($_POST["podstawy"])) {
    podstawy($_POST["a"], $_POST["b"]);
}
?>

<h3>3. KALKULATOR</h3>
<form method="post">
  <input type="number" required name="a">
  <select name="dzialanie">
    <option value="suma">suma</option>
    <option value="roznica">różnica</option>
    <option value="iloczyn">iloczyn</option>
    <option value="iloraz">iloraz</option>
  </select>
  <input type="number" required name="b">
  <button name="kalkulator">Oblicz</button>
</form>

<?php

function kalkulator($dzialanie, $a, $b) {
    if ($dzialanie == "suma") {
        $w = $a + $b;
    } elseif ($dzialanie == "roznica") {
        $w = $a - $b;
    } elseif ($dzialanie == "iloczyn") {
        $w = $a * $b;
    } else {
        if ($b == 0) {
            $w = "nie można dzielić przez 0";
        } else {
            $w = $a / $b;
        }
    }
    echo "<div id='wynik'>$w</div>";
}
if (isset($_POST["kalkulator"])) {
    kalkulator($_POST["dzialanie"], $_POST["a"], $_POST["b"]);
}
?>

<h3>4. MAKS</h3>
<form method="post">
  <input type="number" required name="a">
  <input type="number" required name="b">
  <input type="number" required name="c">
  <button name="maks">Sprawdź</button>
</form>

<?php
function maks($a, $b, $c) {
    echo "Największa liczba: " . max($a, $b, $c);
}
if (isset($_POST["maks"])) {
    maks($_POST["a"], $_POST["b"], $_POST["c"]);
}
?>

<h3>5. WZROST</h3>
<form method="post">
  <input type="number" required name="wzrost" placeholder="wzrost (cm)">
  <button name="wzrost_btn">Sprawdź</button>
</form>

<?php
function wzrost($w) {
    if ($w < 150) {
        echo "Wzrost niski";
    } elseif ($w > 180) {
        echo "Wzrost wysoki";
    } else {
        echo "Wzrost średni";
    }
}
if (isset($_POST["wzrost_btn"])) {
    wzrost($_POST["wzrost"]);
}
?>

<h3>6. BMI</h3>
<form method="post">
  <input type="number" required name="wzrost" placeholder="wzrost (cm)">
  <input type="number" required name="waga" placeholder="waga (kg)">
  <button name="bmi">Oblicz</button>
</form>

<?php
function bmi($wzrost, $waga) {
    $m = $wzrost / 100;
    $bmi = $waga / ($m * $m);
    if ($bmi < 18.5) {
        $komentarz = "za mało!";
    } elseif ($bmi > 25) {
        $komentarz = "za dużo!";
    } else {
        $komentarz = "OK!";
    }
    echo "<div id='wynik'>BMI = " . round($bmi, 2) . " - $komentarz</div>";
}
if (isset($_POST["bmi"])) {
    bmi($_POST["wzrost"], $_POST["waga"]);
}
?>

<h3>7. STARSZY</h3>
<form method="post">
  Osoba 1: <input type="date" required name="data1">
  Osoba 2: <input type="date" required name="data2">
  <button name="starszy">Sprawdź</button>
</form>

<?php
function starszy($data1, $data2) {
    if ($data1 < $data2) {
        echo "Starsza jest osoba 1";
    } elseif ($data2 < $data1) {
        echo "Starsza jest osoba 2";
    } else {
        echo "Obie osoby są w tym samym wieku";
    }
}
if (isset($_POST["starszy"])) {
    starszy($_POST["data1"], $_POST["data2"]);
}
?>

<h3>8. PRZESTĘPNY</h3>
<form method="post">
  <input type="number" required name="rok" placeholder="rok">
  <button name="przestepny">Sprawdź</button>
</form>

<?php
function przestepny($rok) {
    if (($rok % 4 == 0 && $rok % 100 != 0) || $rok % 400 == 0) {
        echo "Rok $rok jest przestępny";
    } else {
        echo "Rok $rok nie jest przestępny";
    }
}
if (isset($_POST["przestepny"])) {
    przestepny($_POST["rok"]);
}
?>

<h3>9. SIŁA</h3>
<form method="post">
  <input type="text" required name="haslo" placeholder="hasło">
  <button name="sila">Sprawdź</button>
</form>

<?php
function sila($haslo) {
    $dlugosc = strlen($haslo);

    if ($dlugosc <= 4) {
        echo "Hasło słabe";
    } elseif (!preg_match("/[0-9]/", $haslo)) {
        echo "Hasło słabe (brak cyfry)";
    } elseif (!preg_match("/[A-Z]/", $haslo)) {
        echo "Hasło słabe (brak dużej litery)";
    } elseif (!preg_match("/[a-z]/", $haslo)) {
        echo "Hasło słabe (brak małej litery)";
    } elseif (!preg_match("/[^A-Za-z0-9]/", $haslo)) {
        echo "Hasło słabe (brak znaku specjalnego)";
    } elseif ($dlugosc < 8) {
        echo "Hasło średnie";
    } else {
        echo "Hasło mocne";
    }
}
if (isset($_POST["sila"])) {
    sila($_POST["haslo"]);
}
?>

<h3>10. TRÓJKĄT</h3>
<form method="post">
  <input type="number" required name="a">
  <input type="number" required name="b">
  <input type="number" required name="c">
  <button name="trojkat">Sprawdź</button>
</form>

<?php
function trojkat($a, $b, $c) {
    if ($a + $b > $c && $a + $c > $b && $b + $c > $a) {
        echo "Z tych boków można zbudować trójkąt";
    } else {
        echo "Z tych boków nie można zbudować trójkąta";
    }
}
if (isset($_POST["trojkat"])) {
    trojkat($_POST["a"], $_POST["b"], $_POST["c"]);
}
?>

<h3>11. SZYFR</h3>
<form method="post">
  <input type="text" required name="tekst">
  <button name="szyfr">Szyfruj</button>
</form>

<?php
function szyfr($tekst) {
    $alfabet = "abcdefghijklmnopqrstuvwxyz";
    $wynik = "";
    for ($i = 0; $i < strlen($tekst); $i++) {
        $litera = $tekst[$i];
        $pozycja = strpos($alfabet, $litera);
        if ($pozycja === false) {
            $wynik = $wynik . $litera;
        } else {
            $wynik = $wynik . $alfabet[($pozycja + 2) % 26];
        }
    }
    echo $tekst . " -> " . $wynik;
}
if (isset($_POST["szyfr"])) {
    szyfr($_POST["tekst"]);
}
?>

</body>
</html>