
    
</nav>
<div class="users form large-9 medium-8 columns content">
    
    <fieldset>
        <legend><?= __('My Account') ?></legend>
        <?php
			
			echo nl2br("Email Address:" . $user->email . "\n"); 
			echo nl2br("First Name: ".$user->firstname . "\n");
			echo nl2br("Last Name: " . $user->lastname . "\n");
			
            /*<!--echo $this->Form->input('email');
            echo $this->Form->input('password');
            echo $this->Form->input('firstname');
            echo $this->Form->input('lastname');-->*/
        ?>
    </fieldset>
    <!--<?= $this->Form->button(__('Submit')) ?>-->
    <?= $this->Form->end() ?>
</div>