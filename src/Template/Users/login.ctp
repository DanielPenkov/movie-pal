<h1>Login</h1>
<?= $this->Form->create() ?>
<?= $this->Form->input('username') ?>
<?= $this->Form->input('password') ?>

<?= $this->Form->submit('Login',   array('div'=>array('class'=>' col-md-1 col-sm-4 '), 'class'=>'search-button btn btn-success')) ?>
<?= $this->Form->end() ?>