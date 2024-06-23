<?php 
session_start();
?>

<!DOCTYPE html>

<?php 
include 'datum.php';
include 'connect.php';
include 'odjava.php';
define('UPLPATH', 'slike/'); 

$id=$_GET['id'];

?>

    <head>

        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="stil.css" /> 

       
        

        <title>Vrbani Newsroom</title>
        <style>
        <?php include "stil.css" ?> 
            </style> 
        
    </head>




    <body>

    <?php
        if(isset($_POST['Odjava'])) { 
            odjava(); 
            header("Location: index.php", TRUE, 301);
            exit();
        } 
    ?>

            <header id="header">
                

                <div id="naslov">
                    <div id="prvi">
                        <nav>
                        <ul>
                            <?php if ((isset($_SESSION['$username']))) {
                                echo '<li id="un">' . $_SESSION['$username'] . '</li>';

                                } else {
                                    echo '<li> <button><a href="prijava.php">Log in</a> </button></li>';
                                }
                                ?>
                            
                                <li> <button><a href="unos.php">Unos</a> </button></li>
                            <?php    
                                if ((isset($_SESSION['$username']))) {
                            echo '<li> <form method="post"> 
                                        <input type="submit" name="Odjava"
                                                value="Odjava"/> </form></li>';

                                }
                                ?>
                            </ul>
                        </nav>
                    </div>

                    <h1><a id="naslovnitekst" href=index.php>Vrbani novosti</a></h1><br/>
                    <p><?php
                        echo $datum;
                    ?></p><hr>
                    
                    <div class="clear"></div>
                    

                    <nav id="navigacija">
                        <ul>
                            <li> <a href="index.php">Početna</a>  </li>
                            <li> <a href="kategorija.php?id=novosti">Novosti</a></li>
                            <li> <a href="kategorija.php?id=dogadjanja">Događanja</a></li>
                            <li> <a href="administracija.php">Administracija</a></li>
                        </ul>
                    </nav>

                
                </div>
                    


            </header>




        <main id="glavni">
            <section id="prva">
             
                

                <?php
                        $query = "SELECT * FROM vijesti WHERE id='$id'";
                        $result = mysqli_query($dbc, $query);
                        $row = mysqli_fetch_array($result);?>
                       
                        <section class="glavna" role="main">
                                    <div class="row">
                                    <h2 class="category"><?php
                                    echo "<span>".$row['kategorija']."</span>";
                                    ?></h2><br>
                                    <h1 class="title"><?php
                                    echo $row['naslov'];
                                    ?></h1> <br>
                                    <p>AUTOR:
                                        <?php
                                            echo $row['autor'];
                                        ?>
                                    </p><br>
                                    <p>OBJAVLJENO: 
                                         <?php
                                    echo "<span>".$row['datum']."</span>";
                                    ?></p>
                                    </div>
                                    <section class="slika">
                                    <?php
                                    echo '<img src="' . UPLPATH . $row['slika'] . '">';
                                    ?>
                                    </section><br>
                                    <section class="about">
                                    <p>
                                    <?php
                                    echo "<i>".$row['sazetak']."</i>";
                                    ?>
                                    </p>
                                    </section><br><hr><br>
                                    <section class="sadrzaj">
                                    <p>
                                    <?php
                                    echo $row['tekst'];
                                    ?>
                                    </p>
                                    </section>
                        </section>


                                
                
                
                
                   
                  
                 

            </section><br/><br/>
            <hr>

            

        

            
        </main><br/><br/><br/><br/><br/>







        <div class="clear"></div>
        <footer id="zadnje">
            <h3>Vjekoslav Vuković</h3>
            <h3>vvukovic@tvz.hr</h3>
            <h3>2024</h3>
        </footer>



    </body>





    



</html>
