
<?php 

          if (isset($_SESSION['user']['name'])):


?>


<div class='row'>
<nav 
style="width: 1367px;"
 class="navbar  navbar-expand-lg navbar-light bg-light ">
  <a class="navbar-brand" href=""></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
 
      <li class="nav-item active">
        <a class="nav-link" href="/comp_test/">Home <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="/comp_test/lessons/past_papers">Past Papers</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="/comp_test/lessons/mark_schema">Mark Schemas</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="/comp_test/lessons/test">Self-Test</a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Resources
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/comp_test/lessons/pdf/">PDF</a>
          <a class="dropdown-item" href="/comp_test/lessons/video/">Video</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/comp_test/lessons/picture/">Illustrations</a>
        </div>
      </li>


            <?php
                        if (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] == 'admin') {
                          include_once('admin_links.php');
                        }
            
            ?>


          
         <li class="nav-item">
        <a class="nav-link" href="/comp_test/auth/api.php?logout=true">Logout</a>
      </li>

      
   
    </ul>
    <!-- <form class="form-inline my-2 my-lg-0 hide">
      <input class="form-control mr-sm-2 hide" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success hide my-2 my-sm-0" type="submit">Search</button>
    </form> -->
  </div>
</nav>
   <a style='color:white' class="nav-link pull-right text-default" href="/comp_test/auth/profile.php"> 
        <?php
        
          if (isset($_SESSION['user']['name'])) {
           echo "Hi, ".$_SESSION['user']['name'];
            # code...
          }
        
        ?>
        </span></a>
</div>


<?php 

        else:


?>

<div class='row'>
<nav 
style="width: 1367px;"
 class="navbar  navbar-expand-lg navbar-light bg-light ">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
 
      <li class="nav-item active">
        <a class="nav-link" href="/comp_test/">Home <span class="sr-only">(current)</span></a>
      </li>

         <li class="nav-item">
        <a class="nav-link" href="/comp_test/auth/register.php">Register</a>
      </li>

         <li class="nav-item">
        <a class="nav-link" href="/comp_test/auth/login.php">Login</a>
      </li>

  
    </ul>
    <!-- <form class="form-inline my-2 my-lg-0 hide">
      <input class="form-control mr-sm-2 hide" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success hide my-2 my-sm-0" type="submit">Search</button>
    </form> -->
  </div>
</nav>
</div>



<?php 
        endif
?>