<nav class="large-3 medium-4 columns" id="actions-sidebar">
</nav>
<div class="container text-center">
    <?= $this->Form->create($user, [
      'horizontal' => true,
      'columns' => [ // Total is 12, default is 2 / 10 / 0
          'label' => 3,
          'input' => 12,
          'error' => 0,
      ],
      'style' => 'display:inline-block'
    ]
	); ?>
    <fieldset>
        <legend><?= __('Edit Account') ?></legend>
        <?php
            echo $this->Form->input('email');
			//echo $this->Form->input('current_password');
            //echo $this->Form->input('new_password');
            echo $this->Form->input('firstname');
            echo $this->Form->input('lastname');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
