<!-- Info boxes -->
<style>
  .small-box .icon>i.fa,
  .small-box .icon>i.fab,
  .small-box .icon>i.fad,
  .small-box .icon>i.fal,
  .small-box .icon>i.far,
  .small-box .icon>i.fas,
  .small-box .icon>i.ion {
    font-size: 40px;
    top: 20px;
  }
</style>
<div class="row">
  <div class="col-12 ">
    <div class="small-box bg-light shadow-sm border">
      <div class="inner">
        <h3></h3>
        <div class=" col-md-6 m-auto">
          <div class="small-box bg-light shadow-sm border">
            <div class="inner">
              <h3>Total Employees</h3>
              <?php  
                if (isset($_SESSION['admin'])) {
            
                 $id=$_SESSION['admin']->manger_id ;
                 require 'DB.php';
                 $selectEmploye=$db->prepare("SELECT * FROM  employee WHERE Manager_Name =:id");
                 $selectEmploye->bindparam("id",$id);
                 $selectEmploye->execute();
                 $selectEmploye=$selectEmploye->rowcount();
                 echo " <h4>".$selectEmploye."</h4>";
                }

              ?>
              
                
              
             
            </div>
            <div class="icon">
              <i class="fa fa-user-friends"></i>
            </div>
          </div>

        </div>

        <div class=" col-md-6 m-auto">
          <div class="small-box bg-light shadow-sm border">
            <div class="inner">
              <h3>Total Tasks</h3>
              <?php  
                if (isset($_SESSION['admin'])) {
            
                 $id=$_SESSION['admin']->manger_id ;
                 require 'DB.php';
                 $selectEmploye=$db->prepare("SELECT * FROM  emploeyeetask WHERE manger_id =:id");
                 $selectEmploye->bindparam("id",$id);
                 $selectEmploye->execute();
                 $selectEmploye=$selectEmploye->rowcount();
                 echo " <h4>".$selectEmploye."</h4>";
                }

              ?>

              <p></p>
            </div>
            <div class="icon">
              <i class="fa fa-tasks"></i>
            </div>
          </div>
        </div>
      </div>


      <div class="col-12">
        <div class="card">
          <div class="card-body">
             <?php  
                if (isset($_SESSION['admin'])) {
            
                echo" Welcome ! <span>". $_SESSION['admin']->First_Name." ". $_SESSION['admin']->Last_Name."</span>" ;}
                

              ?>

           
          </div>
        </div>
      </div>