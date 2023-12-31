<?php 
include 'connectDB.php';
include 'query.php';
session_start();
?>
<!DOCTYPE html>
<html>
 <head>
      <title>Halal Restaurant In Japan</title>
      <link rel="stylesheet" href="style.css"/>
       <!-- font awesome-->
    <script src="https://kit.fontawesome.com/741f6de266.js" crossorigin="anonymous"></script>

 </head>
 <body>
    <div class="header">
        <div class="jarak">
            <h2>Halal Restaurant In Osaka</h2>
        </div>
    </div>
    <div class="menu">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="kontak.php">Contact</a></li>
            <li>
                <a href="./admin/login.php">
                    <?php 
                        if (isset($_SESSION['username'])) {
                            echo $_SESSION['username'];
                        }else{
                            echo "Login";
                        }
                    ?>
                </a>
            </li>
            <li>
                    <?php 
                        if (isset($_SESSION['username'])) {
                    ?>
                        <a href="./admin/logout.php">Logout</a>
                    <?php
                        }
                    ?>
            </li>
        </ul>
                 <div class="search-box">
                    <form action="" method="GET">
                        <input type="search-text" type="text" id="search_name" name="search_name"  placeholder="Search..." />
                        <input type="submit" value="送信">
                        <i class="fa-solid fa-magnifying-glass" style="color: #ebeef4;"></i>
                    </form>
                        <?php 
                            $search_name = $_GET ['search_name'];
                            if(isset($_GET['search_name'])){
                                $osaka_data = search(2, $search_name, $conn);
                            }else{
                                $osaka_data = select_q(2, $conn);		
                            }
                        ?>
                </div>
    </div>
    <div class="container">
        <div class="content">
            <div class="jarak">
                <!-- kiri -->
                <div class="kiri">
                    <!-- blog -->
                    <div class="border">
                        <div class="jarak">
                        <?php 
                                
                                $rows1 = count($osaka_data); // Number of rows in the array
                                for ($i = 0; $i < $rows1; $i++) {
                                    $columns = count($osaka_data[$i]); // Number of columns in each row
                                    echo "<h3>".$osaka_data[$i][2]."</h3>";
                                    echo "<p>Contact ".$osaka_data[$i][3]."</p>";
                                    echo "<p>Address ".$osaka_data[$i][4]."</p>";
                                    echo "<iframe src='".$osaka_data[$i][5]."' width='200' height='200' style='border:0;' allowfullscreen='' loading='lazy' referrerpolicy='no-referrer-when-downgrade'></iframe>";
                                }
                            ?>
                        </div>
                    </div>
                    
                </div>
                <!-- kiri -->
                <!-- kanan -->
                <div class="kanan">
                    <div class="left-mar">
                        <h3>Area</h3>
                        <hr/>
                        <p><a href="restotokyo.php" class="undecor">Tokyo</a></p>
                        <p><a href="restoosaka.php" class="undecor">Osaka</a></p>
                        <p><a href="restokyoto.php" class="undecor">Kyoto</a></p>
                        <p><a href="restokobe.php" class="undecor">Kobe</a></p>
                    </div>
                </div>
                <!-- kanan -->
            </div>
        </div>
        <div class="footer">
            <div class="jarak">
                <span>copyright © 2023. Your all reserved</span>
            </div>
        </div>
    </div>
</body>
</html>