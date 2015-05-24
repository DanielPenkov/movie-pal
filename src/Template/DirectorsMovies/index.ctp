<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Directors Movie'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Movies'), ['controller' => 'Movies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Movie'), ['controller' => 'Movies', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Directors'), ['controller' => 'Directors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Director'), ['controller' => 'Directors', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="directorsMovies index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('movie_id') ?></th>
            <th><?= $this->Paginator->sort('director_id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($directorsMovies as $directorsMovie): ?>
        <tr>
            <td>
                <?= $directorsMovie->has('movie') ? $this->Html->link($directorsMovie->movie->title, ['controller' => 'Movies', 'action' => 'view', $directorsMovie->movie->id]) : '' ?>
            </td>
            <td>
                <?= $directorsMovie->has('director') ? $this->Html->link($directorsMovie->director->name, ['controller' => 'Directors', 'action' => 'view', $directorsMovie->director->id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $directorsMovie->movie_id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $directorsMovie->movie_id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $directorsMovie->movie_id], ['confirm' => __('Are you sure you want to delete # {0}?', $directorsMovie->movie_id)]) ?>
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
