<!-- Nate Kaldor is the author of this page -->
<!-- Ben Stout made changes to use bootstrap and make things pretty -->
<div class='container text-center'>
  <h1>Register</h1>
  <?php
    echo $this->Form->create($user,
      [
        'horizontal' => true,
        'columns' => [ // Total is 12, default is 2 / 10 / 0
            'label' => 3,
            'input' => 9,
            'error' => 0
        ],
        'style' => 'display:inline-block'
      ]);
    echo $this->Form->input('email', ['type' => 'email']);
    echo $this->Form->input('firstname', ['type' => 'text']);
    echo $this->Form->input('lastname', ['type' => 'text']);
		echo $this->Form->input('password', ['type' => 'password']);
		echo $this->Form->input('confirm_password', ['type' => 'password']);
    echo $this->Form->horizontal = false;
    echo $this->Form->submit(__('Submit'));
    echo $this->Form->end()
    ?>
</div>
