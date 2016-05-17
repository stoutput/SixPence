<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Donation'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="donations index large-9 medium-8 columns content">
    <h3><?= __('Donations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('transaction_id') ?></th>
                <th><?= $this->Paginator->sort('user') ?></th>
                <th><?= $this->Paginator->sort('campaign') ?></th>
                <th><?= $this->Paginator->sort('amount') ?></th>
                <th><?= $this->Paginator->sort('time') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($donations as $donation): ?>
            <tr>
                <td><?= $this->Number->format($donation->transaction_id) ?></td>
                <td><?= $this->Number->format($donation->user) ?></td>
                <td><?= $this->Number->format($donation->campaign) ?></td>
                <td><?= $this->Number->format($donation->amount) ?></td>
                <td><?= h($donation->time) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $donation->transaction_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $donation->transaction_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $donation->transaction_id], ['confirm' => __('Are you sure you want to delete # {0}?', $donation->transaction_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
