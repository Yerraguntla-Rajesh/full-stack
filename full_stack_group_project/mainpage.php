
<?php 

session_start();
if (isset($_SESSION['first_name'], $_SESSION['last_name'], $_SESSION['location'], $_SESSION['phone_number'])){
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name']; 
    $location = $_SESSION['location'];
    $phone_number = $_SESSION['phone_number'];
    $profile_image = $_SESSION['profile_image'];
    $emailaddress = $_SESSION['emailaddress'];

  

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Distributor</title>
    <link rel="stylesheet" href="mainpage.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="webpage">

    <div class="profile">

        <div id="cover"></div>
        <img src="bussinessman.jpg" alt="" id="pimg">
        

        <h2><?php echo $last_name . "  ".$first_name; ?></h2>
        <label for="range">Distance range</label>
        <input type="number" min="0" max="100" id="number"> km
        <input type="submit" id="submit">
        <div class="contact"> 
        <i class="w3-xlarge"><i class="fa fa-home">  :  3-56/9</i></i>
        

        <h3> 
            Railway Station road
            <br>
            Narasaraopet
        <br></h3>
        <i class="w3-xlarge"><i class="fa fa-phone"> :<?php echo $phone_number; ?> </i></i>
        <br>
        <i class="w3-xlarge"><i class="fa fa-envelope"> 
        
            : <?php echo $emailaddress; ?>
        </i></i>
   
</div>

    </div>
    <div class="post_page">
        <div class="header">
        <i class="w3-xlarge"><i class="fa fa-search"> </i></i>
        <input type="search" name="search">
        <input type="button" value="search">
    
        <h1>posts</h1>
        <hr style="margin: 0;">
        </div>
        <h3 class="initial">Select the Range between 0 to 100 km only</h3>
        <div class="allposts">
        <div class="user_post">

        <?php 
        
        $con = new mysqli('localhost','root','','singup');

        if($con->connect_error){
            die("connection failure to databse".$con->connect_error);

        }
        else{
            $statement = "SELECT * FROM posts";
            
            $result = $con->query($statement);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {

        ?>
            <div class="post">
            <section class="post_profile">
                <img src="./profiles/<?php $row['pimg'] ?>" alt="">
                <h5>Name of the Farmer</h5>
                
            </section>
            <h4>Crop Name : <?php echo $row['name_of_the_crop']; ?></h4><br>
            <h4>Quantity : <?php echo $row['quantity']; ?></h4><br>
            <section class="image">
            <img src="./posts/<?php echo $row['post_image']; ?>"><br><hr>
            </section>
            
    
        <?php
            }}else{ ?>
                <h1> EMPTY POSTS </h1>
            <?php
            }
        }
        ?>


        </div>
        <div class="post">
            <section class="post_profile">
                <img src="mirchi_crop.jpeg" alt="">
                <h5>Name of the Farmer</h5>
            </section>
            <section class="discrption">Califlower crop <br> 25 bags.. <br> ...... more.</section>
            <section class="image">
                <img src="califlower.jpg" alt="">
            </section>
        </div> 
    </div>
</div>
    <div class="post_details">
        <iframe frameborder="0" name="frame">nothing here</iframe>
    </div>

</div>
<script>
    const number = document.getElementById('number');
    const submit = document.getElementById('submit');
    const posts=document.querySelectorAll('.post')
    const header=document.querySelectorAll('.post_page')
    const initial=document.querySelectorAll('.initial')
    submit.addEventListener('click', function() {
      const snum = Number(number.value);
      const minRange = 0;
      const maxRange = 100;
      if (snum >= minRange && snum <= maxRange)
       {
        posts.forEach(post=>post.style.display='block'); 
        header.forEach(header=>header.style.backgroundColor='none');
        initial.forEach(initial=>initial.style.display='none')
       } 
      else 
       {
        posts.forEach(post=>post.style.display='none');
        initial.forEach(initial=>initial.style.display='block')
        alert('Selected number is not within the specified range');

       }
    });
    

</script>




</body>
</html>