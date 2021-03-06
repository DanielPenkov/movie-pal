<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Notifications'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Recommendations'), ['controller' => 'Recommendations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Recommendation'), ['controller' => 'Recommendations', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="notifications form large-10 medium-9 columns">
    <?= $this->Form->create($notification); ?>
    <fieldset>
        <legend><?= __('Add Notification') ?></legend>
        <?php
            echo $this->Form->input('sender_id');
            echo $this->Form->input('recipient_id', ['options' => $users]);
            echo $this->Form->input('date_sent');
            echo $this->Form->input('status');
            echo $this->Form->input('type');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
