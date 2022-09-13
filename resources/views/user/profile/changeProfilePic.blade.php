<div class="modal fade " id="changeProfilePicture" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content border-top-warning border-bottom-warning">
            <div class="modal-header">
                <h5 class="modal-title"><i class="bi bi-currency-exchange text-danger"></i> Change Profile Picture</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" id="withdrawForm" action="{{ route('change-dp') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mt-3">
                            <div class="form-group">
                                <label for="currency">Select Currency</label>
                                <input type="file" id="img" name="img" accept="image/*" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning processBtn" data-value="Proceed">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    @if(Session::has('success'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.success("{{ session('success') }}");
    @endif

        @if(Session::has('error'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.error("{{ session('error') }}");
    @endif

        @if(Session::has('info'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.info("{{ session('info') }}");
    @endif

        @if(Session::has('warning'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.warning("{{ session('warning') }}");
    @endif
</script>
