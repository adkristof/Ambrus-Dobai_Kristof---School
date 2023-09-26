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
        <div class="row mt-3">

            <div class="col"></div>
            <div class="col text-center">
                <div class="card">
                <h3>3.7</h3>
                <form action="" method="GET" name="form1">

                <input class="form-control" type="number" name="pontszam" id="pontszam">
                <button class="btn btn-outline-success mt-3" type="submit" name="submit">Küldés</button>

                </form>

                <?php
                if (isset($_GET['submit'])) {
                if (isset($_GET['pontszam'])&& is_numeric($_GET['pontszam'])) {
                 $pontszam=$_GET['pontszam'];
                    switch ($pontszam) {
                        case $pontszam>=0&& $pontszam<50:
                            echo "Bukó";
                            break;
                        case $pontszam>=50 && $pontszam<65:
                            echo "Elégséges";
                         break;
                        case $pontszam>=65 && $pontszam<80:
                            echo "Közepes";
                            break;
                        case $pontszam>=80 && $pontszam<90:
                            echo "Jó";
                            break;
                        case $pontszam>=90 && $pontszam<=100:
                            echo "Jeles";
                            break;
                        default:
                            echo "100 a max pont amit szerezhetsz és 0 a minimum";
                            break;
                    }
                }
                }


                ?>

                </div>
               
            </div>
            <div class="col"></div>

        </div>
        <div class="row mt-3">
        <div class="col"></div>
        <div class="col text-center">

        <div class="card">
                <h3>3.8</h3>
            <form action="" method="GET" name="form2">
                    <input class="form-control" type="number" name="buzatonna" id="buzatonna">
                    <button class="btn btn-outline-success mt-3" type="submit" name="submit">Küldés</button>
            </form>
                <?php
                if (isset($_GET['submit'])) {
                    if (isset($_GET['buzatonna'])&& is_numeric($_GET['buzatonna'])) {
                        $szorzo= rand(5,15);
                        $btonna = $_GET['buzatonna'];
                        switch ($szorzo) {
                            case $szorzo<9:
                                echo "Átlag alatti év várható";
                                break;
                            case $szorzo>=9 && $szorzo<13:
                                echo "Átlagos év várható";
                                break;
                            case $szorzo>=13:
                                echo "Átlag feletti év várható";
                                break;
                            default:
                                echo "IDK év várható";
                                break;
                        }
                        echo "<br>".$szorzo * $btonna . " tonna búza várható";
                    }
                }

                
                ?>
        </div>

        </div>
        <div class="col"></div>
        </div>
        <div class="row mt-3">
        <div class="col"></div>
        <div class="col text-center">

            <div class="card">

                <h3>3.9</h3>
                <form action="" method="get" name="form3">
                <input class="form-control" type="number" name="co2" id="co2" placeholder="CO2">
                <input class="form-control mt-3" type="number" name="o" id="o" placeholder="O">
                <button class="btn btn-outline-success mt-3" type="submit" name="submit">Küldés</button>
                </form>

        <?php
        if (isset($_GET['submit'])) {
            if (isset($_GET['co2'])&&isset($_GET['o'])&& is_numeric($_GET['o'])&& is_numeric($_GET['co2'])) {
                $CO2=$_GET['co2'];
                $O=$_GET['o'];
                $RQ=$CO2/$O;
                echo $RQ;
                switch ($RQ) {
                    case $RQ<0.8:
                        echo "Zsírok";
                        break;
                    case $RQ >0.8:
                        echo "Szénhidrát";
                        break;
                    case $RQ==0.8:
                        echo "Jó";
                        break;
                    default:
                        echo "baj";
                        break;
                }
            }
        }
        
        ?>

            </div>

        </div>
        <div class="col"></div>       
        </div>
    </div>

</body>
</html>