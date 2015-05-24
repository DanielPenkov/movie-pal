<h1>Login</h1>
<?= $this->Form->create() ?>
<?= $this->Form->input('username') ?>
<?= $this->Form->input('password') ?>
<?= $this->Form->input('rememberMe', array('type' => 'checkbox', 'label' => 'Remember me')); ?>

<?= $this->Form->button('Login') ?>
<?= $this->Form->end() ?>