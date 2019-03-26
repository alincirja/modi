<?php
    include_once "templates/global/head.php";

    include_once "templates/global/header.php";

    setPageHeading("Despre Noi");
?>

<section id="main" class="main-content main-content-about">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <img src="<?php echo PATH_IMG; ?>caucasian-charity-cheerful-1409701.jpg" class="img-fluid">
            </div>
            <div class="col-12 col-md-6">
                <h3>Together we can make a difference</h3>
                <p>When you give to Our Charity, you know your donation is making a difference. Whether you are supporting one of our Signature Programs or our carefully curated list of Gifts That Give More, our professional staff works hard every day to ensure every dollar has impact for the cause of your choice.</p>
                <h4 class="text-primary">Our Partner</h4>
                <p>We partner with over 320 amazing projects worldwide, and have given over $150 million in cash and product grants to other groups since 2011. We also operate our own dynamic suite of Signature Programs.</p>
                <a href="<?php echo ROOT_URL; ?>contact" class="btn btn-lg btn-outline-primary">Contact</a>
            </div>
        </div>
    </div>
</section>

<?php include_once "templates/global/footer.php"; ?>