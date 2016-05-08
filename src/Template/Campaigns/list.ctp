<!-- THIS IS A WORK IN PROGRESS NATE KALDOR -->

<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Campaign'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav> -->
<div class="campaigns index large-9 medium-8 columns content">
    <h3><?= __('Campaigns') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('founder_id') ?></th>
                <th><?= $this->Paginator->sort('title') ?></th>
                <th><?= $this->Paginator->sort('image') ?></th>
                <th><?= $this->Paginator->sort('body') ?></th>
                <th><?= $this->Paginator->sort('approved') ?></th>
                <th><?= $this->Paginator->sort('creation') ?></th>
                <th><?= $this->Paginator->sort('expiration') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($campaigns as $campaign): ?>
            <tr>
                <td><?= $this->Number->format($campaign->id) ?></td>
                <td><?= $campaign->has('user') ? $this->Html->link($campaign->user->id, ['controller' => 'Users', 'action' => 'view', $campaign->user->id]) : '' ?></td>
                <td><?= h($campaign->title) ?></td>
                <td><?= h($campaign->image) ?></td>
                <td><?= h($campaign->body) ?></td>
                <td><?= h($campaign->approved) ?></td>
                <td><?= h($campaign->creation) ?></td>
                <td><?= h($campaign->expiration) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $campaign->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $campaign->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $campaign->id], ['confirm' => __('Are you sure you want to delete # {0}?', $campaign->title)]) ?>
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