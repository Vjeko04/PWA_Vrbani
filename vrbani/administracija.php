<?php 
session_start();
?>

<!DOCTYPE html>

<?php 
include 'datum.php';
include 'connect.php';
include 'odjava.php';
define('UPLPATH', 'slike/'); 


?>

    <head>

        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="stil.css" /> 

       


        <title>VN - administracija</title>

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
            
            if ((isset($_SESSION['$username'])) && $_SESSION['$level'] == 1) {
            echo '<form enctype="multipart/form-data" action="skriptaadmin1.php" method="POST">
            
            
            <label for="category">Odaberite Kategoriju vijesti koje želite promijeniti/obrisati.</label>
            
                <div class="form-field">
                    <select name="category" id="" class="form-field-textual">
                        <option value="novosti">Novosti</option>
                        <option value="dogadjanja">Dogadjanja</option>
                    </select>
             </div>
            </div><br/><br/>

            
            
            <br/><br/>
            
            <div class="form-item">
                <button type="reset" value="Poništi">Poništi</button>
                <button type="submit" value="Prihvati">Odaberi</button>
            </div>
        </form><br/><br/><br/><br/>';

        } else if ((isset($_SESSION['$username'])) && $_SESSION['$level'] == 0) {
            echo "Žalimo <h3 style='fontWeight:bold;'>". $_SESSION['$username'] . "</h3> ali za pristup ovom dijelu stranice trebate administratorske ovlasti.";
        } else {
            echo "Za pristup ovom dijelu stranice trebate biti <a href='prijava.php'>prijavljeni</a> i imati administratorske ovlasti.";
        }

?>

       

        
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
