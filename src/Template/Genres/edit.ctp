<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $genre->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $genre->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Genres'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Movies'), ['controller' => 'Movies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Movie'), ['controller' => 'Movies', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="genres form large-10 medium-9 columns">
    <?= $this->Form->create($genre); ?>
    <fieldset>
        <legend><?= __('Edit Genre') ?></legend>
        <?php
            echo $this->Form->input('genre');
            echo $this->Form->input('movies._ids', ['options' => $movies]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
