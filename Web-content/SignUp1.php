<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Architects+Daughter|Unica+One&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <style>
        .container-box {
            width: 500px;
            height: auto;
            border: 1px solid white;
            box-sizing: border-box;
            margin: 50px auto;
        }

        .flex-Container {
            display: flex;
            flex-direction: row;
        }

        .icon {
            margin-top: 40px;
            margin-right: 30px;
        }

        .icon:hover {
            transform: scale(1.4);
        }

        .bottomList {
            line-height: 2;
            text-align:center;
            font-size: 17px;
            list-style-type: none;
        }

        .bottomList li:hover {
            cursor: pointer;
            transform: scale(1.4);
        }
    </style>

    <title>Document</title>
</head>

<body>

<nav class="nav wrapper blue-grey">
        <div class="container">
            <a href="Home.php" class="brand-logo">RV Events</a>
            <a href="" class="sidenav-trigger" data-target="mobile-links">
                <i class="material-icons">
                    menu
                </i>
            </a>
            <ul class="right hide-on-med-and-down">

                <li><a href="diveIn.php">Dive In</a></li>


                <li><a href="statistics.php">statistics</a></li>

                <li><a href="login.php">Login</a></li>
                <li><a href="SignUp1.php">SignUP</a></li>

            </ul>

        </div>
    </nav>

    <ul class="sidenav" id="mobile-links">

        <li><a href="diveIn.php">Dive In</a></li>


        <li><a href="statistics.php">statistics</a></li>

        <li><a href="login.php">Login</a></li>
        <li><a href="SignUp1.php">SignUP</a></li>

    </ul>


    <div class="container-box">

        <div class="row">

        <?php
          if (isset($_GET['error'])) {
              $error = isset($_GET['error']);
              if ($error == 'passwordCheck') {
                  echo '<p style="color:red;text-align:center">please check the password</p>';
              } elseif ($error == 'invalideuserNameAndemailId') {
                  echo '<p style="color:red;text-align:center">Invalid username and emailid</p>';
              }elseif($error == 'invalidPassword'){
                echo '<p style="color:red;text-align:center">password must contain atleast 1 letter,1 number,1 special character</p>';

              } 
              elseif ($error == 'invalidemail') {
                  echo '<p style="color:red;text-align:center">invalid email</p>';
              } elseif ($error == 'invalideuserName') {
                  echo '<p style="color:red;text-align:center">invalid username</p>';
              } elseif ($error == 'incompleteFormData') {
                  echo '<p style="color:red;text-align:center">please fill the form completely</p>';
              } else {
              }
          }
          
        ?>
            
            <form class="col s12" action="../Web-content/phpCode/signUp.php"  method="post">

            <div id="formInput">
            <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">person</i>
                        <input id="first_name" name="username" v-model="username" v-on:keyup="checkCredential" type="text" required class="validate">

                        <label for="first_name">UserName</label>
                        <div class="name" style="color:green;margin-top:5px;margin-left:10px; text-align:center;">{{resultname}}</div>
                    </div>
                    
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">email</i>
                        <input id="email" type="email" v-model="email" v-on:keyup="checkCredential1" name="emailId"  class="validate">
                        <label for="email">Email</label>
                        <div class="email" style="color:green;margin-top:5px;margin-left:10px; text-align:center;">{{resultemail}}</div>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">
                            remove_red_eye
                        </i>
                        <input id="password" type="password" v-model="password" v-on:keyup="checkCredential2"  name="password" required class="validate">
                        <label for="password">Password</label>
                        <div class="repass1" style="color:green;margin-top:5px;margin-left:10px; text-align:center;">{{resultpass1}}</div>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">
                            remove_red_eye
                        </i>
                        <input id="password2" type="password" v-model="repassword" v-on:keyup="checkCredential2" name="repassword" required class="validate">
                        <label for="password2">Confirm password</label>
                        <div class="repass" style="color:green;margin-top:5px;margin-left:10px; text-align:center;">{{resultpass}}</div>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <h5>Looking for</h5>
                        <p>
                            <label>

                                <input class="with-gap" name="group1" required type="radio" checked value="job" />
                                <span><a class="tooltipped" data-position="right"
                                        data-tooltip="Those who want to work and get payment on day to day basis.">JOB</a></span>

                            </label>
                        </p>
                        <p>
                            <label>
                                <input class="with-gap" name="group1" required type="radio" value="customer"/>
                                <span><a class="tooltipped" data-position="right"
                                        data-tooltip="Those who want services from industry professionals such as camera men , sound system etc">Get
                                        Service</a></span>
                            </label>
                        </p>
                        <p>
                            <label>
                                <input class="with-gap" name="group1" required type="radio" value="serviceProvider"/>
                                <span><a class="tooltipped" data-position="right"
                                        data-tooltip="Those who want to register as a service vendor on this platform">Service
                                        Provider</a></span>
                            </label>
                        </p>

                    </div>
                </div>

                <a class="tooltipped" data-position="right" data-tooltip="check details and then submit the form">
                    <button class="btn waves-effect waves-light btn-large" type="submit" name="action-submit">Submit
                        <i class="material-icons right">send</i>
                    </button></a>






            </div>
                

            </form>
        </div>

    </div>


    <footer class="page-footer  blue-grey darken-3">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">RV Events</h5>
                    <p
                        style="font-family: 'Unica One', cursive;font-family: 'Architects Daughter', cursive;font-size:18px;">
                        Plan your wedding with Us

                        RV Event is an Indian event Planning Website where you can find the best vendors,
                        with prices and reviews at the click of a button. Whether you are looking to hire event planners
                        in
                        India, or looking for the top photographers, or just some ideas and inspiration for your event.
                        RV Event can help you solve your event planning woes through its unique features. With a
                        checklist,
                        detailed vendor list, inspiration gallery and blog - you won't need to spend hours planning an
                        event
                        anymore.
                    </p>

                    <div class="flex-Container">
                        <div class="icon"><i class="fa fa-facebook-square" style="font-size:36px"></i></div>
                        <div class="icon"><i class="fa fa-google-plus" style="font-size:34px"></i></div>
                        <div class="icon"><i class="fa fa-linkedin-square" style="font-size:34px"></i></div>
                        <div class="icon"><i class="fa fa-instagram" style="font-size:34px;color:aqua"></i></div>
                        <div class="icon"><i class="fa fa-twitter-square" style="font-size:34px;color:red"></i></div>
                    </div>
                </div>
                <div class="col l4 offset-l2 s12">
                    <div class="ab" id="ab">
                        <h4 style="text-align:center;">RV Events</h4>
                        <ul class="bottomList">

                            <li>Contact us.</li>
                            <li>Plan an event.</li>
                            <li>Hire Vendors.</li>
                            <li>Find a Job.</li>
                            <li>Offer Service</li>



                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                © 2019 RV Events 
                <a class="grey-text text-lighten-4 right" href="#!">بسم الله   श्रेष्ठः परमात्मा</a>
            </div>
        </div>
    </footer>




</body>

<!-- jquery cdn-->

<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

<script>

    $(document).ready(function () {
        $('.tooltipped').tooltip();
        $('.sidenav').sidenav();

    });

    

</script>
 
 <script src="VueTest1.js"></script>

</html>