<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Subscription'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="subscriptions index large-9 medium-8 columns content">
    <h3><?= __('Subscriptions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('user') ?></th>
                <th><?= $this->Paginator->sort('campaign') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($subscriptions as $subscription): ?>
            <tr>
                <td><?= $this->Number->format($subscription->user) ?></td>
                <td><?= $this->Number->format($subscription->campaign) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $subscription->user]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $subscription->user]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $subscription->user], ['confirm' => __('Are you sure you want to delete # {0}?', $subscription->user)]) ?>
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
