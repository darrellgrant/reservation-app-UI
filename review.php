<?php
include_once 'header.php';
?>

<section class="showcase">
    <div class="container showcase-inner">
            <p>
                If you wish to view a previously made reservation<br>
                please enter the name and phone number<br>
                given when your reservation was made.
            </p>
            <div class="error-1" id="global-error-msg"></div>

            <form action="includes/review.lookup.inc.php" method="POST">
            <div>
            First name
            </div>
            <input type="text" name="firstname" placeholder="First name" class="input-c" onchange="validateCancelInput()">
            <div class="error-msg" id="error-msg-1"></div>
            
            
            <div>
            Last name
            </div>
            <input type="text" name="lastname" placeholder="Last name" class="input-c" onchange="validateCancelInput()">
            <div>
            <div class="error-msg" id="error-msg-2"></div>
            Phone
            </div>
            <input type="text" name="phone" placeholder="Phone" class="input-c" onchange="validateCancelInput()">

            <div>
            <div class="error-msg" id="error-msg-2"></div>
            <button type="submit" name="send-review-data" id="cancelBTN" class="button">Look up reservation</button>
            </div>

        </form>
        <?php
        
        if(isset($_SESSION['message'])): ?>

        <div class="error-1">
             <?php

             
                                
                                echo $_SESSION['message'];
                                unset ($_SESSION['message']);
                                
            ?>


        </div>
        <?php endif; ?>
    </div>
</section>
<?php
include_once 'footer.php';
?>
