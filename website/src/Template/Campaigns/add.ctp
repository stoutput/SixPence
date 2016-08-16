<!-- Nate Kaldor bug fixed this 5-15-16
		Bug fixing took 3 hours, but this shit works not. PTL !-->

<div class="container text-center">
    <?= $this->Form->create($campaign) ?>
    <fieldset>
        <legend><?= __('Create Campaign') ?></legend>
        <?php
            //echo $this->Form->input('founder_id', ['options' => $users]);
			      echo $this->Form->hidden('founder_id');
            echo $this->Form->input('title', array('label' => 'Campaign Title'));
			      //echo $this->Form->input("image",array("type"=>"file","size"=>"45", 'error' => false,'placeholder'=>'Upload Image'));
            echo $this->Form->input('image', array('label' => 'Image URL'));
            echo $this->Form->input('body', array('rows' => '14', 'label' => 'What is the cause of this campaign?'));
            //echo $this->Form->input('approved');
            //echo $this->Form->input('creation');
            echo $this->Form->input('expiration', array('label' => 'Expiration Date'));
			      echo $this->Form->input('goal_amount', array('type' => 'currency'));
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit for Approval')) ?>
    <?= $this->Form->end() ?>
</div>
