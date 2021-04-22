<?php
include_once 'header.php';
include_once 'includes/dbh.inc.php';

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
<div class="front-form">


    <table >
        <tr>
            <td>
               <h3><?php echo "Reservation for Guest<br> " . $row['firstname'] . " " . $row['lastname']; ?></h3>

            </td>
        </tr>
 
  <tr class="a1">
    <td><h4>Phone Number</h4>
    <?php echo $row['phone']; ?></td>
  </tr>
  <tr class="a1">
    <td><h4>Date</h4>
    <?php echo date('m/d/Y', strtotime($row['user_date'])); ?></td>
    </tr>
  <tr class="a1">
    <td><h4>Time</h4>
    <?php echo $row['user_time']; ?></td>
</tr>
   <tr class="a1">
    <td><h4>No. of Guests</h4>
    <?php echo $row['guests']; ?></td>
</tr>
   <tr class="a1">
    <td><h4>Seating Preference</h4>
    <?php echo $row['smokePref']; ?></td>
</tr>
   <tr class="a1">
    <td><h4>Special Accomodations Needed?</h4>
    <?php echo $row['needsAccess']; ?></td>
</tr>
   <tr class="a1">
    <td><h4>Note</h4>
    <?php echo $row['accessNote']; ?></td>
</tr>



</table>
<section>
<div>
<p>Need changes?</p>
<a href="update.php">Edit Details</a>
</div>
<div>
<p>Gotta cancel?</p>
<a href="includes/cancel.inc.php?cancel=<?php echo $row['customerID']; ?>">Cancel Reservation</a>
</div>


</section>
</div>
</div>
</section>

<?php
include_once 'footer.php';
?>
