<div class="row justify-content-center my-5">
    <div class="col-12 col-lg-8">
        <div class="card">
            <div class="card-body">
                <form action="" method="post" class="form-register" id="formRegister">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="registerFirstName">Prenume</label>
                                <input type="text" class="form-control" name="registerFirstName" id="registerFirstName" placeholder="Prenume">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="registerLastName">Nume</label>
                                <input type="text" class="form-control" name="registerLastName" id="registerLastName" placeholder="Nume">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="registerEmail">Email</label>
                                <input type="text" class="form-control" name="registerEmail" id="registerEmail" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="registerPassword">Parola</label>
                                <input type="password" class="form-control" name="registerPassword" id="registerPassword" placeholder="Parola">
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="form-group">
                                <label for="registerAge">Varsta</label>
                                <input type="number" class="form-control" name="registerAge" id="registerAge" min="13" max="120" placeholder="21">
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="form-group">
                                <label for="registerSex">Gen</label>
                                <select class="form-control" name="registerSex" id="registerSex">
                                    <option value="masculin">Masculin</option>
                                    <option value="feminin">Feminin</option>
                                </select>
                            </div>
                        </div>
                    </div><!--/.row-->
                    
                    
                    <div class="row mt-4">
                        <div class="col-md-6 mx-auto">
                            <button type="submit" class="btn btn-lg btn-block btn-primary">Inregistrare</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="text-center mt-2"><small><a href="<?php echo ROOT_URL; ?>auth">Sunt deja inregistrat</a></small></div>
    </div>
</div>
