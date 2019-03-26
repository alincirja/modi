<?php
    include_once "templates/global/head.php";

    setSeo();

    include_once "templates/global/header.php";

    setPageHeading("Intrebari Frecvente");
?>

<section id="main" class="main-content main-content-contact">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6">
                <h4 class="line-title">Intrebari & Raspunsuri</h4>
                <div class="card">
                    <div class="card-body">
                        <ul class="faq-list">
                            <li class="expanded">
                                <div class="question d-flex flex-nowrap justify-content-between">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    <span class="indicator">
                                        <i class="fas fa-fw fa-chevron-right ind-non-active"></i>
                                        <i class="fas fa-fw fa-chevron-down ind-active"></i>
                                    </span>
                                </div>
                                <div class="answer">
                                    <div class="ans-text">
                                        <p>Lorem Ipsum este pur şi simplu o machetă pentru text a industriei tipografice.</p>
                                        <p>Lorem Ipsum a fost macheta standard a industriei încă din secolul al XVI-lea, când un tipograf anonim a luat o planşetă de litere şi le-a amestecat pentru a crea o carte demonstrativă pentru literele respective.</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="question d-flex flex-nowrap justify-content-between">
                                    <p>Aenean vel diam et diam mattis pretium eleifend eu purus.</p>
                                    <span class="indicator">
                                        <i class="fas fa-fw fa-chevron-right ind-non-active"></i>
                                        <i class="fas fa-fw fa-chevron-down ind-active"></i>
                                    </span>
                                </div>
                                <div class="answer">
                                    <div class="ans-text">
                                        <p>Lorem Ipsum este pur şi simplu o machetă pentru text a industriei tipografice.</p>
                                        <p>Lorem Ipsum a fost macheta standard a industriei încă din secolul al XVI-lea, când un tipograf anonim a luat o planşetă de litere şi le-a amestecat pentru a crea o carte demonstrativă pentru literele respective.</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="question d-flex flex-nowrap justify-content-between">
                                    <p>Curabitur id tortor id dolor gravida dapibus.</p>
                                    <span class="indicator">
                                        <i class="fas fa-fw fa-chevron-right ind-non-active"></i>
                                        <i class="fas fa-fw fa-chevron-down ind-active"></i>
                                    </span>
                                </div>
                                <div class="answer">
                                    <div class="ans-text">
                                        <p>Lorem Ipsum este pur şi simplu o machetă pentru text a industriei tipografice.</p>
                                        <p>Lorem Ipsum a fost macheta standard a industriei încă din secolul al XVI-lea, când un tipograf anonim a luat o planşetă de litere şi le-a amestecat pentru a crea o carte demonstrativă pentru literele respective.</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="question d-flex flex-nowrap justify-content-between">
                                    <p>Nam vel nibh non tortor tempus vestibulum.</p>
                                    <span class="indicator">
                                        <i class="fas fa-fw fa-chevron-right ind-non-active"></i>
                                        <i class="fas fa-fw fa-chevron-down ind-active"></i>
                                    </span>
                                </div>
                                <div class="answer">
                                    <div class="ans-text">
                                        <p>Lorem Ipsum este pur şi simplu o machetă pentru text a industriei tipografice.</p>
                                        <p>Lorem Ipsum a fost macheta standard a industriei încă din secolul al XVI-lea, când un tipograf anonim a luat o planşetă de litere şi le-a amestecat pentru a crea o carte demonstrativă pentru literele respective.</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="question d-flex flex-nowrap justify-content-between">
                                    <p>In posuere metus dignissim, euismod dui in, euismod mi.</p>
                                    <span class="indicator">
                                        <i class="fas fa-fw fa-chevron-right ind-non-active"></i>
                                        <i class="fas fa-fw fa-chevron-down ind-active"></i>
                                    </span>
                                </div>
                                <div class="answer">
                                    <div class="ans-text">
                                        <p>Lorem Ipsum este pur şi simplu o machetă pentru text a industriei tipografice.</p>
                                        <p>Lorem Ipsum a fost macheta standard a industriei încă din secolul al XVI-lea, când un tipograf anonim a luat o planşetă de litere şi le-a amestecat pentru a crea o carte demonstrativă pentru literele respective.</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <h4 class="line-title">Ai o intrebare?</h4>
                <div class="card">
                    <div class="card-body">
                        <?php include_once "templates/content-pages/contact-form.php"; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once "templates/global/footer.php"; ?>