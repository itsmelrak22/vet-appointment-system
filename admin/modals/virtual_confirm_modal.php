<form action="query_resource/virtual_appointment_status_update.php" method="post">
    <div class="modal fade" id="confirmModal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="testModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="testModalLabel">Update Status</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <input type="hidden" name="id" id="id" value="<?=$data->id ?>">

            <div class="modal-body">
                <div class="input-group input-group-sm mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-sm"  style="width: 175px">APPOINTMENT STATUS </span>
                    <select name="status" id="status" class="form-select form-select-sm" onchange="toggleLinkSelect()">
                        <option value="pending">pending</option>
                        <option value="confirmed">confirmed</option>
                        <option value="cancelled">cancelled</option>
                    </select>
                 </div>
                 <div class="input-group input-group-sm mb-3" id="link-select" style="display: none;">
                    <span class="input-group-text" id="inputGroup-sizing-sm"  >Choose Link</span>
                    <select name="selected_link" id="select-link" class="form-select" name="name" aria-describedby="inputGroup-sizing-sm" required>
                        <option disabled>...</option>
                    </select>
                </div>
                <div class="input-group input-group-sm mb-3">
                    <label for="otherSymptoms" class="form-label">By checking the checkbox below will send email to the client.</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="is_to_send_email" name="is_to_send_email" >
                        <label class="form-check-label" for="is_to_send_email">send email to the client</label>
                    </div>
                </div>
            </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
            </div>
        </div>
        </div>
    </div>
</form>

<form action="query_resource/send_email.php" method="post">
    <div class="modal fade" id="sendEmailModal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="testModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="testModalLabel">Email Confirmation</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <input type="hidden" name="id" id="id" value="<?=$data->id ?>">
            <input type="hidden" name="appointment-type"  value="virtual">

            <div class="modal-body">
                <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm"  style="width: 175px">Send Email Confirmation? </span>
                </div>
            </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary btn-sm">Send</button>
            </div>
        </div>
        </div>
    </div>
</form>