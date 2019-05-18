<?php
include_once "classes/Category.php";
$catObj = new Category();
?>

<div class="mb-3">
    <a class="btn btn-primary" href="<?php echo ROOT_URL . "admin?page=articles"; ?>">Vezi toate articolele</a>
</div>

<form action="javascript:;" id="addNewArticleForm" class="add-article-form">
    <div class="row">
        <div class="col-12 col-md-6 col-lg-3">
            <h4>Categorie</h4>
            <div class="form-group">
                <label>Categorie Noua?</label>
                <div class="row align-items-center">
                    <div class="col-auto">
                        <div class="custom-control custom-radio">
                            <input type="radio" id="newCategoryNo" name="newCategoryRadio" value="false" class="custom-control-input" checked>
                            <label class="custom-control-label m-0" for="newCategoryNo"><span class="d-inline-block my-1">Nu</span></label>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="custom-control custom-radio">
                            <input type="radio" id="newCategoryYes" name="newCategoryRadio" value="true" class="custom-control-input">
                            <label class="custom-control-label m-0" for="newCategoryYes"><span class="d-inline-block my-1">Da</span></label>
                        </div>
                    </div>
                </div>
            </div>

            <div id="selectCategory">
                <div class="form-group level-1">
                    <label for="catLevel1">Categorie nivel 1</label>
                    <select name="catLevel1" id="catLevel1" class="form-control">
                        <option value="">---</option>
                        <?php
                        $level1 = $catObj->getCustomData("SELECT * FROM category WHERE id_parent='0'");
                        foreach ($level1 as $cat) {
                            echo '<option value="' . $cat["id"] . '">' . $cat["name"] . '</option>';
                        } ?>
                    </select>
                </div>
                <div class="form-group level-2" style="display:none;">
                    <label for="catLevel2">Categorie nivel 2</label>
                    <select name="catLevel2" id="catLevel2" class="form-control">
                    </select>
                </div>
            </div>
            <!--/#selectCategory-->

            <div id="newCategory" style="display:none;">
                <div class="form-group">
                    <label for="newCatParent">Selectare parinte</label>
                    <select name="newCatParent" id="newCatParent" class="form-control">
                        <option value="0">- Fara parinte -</option>
                        <?php
                        $categories = $catObj->getCustomData("SELECT * FROM category WHERE id_parent='0' ORDER BY name ASC");
                        foreach ($categories as $cat) {
                            echo '<option value="' . $cat["id"] . '">' . $cat["name"] . '</option>';
                        } ?>
                    </select>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="newCatName">Nume</label>
                            <input type="text" name="newCatName" id="newCatName" class="form-control" placeholder="Film">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="newCatNamePlural">Nume Plural</label>
                            <input type="text" name="newCatNamePlural" id="newCatNamePlural" class="form-control" placeholder="Filme">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-9">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <h4>Informatii Articol</h4>
                    <div class="form-group">
                        <label for="articleName">Nume</label>
                        <input type="text" name="articleName" id="articleName" class="form-control" placeholder="Nume descriptiv">
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="form-group">
                                <label for="articlePrice">Pret</label>
                                <input type="number" step="0.1" min="0.1" name="articlePrice" id="articlePrice" class="form-control" placeholder="Pret in RON">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="form-group">
                                <label for="articleMeasure">Unitate de masura</label>
                                <input type="text" name="articleMeasure" id="articleMeasure" class="form-control" placeholder="buc, kg, litri">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <h4>Specific Eveniment</h4>
                    <div class="row">
                        <div class="col-12 col-lg-7">
                            <div class="form-group">
                                <label for="articleDateStart">De la</label>
                                <input type="date" name="articleDateStart" id="articleDateStart" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-lg-5">
                            <div class="form-group">
                                <label for="articleTimeStart">&nbsp;</label>
                                <input type="time" name="articleTimeStart" id="articleTimeStart" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-lg-7">
                            <div class="form-group">
                                <label for="articleDateEnd">Pana la</label>
                                <input type="date" name="articleDateEnd" id="articleDateEnd" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-lg-5">
                            <div class="form-group">
                                <label for="articleTimeEnd">&nbsp;</label>
                                <input type="time" name="articleTimeEnd" id="articleTimeEnd" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.row-->
            <div class="form-group">
                <label for="articleDesc">Descriere</label>
                <textarea name="articleDesc" id="articleDesc" rows="5" class="form-control"></textarea>
                <small>*Sunt permise si taguri HTML</small>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-lg btn-outline-primary">Salvare Articol</button>
            </div>
        </div>
    </div><!--/.row-->
</form>