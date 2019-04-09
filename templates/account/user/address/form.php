<div class="shipping-address-form">
    <form action="javascript:;" method="post" id="shippingAddressForm">
        <h6>Persoana de contact</h6>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="shipName">Nume si Prenume</label>
                    <input type="text" name="shipName" id="shipName" class="form-control" placeholder="ex: Pop Marius" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="shipPhone">Telefon</label>
                    <input type="text" name="shipPhone" id="shipPhone" class="form-control" placeholder="07xxxxxxxx" />
                </div>
            </div>
        </div>
        <h6>Adresa de livrare</h6>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="shipCounty">Judet</label>
                    <input type="text" name="shipCounty" id="shipCounty" class="form-control" placeholder="Brasov" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="shipCity">Localitate</label>
                    <input type="text" name="shipCity" id="shipCity" class="form-control" placeholder="Fagaras" />
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="shipAddress">Adresa</label>
                    <input type="text" name="shipAddress" id="shipAddress" class="form-control" placeholder="Str. Ioan Slavici, Nr. 12, Bloc. 18, Sc. 3, Et. 3, Ap. 10" />
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Salveaza</button>
        <?php if (isset($_GET["page"]) && $_GET["page"] === "cart") { ?>
            <input type="hidden" name="inCart" id="inCart" value="true">
            <button class="btn btn-outline-primary" id="hideNewAddress">Anulare</button>
        <?php } ?>
    </form>
</div>