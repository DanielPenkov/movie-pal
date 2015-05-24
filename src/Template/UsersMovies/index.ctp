<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Users Movie'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Movies'), ['controller' => 'Movies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Movie'), ['controller' => 'Movies', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="usersMovies index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('user_id') ?></th>
            <th><?= $this->Paginator->sort('movie_id') ?></th>
            <th><?= $this->Paginator->sort('status') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($usersMovies as $usersMovie): ?>
        <tr>
            <td>
                <?= $usersMovie->has('user') ? $this->Html->link($usersMovie->user->id, ['controller' => 'Users', 'action' => 'view', $usersMovie->user->id]) : '' ?>
            </td>
            <td>
                <?= $usersMovie->has('movie') ? $this->Html->link($usersMovie->movie->title, ['controller' => 'Movies', 'action' => 'view', $usersMovie->movie->id]) : '' ?>
            </td>
            <td><?= $this->Number->format($usersMovie->status) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $usersMovie->user_id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $usersMovie->user_id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $usersMovie->user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $usersMovie->user_id)]) ?>
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
