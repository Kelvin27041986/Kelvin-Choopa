
<?php
require_once('../../layout/admin/header.php');
require_once('../api/index.php');
$type  = 'png';
$files = getFiles($type);

?>

<button class='btn'></button>

<?php  if(count($files)):
        $index = 0;
        while($index < count($files) ):
            $row = $files[$index] ;
            $title = $row['title'];
            $downloads = $row['downloads'];
            $description = $row['description'];
            $file = ($row['link']) ;
             $fileStorage =  getFileStoragePath();

            $path = ($fileStorage.$file) ;
        
    ?>

<div class="card " style="width: 30rem; ">
  <div class="card-body">
    <h5 class="card-title"><?php echo $title?></h5>
   
    <p class="card-text">
    <?php echo $description?>
    </p>

<img src="<?php echo $path;  ?>" class="img-fluid" alt="Responsive image">


 
    <a href="#" class="card-link">View </a>
    <a href="#" class="card-link"> Download</a>
    <hr />
        <h6 class="card-subtitle mb-2 text-muted">
    Downloads :<?php echo $downloads?></h6>
  </div>
</div>



        <?php $index++; endwhile;   else:  ?>


<?php  endif  ?>



<?php
require_once('../../layout/admin/footer.php')

?>












