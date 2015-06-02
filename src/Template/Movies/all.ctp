<div style="margin-bottom: 50px">
  <?php
    echo $this->Form->create('Movies', [ 'url' => ['controller' => 'Movies', 'action' => 'index'], 'class'=>'search-form']); 
    echo $this->Form->input('Title', array('placeholder' => 'Title','label' => '','div'=>array('class'=>'col-md-6 col-sm-4'), 'class' => 'search-input-title '));
    echo $this->Form->input('dropdownitem' ,array('div'=>array('class'=>'col-md-2 col-sm-4'),'label' => '', 'empty' => 'All', 'class'=>'search-input-genre '));
    echo $this->Form->submit('Search', array('div'=>array('class'=>' col-md-1 col-sm-4 '), 'class'=>'search-button btn btn-success'));
    echo $this->Form->end();
  ?>

</div>

<div class="row">

    <?php foreach ($movies as $movie): ?>

 
      <div class="col-md-4 col-sm-6 col-xs-12">

      <div class="thumbnail" id="movie-list">

      <div class="picture-container">
      <?php echo $this->Html->image($movie->poster, array( "alt" => "Poster", 'url' => array('controller' => 'movies', 'action' => 'index')));?>
    </div>
        
      <div class="movie-button">

      <div class="caption">
        <h3><?php echo $movie->title ?></h3>
         <p>
            <span style="font-weight: bolder">Year</span>: <?php echo $movie->year; ?> |
            <span style="font-weight: bolder">IMDB Rating</span>: <?php echo $movie->rating; ?>/<span style="color:gray">10</span>  
         </p>
         <p>
          <?php foreach ($movie->genres as $genre): ?>
            <span style="color:gray;font-weight: bolder"><?php echo $genre->genre?> </span>
          <?php endforeach; ?>
          
         </p>

        <p> <?php echo substr($movie->description,0,200) ; ?></p>

        <p> 

      <a onclick="addToWatchedList(<?php echo $movie->id ?>)" "href="javascript:void(0);" class="btn btn-default" >Watched</a>

          <a onclick="addToWatchingList(<?php echo $movie->id; ?>)" "href="javascript:void(0);" class="btn btn-default" >To Watch</a>


          </p>
      </div>
    </div>


</div>
</div>

        
        
    <?php endforeach; ?>





    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>






    </div>


   


<script>
$(document).ready(function(){  
$("#title").autocomplete("/movie-pal/movies/index.json", {
minChars: 3
});
});
</script>