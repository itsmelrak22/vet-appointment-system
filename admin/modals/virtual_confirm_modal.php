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
                <select name="status" id="status" class="form-select form-select-sm">
                    <option value="pending">pending</option>
                    <option value="confirmed">confirmed</option>
                    <option value="cancelled">cancelled</option>
                </select>
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
            <input type="hidden" name="receiver_name"  value="<?=$data->owner_name ?>">
            <input type="hidden" name="receiver_email"  value="<?=$data->email ?>">
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