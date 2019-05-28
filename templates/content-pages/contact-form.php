<form action="" class="contact-form" id="contactForm">
    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="form-group">
                <input type="text" class="form-control" required placeholder="Nume" id="contactName" name="contactName">
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="form-group">
                <input type="email" class="form-control" required placeholder="Email" id="contactEmail" name="contactEmail">
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="form-group">
                <input type="tel" class="form-control" required placeholder="Telefon" id="contactPhone" name="contactPhone">
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="form-group">
                <select name="contactSubject" id="contactSubject" class="form-control">
                    <option value="">-- subiect --</option>
                    <option value="feedback">Feedback</option>
                    <option value="contact">Contact</option>
                    <option value="complaint">Reclamatie</option>
                </select>
            </div>
        </div>
        <div class="col-12 col-lg-6 occupation-wrap d-none">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Ocupatie" id="contactOccupation" name="contactOccupation">
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <textarea name="contactMessage" id="contactMessage" placeholder="Mesaj" class="form-control" rows="6"></textarea>
            </div>
        </div>
    </div><!--/.row-->
    <div class="text-center">
        <input type="hidden" name="submitContact" value="submit">
        <button type="submit" class="btn btn-lg btn-outline-primary">Trimite Mesajul</button>
    </div>
</form>