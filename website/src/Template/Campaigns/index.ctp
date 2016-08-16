
<div class='container'>
  <?php if($urole === 'admin') : ?>
        <?= $this->Html->link(__('Manage Campaigns'), ['controller' => 'admin', 'action' => 'campaigns'], ['class' => 'btn btn-primary pull-left']) ?>
  <?php endif; ?>
  <?php if($loggedIn) : ?>
        <?= $this->Html->link(__('Create Campaign'), ['action' => 'add'], ['class' => 'btn btn-primary pull-right']) ?>
        <br>
  <?php endif; ?>
  <div class="container text-center">
      <legend><h3><?= __('Campaigns') ?></h3></legend>
  		<!--
              <tr>
                  <th><?= $this->Paginator->sort('id') ?></th>
                  <th><?= $this->Paginator->sort('founder_id') ?></th>
                  <th><?= $this->Paginator->sort('title') ?></th>
                  <th><?= $this->Paginator->sort('image') ?></th>
                  <th><?= $this->Paginator->sort('body') ?></th>
                  <th><?= $this->Paginator->sort('approved') ?></th>
                  <th><?= $this->Paginator->sort('creation') ?></th>
                  <th><?= $this->Paginator->sort('expiration') ?></th>
  				<th><?= $this->Paginator->sort('firstname') ?></th>
                  <th><?= $this->Paginator->sort('lastname') ?></th>
                  <th class="actions"><?= __('Actions') ?></th>
              </tr>
  			-->

  			<!-- Julia Foote testing campaign layout -->

  			<!-- Nate Kaldor wrote this 6-5-16
  				 I added a counter to have it only output three campaigns per row
  				 Added spacing per row with the in-line style
  				 AFAIK the <tr> and <td> padding and margin code does nothing-->
  			<!--<?php $count = 0 ?>
  			<style>td { padding-top: 30px;}</style>
  			<tr width='100%' padding-top="50px">
              <?php foreach ($campaigns as $campaign): ?>
  			<?php if ($count != 0 && $count % 3 == 0){ echo '</tr>' . '<tr width="100%" padding-top="40px" margin-top="40px">';} ?>
  				<td width="33%" padding-top="40px" padding-bottom='20px'>
  					<img id="result_img" src="<?php echo ($campaign->image); ?>" width="250px" height="200px"/>
  					<br />
  					<?= $this->Html->link(__($campaign->title), ['action' => 'view', $campaign->id]) ?>
  					<br />
  				</td>

  				<?php $count++; ?>


  			<?= $this->Number->format($campaign->id) ?>

  			<?php endforeach; ?>
  			</tr>  Just in case
          </tbody>
      </table> -->

      <!-- Ben Stout Wuz Herr 6-7-2016-->
      <?php foreach ($campaigns as $campaign): ?>
          <a href=<?=$this->Url->build(["controller" => "Campaigns", "action" => "view", $campaign->id]);?>>
            <div class="col-md-4">
              <div class = "panel panel-default panel-campaign">
                <div class = "panel-body">
                  <img class="campaign-image-list" src=<?= $campaign->image ?> width="250px" height="200px"/>
                  <div class="progress">
                      <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow=<?= $campaign->current_amount ?> aria-valuemin="0" aria-valuemax=<?= $campaign->goal_amount ?> style="width: <?= $campaign->goal_amount != 0 ? $campaign->current_amount/$campaign->goal_amount*100 : 0 ?>%">$<?= $campaign->current_amount ?> Raised</div>
                  </div>
                </div>
                <div class = "panel-footer"><?=$campaign->title?></div>
              </div>
            </div>
          </a>
      <?php endforeach; ?>
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
