<?php
    include_once "templates/global/head.php";

    include_once "templates/global/header.php";

    setPageHeading("Despre Noi");
?>

<section id="main" class="main-content main-content-about">
    <div class="container">
    <h3>Împreună facem diferența!</h3>
    <p>Echipa noastră este formată din 5 oameni. Produsele vor fi transportate pe bicicletă. Până în momentul de față dispunem de 2 livratori care vor pedala, Rareș și Cătălin, iar în cazul comenzilor mai mari, dispunem de 3 mașini, conduse de Bogdan, Simona și Silvia.</p>
    <h3> Livratorii nostrii </h3>
        <div class="row">
            <div class="col-12 col-md-6">
                <img src="<?php echo PATH_IMG; ?>rares.jpg" class="img-fluid" >
            </div>
            <div class="col-12 col-md-6">
                <p>El este Rareș. Elev în clasa a 11 a, la Colegiul Național Radu Negru. Este o persoană sociabilă și deschisă, îi place foarte mult sportul practicând handbal încă de la vârsta de 9 ani. </p>
                <p>Și-a descoperit pasiunea de a pedala încă de la 12 ani, când a luat locul I la Bikeathon, cursa scurtă. De atunci, participă în fiecare an la Bikeathon și la orice concurs de pedalat din împrejurimi. Prin această pasiune, Rareș a descoperit o metodă ușoară de a își face bani de buzunar și de a ramâne în formă în același timp.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6">
            <br>
            <br>
                <p>El este Cătălin. Elev în clasa a 10 a, la Colegiul Național Radu Negru. Este o persoană introvertită și tăcută, spune despre el că îi place foarte mult sportul. A practicat înot timp de 5 ani și karate până a ajuns la centura maro.</p>
                <p>Și-a descoperit pasiunea de a pedala încă de la 16 ani, când a luat locul II la Bikeathon, cursa medie. De atunci, participă în fiecare an la Bikeathon și la orice concurs de pedalat din împrejurimi. Prin această pasiune, Cătălin a descoperit o metodă ușoară de a își face bani de buzunar și de a ramâne în formă în același timp.</p>
            </div>
            <div class="col-12 col-md-6">
            <br>
            <br>
                <img src="<?php echo PATH_IMG; ?>cata.jpg" class="img-fluid" >
            </div>
        </div>
        <h4 class="text-primary">Our Partner</h4>
                <p>We partner with over 320 amazing projects worldwide, and have given over $150 million in cash and product grants to other groups since 2011. We also operate our own dynamic suite of Signature Programs.</p>
                <a href="<?php echo ROOT_URL; ?>contact" class="btn btn-lg btn-outline-primary">Contact</a>
    </div>
</section>

<?php include_once "templates/global/footer.php"; ?>