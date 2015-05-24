<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Writers Movie'), ['action' => 'edit', $writersMovie->movie_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Writers Movie'), ['action' => 'delete', $writersMovie->movie_id], ['confirm' => __('Are you sure you want to delete # {0}?', $writersMovie->movie_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Writers Movies'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Writers Movie'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Movies'), ['controller' => 'Movies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Movie'), ['controller' => 'Movies', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Writers'), ['controller' => 'Writers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Writer'), ['controller' => 'Writers', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="writersMovies view large-10 medium-9 columns">
    <h2><?= h($writersMovie->movie_id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Movie') ?></h6>
            <p><?= $writersMovie->has('movie') ? $this->Html->link($writersMovie->movie->title, ['controller' => 'Movies', 'action' => 'view', $writersMovie->movie->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Writer') ?></h6>
            <p><?= $writersMovie->has('writer') ? $this->Html->link($writersMovie->writer->name, ['controller' => 'Writers', 'action' => 'view', $writersMovie->writer->id]) : '' ?></p>
        </div>
    </div>
</div>
