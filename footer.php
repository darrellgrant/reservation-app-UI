    
    <script src="js/jquery-3.6.0.js"></script>
    <script src="jqueryUI/jquery-ui.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <script>
      var minDate = new Date();
      $("#dateInput").datepicker({
        minDate: minDate,
      });
    </script>
    <script>
      $(document).ready(function () {
        $("#timeInput").timepicker({
          interval: 30,
          scrollbar: true,
          minTime: "17",
          maxTime: "10:30pm",
        });
      });
    </script>
    
    <script>
      

    </script>
    
  </body>
</html>