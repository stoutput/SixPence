 <!-- NATE KALDOR AUTHOR OF THIS PAGE -->
<div class='container text-center'>
   <h1>Login</h1>
  <?php
    echo $this->Form->create(NULL, [
      'horizontal' => true,
      'columns' => [ // Total is 12, default is 2 / 10 / 0
          'label' => 3,
          'input' => 9,
          'error' => 0
      ],
      'style' => 'display:inline-block'
    ]);
    echo $this->Form->input('email', ['type' => 'email']);
    echo $this->Form->input('password', ['type' => 'password']);
    echo $this->Form->horizontal = false;
    echo $this->Form->input('remember_me', ['type' => 'checkbox']) ;
    echo $this->Form->submit(__('Log In'));
    echo $this->Form->end()
  ?>
</div>
