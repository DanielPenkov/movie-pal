<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Notification'), ['action' => 'edit', $notification->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Notification'), ['action' => 'delete', $notification->id], ['confirm' => __('Are you sure you want to delete # {0}?', $notification->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Notifications'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Notification'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Recommendations'), ['controller' => 'Recommendations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Recommendation'), ['controller' => 'Recommendations', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="notifications view large-10 medium-9 columns">
    <h2><?= h($notification->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('User') ?></h6>
            <p><?= $notification->has('user') ? $this->Html->link($notification->user->id, ['controller' => 'Users', 'action' => 'view', $notification->user->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($notification->id) ?></p>
            <h6 class="subheader"><?= __('Sender Id') ?></h6>
            <p><?= $this->Number->format($notification->sender_id) ?></p>
            <h6 class="subheader"><?= __('Status') ?></h6>
            <p><?= $this->Number->format($notification->status) ?></p>
            <h6 class="subheader"><?= __('Type') ?></h6>
            <p><?= $this->Number->format($notification->type) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Date Sent') ?></h6>
            <p><?= h($notification->date_sent) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Recommendations') ?></h4>
    <?php if (!empty($notification->recommendations)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Sender Id') ?></th>
            <th><?= __('Reciever Id') ?></th>
            <th><?= __('Movie Id') ?></th>
            <th><?= __('Notification Id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($notification->recommendations as $recommendations): ?>
        <tr>
            <td><?= h($recommendations->id) ?></td>
            <td><?= h($recommendations->sender_id) ?></td>
            <td><?= h($recommendations->reciever_id) ?></td>
            <td><?= h($recommendations->movie_id) ?></td>
            <td><?= h($recommendations->notification_id) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Recommendations', 'action' => 'view', $recommendations->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Recommendations', 'action' => 'edit', $recommendations->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Recommendations', 'action' => 'delete', $recommendations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recommendations->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
