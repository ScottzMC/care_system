<!-- Start Main project js, jQuery, Bootstrap -->
<script src="<?php echo base_url('assets/bundles/lib.vendor.bundle.js'); ?>"></script>

<!-- Start Plugin Js -->
<script src="<?php echo base_url('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/bundles/dataTables.bundle.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/sweetalert/sweetalert.min.js'); ?>"></script>

<!-- Start project main js  and page js -->
<script src="<?php echo base_url('assets/js/core.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/page/dialogs.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/table/datatable.js'); ?>"></script>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script defer src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<!--<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>tinymce.init({selector:'textarea'});</script>-->

<script>
$(document).ready(function() {
      $('#summernote').summernote({
          tabsize: 2,
          height: 200
      });
  });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>