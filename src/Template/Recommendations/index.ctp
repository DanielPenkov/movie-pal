<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Recommendation'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Movies'), ['controller' => 'Movies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Movie'), ['controller' => 'Movies', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Notifications'), ['controller' => 'Notifications', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Notification'), ['controller' => 'Notifications', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="recommendations index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('sender_id') ?></th>
            <th><?= $this->Paginator->sort('reciever_id') ?></th>
            <th><?= $this->Paginator->sort('movie_id') ?></th>
            <th><?= $this->Paginator->sort('notification_id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($recommendations as $recommendation): ?>
        <tr>
            <td><?= $this->Number->format($recommendation->id) ?></td>
            <td><?= $this->Number->format($recommendation->sender_id) ?></td>
            <td>
                <?= $recommendation->has('user') ? $this->Html->link($recommendation->user->id, ['controller' => 'Users', 'action' => 'view', $recommendation->user->id]) : '' ?>
            </td>
            <td>
                <?= $recommendation->has('movie') ? $this->Html->link($recommendation->movie->title, ['controller' => 'Movies', 'action' => 'view', $recommendation->movie->id]) : '' ?>
            </td>
            <td>
                <?= $recommendation->has('notification') ? $this->Html->link($recommendation->notification->id, ['controller' => 'Notifications', 'action' => 'view', $recommendation->notification->id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $recommendation->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $recommendation->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $recommendation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recommendation->id)]) ?>
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
