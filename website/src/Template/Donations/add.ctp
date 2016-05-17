<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Donations'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="donations form large-9 medium-8 columns content">
    <?= $this->Form->create($donation) ?>
    <fieldset>
        <legend><?= __('Add Donation') ?></legend>
        <?php
            echo $this->Form->input('user');
            echo $this->Form->input('campaign');
            echo $this->Form->input('amount');
            echo $this->Form->input('time');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
