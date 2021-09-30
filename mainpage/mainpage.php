<link rel="stylesheet" href="mainpage.css">
<?php include '../navbar/navbar.php' ?>
      <!--Beginning of slideshow container-->
  <div class="slideshow-container">

    <div class="mySlides fade">
      <img src="bgpic1.jpg">
    </div>

    <div class="mySlides fade">
      <img src="bgpic2.jpg">
    </div>

    <div class="mySlides fade">
      <img src="bgpic3.jpg">
    </div>


    <!--Beginning of previous arrow-->
    <a class="prevarrow" onclick="plusSlides(-1)">
      <svg  width="16" height="16"
        fill="currentColor" viewBox="0 0 16 16">
        <path fill-rule="evenodd"
          d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z" />
      </svg></a>
    <!--End of previous arrow-->

    <!--Beginning of next arrow-->
    <a class="nextarrow" onclick="plusSlides(1)"><svg width="16" height="16"
        fill="currentColor" viewBox="0 0 16 16">
        <path fill-rule="evenodd"
          d="M1.5 1.5A.5.5 0 0 0 1 2v4.8a2.5 2.5 0 0 0 2.5 2.5h9.793l-3.347 3.346a.5.5 0 0 0 .708.708l4.2-4.2a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 8.3H3.5A1.5 1.5 0 0 1 2 6.8V2a.5.5 0 0 0-.5-.5z" />
      </svg></a>
    <!--End of next arrow-->

  </div>
  <!--End of slideshow container-->

  <div id="maincontainer">
    <?php echo categories() ?>
  <!--Beginning of video container-->
  <div id="videocontainer">
    <video id="myvideo" src="arduino-animation.mp4" loop autoplay></video>
  </div>
  <!--End of video container-->

  <!--Beginning of community div-->
  <div id="community">
    <img src="community.png">
  </div>
  <!--End of community div-->

 
  <!--Beginning of back to top button-->
  <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="arrow up"></i></button>
  <!--Endof back to top button-->
<script src="mainpage.js"></script>
</div>
<?php include '../footer/footer.php' ?> 



<?php
function categories(){
$link = mysqli_connect ('localhost', 'root', '','web3_project')
        or die(mysqli_connect_errno()." : ".mysqli_connect_error ( ));
$counter = 0;
        $requete = "SELECT idcategorie, name from categories";
    $result = mysqli_query($link,$requete);
    $creation =  "<table id='table'>";
    while($ligne = mysqli_fetch_assoc($result)){

    if($counter%2==0){
        $creation.= "<tr>";
        $creation.="<td><div id='main'>";
        $creation.= "<div id='div_left' class='".$ligne['idcategorie']."'>";
      }
      else{
        $creation.= "<div id='div_right' class='".$ligne['idcategorie']."'>";
      }
      $creation.= "<div id='title'> Arduino ".ucfirst($ligne['name']);
      $creation.= "<label>View all</label></div>";
      $creation.= '<a href="loadcategories.php?cat='.$ligne['idcategorie'].'"><img src="images/'.$ligne['name'].'.jpg"></a>';
      $creation.="</div>";
      if($counter%2==1){$creation.= "</div></td></tr>";}
    $counter++;
    }    
  
    $creation.= "</table>";
    return $creation;
      
 }
?>