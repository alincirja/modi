<div class="modal fade" id="insertImageModal" tabindex="-1" role="dialog" aria-labelledby="insertImageModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="insertImageModalLabel">Imagine noua</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="javascript:;" enctype="multipart/form-data" id="insertImageForm">
                <input type="hidden" name="action" value="addImage">
                <div class="modal-body">
                    <input type="file" name="imageFile" id="imageFile" accept="image/png, image/jpeg, image/jpg">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Anulare</button>
                    <button type="submit" class="btn btn-primary">Salvare</button>
                </div>
            </form>
        </div>
    </div>
</div>