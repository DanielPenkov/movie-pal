<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Genres Movie'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Movies'), ['controller' => 'Movies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Movie'), ['controller' => 'Movies', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Genres'), ['controller' => 'Genres', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Genre'), ['controller' => 'Genres', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="genresMovies index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('movie_id') ?></th>
            <th><?= $this->Paginator->sort('genre_id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($genresMovies as $genresMovie): ?>
        <tr>
            <td>
                <?= $genresMovie->has('movie') ? $this->Html->link($genresMovie->movie->title, ['controller' => 'Movies', 'action' => 'view', $genresMovie->movie->id]) : '' ?>
            </td>
            <td>
                <?= $genresMovie->has('genre') ? $this->Html->link($genresMovie->genre->id, ['controller' => 'Genres', 'action' => 'view', $genresMovie->genre->id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $genresMovie->movie_id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $genresMovie->movie_id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $genresMovie->movie_id], ['confirm' => __('Are you sure you want to delete # {0}?', $genresMovie->movie_id)]) ?>
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
