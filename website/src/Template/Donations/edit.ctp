<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $donation->transaction_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $donation->transaction_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Donations'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="donations form large-9 medium-8 columns content">
    <?= $this->Form->create($donation) ?>
    <fieldset>
        <legend><?= __('Edit Donation') ?></legend>
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
