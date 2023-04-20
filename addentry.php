<?php include("head_nav.php");

// get genre options from the database

$genre_sql="SELECT * FROM `genre` ORDER BY `genre`.`Genre` ASC";
$genre_query=mysqli_query($dbconnect, $genre_sql);
$genre_rs=mysqli_fetch_assoc($genre_query);

// Initialise form variables
$app_name = "";
$subtitle = "";
$url = "";
$genreID = "";
$dev_name = "";
$age = "";
$rating = "";
$rating = "";
$rate_count = "";
$cost = "";
$in_app = 1;
$description = "";

$has_errors = "no";

// exectes when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $app_name = mysqli_real_escape_string($dbconnect,$_POST['app_name']);
    $subtitle = mysqli_real_escape_string($dbconnect,$_POST['subtitle']);
    $url = mysqli_real_escape_string($dbconnect,$_POST['url']);
    $genreID = mysqli_real_escape_string($dbconnect,$_POST['genre']);

    // Get genre using GenreID
    if ($genreID != "") {
        $genreitem_sql = "SELECT * FROM `genre` WHERE `GenreID` = $genreID";
        $genreitem_query = mysqli_query($dbconnect,$genreitem_sql);
        $genreitem_rs=mysqli_fetch_assoc($genreitem_query);

        $genre = $genreitem_rs['Genre'];

    } // end GenreID

    $dev_name = mysqli_real_escape_string($dbconnect,$_POST['dev_name']);
    $age = mysqli_real_escape_string($dbconnect,$_POST['age']);
    $rating = mysqli_real_escape_string($dbconnect,$_POST['rating']);
    $rating_count = mysqli_real_escape_string($dbconnect,$_POST['count']);
    $cost = mysqli_real_escape_string($dbconnect,$_POST['cost']);
    $in_app = mysqli_real_escape_string($dbconnect,$_POST['in_app']);
    $description = mysqli_real_escape_string($dbconnect,$_POST['description']);    

    // error checking


    //if there are errors
    if ($has_errors == "no") {   

    // go to success page
    header('Location: add_success.php');


    // get developer ID if it exists
    $dev_sql = "SELECT * FROM `developer` WHERE `DevName` LIKE '$dev_name'";
    $dev_query=mysqli_query($dbconnect, $dev_sql);
    $dev_rs=mysqli_fetch_assoc($dev_query);
    $dev_count=mysqli_num_rows($dev_query);


    // add developer to new ID
    if ($dev_count > 0) {
        $developerID = $dev_rs['DeveloperID'];

    }
    else {
        $add_dev_sql = "INSERT INTO `developer` (`DeveloperID`, `DevName`) VALUES (NULL, '$dev_name')";
        $add_dev_query=mysqli_query($dbconnect, $add_dev_sql);

        // get developer ID
        $newdev_sql = "SELECT * FROM `developer` WHERE `DevName` LIKE '$dev_name'";
        $newdev_query=mysqli_query($dbconnect, $newdev_sql);
        $newdev_rs=mysqli_fetch_assoc($newdev_query);
        
        $developerID = $newdev_rs['DeveloperID'];

    } // end of if

    // add to the database
    $addentry_sql = "INSERT INTO `game_details` (`ID`, `Name`, `Subtitle`, `URL`, `GenreID`, `DeveloperID`, `Age`, `User Rating`, `Rating Count`, `Price`, `In App`, `Description`) VALUES (NULL, '$app_name', '$subtitle', '$url', $genreID, $developerID, $age, $rating, $rating_count, $cost, $in_app, '$description');";
    $addentry_query=mysqli_query($dbconnect, $addentry_sql);

    } // end of no errors if
    
    echo "btoon pushed";

} // end of form- submit

?>
            
        <div class ="box main">
            <div class="add-entry">
            <h2>Add an App</h2>

            <form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">

                <!-- app name -->
                <input class="add-field" type="text" name="app_name"  value="<?php echo $app_name; ?>" required placeholder="App Name (required)..." />

                <!-- subtitle -->
                <input class="add-field" type="text" name="subtitle"  value="<?php echo $subtitle; ?>" placeholder="Subtitle (Optional)..." />

                <!-- url -->
                <input class="add-field" type="text" name="url" value="<?php echo $url; ?>" required placeholder="URL (required)..." />

                <!-- genre dropdown -->
                <select class="adv" required name="genre" > 

                    <?php 
                        If ($genreID == ""){
                            ?>
                            <option value="" selected>Genre...</option>
                    <?php
                        }
                        else {
                            ?>
                        <option value="<?php echo $genreID; ?>" selected><?php echo $genre; ?></option>
                    <?php
                        }                    
                    ?>
                    
                    <!-- get options from the database  -->
                    <?php 
                    do {

                        ?>

                            <option value="<?php echo $genre_rs['GenreID']; ?>"><?php echo $genre_rs['Genre']; ?></option>

                            <?php

                            } // end of genre options retrival

                            while ($genre_rs=mysqli_fetch_assoc($genre_query))
                    ?>

                </select>

                <!-- Dev name -->
                <input class="add-field" type="text" name="dev_name" value="<?php echo $dev_name; ?>"  placeholder="Developer Name (required)..." />

                <!-- age -->
                <input class="add-field" type="text" name="age"  value="<?php echo $age; ?>" placeholder="Age (0 for all)..." />

                 <!-- rating number 0 - 5 -->            
                <input class="add-field" type="number" name="rating"  value="<?php echo $rating; ?>" required step="0.1" min=0 max=5 placeholder="Rating (0-5)" />
            
                <!-- ratings more than 0 -->
                <input class="add-field" type="text" name="count"  value="<?php echo $rate_count; ?>"  placeholder="# of Ratings" />

                <!-- cost -->
                <input class="add-field" type="text" name="cost" value="<?php echo $cost; ?>" placeholder="Cost..." />

                <!-- in app radio buttons -->
                <div class="add-field" >                  

                    <b>In App Purchase:</b>

                    <?php 
                        if ($in_app == 1) {
                            // default value yes is selected
                            ?>

                            <input type="radio" name="in_app" value="1" checked="checked" /> Yes
                            <input type="radio" name="in_app" value="0" /> No

                    <?php
                        } // end if

                        else {
                            ?>
                            <input type="radio" name="in_app" value="1" checked="checked" /> Yes
                            <input type="radio" name="in_app" value="0" /> No
                    <?php
                        } // end else                    
                    
                    ?>                    

                </div>

                <!-- desc text area -->
                <textarea class="add-field <?php echo $description; ?>" name="description" placeholder="Description..." rows="6">
                <?php echo $description; ?></textarea>

                <!-- submit button -->
                <input class="submit advanced-button" type="submit" value="Submit" />

            </form>
            
            </div> <!-- / add-entry -->
        </div> <!-- / main -->

<?php include("bottom.php") ?>
        