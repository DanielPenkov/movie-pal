<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $friend->user_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $friend->user_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Friends'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="friends form large-10 medium-9 columns">
    <?= $this->Form->create($friend); ?>
    <fieldset>
        <legend><?= __('Edit Friend') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
