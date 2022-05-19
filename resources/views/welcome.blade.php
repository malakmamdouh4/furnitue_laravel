<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title> Furniture </title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Dancing+Script&display=swap" rel="stylesheet">

        <!-- CDN Bootstrap   -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!-- CDN font-awesome  -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
            integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
            
        <!-- Styles -->
        <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">

        <style>
            
        </style>
    </head>

    <body class="antialiased">          

        <nav class="nav navbar navbar-expand-lg navbar-light bg-white">
            <div class="container">
                <a class="navbar-brand" href="{{route('welcome')}}"> <span style="font-weight: bold ;font-size: 30px ;color: brown ;font-family: 'Dancing Script', cursive;"> Furniture </span> </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-nav">
                    <!-- aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" -->
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="main-nav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item <?php if(!isset($_GET['go']) || $_GET['go'] === 'home'){ echo 'active';} ?>">
                            <a class="nav-link" href="{{route('welcome')}}">Home </span></a>
                        </li>
                        <li class="nav-item <?php if((isset($_GET['go']) && $_GET['go'] === 'dept') || (isset($_GET['go']) && $_GET['go'] == 'item' ) || (isset($_GET['go']) && $_GET['go'] == 'buy' )){ echo 'active';} ?>">
                            <a class="nav-link" href="{{route('department')}}">departments</a>
                        </li>
                        <li class="nav-item <?php if(isset($_GET['go']) && $_GET['go'] === 'search'){ echo 'active';} ?>">
                            <a class="nav-link" href="{{route('search')}}"><i class="fa fa-search"></i> Search  </span></a>
                        </li>
                        <?php
                            if (!isset($_SESSION['username'])){
                                ?>
                                <li class="nav-item <?php if(isset($_GET['go']) && $_GET['go'] === 'join'){ echo 'active';} ?>">
                                    <a class="nav-link" href="index.php?go=join">Join Us</a>
                                </li>
                                <?php
                            } else {
                                ?>
                                <li class="nav-item dropdown <?php if(isset($_GET['go']) && $_GET['go'] === 'profile'){ echo 'active';} ?>">
                                    <?php
//                                        include $user;
                                        $user = new user($con);
                                        $visitor = $user -> view($_SESSION['id']);
                                    ?>
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       <?php
//                                            if (empty($visitor['avater'])){
//                                                ?>
<!--                                                <i class="fa fa-user"></i>-->
<!--                                                --><?php
//                                            } else {
//                                                ?>
<!--                                                <img src="--><?php //echo $avaterPath . $visitor['avater'];?><!--"-->
<!--                                                     class="img-thumbnail rounded-circle"-->
<!--                                                     style="width: 40px;height: 40px" />-->
<!--                                                --><?php
//                                            }
                                       ?>

                                        <i class="fa fa-user"></i> <?php echo $visitor['name']; ?>
                                    </a>
                                    <?php
                                        if ($visitor['GroupID'] == 1){
                                            ?>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                                <a class="dropdown-item" href="admin/index.php?go=dashboard">Dashboard</a>
                                                <a class="dropdown-item" href="index.php?go=logout">logout</a>
                                            </div>
                                            <?php
                                        } else {
                                            ?>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                                <a class="dropdown-item" href="index.php?go=profile">Profile</a>
                                                <a class="dropdown-item" href="index.php?go=logout">logout</a>
                                            </div>
                                            <?php
                                        }
                                    ?>
                                </li>
                                <?php
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>


       
        <div id="demo" class="carousel slide" data-ride="carousel" style="width:100%">

                <!-- Indicators -->
                <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
                </ul>

                <!-- The slideshow -->
                <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{asset($slider1->path)}}" alt="Los Angeles">
                </div>
                <div class="carousel-item">
                    <img src="{{asset($slider2->path)}}" alt="Chicago">
                </div>
                <div class="carousel-item">
                    <img src="{{asset($slider3->path)}}" alt="New York">
                </div>
                </div>

                <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
                </a>

        </div>



        <div class="parent">
            <div class="row" style="width:85%; margin:auto">
                <div class="col-lg-4 col-sm-12">
                    <div class="image">
                        <img src="{{asset('http://localhost:8000/storage/43.jpg')}}" style="margin-top:70px">
                    </div>
                </div>
                <div class="col-lg-8 col-sm-12" style="margin-top:32px">
                    <div class="info row">
                        <div class="col-md-6 col-sm-12">
                            <div class="h-75">
                                <h4>   SEE ALL SERVICES  </h4>  <hr>
                                <span class="d-flex justify-content-center">
                                    <a href="{{route('welcome')}}" class="btn rounded-0 mb-2"> All services </a>
                                </span>
                            </div>
                        </div>
                        <?php
                            
                            foreach ($depts as $dept){
                                ?>
                                <div class="col-md-6 col-sm-12 text-center">
                                    <div>
                                        <i class="<?php if(strtolower($dept['name']) == "bedroom"){
                                                            echo 'fas fa-bed fa-5x';
                                                        } elseif(strtolower($dept['name']) == 'living room'){
                                                            echo 'fas fa-couch fa-5x';
                                                        } elseif (strtolower($dept['name']) == 'dining room'){
                                                            echo 'fas fa-chair fa-5x';
                                                        } else {
                                                            echo 'fas fa-chair fa-5x';
                                                        } ?> mt-1 "
                                        style="color:rgb(207, 67, 86);"></i>
                                        <h5 class="text-capitalize"> <?php echo $dept['name'] ?> </h5> <hr>
                                        <p> <?php echo $dept['description'] ?> </p>
                                    </div>
                                </div>
                                <?php
                            }
                        ?>

                </div>
            </div>
        </div>



        <div class="Projects">
              <h2>  Latest Items  </h2>
              <p> We know furniture shopping is not easy. Visit us, and let our experts give you a hand. Enjoy the ultimate shopping experience. At DE.CI Home, we strive to make things easier and better, by providing you with what suits you the most.</p>  <br>
        </div>



        <div class="portfolio">
            <div class="row">
                <?php
                  
                    foreach ($items as $item){
                        ?>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <a href="index.php?go=item&id=<?php echo $item['ID']; ?>"><img src="{{asset($item->img)}}"></a>
                        </div>
                        <?php
                    }
                ?>
            </div>
         </div>




         
        <div class="footer">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="first">
                        <ul>
                            <li>   <i class="fas fa-map-marker-alt" style="font-size: 25px;width: 20px;color: rgb(207, 67, 86);margin-left: 10px;margin-right: 15px ;"></i> Revolution Street Egypt  </li> <br> <br>
                            <li>   <i class="fas fa-phone" style="font-size: 25px;width: 20px;color: rgb(207, 67, 86);margin-left: 10px;margin-right: 15px ;"></i> +15543543</li> <Br>   <br>
                            <li>   <i class="fas fa-envelope" style="font-size: 25px;width: 20px;color: rgb(207, 67, 86);margin-left: 10px;margin-right: 15px ;"></i> Support@company.com </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="end">
                        <h3> About The Company </h3>
                        <p class="p-2">This company Don`t have a page on facebook, twitter, linked . It`s Experimental Website and This is icons for design</p>
                        <ul>
                            <li>   <i class="fab fa-facebook" style="font-size: 25px;width: 20px;color: rgb(207, 67, 86);margin-left: 10px;margin-right: 15px ;"></i>  </li>
                            <li>   <i class="fab fa-twitter" style="font-size: 25px;width: 20px;color: rgb(207, 67, 86);margin-left: 10px;margin-right: 15px ;"></i> </li>
                            <li>   <i class="fab fa-linkedin-in" style="font-size: 25px;width: 20px;color: rgb(207, 67, 86);margin-left: 10px;margin-right: 15px ;"></i> </li>
                            <li>   <i class="fab fa-github" style="font-size: 25px;width: 20px;color: rgb(207, 67, 86);margin-left: 10px;margin-right: 15px ;"></i> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>




        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
