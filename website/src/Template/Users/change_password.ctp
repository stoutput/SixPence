<nav class="large-3 medium-4 columns" id="actions-sidebar">
</nav>
<div class='container text-center'>
    <?= $this->Form->create($user, [
            'horizontal' => true,
            'columns' => [ // Total is 12, default is 2 / 10 / 0
                'label' => 3,
                'input' => 9,
                'error' => 0
            ],
            'style' => 'display:inline-block'
          ]); ?>
    <fieldset>
        <legend><?= __('Edit Account') ?></legend>
        <?php
          echo $this->Form->input('current_password', ['type' => 'password']);
          echo $this->Form->input('new_password', ['type' => 'password']);
          echo $this->Form->input('new_password2', ['type' => 'password']);
          echo $this->Form->horizontal = false;
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
