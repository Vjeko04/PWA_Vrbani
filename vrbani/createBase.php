<?php



header('Content-Type: text/html; charset=utf-8');
$servername = "localhost";
$username = "root";
$password = "";
$basename = "vrbani2";


//----------------------------------------------------------------------
$conn = mysqli_connect($servername, $username, $password);
if (!$conn) {
  die("<br>Connection failed: </br>" . mysqli_connect_error());
}
else {
    echo "<br>Connected succesfully</br>";
}

$sql1 = "DROP DATABASE IF EXISTS vrbani2";
if (mysqli_query($conn, $sql1)) {
  echo "<br>Database dropped successfully</br>";
} else {
  echo "<br>Error dropping database: </br>" . mysqli_error($conn);
}


$sql = "CREATE DATABASE vrbani2";
if (mysqli_query($conn, $sql)) {
  echo "<br>Database created successfully</br>";
} else {
  echo "<br>Error creating database: </br>" . mysqli_error($conn);
}


mysqli_close($conn);

//----------------------------------------------------------------------
$conn2 = mysqli_connect($servername, $username, $password, $basename);
if (!$conn2) {
  die("<br>Connection failed: </br>" . mysqli_connect_error());
}
else {
    echo "<br>Connected succesfully</br>";
}

$sql2 = "CREATE TABLE korisnik (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ime VARCHAR(32) NOT NULL,
    prezime VARCHAR(32) NOT NULL,
    korisnicko_ime VARCHAR(32) NOT NULL,
    lozinka VARCHAR(255) NOT NULL,
    email VARCHAR(64) NOT NULL,
    razina TINYINT(1) NOT NULL,
    zakljucano TINYINT(1) NOT NULL,
    kod INT(11) NOT NULL
    )";
    
    if ($conn2->query($sql2) === TRUE) {
      echo "<br>Table korisnik created successfully</br>";
    } else {
      echo "<br>Error creating table: </br>" . $conn->error;
    }

    $sql3 = "CREATE TABLE vijesti (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        datum VARCHAR(32) NOT NULL,
        naslov VARCHAR(64) NOT NULL,
        sazetak TEXT NOT NULL,
        tekst TEXT NOT NULL,
        slika VARCHAR(64) NOT NULL,
        kategorija VARCHAR(64) NOT NULL,
        arhiva TINYINT(1) NOT NULL,
        autor VARCHAR(64) NOT NULL
        )";
        
        if ($conn2->query($sql3) === TRUE) {
          echo "<br>Table vijesti created successfully</br>";
        } else {
          echo "<br>Error creating table: </br>" . $conn->error;
        }
    

mysqli_close($conn2);



?>