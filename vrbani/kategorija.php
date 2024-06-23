<?php 
session_start();
?>

<!DOCTYPE html>

<?php 
include 'datum.php';
include 'connect.php';
include 'odjava.php';
define('UPLPATH', 'slike/'); 

$kategorija=$_GET['id'];
$d=0;
?>

    <head>

        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="stil.css" /> 

       
        

        <title>Vrbani Newsroom</title>
        <style>   <?php include "stil.css" ?> 
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
                <h2><?php
                echo $kategorija;
                ?></h2><br/>
                

                <?php
                        $query = "SELECT * FROM vijesti WHERE arhiva=0 AND kategorija='$kategorija'";
                        $result = mysqli_query($dbc, $query);
                        $i=0;
                       
                        while($row = mysqli_fetch_array($result)) {
                                echo '<article style="float:left; margin-right:30px; margin-bottom:30px;">';
                                echo'<div class="article">';
                                echo '<div class="novosti_img">';
                                echo '<img src="' . UPLPATH . $row['slika'] . '" style="width:200px;height:100px;">';
                                echo '</div>';
                                echo '<div class="media_body">';
                                echo '<h4 class="title">';
                                echo '<a href="clanak.php?id='.$row['id'].'">';
                                echo $row['naslov'];
                                echo '</a></h4>';
                                echo '<div style="width:200px;white-space:nowrap;overflow: hidden;text-overflow: ellipsis; " class="about">';
                                echo $row['sazetak'];
                                echo '</div></div></div>';
                                echo '</article>';
                                $d++;
                             
                                if($d == 4){
                                    $d=0;
                                    echo '<div class="clear"></div>';
                                }
                                
                }
                echo '<div class="clear"></div>';
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
