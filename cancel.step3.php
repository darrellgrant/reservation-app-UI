<?php
    include_once 'header.php';

?>
<section class="showcase">
    <div class="container showcase-inner">
        <p>Reservation for Guest</p>
        <div>
            <?php echo $_SESSION['guest-firstname'] . " " . $_SESSION['guest-lastname'];?>
        </div>
        <p>Has been cancelled.</p>
    </div>  
</section>
<?php
    include_once 'footer.php';
?>