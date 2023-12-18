<!-- Modal -->
<div wire:ignore.self class="modal fade" id="editSize" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update {{ $v_id }} Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit="updateSize({{ $v_id }})">
                    <div class="mb-3">
                        <label>Edit Variations</label>
                        <input class="form-control" type="text" wire:model="size" >
                        @error('size')
                            <p class="alert alert-danger mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm"
                    data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-sm">Update Variation</button>
                </form>
            </div>
        </div>
    </div>

</div>