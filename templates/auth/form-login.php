<div class="row justify-content-center my-5">
    <div class="col-12 col-lg-4">
        <div class="card">
            <div class="card-body">
                <form action="" method="post" class="form-login" id="formLogin">
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" class="form-control" name="loginEmail" id="loginEmail" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="">Parola</label>
                        <input type="password" class="form-control" name="loginPassword" id="loginPassword" placeholder="Parola">
                    </div>
                    <div class="row mt-4">
                        <div class="col-6">
                            <button type="submit" class="btn btn-block btn-primary">Autentificare</button>
                        </div>
                        <div class="col-6">
                            <a href="<?php echo ROOT_URL; ?>auth?auth=register" class="btn btn-block btn-outline-primary">Inregistrare</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
