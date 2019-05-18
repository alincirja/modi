<?php
    include_once "classes/Image.php";
    $imageObj = new Image();
    $images = $imageObj->getData("image");
?>
<div class="image-listing row">
<?php foreach ($images as $image) { ?>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4" id="image-<?php echo $image["id"]; ?>">
        <div class="image" style="background-image: url(<?php echo PATH_IMG . $image["name"]; ?>)">
            <div class="image-actions text-center">
                <a href="<?php echo ROOT_URL . "scripts/admin/image/delete?id=" . $image["id"]; ?>" class="btn btn-sm btn-outline-primary deleteImage">Sterge</a>
            </div>
        </div>
    </div>
<?php } ?>
</div><!--/.image-listing-->