<div class ="box side">
            <h2><a class="side" href="addentry.php">Add an App</a> | <a class="side" href="showall.php">Show All</a></h2>


            <!-- name search -->
            
            <form class="searchform" action="name_dev.php" method="post" enctype="multipart/form-data">

                <input class="search" type="text" name="dev_name" size="40" value="" required placeholder="App Name / Developer Name..." />

                <input class="submit" type="submit" name="find_dev_name" value="&#xf002;" />

            </form> <!-- / name search -->

            <!-- Free app search -->
            
            <form class="searchform" action="free_app.php" method="post" enctype="multipart/form-data">
    
                <input class="submit free" type="submit" name="free" value="Free with No in App Purchase &nbsp; &#xf002;" />

            </form> <!-- / free app search -->

            <br>
            <hr/>
            <br>

             <!-- advanced search -->
             <div class="advanced-frame">
                <h2>Advanced Search</h2>
            
                <form class="searchform" action="advanced.php" method="post" enctype="multipart/form-data">

                <input class="adv" type="text" name="app_name" size="40" value="" placeholder="App Name Title..." />

                <input class="adv" type="text" name="dev_name" size="40" value="" placeholder="Developer..." />
                
                <!-- Genre Dropdown -->

                <select class="search adv" name="genre"> 
                    <option value="" selected>Genre...</option>
                    <!-- get genre options from the database -->
                    <?php

                        $genre_sql="SELECT * FROM `genre` ORDER BY `genre`.`Genre` ASC";
                        $genre_query=mysqli_query($dbconnect, $genre_sql);
                        $genre_rs=mysqli_fetch_assoc($genre_query);

                        do {

                    ?>

                        <option value="<?php echo $genre_rs['Genre']; ?>"><?php echo $genre_rs['Genre']; ?></option>

                        <?php

                        } // end of genre options retrival

                        while ($genre_rs=mysqli_fetch_assoc($genre_query))


                         ?>

                </select>

                <!-- Cost -->

                <div class="flex-container">

                    <div class="adv-txt">
                        Cost&nbsp;(less&nbsp;than):
                    </div> <!-- / Cost label -->

                    <div>
                        <input class="adv" type="text" name="cost" size="12" value="" placeholder="$.." />
                
                    </div> 

                </div> <!-- / cost flex div -->

                <!-- No in App checkbox -->
                <div class="flex-container">

                    <div class="adv-txt">
                        <input class="adv-txt" type="checkbox" name="in_app" value="0" />
                    </div> <!-- / tickbox -->

                    <div class="adv-txt">
                        No In App Purchase                
                    </div> 

                </div> <!-- / cost flex div -->                

                 <!-- Rating -->

                 <div class="flex-container">

                        <div class="adv-txt">
                            Rating:&nbsp;&nbsp;                           
                        </div> <!-- / Rating label -->

                        <div>
                        <select class="search adv" name="rate_more_less"> 
                            <option value="">Choose...</option>
                            <option value="at least">At least...</option>
                            <option value="at most">At most...</option>                    
                            </select>
                        </div> <!-- / Rating dropdown -->

                        <div>
                            <input class="adv" type="text" name="rating" size="2" value="" placeholder="" />
                        </div> <!-- / Rating amount -->

                    </div> <!-- / rating flex div -->

                    <!-- Age Dropdown -->

                 <div class="flex-container">

                    <div class="adv-txt">
                        Age:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </div> <!-- / age label -->

                    <div>
                        <select class="search adv" name="age_more_less"> 
                            <option value="">Choose...</option>
                            <option value="at least">At least...</option>
                            <option value="at most">At most...</option>  
                        </select>
                    </div> <!-- / age dropdown -->

                    <div>
                        <input class="adv" type="text" name="age" size="2" value="" placeholder="" />
                    </div> <!-- / age -->

                </div> <!-- / age flex div -->

                <!-- Search button -->

                <input class="submit advanced-button" type="submit" name="advanced" value="Search &nbsp;&#xf002;" />

                </form> <!-- / form -->
            
            </div> <!-- / advanced search -->
            

            
            
           
        </div> <!-- / side bar -->
        <div class ="box footer">
            <p> Ed Sherian 2023</p>
        </div> <!-- / footer -->

        </div> <!-- / wrapper -->
</body>
</html>