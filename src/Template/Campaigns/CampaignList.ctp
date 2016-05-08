<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $campaign->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $campaign->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Campaigns'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>

<html>
<head>
			<h1>Featured Campaigns</h1>
			
<ul>
<?php
	echo '<li>Image</li>
          <li><a target="_blank" href="http://...">Title</a></li>
          <li>Location</li>';
?>
                
</ul>
</head>


<div>

                <h2 class="">Campaign Names</h2>
                <p>
                    <p>Campaign 1: <?=CampaignName ?></p>
					<p>Campaign 2: <?=CampaignName ?></p>
					<p>Campaign 3: <?=CampaignName ?></p>
                </p>
</div>

</body>
</html>
