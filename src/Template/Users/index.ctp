<h1>Users Index</h1>
<?php echo json_encode($users); ?>
<?php echo session_id(); ?>
<br><br><br><br>
Cookie:
<?php echo json_encode($_COOKIE); ?>
<br><br><br><br>
Session:
<?php echo json_encode($this->request->session()->read('Auth.User')); ?>
<?php echo $this->request->session()->id(); ?><br><br><br><br>
Session Name: <?php echo session_id(); ?>
<script>
    console.log(document.cookie);
</script>
