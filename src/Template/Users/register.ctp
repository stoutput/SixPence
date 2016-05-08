<!-- Nate Kaldor is the author of this page -->

<h1>&nbsp Register</h1>
<!-- <?= $this->Form->create($user) ?>
<?= $this->Form->input('Email Address'); ?>
<?= $this->Form->input('First Name'); ?>
<?= $this->Form->input('Last Name'); ?>
<?= $this->Form->input('Password'); ?>
<?= $this->Form->button('Register'); ?>
<?= $this->Form->end(); ?>;-->


    <?= $this->Form->create($user) ?>
    <fieldset>
        <!-- <legend><?= __('Register') ?></legend> -->
		<?php
            echo $this->Form->input('email');
            echo $this->Form->input('firstname');
            echo $this->Form->input('lastname');
			echo $this->Form->input('password');
			echo $this->Form->label('confirm_password', 'Confirm Password');
			echo $this->Form->password('confirm_password');
			//echo $this->Form->label('User/confirmpassword', 'Confirm Password');
			//echo $this->Form->password('User/confirmpassword', array('size' => '30'));
        ?>
		<!--<?php echo $this->Form->label('User/confirmpassword', 'Confirm Password');?>
		<?php echo $this->Form->password('User/confirmpassword', array('size' => '30'));?>
		<?php echo $this->Form->error('User/checkpassword', 'Please Be Sure Passwords Match.');?>-->
    </fieldset>
    &nbsp &nbsp <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>