<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Recommendations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Movies'), ['controller' => 'Movies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Movie'), ['controller' => 'Movies', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Notifications'), ['controller' => 'Notifications', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Notification'), ['controller' => 'Notifications', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="recommendations form large-10 medium-9 columns">
    <?= $this->Form->create($recommendation); ?>
    <fieldset>
        <legend><?= __('Add Recommendation') ?></legend>
        <?php
            echo $this->Form->input('sender_id');
            echo $this->Form->input('reciever_id', ['options' => $users]);
            echo $this->Form->input('movie_id', ['options' => $movies]);
            echo $this->Form->input('notification_id', ['options' => $notifications]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
