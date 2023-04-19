<?php include("head_nav.php"); 

    $find_sql="SELECT * FROM `game_details` 
    JOIN genre ON (game_details.GenreID = genre.GenreID)
    JOIN developer ON (game_details.DeveloperID = developer.DeveloperID)
    ";
    $find_query=mysqli_query($dbconnect, $find_sql);
    $find_rs=mysqli_fetch_assoc($find_query);
    $count=mysqli_num_rows($find_query);

?>
            
        <div class ="box main">
            <h2>All Results</h2>
            <?php
            // check for results
            if ($count < 1)
            {
                ?>

            <div class="error">
                No results match for that search.
                Use the search box to try again.

            </div> <!-- end error  -->

            <?php

            } //end count if  
        
            // display error if no results
            else {

                do {

                    ?>
            <!-- Search results  -->

            <div class="results">

                <span class="sub_heading"><a href="<?php echo $find_rs['URL']; ?>" target="_blank" >
                <?php echo $find_rs['Name']; ?></a></span> - 
                <?php
                
                    if (?>
                    <?php echo $find_rs['Subtitle']; ?>
                    <?php == ""){
                        ?>
                        <?php
                        echo "No Subtitle" ?>
                        <?php
                    }   
                    else {
                        ?><?php echo $find_rs['Subtitle']; ?><?php
                    }
                
                ?>

            
                <p>Genre: <span class="sub_heading"><?php echo $find_rs['Genre']; ?></span></p>
                <p>Developer: <span class="sub_heading"><?php echo $find_rs['DevName']; ?></span></p>
                <p>Rating: <span class="sub_heading">
                    <?php 
                    for ($x=0; $x < $find_rs['User Rating']; $x++)
                    {
                        echo "&#9733;";
                    }                    
                    
                    ?> based on <?php echo $find_rs['Rating Count']; ?> votes

                </span></p>
                <p><span class="sub_heading">Description:</span></p>

                <p>
                <?php echo $find_rs['Description']; ?>
                </p>

            </div> <!-- / results -->
            <br />

            <?php

                } //end of do loop

                while($find_rs=mysqli_fetch_assoc($find_query));

            } // end else

            // display results

            ?>
            
        </div> <!-- / main -->

<?php include("bottom.php") ?>