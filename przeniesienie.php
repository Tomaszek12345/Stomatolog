<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Imię = $_POST["imie"];
    $Nazwisko = $_POST["nazwisko"];
    $email = $_POST["email"];
    $Nrtelefonu = $_POST["telefon"];
    $Data_godz = $_POST["dataWizyty"];
    $Rodzajzabiegu = $_POST["rodzajZabiegu"];
    $DodatkoweUwagi = $_POST["komentarz"];

    try {
        $db = new PDO('mysql:host=localhost;dbname=rezerwacje', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $db->prepare("INSERT INTO dane (Imię, Nazwisko, email, Nrtelefonu, Data_godz, Rodzajzabiegu, DodatkoweUwagi) VALUES (:imie, :nazwisko, :email, :telefon, :dataWizyty, :rodzajZabiegu, :komentarz)");

        $stmt->bindParam(':imie', $Imię);
        $stmt->bindParam(':nazwisko', $Nazwisko);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefon', $Nrtelefonu);
        $stmt->bindParam(':dataWizyty', $Data_godz);
        $stmt->bindParam(':rodzajZabiegu', $Rodzajzabiegu);
        $stmt->bindParam(':komentarz', $DodatkoweUwagi);

        $stmt->execute();

        echo "Rejestracja zakończona";
    } catch (PDOException $e) {
        die("Błąd połączenia z bazą danych: " . $e->getMessage());
    }
} else {
    echo "Dane nie zostały przesłane poprawnie.";
}
?>