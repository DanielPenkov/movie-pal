<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Movies'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Recommendations'), ['controller' => 'Recommendations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Recommendation'), ['controller' => 'Recommendations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Actors'), ['controller' => 'Actors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Actor'), ['controller' => 'Actors', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Countries'), ['controller' => 'Countries', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Country'), ['controller' => 'Countries', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Directors'), ['controller' => 'Directors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Director'), ['controller' => 'Directors', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Genres'), ['controller' => 'Genres', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Genre'), ['controller' => 'Genres', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Writers'), ['controller' => 'Writers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Writer'), ['controller' => 'Writers', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="movies form large-10 medium-9 columns">
    <?= $this->Form->create($movie); ?>
    <fieldset>
        <legend><?= __('Add Movie') ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('year');
            echo $this->Form->input('description');
            echo $this->Form->input('rating');
            echo $this->Form->input('poster');
            echo $this->Form->input('type');
            echo $this->Form->input('actors._ids', ['options' => $actors]);
            echo $this->Form->input('countries._ids', ['options' => $countries]);
            echo $this->Form->input('directors._ids', ['options' => $directors]);
            echo $this->Form->input('genres._ids', ['options' => $genres]);
            echo $this->Form->input('users._ids', ['options' => $users]);
            echo $this->Form->input('writers._ids', ['options' => $writers]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
