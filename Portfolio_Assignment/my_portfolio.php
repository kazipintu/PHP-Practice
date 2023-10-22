<?php

    include 'folio_db_config.php';

    $select_sql = "SELECT * FROM about_table";
    $result = mysqli_query($connect, $select_sql);
    $row = mysqli_fetch_assoc($result);

    $name =  $row['name'];
    $name = explode (' ', $name);

    $exp_sql = "SELECT * FROM exp_table";
    $exp_result = mysqli_query($connect, $exp_sql);
    $exp_row = mysqli_fetch_assoc($exp_result);

    $edu_sql = "SELECT * FROM edu_table";
    $edu_result = mysqli_query($connect, $edu_sql);
    $edu_rows = mysqli_num_rows($edu_result);
    
    $sk_sql = "SELECT * FROM skill_table";
    $sk_result = mysqli_query($connect, $sk_sql);
    $sk_rows = mysqli_num_rows($sk_result);

    $int_sql = "SELECT * FROM int_table";
    $int_result = mysqli_query($connect, $int_sql);
    $int_rows = mysqli_num_rows($int_result);

    $award_sql = "SELECT * FROM award_table";
    $award_result = mysqli_query($connect, $award_sql);
    $award_rows = mysqli_num_rows($award_result);

    // var_dump($name);
    // die();
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Experience - Afzaluddin Kazi</title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">
                <span class="d-block d-lg-none">Afzaluddin Kazi</span>
                <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="<?php echo $row['image']; ?>" alt="..." /></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#experience">Experience</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#education">Education</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#skills">Skills</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#interests">Interests</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#awards">Awards</a></li>
                </ul>
            </div>
        </nav>
        <!-- Page Content-->
        <div class="container-fluid p-0">
            <!-- About-->
            <section class="resume-section" id="about">
                <div class="resume-section-content">
                    <h1 class="mb-0">
                        <?php echo $name [0]; ?>
                        <span class="text-primary"> <?php echo $name [1]; ?> </span>
                    </h1>
                    <div class="subheading mb-5">
                        <?php 
                            echo $row ['address']."<br>"; 
                            echo $row ['contact']."<br>";
                        ?>
                        <a href="mailto:name@email.com"><?php echo $row ['email']; ?></a>
                        
                    </div>
                    <p class="lead mb-5"><?php echo $row ['description']; ?></p>
                    <div class="social-icons">
                        <a class="social-icon" href="<?php echo $row ['linkedin']; ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                        <a class="social-icon" href="<?php echo $row ['github']; ?>" target="_blank"><i class="fab fa-github"></i></a>
                        <!-- <a class="social-icon" href="#!"><i class="fab fa-twitter"></i></a>
                        <a class="social-icon" href="#!"><i class="fab fa-facebook-f"></i></a> -->
                    </div>
                </div>
            </section>
            <hr class="m-0" />
            <!-- Experience-->
            <section class="resume-section" id="experience">
                <div class="resume-section-content">
                    <h2 class="mb-5">Experience</h2>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">
                                <?php
                                    for ($i = 0; $i < 2; $i++) {
                                        $exp_row = mysqli_fetch_assoc($exp_result); 
                                    }
                                    echo $exp_row['designation'];
                                ?>
                            </h3>
                            <div class="subheading mb-3">
                                <?php
                                    echo $exp_row['company']; 
                                ?>
                            </div>
                                <p>
                                    <?php                                
                                        echo $exp_row['role']; 
                                    ?>
                                </p>
                        </div>
                        <div class="flex-shrink-0">
                            <span class="text-primary">
                                <?php
                                    echo $exp_row['period']; 
                                ?>
                            </span>
                        </div>
                    </div>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">
                                <?php
                                    mysqli_data_seek($exp_result, 0);
                                    for ($i = 0; $i <= 1; $i++) {
                                    $exp_row = mysqli_fetch_assoc($exp_result); 
                                    }
                                    echo $exp_row['designation'];
                                ?>
                            </h3>
                        <div class="subheading mb-3">
                            <?php
                                echo $exp_row['company']; 
                            ?>
                        </div>
                            <p>
                                <?php
                                    echo $exp_row['role']; 
                                ?>
                            </p>
                        </div>
                        <div class="flex-shrink-0">
                            <span class="text-primary">
                                <?php
                                    echo $exp_row['period']; 
                                ?>
                            </span>
                        </div>
                    </div>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">
                                <?php
                                    mysqli_data_seek($exp_result, 0);
                                    for ($i = 0; $i < 1; $i++) {
                                    $exp_row = mysqli_fetch_assoc($exp_result); 
                                    }
                                    echo $exp_row['designation'];
                                ?>
                            </h3>
                        <div class="subheading mb-3">
                            <?php
                                echo $exp_row['company']; 
                            ?>
                        </div>
                            <p> 
                                <?php
                                    echo $exp_row['role']; 
                                ?>.
                            </p>
                        </div>
                        <div class="flex-shrink-0">
                            <span class="text-primary">
                                <?php
                                    echo $exp_row['period']; 
                                ?>
                            </span>
                        </div>
                    </div>
                    <!-- <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">
                                <?php
                                    mysqli_data_seek($exp_result, 0);
                                    for ($i = 0; $i <= 3; $i++) {
                                    $exp_row = mysqli_fetch_assoc($exp_result); 
                                    }
                                    echo $exp_row['designation'];
                                ?>
                            </h3>
                        <div class="subheading mb-3">
                            <?php
                                echo $exp_row['company']; 
                            ?>
                        </div>
                            <p>
                                <?php
                                    echo $exp_row['role']; 
                                ?>.
                            </p>
                        </div>
                        <div class="flex-shrink-0"><span class="text-primary">September 2008 - June 2010</span></div>
                    </div> -->
                </div>
            </section>
            <hr class="m-0" />
            <!-- Education-->
            <section class="resume-section" id="education">
                <div class="resume-section-content">
                    <h2 class="mb-5">Education, Training & Certification</h2>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">
                                <?php
                                    mysqli_data_seek($edu_result, 0);
                                    for ($i = 0; $i <= 0; $i++) {
                                    $edu_row = mysqli_fetch_assoc($edu_result); 
                                    }
                                    echo $edu_row['college'];
                                ?>
                            </h3>
                            <div class="subheading mb-3">
                                <?php                                   
                                    echo $edu_row['degree'];
                                ?>
                            </div>
                            <div>
                                <?php                                   
                                    echo $edu_row['major'];
                                ?>
                            </div>
                            <p>
                                <?php                                
                                    echo $edu_row['score'];
                                ?>
                            </p>
                        </div>
                        <div class="flex-shrink-0">
                            <span class="text-primary">
                                <?php                                   
                                    echo $edu_row['period'];
                                ?>
                            </span>
                        </div>
                    </div>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">
                                <?php
                                    mysqli_data_seek($edu_result, 0);
                                    for ($i = 0; $i <= 1; $i++) {
                                    $edu_row = mysqli_fetch_assoc($edu_result); 
                                    }
                                    echo $edu_row['college'];
                                ?>
                            </h3>
                            <div class="subheading mb-3">
                                <?php                                   
                                    echo $edu_row['degree'];
                                ?>
                            </div>
                            <div>
                                <?php                                   
                                    echo $edu_row['major'];
                                ?>
                            </div>
                            <p>
                                <?php
                                    echo $edu_row['score'];
                                ?>
                            </p>
                        </div>
                        <div class="flex-shrink-0">
                            <span class="text-primary">
                                <?php
                                    echo $edu_row['period'];
                                ?>
                            </span>
                        </div>
                    </div>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">
                                <?php
                                    mysqli_data_seek($edu_result, 0);
                                    for ($i = 0; $i <= 11; $i++) {
                                    $edu_row = mysqli_fetch_assoc($edu_result); 
                                    }
                                    echo $edu_row['college'];
                                ?>
                            </h3>
                            <div class="subheading mb-3">
                                <?php                                   
                                    echo $edu_row['degree'];
                                ?>
                            </div>
                            <div>
                                <?php                                   
                                    echo $edu_row['major'];
                                ?>
                            </div>
                            <p>
                                <?php
                                    echo $edu_row['score'];
                                ?>
                            </p>
                        </div>
                        <div class="flex-shrink-0">
                            <span class="text-primary">
                                <?php
                                    echo $edu_row['period'];
                                ?>
                            </span>
                        </div>
                    </div>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">
                                <?php
                                    mysqli_data_seek($edu_result, 0);
                                    for ($i = 0; $i <= 10; $i++) {
                                    $edu_row = mysqli_fetch_assoc($edu_result); 
                                    }
                                    echo $edu_row['college'];
                                ?>
                            </h3>
                            <div class="subheading mb-3">
                                <?php                                   
                                    echo $edu_row['degree'];
                                ?>
                            </div>
                            <div>
                                <?php                                   
                                    echo $edu_row['major'];
                                ?>
                            </div>
                            <p>
                                <?php
                                    echo $edu_row['score'];
                                ?>
                            </p>
                        </div>
                        <div class="flex-shrink-0">
                            <span class="text-primary">
                                <?php
                                    echo $edu_row['period'];
                                ?>
                            </span>
                        </div>
                    </div>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">
                                <?php
                                    mysqli_data_seek($edu_result, 0);
                                    for ($i = 0; $i <= 2; $i++) {
                                    $edu_row = mysqli_fetch_assoc($edu_result); 
                                    }
                                    echo $edu_row['college'];
                                ?>
                            </h3>
                            <div class="subheading mb-3">
                                <?php                                   
                                    echo $edu_row['degree'];
                                ?>
                            </div>
                            <div>
                                <?php                                   
                                    echo $edu_row['major'];
                                ?>
                            </div>
                            <p>
                                <?php
                                    echo $edu_row['score'];
                                ?>
                            </p>
                        </div>
                        <div class="flex-shrink-0">
                            <span class="text-primary">
                                <?php
                                    echo $edu_row['period'];
                                ?>
                            </span>
                        </div>
                    </div>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">
                                <?php
                                    mysqli_data_seek($edu_result, 0);
                                    for ($i = 0; $i <= 3; $i++) {
                                    $edu_row = mysqli_fetch_assoc($edu_result); 
                                    }
                                    echo $edu_row['college'];
                                ?>
                            </h3>
                            <div class="subheading mb-3">
                                <?php                                   
                                    echo $edu_row['degree'];
                                ?>
                            </div>
                            <div>
                                <?php                                   
                                    echo $edu_row['major'];
                                ?>
                            </div>
                            <p>
                                <?php
                                    echo $edu_row['score'];
                                ?>
                            </p>
                        </div>
                        <div class="flex-shrink-0">
                            <span class="text-primary">
                                <?php
                                    echo $edu_row['period'];
                                ?>
                            </span>
                        </div>
                    </div>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">
                                <?php
                                    mysqli_data_seek($edu_result, 0);
                                    for ($i = 0; $i <= 5; $i++) {
                                    $edu_row = mysqli_fetch_assoc($edu_result); 
                                    }
                                    echo $edu_row['college'];
                                ?>
                            </h3>
                            <div class="subheading mb-3">
                                <?php                                   
                                    echo $edu_row['degree'];
                                ?>
                            </div>
                            <div>
                                <?php                                   
                                    echo $edu_row['major'];
                                ?>
                            </div>
                            <p>
                                <?php
                                    echo $edu_row['score'];
                                ?>
                            </p>
                        </div>
                        <div class="flex-shrink-0">
                            <span class="text-primary">
                                <?php
                                    echo $edu_row['period'];
                                ?>
                            </span>
                        </div>
                    </div>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">
                                <?php
                                    mysqli_data_seek($edu_result, 0);
                                    for ($i = 0; $i <= 6; $i++) {
                                    $edu_row = mysqli_fetch_assoc($edu_result); 
                                    }
                                    echo $edu_row['college'];
                                ?>
                            </h3>
                            <div class="subheading mb-3">
                                <?php                                   
                                    echo $edu_row['degree'];
                                ?>
                            </div>
                            <div>
                                <?php                                   
                                    echo $edu_row['major'];
                                ?>
                            </div>
                            <p>
                                <?php
                                    echo $edu_row['score'];
                                ?>
                            </p>
                        </div>
                        <div class="flex-shrink-0">
                            <span class="text-primary">
                                <?php
                                    echo $edu_row['period'];
                                ?>
                            </span>
                        </div>
                    </div>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">
                                <?php
                                    mysqli_data_seek($edu_result, 0);
                                    for ($i = 0; $i <= 9; $i++) {
                                    $edu_row = mysqli_fetch_assoc($edu_result); 
                                    }
                                    echo $edu_row['college'];
                                ?>
                            </h3>
                            <div class="subheading mb-3">
                                <?php                                   
                                    echo $edu_row['degree'];
                                ?>
                            </div>
                            <div>
                                <?php                                   
                                    echo $edu_row['major'];
                                ?>
                            </div>
                            <p>
                                <?php
                                    echo $edu_row['score'];
                                ?>
                            </p>
                        </div>
                        <div class="flex-shrink-0">
                            <span class="text-primary">
                                <?php
                                    echo $edu_row['period'];
                                ?>
                            </span>
                        </div>
                    </div>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">
                                <?php
                                    mysqli_data_seek($edu_result, 0);
                                    for ($i = 0; $i <= 7; $i++) {
                                    $edu_row = mysqli_fetch_assoc($edu_result); 
                                    }
                                    echo $edu_row['college'];
                                ?>
                            </h3>
                            <div class="subheading mb-3">
                                <?php                                   
                                    echo $edu_row['degree'];
                                ?>
                            </div>
                            <div>
                                <?php                                   
                                    echo $edu_row['major'];
                                ?>
                            </div>
                            <p>
                                <?php
                                    echo $edu_row['score'];
                                ?>
                            </p>
                        </div>
                        <div class="flex-shrink-0">
                            <span class="text-primary">
                                <?php
                                    echo $edu_row['period'];
                                ?>
                            </span>
                        </div>
                    </div>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">
                                <?php
                                    mysqli_data_seek($edu_result, 0);
                                    for ($i = 0; $i <= 8; $i++) {
                                    $edu_row = mysqli_fetch_assoc($edu_result); 
                                    }
                                    echo $edu_row['college'];
                                ?>
                            </h3>
                            <div class="subheading mb-3">
                                <?php                                   
                                    echo $edu_row['degree'];
                                ?>
                            </div>
                            <div>
                                <?php                                   
                                    echo $edu_row['major'];
                                ?>
                            </div>
                            <p>
                                <?php
                                    echo $edu_row['score'];
                                ?>
                            </p>
                        </div>
                        <div class="flex-shrink-0">
                            <span class="text-primary">
                                <?php
                                    echo $edu_row['period'];
                                ?>
                            </span>
                        </div>
                    </div>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">
                                <?php
                                    mysqli_data_seek($edu_result, 0);
                                    for ($i = 0; $i <= 4; $i++) {
                                    $edu_row = mysqli_fetch_assoc($edu_result); 
                                    }
                                    echo $edu_row['college'];
                                ?>
                            </h3>
                            <div class="subheading mb-3">
                                <?php                                   
                                    echo $edu_row['degree'];
                                ?>
                            </div>
                            <div>
                                <?php                                   
                                    echo $edu_row['major'];
                                ?>
                            </div>
                            <p>
                                <?php
                                    echo $edu_row['score'];
                                ?>
                            </p>
                        </div>
                        <div class="flex-shrink-0">
                            <span class="text-primary">
                                <?php
                                    echo $edu_row['period'];
                                ?>
                            </span>
                        </div>
                    </div>
                </div>
            </section>
            <hr class="m-0" />
            <!-- Skills-->
            <section class="resume-section" id="skills">
                <div class="resume-section-content">
                    <h2 class="mb-5">Skills</h2>
                    <div class="subheading mb-3">Programming Languages & Tools</div>
                    <ul class="list-inline dev-icons">
                        <li class="list-inline-item"><i class="fab fa-html5"></i></li>
                        <li class="list-inline-item"><i class="fab fa-css3-alt"></i></li>
                        <li class="list-inline-item"><i class="fab fa-js-square"></i></li>
                        <li class="list-inline-item"><i class="fab fa-angular"></i></li>
                        <li class="list-inline-item"><i class="fab fa-react"></i></li>
                        <li class="list-inline-item"><i class="fab fa-node-js"></i></li>
                        <li class="list-inline-item"><i class="fab fa-sass"></i></li>
                        <li class="list-inline-item"><i class="fab fa-less"></i></li>
                        <li class="list-inline-item"><i class="fab fa-wordpress"></i></li>
                        <li class="list-inline-item"><i class="fab fa-gulp"></i></li>
                        <li class="list-inline-item"><i class="fab fa-grunt"></i></li>
                        <li class="list-inline-item"><i class="fab fa-npm"></i></li>
                    </ul>
                    <div class="subheading mb-3">Skill-sets</div>
                    <ul class="fa-ul mb-0">
                        <li>
                            <span class="fa-li"><i class="fas fa-check"></i></span>
                                <?php
                                    mysqli_data_seek($sk_result, 0);
                                    for ($i = 0; $i <= 0; $i++) {
                                    $sk_row = mysqli_fetch_assoc($sk_result); 
                                    }
                                    echo $sk_row['skill'];
                                ?>
                        </li>
                        <li>
                            <span class="fa-li"><i class="fas fa-check"></i></span>
                                <?php
                                    mysqli_data_seek($sk_result, 0);
                                    for ($i = 0; $i <= 2; $i++) {
                                    $sk_row = mysqli_fetch_assoc($sk_result); 
                                    }
                                    echo $sk_row['skill'];
                                ?>
                        </li>
                        <li>
                            <span class="fa-li"><i class="fas fa-check"></i></span>
                                <?php
                                    mysqli_data_seek($sk_result, 0);
                                    for ($i = 0; $i <= 1; $i++) {
                                    $sk_row = mysqli_fetch_assoc($sk_result); 
                                    }
                                    echo $sk_row['skill'];
                                ?>
                        </li>
                        <li>
                            <span class="fa-li"><i class="fas fa-check"></i></span>
                                <?php
                                    mysqli_data_seek($sk_result, 0);
                                    for ($i = 0; $i <= 3; $i++) {
                                    $sk_row = mysqli_fetch_assoc($sk_result); 
                                    }
                                    echo $sk_row['skill'];
                                ?>
                        </li>
                        <li>
                            <span class="fa-li"><i class="fas fa-check"></i></span>
                                <?php
                                    mysqli_data_seek($sk_result, 0);
                                    for ($i = 0; $i <= 4; $i++) {
                                    $sk_row = mysqli_fetch_assoc($sk_result); 
                                    }
                                    echo $sk_row['skill'];
                                ?>
                        </li>
                        <li>
                            <span class="fa-li"><i class="fas fa-check"></i></span>
                                <?php
                                    mysqli_data_seek($sk_result, 0);
                                    for ($i = 0; $i <= 5; $i++) {
                                    $sk_row = mysqli_fetch_assoc($sk_result); 
                                    }
                                    echo $sk_row['skill'];
                                ?>
                        </li>
                        <li>
                            <span class="fa-li"><i class="fas fa-check"></i></span>
                                <?php
                                    mysqli_data_seek($sk_result, 0);
                                    for ($i = 0; $i <= 6; $i++) {
                                    $sk_row = mysqli_fetch_assoc($sk_result); 
                                    }
                                    echo $sk_row['skill'];
                                ?>
                        </li>
                        <li>
                            <span class="fa-li"><i class="fas fa-check"></i></span>
                                <?php
                                    mysqli_data_seek($sk_result, 0);
                                    for ($i = 0; $i <= 7; $i++) {
                                    $sk_row = mysqli_fetch_assoc($sk_result); 
                                    }
                                    echo $sk_row['skill'];
                                ?>
                        </li>
                        <li>
                            <span class="fa-li"><i class="fas fa-check"></i></span>
                                <?php
                                    mysqli_data_seek($sk_result, 0);
                                    for ($i = 0; $i <= 8; $i++) {
                                    $sk_row = mysqli_fetch_assoc($sk_result); 
                                    }
                                    echo $sk_row['skill'];
                                ?>
                        </li>
                        <li>
                            <span class="fa-li"><i class="fas fa-check"></i></span>
                                <?php
                                    mysqli_data_seek($sk_result, 0);
                                    for ($i = 0; $i <= 9; $i++) {
                                    $sk_row = mysqli_fetch_assoc($sk_result); 
                                    }
                                    echo $sk_row['skill'];
                                ?>
                        </li>
                        <li>
                            <span class="fa-li"><i class="fas fa-check"></i></span>
                                <?php
                                    mysqli_data_seek($sk_result, 0);
                                    for ($i = 0; $i <= 10; $i++) {
                                    $sk_row = mysqli_fetch_assoc($sk_result); 
                                    }
                                    echo $sk_row['skill'];
                                ?>
                        </li>
                        <li>
                            <span class="fa-li"><i class="fas fa-check"></i></span>
                                <?php
                                    mysqli_data_seek($sk_result, 0);
                                    for ($i = 0; $i <= 11; $i++) {
                                    $sk_row = mysqli_fetch_assoc($sk_result); 
                                    }
                                    echo $sk_row['skill'];
                                ?>
                        </li>
                        <li>
                            <span class="fa-li"><i class="fas fa-check"></i></span>
                                <?php
                                    mysqli_data_seek($sk_result, 0);
                                    for ($i = 0; $i <= 12; $i++) {
                                    $sk_row = mysqli_fetch_assoc($sk_result); 
                                    }
                                    echo $sk_row['skill'];
                                ?>
                        </li>
                        <li>
                            <span class="fa-li"><i class="fas fa-check"></i></span>
                                <?php
                                    mysqli_data_seek($sk_result, 0);
                                    for ($i = 0; $i <= 13; $i++) {
                                    $sk_row = mysqli_fetch_assoc($sk_result); 
                                    }
                                    echo $sk_row['skill'];
                                ?>
                        </li>
                    </ul>
                </div>
            </section>
            <hr class="m-0" />
            <!-- Interests-->
            <section class="resume-section" id="interests">
                <div class="resume-section-content">
                    <h2 class="mb-5">HOBBIES AND INTERESTS</h2>
                    <p>
                        <?php
                            mysqli_data_seek($int_result, 0);
                            for ($i = 0; $i <= 0; $i++) {
                            $int_row = mysqli_fetch_assoc($int_result); 
                            }
                            echo $int_row['interest'].'<br>';

                            echo '<a href="https://my.raceresult.com/101575/?lang=th#4_7CC0FF" target="_blank">Marathon result link</a><br>';

                            echo '<a href="https://adnocabudhabimarathon.inphota.com/en/album/2018-adnoc-abu-dhabi-marathon/?keyword=582" target="_blank">Marathon photos link</a>';
                        ?>
                    </p>
                    <p class="mb-0">
                        <?php
                            mysqli_data_seek($int_result, 0);
                            for ($i = 0; $i <= 1; $i++) {
                            $int_row = mysqli_fetch_assoc($int_result); 
                            }
                            echo $int_row['interest'].'<br>';
                        ?>
                    </p>
                </div>
            </section>
            <hr class="m-0" />
            <!-- Awards-->
            <section class="resume-section" id="awards">
                <div class="resume-section-content">
                    <h2 class="mb-5">AWARDS & ACHIEVEMENTS</h2>
                    <ul class="fa-ul mb-0">
                        <li>
                            <span class="fa-li"><i class="fas fa-trophy text-warning"></i></span>
                                    <?php
                                        mysqli_data_seek($award_result, 0);
                                        for ($i = 0; $i <= 2; $i++) {
                                        $award_row = mysqli_fetch_assoc($award_result); 
                                        }
                                        echo $award_row['award'];
                                    ?>
                        </li>
                        <li>
                            <span class="fa-li"><i class="fas fa-trophy text-warning"></i></span>
                                    <?php
                                        mysqli_data_seek($award_result, 0);
                                        for ($i = 0; $i <= 0; $i++) {
                                        $award_row = mysqli_fetch_assoc($award_result); 
                                        }
                                        echo $award_row['award'];
                                    ?>
                        </li>
                        <li>
                            <span class="fa-li"><i class="fas fa-trophy text-warning"></i></span>
                                    <?php
                                        mysqli_data_seek($award_result, 0);
                                        for ($i = 0; $i <= 1; $i++) {
                                        $award_row = mysqli_fetch_assoc($award_result); 
                                        }
                                        echo $award_row['award'];
                                    ?>
                        </li>
                        <li>
                            <span class="fa-li"><i class="fas fa-trophy text-warning"></i></span>
                                    <?php
                                        mysqli_data_seek($award_result, 0);
                                        for ($i = 0; $i <= 3; $i++) {
                                        $award_row = mysqli_fetch_assoc($award_result); 
                                        }
                                        echo $award_row['award'];
                                    ?>
                        </li>
                        <li>
                            <span class="fa-li"><i class="fas fa-trophy text-warning"></i></span>
                                    <?php
                                        mysqli_data_seek($award_result, 0);
                                        for ($i = 0; $i <= 4; $i++) {
                                        $award_row = mysqli_fetch_assoc($award_result); 
                                        }
                                        echo $award_row['award'];
                                    ?>
                        </li>
                        <li>
                            <span class="fa-li"><i class="fas fa-trophy text-warning"></i></span>
                                    <?php
                                        mysqli_data_seek($award_result, 0);
                                        for ($i = 0; $i <= 5; $i++) {
                                        $award_row = mysqli_fetch_assoc($award_result); 
                                        }
                                        echo $award_row['award'];
                                    ?>
                        </li>
                        <li>
                            <span class="fa-li"><i class="fas fa-trophy text-warning"></i></span>
                                    <?php
                                        mysqli_data_seek($award_result, 0);
                                        for ($i = 0; $i <= 6; $i++) {
                                        $award_row = mysqli_fetch_assoc($award_result); 
                                        }
                                        echo $award_row['award'];
                                    ?>
                        </li>
                        <li>
                            <span class="fa-li"><i class="fas fa-trophy text-warning"></i></span>
                                    <?php
                                        mysqli_data_seek($award_result, 0);
                                        for ($i = 0; $i <= 7; $i++) {
                                        $award_row = mysqli_fetch_assoc($award_result); 
                                        }
                                        echo $award_row['award'];
                                    ?>
                        </li>
                        <li>
                            <span class="fa-li"><i class="fas fa-trophy text-warning"></i></span>
                                    <?php
                                        mysqli_data_seek($award_result, 0);
                                        for ($i = 0; $i <= 8; $i++) {
                                        $award_row = mysqli_fetch_assoc($award_result); 
                                        }
                                        echo $award_row['award'];
                                    ?>
                        </li>
                        <li>
                            <span class="fa-li"><i class="fas fa-trophy text-warning"></i></span>
                                    <?php
                                        mysqli_data_seek($award_result, 0);
                                        for ($i = 0; $i <= 9; $i++) {
                                        $award_row = mysqli_fetch_assoc($award_result); 
                                        }
                                        echo $award_row['award'];
                                    ?>
                        </li>
                        <li>
                            <span class="fa-li"><i class="fas fa-trophy text-warning"></i></span>
                                    <?php
                                        mysqli_data_seek($award_result, 0);
                                        for ($i = 0; $i <= 10; $i++) {
                                        $award_row = mysqli_fetch_assoc($award_result); 
                                        }
                                        echo $award_row['award'];
                                    ?>
                        </li>
                        <li>
                            <span class="fa-li"><i class="fas fa-trophy text-warning"></i></span>
                                    <?php
                                        mysqli_data_seek($award_result, 0);
                                        for ($i = 0; $i <= 11; $i++) {
                                        $award_row = mysqli_fetch_assoc($award_result); 
                                        }
                                        echo $award_row['award'];
                                        echo $award_row['description']
                                    ?>
                        </li>
                    </ul>
                </div>
            </section>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
