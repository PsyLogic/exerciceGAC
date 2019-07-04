<?php
require('detail_appels.php');
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard Template · Bootstrap</title>
    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">GAC</a>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">
                                <span data-feather="home"></span>
                                Upload <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="statistics.php">
                                <span data-feather="file"></span>
                                Fetch
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Statistics</h1>
                </div>

                <div class="row justify-content-center">
                    <div class="col-4">
                        <strong>la durée totale réelle des appels effectués après le 15/02/2012<hr></strong>
                        <p><b>Total Heure</b>: <?= CalcTime($call_durations) ?></p>
                        <p><b>Durée Total (Humain): </b><?= CalcTime($call_durations,true) ?></p>
                    </div>
                    <div class="col-4">
                        <strong>TOP 10 des volumes data facturés en dehors de la tranche horaire 8h00-18h00, par abonné<hr></strong>
                        <table class="table table-sm table-bordered table-stripped ">
                            <thead>
                                <tr class="table-secondary">
                                    <th>N° Abonnée</th>
                                    <th>volumes data facturés</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($top10_abonne as $abonne) {
                                    echo '
                                    <tr>
                                        <td>'.$abonne['n_abonne'].'</td>
                                        <td>'.$abonne['TOTAL_VOLUME_FACTURE'].'</td>
                                    </tr>
                                    ';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-4">
                        <strong>la quantité totale de SMS envoyés par l'ensemble des abonnés<hr></strong>
                        <p>Total SMS: <?= $sms_total['TOTAL_SMS'] ?></p>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://getbootstrap.com/docs/4.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>