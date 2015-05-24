<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Actors Movie'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Movies'), ['controller' => 'Movies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Movie'), ['controller' => 'Movies', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Actors'), ['controller' => 'Actors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Actor'), ['controller' => 'Actors', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="actorsMovies index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('movie_id') ?></th>
            <th><?= $this->Paginator->sort('actor_id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($actorsMovies as $actorsMovie): ?>
        <tr>
            <td>
                <?= $actorsMovie->has('movie') ? $this->Html->link($actorsMovie->movie->title, ['controller' => 'Movies', 'action' => 'view', $actorsMovie->movie->id]) : '' ?>
            </td>
            <td>
                <?= $actorsMovie->has('actor') ? $this->Html->link($actorsMovie->actor->name, ['controller' => 'Actors', 'action' => 'view', $actorsMovie->actor->id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $actorsMovie->movie_id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $actorsMovie->movie_id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $actorsMovie->movie_id], ['confirm' => __('Are you sure you want to delete # {0}?', $actorsMovie->movie_id)]) ?>
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
