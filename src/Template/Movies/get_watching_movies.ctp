<h1>WATCHING LIST</h1>






  <?php foreach ($movies as $movie): ?>
    <div class="media col-md-4 movie-item-list">

    <div class="media-left media-top">
   
      <?php echo $this->Html->image($movie->poster, array( 'class'=> 'media-object list-img', "alt" => "Poster", 'url' => array('controller' => 'movies', 'action' => 'index')));?>

    </div>
  <div class="media-body">
    <h3 class="media-heading"><?php echo $movie->title ?></h3>
    <p>
            <span style="font-weight: bolder">Year</span>: <?php echo $movie->year; ?> 
              
         </p>
          <p>
            <span style="font-weight: bolder">IMDB Rating</span>: <?php echo $movie->rating; ?>/<span style="color:gray">10</span>

          </p>



         <p>
           <span style="font-weight: bolder">Genre</span>:
          <?php foreach ($movie->genres as $genre): ?>
              <span style="color:gray;font-weight: bolder"><?php echo $genre->genre?> </span>
          <?php endforeach; ?>
          
         </p>

        


  </div>
    <div class="small-buttons">

       <a onclick="addToWatchedList(<?php echo $movie['movies']['id']; ?>)" href="javascript:void(0);" class="btn btn-default" >Watched</a>

          <?php echo $this->Html->link( 'Delete' , array('controller' => 'movies','action' => 'deleteUserMovie',$movie['movies']['id'] ), array('escape' => false,'confirm' => 'Add movie to Watching List?','class' => 'btn btn-default')); ?>
        
         
          <a onclick="PopupCenterDual('/moviepal/recommendations/index/<?php echo $movie['movies']['id']?>','MoviePal','450','450');" href="javascript:void(0);" class="btn btn-default">Recommend</a></p>

    </div>

        </div>

    <?php endforeach; ?>

    