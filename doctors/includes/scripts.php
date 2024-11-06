
<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>

<script src="../dist/js/pages/dashboard.js"></script>
<!-- Toastr -->
<script src="../plugins/toastr/toastr.min.js"></script>
<!-- Ekko Lightbox -->
<script src="../plugins/ekko-lightbox/ekko-lightbox.min.js"></script>

<script>
  $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
</script>
<script>
  $(function () {
    $("#example1").DataTable({
      "autoWidth": false,
      "responsive": true,
      "pageLength": 100,
    });
    $("#example2").DataTable({
      "autoWidth": false,
    });
    $('#example3').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
    $("#example13").DataTable({
      "autoWidth": false,
      "responsive": true,
      "pageLength": 100,
    });
    $("#example12").DataTable({
      "autoWidth": false,
      "responsive": true,
      "pageLength": 1000,
    });
    //Date range picker
    $('#datetimepicker9').datetimepicker({
                icons: {
                    time: "fa fa-clock",
                    date: "fa fa-calendar",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down"
                }
            });
         
    $('#datetimepicker8').datetimepicker({
      format: 'L' 
    });
  });   
  
</script>
<script>
  $(function () {
    // Summernote
    $('#summernote').summernote({
        placeholder: 'Enter package description here...',
        minHeight: 200,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link']],
          ['view', ['fullscreen']]
        ]
      });
  });
</script>
<script>
  $(function () {
    // Summernote
    $('#summernote2').summernote({
        placeholder: 'Enter description here...',
        minHeight: 200,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link']],
          ['view', ['fullscreen']]
        ]
      });
  });
</script>
<script>
  $(function () {
    // Summernote
    $('#summernote3').summernote({
        placeholder: 'Enter blog content here...',
        minHeight: 200,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link']],
          ['view', ['fullscreen']]
        ]
      });
  });
</script>

<script>
$(document).ready(function(){
    // Function to handle delete button click
    $(".deleteBtn").click(function(){
        // Show confirmation dialog
        var confirmation = confirm("Are you sure you want to delete?");
        
        // If user confirms deletion
        if (confirmation) {
            // Perform deletion process here
            // For now, let's just show a message
        } else {
            // If user cancels deletion, do nothing
            event.preventDefault();
            return;
        }
    });
});
</script>

<?php 
if(isset($_SESSION['success'])){
?>
<script>
    // Display an informational Toastr notification
    toastr.success("<?php echo $_SESSION['success'];?>", "Success");
</script>
<?php 
unset($_SESSION['success']);} 
?>
<?php 
if(isset($_SESSION['error'])){
?>
<script>
    // Display an informational Toastr notification
    toastr.danger("<?php echo $_SESSION['error'];?>", "Error");
</script>
<?php 
unset($_SESSION['error']);} 
?>

