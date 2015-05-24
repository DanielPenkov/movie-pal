<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Notification'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Recommendations'), ['controller' => 'Recommendations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Recommendation'), ['controller' => 'Recommendations', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="notifications index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('sender_id') ?></th>
            <th><?= $this->Paginator->sort('recipient_id') ?></th>
            <th><?= $this->Paginator->sort('date_sent') ?></th>
            <th><?= $this->Paginator->sort('status') ?></th>
            <th><?= $this->Paginator->sort('type') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($notifications as $notification): ?>
        <tr>
            <td><?= $this->Number->format($notification->id) ?></td>
            <td><?= $this->Number->format($notification->sender_id) ?></td>
            <td>
                <?= $notification->has('user') ? $this->Html->link($notification->user->id, ['controller' => 'Users', 'action' => 'view', $notification->user->id]) : '' ?>
            </td>
            <td><?= h($notification->date_sent) ?></td>
            <td><?= $this->Number->format($notification->status) ?></td>
            <td><?= $this->Number->format($notification->type) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $notification->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $notification->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $notification->id], ['confirm' => __('Are you sure you want to delete # {0}?', $notification->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
