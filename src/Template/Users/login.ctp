<!-- File: src/Template/Users/login.ctp -->

<div class="users form">
    <?= $this->Flash->render('auth') ?>
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Please enter your username and password') ?></legend>
        <?= $this->Form->input('username') ?>
        <?= $this->Form->input('password') ?>
    </fieldset>
    <?= $this->Form->button(__('Login')); ?>
    <?= $this->Form->end() ?>
</div>
<br><br><br>
User:<br><br>
<?php echo json_encode($user); ?>
<br><br>
Session Key:
<?php echo $session_key; ?>
<br><br>
Session ID:
<?php echo $this->request->session()->id(); ?>
<br><br>
<?php echo json_encode($this->request->session()->read('Auth.User')); ?>
