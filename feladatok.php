<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap\css\bootstrap.min.css">
    <script src="bootstrap\js\bootstrap.bundle.js"></script>

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="#" aria-current="page">Home <span
                                class="visually-hidden">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">Dropdown</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            <a class="dropdown-item" href="#">Action 1</a>
                            <a class="dropdown-item" href="#">Action 2</a>
                        </div>
                    </li>
                </ul>
                <form class="d-flex my-2 my-lg-0">
                    <input class="form-control me-sm-2" type="text" placeholder="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
   <div class="container">
        <div class="row mt-3 text-center">
            <div class="col">
                <h1>Feladat: 3.2:</h1>
                <hr>
            </div>
        </div>
        <div class="row text-center">
            <div class="col"></div>
            <div class="col-6">
                    <div class="card">
                        <h5 class="m-2">Adatbekérő form:</h5>
                        <div class="card-body">
                            <h4 class="card-title text-center">Adatok</h4>
                            <form class="text-end" action="" method="GET" name='form_1'>
                                <input class="form-control mb-2" type="number" name="szam_1" id="szam_1">
                                <button class="btn btn-outline-primary mt-2 mb-2" type='submit'name="submit">Küldés</button>
                            </form>
                            <?php 
   
   if (isset($_GET['submit'])) {
   if (isset($_GET['szam_1']) && is_numeric($_GET['szam_1'])) {
    $atkertszam = $_GET['szam_1'];
    
        $x = $atkertszam;
        if ($x % 3 == 0) {
            echo "<p>" . $x . " osztható 3-mal.</p>";
        } else {
            echo "<p>" . $x . " nem oszthato 3-mal.</p>";
        }
        if ($x % 4 == 0) {
            echo "<p>" . $x . " osztható 4-el.</p>";
        } else {
            echo "<p>" . $x . " nem oszthato 4-el.</p>";
        }
        if ($x % 9 == 0) {
            echo "<p>" . $x . " osztható 9-el.</p>";
        } else {
            echo "<p>" . $x . " nem oszthato 9-el.</p>";
        }
        
   }
   else {
   // echo 'Nem szám.';
   }
   }
   ?>
   <p>A bekért szám: <?php echo isset($atkertszam)?$atkertszam:''; ?></p>
    <!--    
         -->
                        </div>
                    </div>
            </div>
            <div class="col-3"></div>
        </div>
        <div class="row mt-3 text-center">
            <div class='col'></div>
             <div class="col-6">
                <h1>Feladat: 3.3:</h1>
                <hr>
                <div class="card">
                        <h5 class="m-2">Adatbekérő form:</h5>
                        <div class="card-body">
                            <h4 class="card-title text-center">Adatok</h4>
                            <form class="text-end" action="" method="GET" name='form_2'>
                                <input class="form-control mb-2" type="number" name="szam_2" id="szam_2">
                                <select class="form-select" name="muvelet" id="muvelet">
                                    <option value="" disabled select>Kérlek válasz</option>
                                    <option value="celsius">Celsiusból</option>
                                    <option value="fahren">Fahrenből</option>
                                </select>
                                <button class="btn btn-outline-primary mt-2 mb-2" type="submit" name="submit1">Küldés</button>
                            </form>
                            </div>
                            <?php 
                
                if (isset($_GET['submit1'])) {
                    if (isset($_GET['szam_2']) && is_numeric($_GET['szam_2'])) {
                        $muvelet=$_GET['szam_2'];
                        switch ($_GET['muvelet']) {
                            case 'celsius':
                                $eredmeny=$muvelet*1.8+32;
                                break;
                                case 'fahren':
                                    $eredmeny=($muvelet-32)/1.8;
                                    break;
                                    default:
                                    $eredmeny= 'Szar';
                                    break;
                                }
                                echo '<p>Az átváltott szám:</p>';
                                echo $eredmeny;
                            }
                            else {
                                // echo 'Nem szám.';
                            }
                        }
                        ?>
            </div>
        </div>
            <div class='col'></div>
        </div>
        <div class="row mt-3 text-center">
        <div class="col"></div>
            <div class="col-6">
            <h1>Feladat: 3.4:</h1>
                <hr>
                    <div class="card">
                        <h5 class="m-2">Adatbekérő form:</h5>
                        <div class="card-body">
                            <h4 class="card-title text-center">Adatok</h4>
                            <form class="text-end" action="" method="GET" name='form_3'>
                                <input class="form-control mb-2" type="number" name="magassag" id="magassag" placeholder="Magassag (cm)">
                                <input class="form-control mb-2" type="number" name="testsuly" id="testsuly" placeholder="Testsuly (kg)"> 
                                <button class="btn btn-outline-primary mt-2 mb-2" type='submit'name="submit">Küldés</button>
                            </form>
                            <?php 
                                if (isset($_GET['submit'])) {
                                if (isset($_GET['magassag'])&&isset($_GET['testsuly'])) {
                                if(is_numeric($_GET['magassag'])&&is_numeric(($_GET['testsuly']))){
                                    $magassag = $_GET['magassag']/100;
                                    $testtomeg = $_GET['testsuly'];
                                    $eredmeny=$testtomeg / pow($magassag,2);
                                        }
                                    }
                                }  
                            ?>
                            <p>ABMI index:
                                <?php echo isset($eredmeny) ?$eredmeny:""; ?>
                            </p>
                        </div>
                </div>
            </div>
    <div class="col"></div>
    <div class="row mt-3 text-center">
        <div class="col"></div>
            <div class="col-6">
            <h1>Feladat: 3.5:</h1>
                <hr>
                    <div class="card">
                        <h5 class="m-2">Adatbekérő form:</h5>
                        <div class="card-body">
                            <h4 class="card-title text-center">Adatok</h4>
                            <form class="text-end" action="" method="GET" name='form_3'>
                                <input class="form-control mb-2" type="number" name="vizho" id="vizho" placeholder="Víz hőmérséklete (°C)">
                                <button class="btn btn-outline-primary mt-2 mb-2" type='submit'name="submit">Küldés</button>
                            </form>
                            <?php 
                                if (isset($_GET['submit'])) {
                                if (isset($_GET['vizho'])) {
                                if(is_numeric($_GET['vizho'])){
                                    $vizho =$_GET['vizho'];
                                        }
                                    }
                                }
                                if (isset($vizho)) {
                                    switch ($vizho) {
                                        case $vizho<=0:
                                            $allapot='jég';
                                            break;
                                        case $vizho >=100:
                                            $allapot='gőz';
                                            break;
                                        case $vizho >0 && $vizho<100:
                                            $allapot = 'folyékony';
                                            break;
                                        }  
                                    }
                            ?>
                            <p>Víz állapota:
                                <?php echo isset($allapot)?$allapot:"" ?>
                            </p>
                        </div>
                </div>
            </div>
    <div class="col"></div>
    <div class="row mt-3 text-center">
        <div class="col"></div>
            <div class="col-6">
            <h1>Feladat: 3.6:</h1>
                <hr>
                    <div class="card">
                        <h5 class="m-2">Adatbekérő form:</h5>
                        <div class="card-body">
                            <h4 class="card-title text-center">Adatok</h4>
                            <form class="text-end" action="" method="GET" name='form_5'>
                                <input class="form-control mb-2" type="number" name="x1" id="x1" placeholder="X1">
                                <input class="form-control mb-2" type="number" name="y1" id="y1" placeholder="Y1"> 
                                <input class="form-control mb-2" type="number" name="x2" id="x2" placeholder="X2">
                                <input class="form-control mb-2" type="number" name="y2" id="y2" placeholder="Y2"> 
                                <button class="btn btn-outline-primary mt-2 mb-2" type='submit'name="submit">Küldés</button>
                            </form>
                            <?php 
                                if (isset($_GET['submit'])) {
                                if (isset($_GET['x1'])&&isset($_GET['x2'])&&isset($_GET['y2'])&&isset($_GET['y1'])) {
                                    if(is_numeric($_GET['x1'])&& is_numeric($_GET['x2'])&& is_numeric($_GET['y2'])&& is_numeric($_GET['y1'])){
                                    $x1=$_GET['x1'];
                                    $x2=$_GET['x2'];
                                    $y1=$_GET['y1'];
                                    $y2=$_GET['y2'];
                                    $eredmeny = sqrt(($x1-$x2)*($x1-$x2)+($y2-$y1)*($y2-$y1));
                                        }
                                    }
                                }  
                            ?>
                            <p>A két pont távolsága:
                                <?php echo isset($eredmeny)? $eredmeny:"" ;?>
                            </p>
                        </div>
                </div>
            </div>
    <div class="col"></div>
   </div> 
     
</body>

</html>

<!--
<h1>Feladatok</h1>
        


-->