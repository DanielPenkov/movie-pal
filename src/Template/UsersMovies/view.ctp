<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Users Movie'), ['action' => 'edit', $usersMovie->user_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Users Movie'), ['action' => 'delete', $usersMovie->user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $usersMovie->user_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users Movies'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Users Movie'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Movies'), ['controller' => 'Movies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Movie'), ['controller' => 'Movies', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="usersMovies view large-10 medium-9 columns">
    <h2><?= h($usersMovie->user_id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('User') ?></h6>
            <p><?= $usersMovie->has('user') ? $this->Html->link($usersMovie->user->id, ['controller' => 'Users', 'action' => 'view', $usersMovie->user->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Movie') ?></h6>
            <p><?= $usersMovie->has('movie') ? $this->Html->link($usersMovie->movie->title, ['controller' => 'Movies', 'action' => 'view', $usersMovie->movie->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Status') ?></h6>
            <p><?= $this->Number->format($usersMovie->status) ?></p>
        </div>
    </div>
</div>
