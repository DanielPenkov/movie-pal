<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Notification Type'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="notificationType index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('description') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($notificationType as $notificationType): ?>
        <tr>
            <td><?= $this->Number->format($notificationType->id) ?></td>
            <td><?= h($notificationType->description) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $notificationType->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $notificationType->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $notificationType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $notificationType->id)]) ?>
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
