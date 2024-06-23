<?php 
session_start();
?>

<!DOCTYPE html>

<?php 
include 'datum.php'; 
include 'odjava.php';
?>

    <head>

        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="stil.css" /> 

       


        <title>VN - događanja</title>
        <style><?php include "stil.css" ?> 
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
                            <li> <a href="kategorija.php?id=novosti" class="">Novosti</a></li>
                            <li> <a href="kategorija.php?id=dogadjanja " class="">Događanja</a></li>
                            <li> <a href="administracija.php">Administracija</a></li>
                        </ul>
                    </nav>

                
                </div>
                    


            </header>




        <main id="glavni">
            

        

            
        </main><br/><br/><br/><br/><br/>







        <div class="clear"></div>
        <footer id="zadnje">
            <h3>Vjekoslav Vuković</h3>
            <h3>vvukovic@tvz.hr</h3>
            <h3>2024</h3>
        </footer>



    </body>





    



</html>