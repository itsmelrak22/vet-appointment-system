<form action="query_resource/appointment_status_update.php" method="post">
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
                        <?php if( $data->status == 'pending' ) {?>
                            <option value="pending">pending</option>
                            <option value="confirmed">confirmed</option>
                            <option value="cancelled">cancelled</option>
                            <option value="completed" disabled>completed</option>

                        <?php } else if( $data->status == 'confirmed' ) {?>
                            <option value="pending" disabled >pending</option>
                            <option value="confirmed" disabled>confirmed</option>
                            <option value="cancelled" disabled>cancelled</option>
                            <option value="completed" >completed</option>

                        <?php } else if( $data->status == 'cancelled' ) {?>
                            <option value="pending" disabled >pending</option>
                            <option value="confirmed" disabled>confirmed</option>
                            <option value="cancelled" disabled>cancelled</option>
                            <option value="completed" disabled>completed</option>
                        <?php } ?>

                    </select>
                </div>
                <div class="input-group input-group-sm mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-sm"  style="width: 146px">Remarks ( Optional )</span>
                    <textarea type="text" class="form-control" name="remarks" id="remarks" aria-label="Remarks" aria-describedby="inputGroup-sizing-sm"></textarea>
                </div>
                <div class="input-group input-group-sm mb-3">
                    <label  class="form-label">By checking the checkbox below will send email to the client.</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="is_to_send_email" name="is_to_send_email" >
                        <label class="form-check-label" for="is_to_send_email">Send email to the client</label>
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
                    <input type="hidden" name="appointment-type"  value="walkin">

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

<form action="query_resource/appointment_status_update.php" method="post">
    <div class="modal fade" id="markAsDone" data-bs-keyboard="false" tabindex="-1" aria-labelledby="testModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="testModalLabel">Confirm Completion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="id" value="<?=$data->id ?>">
                    <input type="hidden" name="appointment-type" value="walkin">
                    <input type="hidden" name="status" value="completed">

                    <div class="modal-body">
                        <div class="input-group input-group-sm mb-3">
                            <span id="inputGroup-sizing-sm">Mark as "Completed"?</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-sm">Confirm</button>
                </div>
            </div>
        </div>
    </div>
</form>
