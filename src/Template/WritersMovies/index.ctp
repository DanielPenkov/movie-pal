<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Writers Movie'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Movies'), ['controller' => 'Movies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Movie'), ['controller' => 'Movies', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Writers'), ['controller' => 'Writers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Writer'), ['controller' => 'Writers', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="writersMovies index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('movie_id') ?></th>
            <th><?= $this->Paginator->sort('writer_id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($writersMovies as $writersMovie): ?>
        <tr>
            <td>
                <?= $writersMovie->has('movie') ? $this->Html->link($writersMovie->movie->title, ['controller' => 'Movies', 'action' => 'view', $writersMovie->movie->id]) : '' ?>
            </td>
            <td>
                <?= $writersMovie->has('writer') ? $this->Html->link($writersMovie->writer->name, ['controller' => 'Writers', 'action' => 'view', $writersMovie->writer->id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $writersMovie->movie_id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $writersMovie->movie_id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $writersMovie->movie_id], ['confirm' => __('Are you sure you want to delete # {0}?', $writersMovie->movie_id)]) ?>
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
