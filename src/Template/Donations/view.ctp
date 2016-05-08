<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Donation'), ['action' => 'edit', $donation->transaction_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Donation'), ['action' => 'delete', $donation->transaction_id], ['confirm' => __('Are you sure you want to delete # {0}?', $donation->transaction_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Donations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Donation'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="donations view large-9 medium-8 columns content">
    <h3><?= h($donation->transaction_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Transaction Id') ?></th>
            <td><?= $this->Number->format($donation->transaction_id) ?></td>
        </tr>
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $this->Number->format($donation->user) ?></td>
        </tr>
        <tr>
            <th><?= __('Campaign') ?></th>
            <td><?= $this->Number->format($donation->campaign) ?></td>
        </tr>
        <tr>
            <th><?= __('Amount') ?></th>
            <td><?= $this->Number->format($donation->amount) ?></td>
        </tr>
        <tr>
            <th><?= __('Time') ?></th>
            <td><?= h($donation->time) ?></td>
        </tr>
    </table>
</div>
