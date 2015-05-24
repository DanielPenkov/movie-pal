<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Genres Movie'), ['action' => 'edit', $genresMovie->movie_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Genres Movie'), ['action' => 'delete', $genresMovie->movie_id], ['confirm' => __('Are you sure you want to delete # {0}?', $genresMovie->movie_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Genres Movies'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Genres Movie'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Movies'), ['controller' => 'Movies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Movie'), ['controller' => 'Movies', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Genres'), ['controller' => 'Genres', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Genre'), ['controller' => 'Genres', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="genresMovies view large-10 medium-9 columns">
    <h2><?= h($genresMovie->movie_id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Movie') ?></h6>
            <p><?= $genresMovie->has('movie') ? $this->Html->link($genresMovie->movie->title, ['controller' => 'Movies', 'action' => 'view', $genresMovie->movie->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Genre') ?></h6>
            <p><?= $genresMovie->has('genre') ? $this->Html->link($genresMovie->genre->id, ['controller' => 'Genres', 'action' => 'view', $genresMovie->genre->id]) : '' ?></p>
        </div>
    </div>
</div>
