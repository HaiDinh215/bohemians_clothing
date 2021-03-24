<!DOCTYPE html>
<html>
<head>
    <title> INTERNET PROGRAMING </title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/9168255829.js" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="java.js" rel="stylesheet" type="text/js"> </script>
</head>

<body>

    <!------Menu--->
    <header>
        <!--Headernote-->
        <section id="HeaderNote">
           <div class="head">
            <div class="icon">
                <div class="iconnetwork">
                    <a href="https://www.facebook.com/"><img src="image/fb.png"></a>
                    <a href="https://twitter.com/"><img src="image/tw.png"></a>
                    <a href="https://www.instagram.com/"><img src="image/insta.png"></a>
                </div>

                <div class="headword">
                    <b> Freeship for order over 200CAD</b>
                </div>

            </div>
        </div>
    </section>
    <!------NavigationBar--->
    <section id="nav-bar">
        <nav class="navbar navbar-expand-lg navbar-light ">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!--Droping navigation bar-->
            <div class="dropdown">
                <button class="dropbtn">Menu</button>
                <div class="dropdown-content">
                    <a href="aboutus.html">About Us</a>
                    <a href="information.html">Information</a>
                    <a href="login.html">Login</a>
                    <a href="feedback.html">Feedback</a>
                </div>
            </div>
            <!--Home Login search content-->
            <div class="link ml-auto">
             <a class="top" href="home.html">Home</a>
             <a class="top" href="login.html">Login</a>
             <div class="search_container">
                <form action="/action_page.php">
                  <input class="search_box" type="text" placeholder="Search..." name="search">
                  <button type="submit"><i class="fa fa-search"></i></button>
              </form>
          </div>
      </div>
  </nav>
</section>
</header>
<script language="javascript">
    function validate(){
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;
        var message =document.getElementById("message");
        if(username == ""){
            message.innerHTML =("Missing username");
            message.style.color = "red";
            return false;
        }
        else if(username.search(/^[a-zA-z]/) == -1){
            message.innerHTML =("Must begin with a letter");
            message.style.color = "red";
            return false;
        }
        else if(password == ""){
            message.innerHTML =("Missing password");
            message.style.color = "red";
            return false;
        }
        else if(password.search(/^[a-zA-z]/) == -1){
            message.innerHTML =("Must begin with a letter");
            message.style.color = "red";
            return false;
        }
        else if(password.length < 8 || password.length > 16){
            message.innerHTML =("Missing password: Range required 8-16");
            message.style.color = "red";
            return false;
        }
        else if(password.search(/\d/) == -1){
            message.innerHTML =("Missing password: Required number");
            message.style.color = "red";
            return false;
        }
        else if(password.search(/[A-Z]/) == -1){
            message.innerHTML =("Missing password: Required Capital letter");
            message.style.color = "red";
            return false;
        }
        else if(password.search(/[\!\*]/) == -1){
            message.innerHTML =("Missing password: Required special letter * or !");
            message.style.color = "red";
            return false;
        }
        else{
         return true;
     }

 }
</script>

<section id="login">
    <div class="row">
        <div class="column">
            <nav class="loginhead">
                <?php
                session_start();
                //define variables and set to empty values
                $unameErr = $passErr = $loginErr = "";
                $uname = $password = "";
                $leveltest = "";


                if ($_SERVER["REQUEST_METHOD"] == "POST") {


                if (empty($_POST["username"])) {
                $unameErr = "Name is required";
                } else {
                $uname = test_input($_POST["username"]);  
                $_SESSION['user']=$uname;
                }

                if (empty($_POST["password"])) {
                $passErr = "Password is required";
                } else {
                $password = test_input($_POST["password"]); 
                }




                //continues to target page if all validation is passed
                if ( $unameErr ==""&& $passErr ==""){
                // check if exists in database
                $dbc=mysqli_connect('localhost','root','','db3')
                or die("Could not Connect!\n");
                $hashpass=hash('sha256',$password);
                $sql="SELECT * from registration WHERE username ='$uname' AND password='$hashpass'";

                $result =mysqli_Query($dbc,$sql) or die (" Error querying database");
                $a=mysqli_num_rows($result);
                $row = mysqli_fetch_array($result);
                $leveltest=$row['level'];



                if ($a===1){
                if($leveltest==0){header('Location: adminpage.php');}
                else{header('Location: product.php');}
                }     

                else{
                $loginErr="Invalid username or password";
                }
                }
                }

                // clears spaces etc to prep data for testing
                function test_input($data){
                $data=trim ($data); // gets rid of extra spaces befor and after
                $data=stripslashes($data); //gets rid of any slashes
                $data=htmlspecialchars($data); //converts any symbols usch as < and > to special characters
                return $data;
                }

                ?>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <a class="loginword"><h2>Login</h2></a>

                    <br><a class="wordinlogin">Username</a>
                    <br><input class="loginformtype" type="username"  name="username" id="username" value="<?php echo $uname;?>"/>
                    <span class="error"> <?php echo $unameErr;?></span><br/><br/>  

                    <br><a class="wordinlogin">Password</a>
                    <br><input class="loginformtype" type="password" id="password" name="password" value="<?php echo $password;?>"/>
                    <span class="error"> <?php echo $passErr;?></span><br/><br/>
                    <span class="error"> <?php echo $loginErr;?></span>

                    <br><a><input class="submitSign" type="submit" onclick="return validate()" value="Sign In"></a>
                </form>
            </nav>
        </div>

        <div class="column">
            <nav class="createhead">
                <a class="loginword"><h2>Description</h2></a>
                <br><a class="loginInstructions"><b>Login Instructions</b></a>
                <br><p>Please key your username and password carefully as username contains letters, numbers and it must begin with a letter while password contains least 1 digit, 1 capital letter,at least 1 special letter ! Or * and it must be 8 to 16 characters long and start with a letter.</p>
                <br><a class="loginInstructions"><b>Security</b></a>
                <br><p>For sercurity reasons, please log out and exit your web browser when you are done accessing services that require authentication.</p>
            </nav>
        </div>
    </div>
</section>

<br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<!------------Footer-------------------->
<section>
  <footer>
    <div class="footer">
      <div class="iconnetwork_footer">
        <p>GIVE US A FOLLOW ON</P>
				<a href="https://www.facebook.com/"><img src="image/fb.png"></a>
				<a href="https://twitter.com/"><img src="image/tw.png"></a>
				<a href="https://www.instagram.com/"><img src="image/insta.png"></a><br>
        <a href="#">CUSTOMER SERVICE</a><br>
			  <a href="#">PRIVACY POLICY</a><br>
        <b class="footer-copyright">&copy; 2020 BOHEMIANS®</b>
			</div>
    </div>
  </footer>
</section>
</body>
</html>
