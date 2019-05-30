<?php
    include_once "templates/global/head.php";

    setSeo();

    include_once "templates/global/header.php";

    setPageHeading("Statistici");
?>

<section id="main" class="main-content main-content-stats">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <h5>Comenzi</h5>
                        <?php
                            include_once "classes/Database.php";
                            $action = new Database();
                            $statusLabels = "";
                            $statusVals = "";
                            $statusStat = $action->getCustomData("SELECT status, count(status) as nr FROM order_list GROUP BY status");
                            for ($i = count($statusStat) - 1; $i >= 0; $i--) {
                                $statusLabels .= $i > 0 ? $statusStat[$i]["status"] ."," : $statusStat[$i]["status"];
                                $statusVals .= $i > 0 ? $statusStat[$i]["nr"] ."," : $statusStat[$i]["nr"];
                            }
                        ?>
                        <canvas id="stChart" width="400" height="400"
                            data-labels="<?php echo $statusLabels; ?>"
                            data-vals="<?php echo $statusVals; ?>"
                        ></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once "templates/global/footer.php"; ?>