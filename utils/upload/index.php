
<?php
require_once('../../layout/admin/header.php');
?>

<button class='btn'></button>

<div class="card" style="width: 21rem;">
  <div class="card-body">
    <h5 class="card-title"> Upload Resources</h5>
    <h6 class="card-subtitle mb-2 text-muted">
    
    <span class="badge badge-pill badge-primary">Video</span>
<span class="badge badge-pill badge-secondary">Illustratiions</span>
<span class="badge badge-pill badge-success">Pdf </span>

    
    </h6>


      <?php

      if(isset($_GET['err'])):
    ?>

      <blockquote class='text-danger'>
         <?php
     echo $_GET['err'];
    ?>

      </blockquote>


    <?php endif ?>
   

<form action="fileProcessor.php" method="post" enctype="multipart/form-data">

        <div class="form-group ">
    <label for="title">Title</label>
    <input required type="title" class="form-control" name="title" aria-describedby="nameHelp" />
  </div>

        <div class="form-group ">
    <label for="description">Description</label>
    <input required type="description" class="form-control" name="description" aria-describedby="nameHelp" />
  </div>

     <div class="form-group ">
    <label for="grade">Level</label>
        <select required class="form-control" name="level" aria-describedby="genderHelp" >
  <option value='junior'> Junior </option>
  <option value='senior'> Senior </option>
    </select>
  </div>

<div class="form-group">
  <label for="exampleFormControlFile1">Click to upload</label>
  <input required type="file" name='file' class="form-control-file" id="exampleFormControlFile1">
</div>

<button>  Upload </button>
</form>

  </div>
</div>

<?php
require_once('../../layout/admin/footer.php')
?>