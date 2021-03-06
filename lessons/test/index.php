
<?php
     require_once(__DIR__.'../../../db/connection.php');

require_once('../../layout/admin/header.php');
require_once('../api/index.php');
$files = getQuestions(true);

    $conn = DBCoonect();


?>

  <?php
  //get minutes from the db
     $sql = "SELECT `minutes` FROM timer  ";

        $results = mysqli_query($conn,$sql);  
        $row  = mysqli_fetch_assoc($results);
        $minutes = $row['minutes'] ;
        // die($minutes);
     
     ?>

<style>

#clockdiv{
	font-family: sans-serif;
	color: #fff;
	display: fixed;
	font-weight: 100;
	text-align: center;
	font-size: 30px;
}

#clockdiv > div{
	padding: 10px;
	border-radius: 3px;
	background: #17a2b8!important;
	display: inline-block;
}

#clockdiv div > span{
	padding: 15px;
	border-radius: 3px;
	background: #00816A;
	display: inline-block;
}

.smalltext{
	padding-top: 5px;
	font-size: 16px;
}

</style>


<div class="modal" tabindex="-1" role="dialog" data-toggle="modal" id="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Test Timer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<h1>Time</h1>


  
    <div class="col-auto">
      <label class="sr-only" for="inlineFormInputGroup">Minutes</label>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text">@</div>
        </div>
        <input id='newMinutes' value="<?php echo $minutes ?>"  type="number" class="form-control" id="inlineFormInputGroup" placeholder="60 for 1 hour">
      </div>
    </div>

</div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id='saveNewMinutes' class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

 

<div class="card text-white bg-info mb-3">
    <?php
                        if (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] == 'admin'):


            
            ?>
            <button type="button" data-toggle="modal" data-target="#myModal">Edit Timer</button>
<?php  
endif
?>

  <h5 class="card-header"> IQ Test </h5>
  <div class="card-body">
    <h5 class="card-title">Check your worthy</h5>
    <p class="card-text">Attempt the all questions.</p>
    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
  </div>
</div>

 <div class='fixed'>
<div id="clockdiv">
<h1>Time</h1>

  <div class='hide' hidden>
    <span class="days"></span>
    <div class="smalltext">Days</div>
  </div>

  
  <div>

    <span class="hours"></span>
    <div class="smalltext">Hours</div>
  </div>
  <div>
    <span class="minutes"></span>
    <div class="smalltext">Minutes</div>
  </div>
  <div>
    <span class="seconds"></span>
    <div class="smalltext">Seconds</div>
  </div>
</div>

  </div>

<form action="../api/index.php" method="post" enctype="multipart/form-data">
  <input class="" type="hidden" name="test-questions"  value="test-questions">

<?php  if(count($files)):
        $index = 0;
        while($index < count($files) ):
            $row = $files[$index] ;
            $text = $row['text'];
            $id = $row['id'];
            $a = $row['a'];
            $b = $row['b'];
            $c = $row['c'];
            $d = $row['d'];
            $ans = $row['answer'];

            $editPath = '/comp_test/admin/lessons/tests/edit_test.php?id='.$id;
          $deletePath = '../api/index.php?delete=true&table=questions&id='.$id;

        
    ?>

<div class="card" style="width: 80rem;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $index+1?>
    
            <?php
                        if (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] == 'admin'):
            
            ?>
    <a href="<?php echo $editPath;  ?>"  class="push-right" >Edit </a>
    <a href="<?php echo $deletePath;  ?>"  class="text-danger card-link delete" >Delete </a>

    

           <?php
      endif;
?>
    



    
    </h5>
    <p class="card-text">
    <?php echo $text?>
    </p>

        <?php 
    if($row['type'] === 'multiple-choice'):
    ?>

            <div class="form-check form-check-inline">
  <label class="form-check-label" for="inlineRadio1">
A  
</label>
  <input class="form-check-input" type="radio" name="<?php echo $id?>-question" id="inlineRadio1" value="a">
  <label class="form-check-label" for="inlineRadio1">
  <?php echo $a ?>
  </label>
</div>
<div class="form-check form-check-inline">
  <label class="form-check-label" for="inlineRadio1">
B  
</label>
  <input class="form-check-input" type="radio" name="<?php echo $id?>-question" id="inlineRadio2" value="b">
  <label class="form-check-label" for="inlineRadio2">
  <?php echo $b ?>
  
  </label>
</div>
            <div class="form-check form-check-inline">
              <label class="form-check-label" for="inlineRadio1">
C  
</label>
  <input class="form-check-input" type="radio" name="<?php echo $id?>-question" id="inlineRadio1" value="c">
  <label class="form-check-label" for="inlineRadio1">
  <?php echo $c ?>
  
  </label>
</div>
<div class="form-check form-check-inline">
  <label class="form-check-label" for="d">
D  



</label>
  <input class="form-check-input" type="radio" name="<?php echo $id?>-question" id="inlineRadio2" value="d">
  <label class="form-check-label" for="inlineRadio2">
  
  <?php echo $d ?>
  
  </label>
</div>
  
    
        <?php 
    elseif($row['type'] === 'true-false'):
    ?>
<div class="form-check form-check-inline">
  <label class="form-check-label" for="d">
        True
</label>
  <input class="form-check-input" type="radio" name="<?php echo $id?>-question" id="inlineRadio2" value="true">
  <label class="form-check-label" for="inlineRadio2">

  
  </label>
</div>
<div class="form-check form-check-inline">
  <label class="form-check-label" for="d">
        False
</label>
  <input class="form-check-input" type="radio" name="<?php echo $id?>-question" id="inlineRadio2" value="false">

</div>

    <?php 
    else:
    ?>

    <div class="form-group">
  <input placeholder='Type Your Answer' class="form-control" type="text" name="<?php echo $id?>-question"  value="">
</div>

       <?php 
    endif;
    ?>
 
  </div>
  



</div>

        <?php $index++; endwhile;   else:  ?>

<?php  endif  ?>
<!-- <button>  Submit </button> -->

<button type="Submit" id="submit" class="btn btn-success">Submit</button>



</form>



<script>

   

function getTimeRemaining(endtime) {
  var t = Date.parse(endtime) - Date.parse(new Date());
  var seconds = Math.floor((t / 1000) % 60);
  var minutes = Math.floor((t / 1000 / 60) % 60);
  var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
  var days = Math.floor(t / (1000 * 60 * 60 * 24));
  return {
    'total': t,
    'days': days,
    'hours': hours,
    'minutes': minutes,
    'seconds': seconds
  };
}

function initializeClock(id, endtime) {



  var clock = document.getElementById(id);
  var daysSpan = clock.querySelector('.days');
  var hoursSpan = clock.querySelector('.hours');
  var minutesSpan = clock.querySelector('.minutes');
  var secondsSpan = clock.querySelector('.seconds');

  function updateClock() {
    var t = getTimeRemaining(endtime);

    daysSpan.innerHTML = t.days;
    hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
    minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
    secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

    if (t.total <= 0) {
      clearInterval(timeinterval);
      $('#submit')[0].click()
    }
  }

  updateClock();
  var timeinterval = setInterval(updateClock, 1000);
}
  const duration = <?php echo $minutes ?>;

var deadline = new Date(Date.parse(new Date()) +  duration * 60 * 1000);
initializeClock('clockdiv', deadline);

</script>

<?php
require_once('../../layout/admin/footer.php');

?>

<script>
       $('#saveNewMinutes').click(()=>{
            const newMinutes = $('#newMinutes').val();
            location.href = `./index.php?newMinutes=${newMinutes}`;
          })
</script>

     <?php

     //set 
     
     if(isset($_GET['newMinutes'])){

        $newMinutes  = $_GET['newMinutes'] ;
       $sql = "UPDATE  timer SET `minutes`= '$newMinutes' ";
       
       $results = mysqli_query($conn,$sql);  
       echo '<script> location.href = "./index.php" </script>';
      }
     ?>














