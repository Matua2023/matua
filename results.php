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

                  <!-- Heading and subtitle  -->                  

                <span class="sub_heading"><a href="<?php echo $find_rs['URL']; ?>" target="_blank" >
                <?php echo $find_rs['Name']; ?></a></span> 
                <?php
                
                    if (
                    $find_rs['Subtitle'] != "")
                    {
                        ?>
                         <span class="sub_heading">&nbsp;&nbsp;|&nbsp;&nbsp;<?php echo $find_rs['Subtitle']; ?></span>
                    <?php
                    }   //end if                     
                
                ?>

                <!-- end of Heading and subtitle  --> 

                <!-- Ratings  -->  
                <br >
                <div class="flex-container">                

                    <div class="star-ratings-sprite">
                        <span style="width:<?php echo $find_rs['User Rating'] / 5 * 100; ?>%" class="star-ratings-sprite-rating">
                        
                        </span>
                    </div> <!-- end of star rating  --> 

                    <div class="actual-rating">
                    (<?php echo $find_rs['User Rating']; ?> based on <?php echo number_format($find_rs['Rating Count']); ?> votes)

                    </div>  <!-- end of actual rating  --> 
                
                </div> <!-- end of flex-container  -->

                <!-- end of Ratings  --> 

                <!-- Price -->
                
                <?php
                
                    if ($find_rs['Price'] == 0)
                    {
                        ?>
                        
                         <p><span class="sub_heading">Free</span>
                         <?php 
                            if($find_rs['In App'] == 1){                                
                            ?>
                                (In App Purchase)
                            <?php

                            } //end app purchase if  
                            
                        ?>

                         </p>
                         
                    <?php

                    } //end price if  

                    // display the price
                    else {
                        ?>
                        <p>Price: $<?php echo $find_rs['Price']; ?></p>
                        <?php
                    }
                    
                ?>                            

                <!-- end Price -->            
                
                <p><span class="sub_heading">Developer: </span><?php echo $find_rs['DevName']; ?></p>
                <p><span class="sub_heading">Genre: </span><?php echo $find_rs['Genre']; ?></p>
                <p>Suitable for ages <?php echo $find_rs['Age']; ?> and up</p>
                <p><span class="sub_heading">Description:</span></p>

                <p>
                <?php echo $find_rs['Description']; ?>
                </p>

            </div> <!-- / results -->
            <br >

            <?php

                } //end of do loop

                while($find_rs=mysqli_fetch_assoc($find_query));

            } // end else

            // display results

            ?>