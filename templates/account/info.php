<?php
    include_once "classes/User.php";
    $user = new User();
    $me = $user->getById($_SESSION["id"]);

?>

<div class="row">
    <div class="col-12 col-lg-7">
        <h2>Date Personale</h2>
        <form action="" class="profile-form" id="updateProfileForm">
            <input type="hidden" name="user_id" value="<?php $me["id"]; ?>">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="fName">Prenume</label>
                        <input class="form-control" type="text" name="fName" id="fName" placeholder="Ex: Ioana" value="<?php echo $me["first_name"] ?>">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="lName">Nume</label>
                        <input class="form-control" type="text" name="lName" id="lName" placeholder="Ex: Popescu" value="<?php echo $me["last_name"] ?>">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" type="email" name="email" id="email" placeholder="Ex: ioana@email.ro" value="<?php echo $me["email"] ?>">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="phone">Telefon</label>
                        <input class="form-control" type="text" name="phone" id="phone" placeholder="Ex: 0700000000" value="<?php echo $me["phone"] ?>">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-lg btn-primary">Actualizare</button>
        </form>
    </div>
    <div class="col-12 col-lg-4 ml-auto">
        <h2>Parola</h2>
        <form action="" class="password-form" id="updatePasswordForm">
            <input type="hidden" name="user_id" value="<?php $me["id"]; ?>">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="password">Parola actuala</label>
                        <input class="form-control" type="password" name="password" id="password">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="newPassword">Parola noua</label>
                        <input class="form-control" type="password" name="newPassword" id="newPassword">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="confirmNewPassword">Confirma noua parola</label>
                        <input class="form-control" type="password" name="confirmNewPassword" id="confirmNewPassword">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-lg btn-primary">Actualizare Parola</button>
        </form>
    </div>
</div>