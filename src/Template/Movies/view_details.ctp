
<div class="content-movie">

 
        <div class="title-big">
          <?php echo $movie->title ?>
        </div>
  


    <div class="col-md-5 col-sm-8 col-xs-12">
        <div class="img-responsive">
          <?php echo $this->Html->image($movie->poster, 
            array( "alt" => "Poster", 'url' => array('controller' => 'movies', 'action' => 'index')));?>
        </div>
    </div>

<div class="col-md-6 col-sm-2 col-xs-12">

    <div class="panel  panel-default">
        
        <div class="panel-heading">
            <span style="font-weight: bolder">Year </span>
        </div>

          <div class="panel-body">
         <span style="color:gray;font-weight: bolder"><?php echo $movie->year; ?> </span>
            
               
        </div>

        <div class="panel-heading">
            <span style="font-weight: bolder">Genre </span>
        </div>

          <div class="panel-body">
         
            <?php foreach ($movie->genres as $genre): ?>
                     <span style="color:gray;font-weight: bolder"><?php echo $genre->genre?> </span>
                <?php endforeach; ?>  
               
        </div>        


        <div class="panel-heading">
            <span style="font-weight: bolder">Country </span>
        </div>
        <div class="panel-body">

            <?php foreach ($movie->countries as $country): ?>
                <span style="color:gray;font-weight: bolder"><?php echo $country->country?> </span>
          <?php endforeach; ?>
          
        </div> 

        <div class="panel-heading">
            <span style="font-weight: bolder">Director </span>
        </div>
        <div class="panel-body">

            <?php foreach ($movie->directors as $director): ?>
                <span style="color:gray;font-weight: bolder"><?php echo $director->name?> </span>
          <?php endforeach; ?>
          
        </div>

        <div class="panel-heading">
            <span style="font-weight: bolder">Stars </span>
        </div>
        <div class="panel-body">

            <?php foreach ($movie->actors as $actor): ?>
                <span style="color:gray;font-weight: bolder"><?php echo $actor->name?> </span>
          <?php endforeach; ?>
          
        </div>
    </div>

</div>

<div class="col-md-12">

<div class="panel-body">

  <div class="panel  panel-default">
        
          <div class="panel-body">
         <span style="color:gray;font-weight: bolder"><?php echo $movie->description?></span>
            
               
        </div>
    </div>




 

          
</div>


</div>

    <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>

</div>








