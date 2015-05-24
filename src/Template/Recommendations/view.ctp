<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Recommendation'), ['action' => 'edit', $recommendation->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Recommendation'), ['action' => 'delete', $recommendation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recommendation->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Recommendations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Recommendation'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Movies'), ['controller' => 'Movies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Movie'), ['controller' => 'Movies', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Notifications'), ['controller' => 'Notifications', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Notification'), ['controller' => 'Notifications', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="recommendations view large-10 medium-9 columns">
    <h2><?= h($recommendation->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('User') ?></h6>
            <p><?= $recommendation->has('user') ? $this->Html->link($recommendation->user->id, ['controller' => 'Users', 'action' => 'view', $recommendation->user->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Movie') ?></h6>
            <p><?= $recommendation->has('movie') ? $this->Html->link($recommendation->movie->title, ['controller' => 'Movies', 'action' => 'view', $recommendation->movie->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Notification') ?></h6>
            <p><?= $recommendation->has('notification') ? $this->Html->link($recommendation->notification->id, ['controller' => 'Notifications', 'action' => 'view', $recommendation->notification->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($recommendation->id) ?></p>
            <h6 class="subheader"><?= __('Sender Id') ?></h6>
            <p><?= $this->Number->format($recommendation->sender_id) ?></p>
        </div>
    </div>
</div>
