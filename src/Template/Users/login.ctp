 <!-- NATE KALDOR AUTHOR OF THIS PAGE -->
 
 <h1>&nbsp Login</h1>
<!--
<?= $this->Form->input('email'); ?>
<?= $this->Form->input('password'); ?>
<?= $this->Form->button('Login'); ?>
<?= $this->Form->end(); ?>;-->

<?= $this->Form->create(); ?>
    <fieldset>
     <!-- <legend><?= __('Login') ?></legend> -->
        <?php
            echo $this->Form->input('email');
            echo $this->Form->input('password');
        ?>
    </fieldset>
	&nbsp &nbsp <?=  $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>