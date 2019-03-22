<!-- Modal Detail Banner -->
<div class="modal" id="myModa{{ $contact->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle" style="margin-bottom:-2em;">
                    Show Contact: {{ $contact->id }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Name:</h5>
                <p>
                    {{ $contact->name }}
                </p>
                <h5>Email:</h5>
                <p>
                    {{ $contact->email }}
                </p>
                <h5>Content:</h5>
                <p>
                    {{ $contact->content }}
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
