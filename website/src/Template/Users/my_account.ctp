<!-- Ben Stout 6-7-2016 !-->
</nav>
<div class='container text-center'>

    <fieldset>
        <legend><?= __('My Account') ?></legend>

        <div align=left>
          <h4>Email Address</h4>
          <p><?=$user->email?></p>
          <h4>First Name</h4>
          <p><?=$user->firstname?></p>
          <h4>Last Name</h4>
          <p><?=$user->lastname?></p>
          <br>
          <!--echo nl2br("Subscribed Campaign: ", $user->sub_id . "\n");-->
          <div class="btn-group">
						<?=$this->Html->link('Edit Account', ['action' => 'editAccount'], ['class' => 'btn btn-primary']) ?>
						<?=$this->Html->link(__d('burzum/user_tools', 'Change Password'), ['action' => 'change_password'], ['class' => 'btn btn-info']) ?>
          </div>
        </div>

    </fieldset>
</div>
