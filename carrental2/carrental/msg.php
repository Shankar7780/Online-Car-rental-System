<?php
if (isset($_SESSION["error"])) {
    ?>
    <script>
        new Notify({
            title: 'Error',
            text: '<?= $_SESSION["error"] ?>',
            autoclose: true,
            autotimeout: 3000,
            status:'error',
            effect: 'slide',
            speed: 300 // animation speed
        });        
    </script>
    <?php
    unset($_SESSION["error"]);
}
if (isset($_SESSION["msg"])) {
    ?>    
    <script>
        new Notify({
            title: 'Success',
            text: '<?= $_SESSION["msg"] ?>',
            autoclose: true,
            autotimeout: 3000,
            status:'success',
            effect: 'slide',
            speed: 300 // animation speed
        });        
    </script>
    <?php
    unset($_SESSION["msg"]);
}
?>
