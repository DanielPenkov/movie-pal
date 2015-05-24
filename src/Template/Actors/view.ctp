<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Actor'), ['action' => 'edit', $actor->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Actor'), ['action' => 'delete', $actor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $actor->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Actors'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Actor'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Movies'), ['controller' => 'Movies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Movie'), ['controller' => 'Movies', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="actors view large-10 medium-9 columns">
    <h2><?= h($actor->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($actor->name) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($actor->id) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Movies') ?></h4>
    <?php if (!empty($actor->movies)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Title') ?></th>
            <th><?= __('Year') ?></th>
            <th><?= __('Description') ?></th>
            <th><?= __('Rating') ?></th>
            <th><?= __('Poster') ?></th>
            <th><?= __('Type') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($actor->movies as $movies): ?>
        <tr>
            <td><?= h($movies->id) ?></td>
            <td><?= h($movies->title) ?></td>
            <td><?= h($movies->year) ?></td>
            <td><?= h($movies->description) ?></td>
            <td><?= h($movies->rating) ?></td>
            <td><?= h($movies->poster) ?></td>
            <td><?= h($movies->type) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Movies', 'action' => 'view', $movies->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Movies', 'action' => 'edit', $movies->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Movies', 'action' => 'delete', $movies->id], ['confirm' => __('Are you sure you want to delete # {0}?', $movies->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
