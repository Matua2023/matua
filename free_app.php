<?php include("head_nav.php"); 

    //$free_app = $_POST['free'];

    $find_sql="SELECT * FROM `game_details` 
    JOIN genre ON (game_details.GenreID = genre.GenreID)
    JOIN developer ON (game_details.DeveloperID = developer.DeveloperID)    
    WHERE `Price` = 0 AND `In App` = 0
    ";
    $find_query=mysqli_query($dbconnect, $find_sql);
    $find_rs=mysqli_fetch_assoc($find_query);
    $count=mysqli_num_rows($find_query);?>
            
        <div class ="box main">
            <h2>Free with No In App Purchase Results</h2>

            <?php include("results.php"); ?>
           
            
        </div> <!-- / main -->

<?php include("bottom.php") ?>