<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Status'), ['action' => 'edit', $status->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Status'), ['action' => 'delete', $status->id], ['confirm' => __('Are you sure you want to delete # {0}?', $status->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Statuses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Status'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="statuses view large-10 medium-9 columns">
    <h2><?= h($status->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Description') ?></h6>
            <p><?= h($status->description) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($status->id) ?></p>
        </div>
    </div>
</div>
