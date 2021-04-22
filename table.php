<?php
include_once 'header.php';
?>
<section class="showcase">
    <div class="container showcase-inner">
 
    <h2>Cancel Reservation</h2>

    <button onclick="document.getElementById('id01').style.display='block'">
      Cancel
    </button>

    <div id="id01" class="modal">
      <span
        onclick="document.getElementById('id01').style.display='none'"
        class="close"
        title="Close Modal"
        >×</span
      >
      <form class="modal-content" action="/action_page.php">
        <div class="container-modal">
          <h1>Cancel Reservation</h1>
          <p>Are you sure you want to cancel your reservation?</p>

          <div class="clearfix">
            <button
              type="button"
              onclick="document.getElementById('id01').style.display='none'"
              class="cancelbtn"
            >
              No, forget it
            </button>
            <button
              type="button"
              onclick="document.getElementById('id01').style.display='none'"
              class="deletebtn"
            >
              Yes, cancel
            </button>
          </div>
        </div>
      </form>
    </div>
</div>
</section>

    <script>
      var modal = document.getElementById("id01");

      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function (event) {
        if (event.target == modal) {
          modal.style.display = "none";
        }
      };
    </script>
    <?php
include_once 'footer.php';
?>

