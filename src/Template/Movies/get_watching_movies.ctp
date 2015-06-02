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

        </div>

    <?php endforeach; ?>

    