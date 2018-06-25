<link rel="stylesheet" href="<?php echo URL.VIEWS; ?>Student/css/revisar.css">
<section>

<?php
    if (isset($msg_alert)) {
      echo $msg_alert;
    }
    ?>
<?php

print_r($_POST);
?>

</section>
<script src="<?php echo URL.VIEWS; ?>Student/js/revisar.js"></script>