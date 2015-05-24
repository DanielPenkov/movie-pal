<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Countries Movie'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Movies'), ['controller' => 'Movies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Movie'), ['controller' => 'Movies', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Countries'), ['controller' => 'Countries', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Country'), ['controller' => 'Countries', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="countriesMovies index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('movie_id') ?></th>
            <th><?= $this->Paginator->sort('country_id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($countriesMovies as $countriesMovie): ?>
        <tr>
            <td>
                <?= $countriesMovie->has('movie') ? $this->Html->link($countriesMovie->movie->title, ['controller' => 'Movies', 'action' => 'view', $countriesMovie->movie->id]) : '' ?>
            </td>
            <td>
                <?= $countriesMovie->has('country') ? $this->Html->link($countriesMovie->country->id, ['controller' => 'Countries', 'action' => 'view', $countriesMovie->country->id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $countriesMovie->movie_id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $countriesMovie->movie_id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $countriesMovie->movie_id], ['confirm' => __('Are you sure you want to delete # {0}?', $countriesMovie->movie_id)]) ?>
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
