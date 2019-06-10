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
                                    <p>Ce este Open Road?</p>
                                    <span class="indicator">
                                        <i class="fas fa-fw fa-chevron-right ind-non-active"></i>
                                        <i class="fas fa-fw fa-chevron-down ind-active"></i>
                                    </span>
                                </div>
                                <div class="answer">
                                    <div class="ans-text">
                                        <p>Open Road este un site prin care cumpărătorii pot actiziționa produse de larg consum cu doar un click.</p>
                                        <p>Cumpărătorii pot stabili ora și data la care să primească cumpărăturile.</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="question d-flex flex-nowrap justify-content-between">
                                    <p>Cât costă transportul?</p>
                                    <span class="indicator">
                                        <i class="fas fa-fw fa-chevron-right ind-non-active"></i>
                                        <i class="fas fa-fw fa-chevron-down ind-active"></i>
                                    </span>
                                </div>
                                <div class="answer">
                                    <div class="ans-text">
                                        <p>Costul standard de transport este de 14.99 lei.</p>
                                        <p>Este un cost fix, indiferent de valoarea cumpărăturilor.</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="question d-flex flex-nowrap justify-content-between">
                                    <p>Plata produselor?</p>
                                    <span class="indicator">
                                        <i class="fas fa-fw fa-chevron-right ind-non-active"></i>
                                        <i class="fas fa-fw fa-chevron-down ind-active"></i>
                                    </span>
                                </div>
                                <div class="answer">
                                    <div class="ans-text">
                                        <p>Plata se face la livrare, clientul plătind valoarea produselor conform bonului fiscal din magazin, plus taxa de transport.</p>
                                        <p>Open Road nu percepe adaos comercial, produsele fiind cumpărate la prețul afișat pe site.</p>
                                        <p>Ca modalitate de plată, în prezent există doar varianta de plată cash.</p>
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