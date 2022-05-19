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
                            <a class="nav-link" href="index.php?go=search"><i class="fa fa-search"></i> Search  </span></a>
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


        <div class="container">
            <div class="departments">
                <div class="row">
                    <?php
                        foreach ($departments as $department){
                            ?>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <a href="{{route('items',['departmentId',$department->id])}}"><img src="{{asset($department->img)}}"></a>
                                <h3> {{ $department->name }} </h3>
                            </div>
                            <?php
                        }
                    ?>
                </div>
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
