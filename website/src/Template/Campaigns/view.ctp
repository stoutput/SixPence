<!-- NATE KALDOR MADE CHANGES HERE -->
<div class='container'>
  <?php if($uid == $campaign->founder_id) : ?>
    <div class="btn-group btn-group-justified">
      <?= $this->Html->link(__('Edit Campaign'), ['action' => 'edit', $campaign->id], ['class' => 'btn btn-primary']) ?>
      <?= $this->Form->postLink(__('Delete Campaign'), ['action' => 'delete', $campaign->id], ['confirm' => __('Are you sure you want to delete # {0}?', $campaign->title), 'class' => 'btn btn-info']) ?>
    </div>
    <br>
  <?php endif; ?>

  <div class="campaigns view large-9 medium-8 columns content">
    <center>
      <h2 class="campaign-text"><?= h($campaign->title) ?></h2>
      <div class="campaign-image">
        <img id="result_img" src="<?php echo $campaign->image; ?>" width="100%"/>
      </div>
      <br>
      <div class="btn-group btn-group-justified">
        <a href="#" class="btn btn-primary">Donate</a>
        <a href="#" class="btn btn-info">Subscribe</a>
      </div>
      <br>
      <div class="progress progress-striped">
        <div class="progress-bar" role="progressbar" aria-valuenow=<?= $campaign->current_amount ?> aria-valuemin="0" aria-valuemax=<?= $campaign->goal_amount ?> style="width: <?= $campaign->goal_amount != 0 ? $campaign->current_amount/$campaign->goal_amount*100 : 0 ?>%">$<?= $campaign->current_amount ?> Raised</div>
      </div>
      <h4 class="campaign-text">Goal Progress</h4>
  	  <br>
      <p class="campaign-text"><?= h($campaign->body) ?></p>
</div>
