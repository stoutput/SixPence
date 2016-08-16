<!-- THIS IS A WORK IN PROGRESS NATE KALDOR -->

<div class='container'>
      <h3><?= __('Campaigns') ?></h3>
      <div class="table-responsive">
        <table class="table table-striped table-condensed">
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
                    <th><?= $this->Paginator->sort('goal_amount') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($campaigns as $campaign): ?>
                <tr>
                    <td><?= $this->Number->format($campaign->id) ?></td>
                    <td><?= h($campaign->founder_id) ?></td>
                    <td><?= h($campaign->title) ?></td>
                    <td><div style="max-width: 175px; overflow: hidden;"><a href=<?=h($campaign->image)?> style="word-wrap: break-word;"><?=h($campaign->image)?></a></div></td>
                    <td><div style="max-width: 300px; overflow: hidden;"><?= h($campaign->body) ?></div></td>
                    <td><?= h($campaign->approved) ?></td>
                    <td><?= h($campaign->creation) ?></td>
                    <td><?= h($campaign->expiration) ?></td>
                    <td><?= h($campaign->goal_amount) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $campaign->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $campaign->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $campaign->id], ['confirm' => __('Are you sure you want to delete # {0}?', $campaign->title)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
      </div>
      <div class="paginator text-center">
          <ul class="pagination">
              <?= $this->Paginator->prev('< ' . __('previous')) ?>
              <?= $this->Paginator->numbers() ?>
              <?= $this->Paginator->next(__('next') . ' >') ?>
          </ul>
          <p><?= $this->Paginator->counter() ?></p>
      </div>
  </div>
