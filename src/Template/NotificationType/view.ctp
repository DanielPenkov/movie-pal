<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Notification Type'), ['action' => 'edit', $notificationType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Notification Type'), ['action' => 'delete', $notificationType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $notificationType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Notification Type'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Notification Type'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="notificationType view large-10 medium-9 columns">
    <h2><?= h($notificationType->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Description') ?></h6>
            <p><?= h($notificationType->description) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($notificationType->id) ?></p>
        </div>
    </div>
</div>
