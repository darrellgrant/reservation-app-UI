<?php
include_once 'header.php';
include_once 'includes/dbh.inc.php';
$yes="";
$no="";
$smoking="";
$nonsmoking="";
$nopref="";
$update_note="";

if (isset($_SESSION['guest'])){
    $guest = $_SESSION['guest'];
    $sql = "SELECT * FROM customer WHERE customerID='$guest'";
	$result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
 } else{
     header("Location: 404.php?error=invalid_access");
 }

?>

<section class="showcase">
    <div class="container showcase-inner">
<div class="front-form update-table-desktop">

<form action="includes/update.inc.php" method="POST">
<!--pre-'checks' radio buttons with the user selection from registration form--> 
<?php
    if (!empty($row['needsAccess'])){
        if($row['needsAccess']=="no"){
            $no="checked";
        
        }else{
            $yes="checked";
        }
    
    }

    if(!empty($row['smokePref'])){
        if($row['smokePref']=="non-smoking"){
            $nonsmoking="checked";
        }else if($row['smokePref']=="smoking"){
            $smoking="checked";
        }else{
            $nopref="checked";
        }

    }
//if user makes changes to note 
//make sure updated note info overrides old note info 
    if(!empty($row['accessNote'])){
        $update_note = $row['accessNote'];
    }


?>
    <table >
        <tr>
            <td colspan="2">
               <h3><?php echo "Reservation for Guest<br> " . $row['firstname'] . " " . $row['lastname']; ?></h3>
               <input type="hidden" name="customerID" value="<?php echo $guest; ?>">
              
            </td>
        </tr>
        <tr class="a1">
            <td class="a2"><h4>First Name</h4>
            <input type="text" name="first-name" id="first-name" value="<?php echo $row['firstname']; ?>" class="input1" >
            <div class="errMsg errorText"></div>
            </td>
        
            <td class="a2"><h4>Last Name</h4>
            <input type="text" name="last-name" id="last-name" value="<?php echo $row['lastname']; ?>" class="input1" >
            <div class="errMsg errorText"></div>
            </td>
        </tr>
 
        <tr class="a1">
            <td class="a2"><h4>Phone Number</h4>
            <input type="text" name="phone" id="phone" value="<?php echo $row['phone']; ?>" class="input1">
            <div class="errMsg errorText"></div>
            </td>
        
            <td class="a2"><h4>Date</h4>
            <input type="text" name="dateInput" id="dateInput" value="<?php echo date('m/d/Y', strtotime($row['user_date'])); ?>" class="input1">
            <div class="errMsg errorText"></div>
            </td>
        
        </tr>

  <tr class="a1">
    <td class="a2"><h4>Time</h4>
    <input type="text" name="timeInput" id="timeInput" value="<?php echo $row['user_time']; ?>" class="input1">
    <div class="errMsg errorText"></div>
    </td>

    <td class="a2"><h4>No. of Guests</h4>
    <input type="text" name="guests" id="guests" value="<?php echo $row['guests']; ?>" class="input1">
    <div class="errMsg errorText"></div>
    </td>
</tr>
   <tr class="a1">
    <td class="a2"><h4>Seating Preference</h4>
    <div>
                <input
                  type="radio"
                  name="preference"
                  id="no"
                  value="non-smoking" <?php echo $nonsmoking; ?>
                  class="radioGroup03"
                />
                <label for="nonsmoking">Non-Smoking</label>
    </div>
    <div>
                <input
                  type="radio"
                  name="preference"
                  id="yes"
                  value="smoking" <?php echo $smoking; ?>
                  class="radioGroup03"
                />
                <label for="smoking">Smoking</label>
    </div>
    <div>
                <input
                  type="radio"
                  name="preference"
                  id="nopref"
                  value="no-preference" <?php echo $nopref; ?>
                  class="radioGroup03"
                />
                <label for="no-preference">No Preference</label>
    </div>



   
    </td>

    <td class="a2"><h4>Special Accomodations<br> Needed?</h4>
                <input
                  type="radio"
                  name="accomodations"
                  id="yes-special"
                  class=""
                  value="yes" <?php echo $yes; ?>
                  onclick="displayNote(1)"
                />
                <label for="yes">Yes</label>
                <input
                  type="radio"
                  name="accomodations"
                  id="no-special"
                  class=""
                  value="no" <?php echo $no; ?>
                  onclick="displayNote(0)"
                />
                <label for="no">No</label>
    </td>
</tr>
   <tr class="a1">
    <td colspan="2"><h4>Note</h4>
    <textarea name="special-note" id="special-text-area" cols="30" rows="3"  placeholder="<?php echo $row['accessNote'] ?>"></textarea>
    <input type="hidden" name="temp-note" value="<?php echo $row['accessNote'] ?>">
    </td>
</tr>
<tr>
    <td colspan="2">
    <div class="errMsg" id="globalErrMSG"> </div>
    <button type="submit" name="submitUpdate" id="update-submit" class="button">Submit Changes</button>
    
    </td>
</tr>

</table>
</form>
</div>
<!-- mobile version of the preceding update form------------------------------------------------->
<!----------------------------------------------------------------------------------------------------------------->
<div class="front-form update-table-mobile">

<form action="includes/update.inc.mobile.php" method="POST">
<!--pre-'checks' radio buttons with the user selection from registration form--> 
<?php
    if (!empty($row['needsAccess'])){
        if($row['needsAccess']=="no"){
            $no="checked";
        
        }else{
            $yes="checked";
        }
    
    }

    if(!empty($row['smokePref'])){
        if($row['smokePref']=="non-smoking"){
            $nonsmoking="checked";
        }else if($row['smokePref']=="smoking"){
            $smoking="checked";
        }else{
            $nopref="checked";
        }

    }
//if user makes changes to note 
//make sure updated note info overrides old note info 
    if(!empty($row['accessNote'])){
        $update_note = $row['accessNote'];
    }


?>
<table id="update-mobile-screen">
    <tr>
        <td>
            <h3><?php echo "Reservation for Guest<br> " . $row['firstname'] . " " . $row['lastname']; ?></h3>
            <input type="hidden" name="customerID" value="<?php echo $guest; ?>">
                
        </td>
    </tr>
    <tr class="a1">
        <td><h4>First Name</h4>
            <input type="text" name="first-name" id="first-name" value="<?php echo $row['firstname']; ?>" class="inputMobile red" >
            <div class="errMsg errorText-mobile"></div>
        </td>
    </tr>
    <tr class="a1">
        <td><h4>Last Name</h4>
            <input type="text" name="last-name" id="last-name" value="<?php echo $row['lastname']; ?>" class="inputMobile" >
            <div class="errMsg errorText-mobile"></div>
        </td>
    </tr>
    <tr class="a1">
        <td><h4>Phone Number</h4>
            <input type="text" name="phone" id="phone" value="<?php echo $row['phone']; ?>" class="inputMobile">
            <div class="errMsg errorText-mobile"></div>
        </td>
    </tr>
    <tr class="a1">
        <td><h4>Date</h4>
            <input type="text" name="dateInput" id="dateInput" value="<?php echo date('m/d/Y', strtotime($row['user_date'])); ?>" class="inputMobile">
            <div class="errMsg errorText-mobile"></div>
        </td> 
    </tr>
    <tr class="a1">
        <td><h4>Time</h4>
            <input type="text" name="timeInput" id="timeInput" value="<?php echo $row['user_time']; ?>" class="inputMobile">
            <div class="errMsg errorText-mobile"></div>
        </td>
    </tr>
    <tr class="a1">
        <td><h4>No. of Guests</h4>
            <input type="text" name="guests" id="guests" value="<?php echo $row['guests']; ?>" class="inputMobile">
            <div class="errMsg errorText-mobile"></div>
        </td>
    </tr>
   <tr class="a1">
        <td><h4>Seating Preference</h4>
        <div>
                <input
                  type="radio"
                  name="preference"
                  id="no"
                  value="non-smoking" <?php echo $nonsmoking; ?>
                  class="radioGroup03"
                />
                <label for="nonsmoking">Non-Smoking</label>
        </div>
        <div>
                <input
                  type="radio"
                  name="preference"
                  id="yes"
                  value="smoking" <?php echo $smoking; ?>
                  class="radioGroup03"
                />
                <label for="smoking">Smoking</label>
        </div>
        <div>
                <input
                  type="radio"
                  name="preference"
                  id="nopref"
                  value="no-preference" <?php echo $nopref; ?>
                  class="radioGroup03"
                />
                <label for="nonsmoking">No Preference</label>
        </div>



   
        </td>
    </tr>
    <tr class="a1">
        <td><h4>Special Accomodations<br>Needed?</h4>
                <input
                  type="radio"
                  name="accomodations"
                  id="yes-special"
                  class=""
                  value="yes" <?php echo $yes; ?>
                  onclick="displayNote(1)"
                />
                <label for="yes">Yes</label>
                <input
                  type="radio"
                  name="accomodations"
                  id="no-special"
                  class=""
                  value="no" <?php echo $no; ?>
                  onclick="displayNote(0)"
                />
                <label for="no">No</label>
        </td>
    </tr>
   <tr class="a1">
        <td><h4>Note</h4>
            <textarea name="special-note" id="special-text-area" cols="30" rows="3"  placeholder="<?php echo $row['accessNote'] ?>"></textarea>
            <input type="hidden" name="temp-note" value="<?php echo $row['accessNote'] ?>">
        </td>
    </tr>
    <tr>
        <td>
            <div class="errMsg" id="globalErrMSG-mobile"> </div>
            <button type="submit" name="submitUpdate-mobile" id="update-submit" class="button">Submit Changes</button>
        </td>
    </tr>

</table>
</form>
</div>
</section>


<?php
include_once 'footer.php';
?>


