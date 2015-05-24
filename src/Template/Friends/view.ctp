<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Friend'), ['action' => 'edit', $friend->user_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Friend'), ['action' => 'delete', $friend->user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $friend->user_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Friends'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Friend'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="friends view large-10 medium-9 columns">
    <h2><?= h($friend->user_id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('User') ?></h6>
            <p><?= $friend->has('user') ? $this->Html->link($friend->user->id, ['controller' => 'Users', 'action' => 'view', $friend->user->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Friend Id') ?></h6>
            <p><?= $this->Number->format($friend->friend_id) ?></p>
        </div>
    </div>
</div>
