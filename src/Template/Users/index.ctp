<h1>Users Index</h1>
<?php echo json_encode($users); ?>
<?php echo $user_id; ?>
<br><br><br><br>
Cookie:
<?php echo json_encode($_COOKIE); ?>
<br><br><br><br>
Session:
<?php echo json_encode($this->request->session()); ?>
<?php echo $this->request->session()->id(); ?>
<script>
    console.log(document.cookie);
</script>
