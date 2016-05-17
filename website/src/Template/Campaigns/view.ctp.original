<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Campaign'), ['action' => 'edit', $campaign->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Campaign'), ['action' => 'delete', $campaign->id], ['confirm' => __('Are you sure you want to delete # {0}?', $campaign->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Campaigns'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Campaign'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="campaigns view large-9 medium-8 columns content">
    <h3><?= h($campaign->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $campaign->has('user') ? $this->Html->link($campaign->user->id, ['controller' => 'Users', 'action' => 'view', $campaign->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($campaign->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Image') ?></th>
            <td><?= h($campaign->image) ?></td>
        </tr>
        <tr>
            <th><?= __('Body') ?></th>
            <td><?= h($campaign->body) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($campaign->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Creation') ?></th>
            <td><?= h($campaign->creation) ?></td>
        </tr>
        <tr>
            <th><?= __('Expiration') ?></th>
            <td><?= h($campaign->expiration) ?></td>
        </tr>
        <tr>
            <th><?= __('Approved') ?></th>
            <td><?= $campaign->approved ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
