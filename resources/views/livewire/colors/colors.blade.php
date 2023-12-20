<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">Add Colors</div>
            <div class="card-body">
                <form  wire:submit="colorInsert">
                    
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label>Choose Color</label>
                                <input class="form-control"  type="color" placeholder="Added Variations" wire:model.live="color">
                                @error('color')
                                    <p class="alert alert-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label>Color Code</label>
                                <input class="form-control"  type="text" placeholder="" wire:model="color">
                                @error('color')
                                    <p class="alert alert-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label>Color Name</label>
                                <input class="form-control"  type="text" placeholder="" wire:model="colorName">
                            </div>
                        </div>
                    </div>
                        <button  button type="submit" class="btn btn-primary btn-sm">
                            <div wire:loading  class="spinner-border text-danger" role="status">
                                <span class="visually-hidden"></span>
                            </div>
                            <span wire:loading.remove>Add Color</span>
                        </button>
                    </form>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header"><h4>Color Lists</h4></div>
            <div class="card-body">
                <table class="table table-bordered border-primary">
                        <tr>
                            <th style="font-size: 12px">Serial</th>
                            <th style="font-size: 12px">Color Name</th>
                            <th style="font-size: 12px">Color Code</th>
                            <th style="font-size: 12px">Color Sample</th>
                            <th style="font-size: 12px">Created At</th>
                            <th style="font-size: 12px">Actions</th>
                        </tr>
                    @forelse ($colors as $color)
                        <tr>
                            <td>{{ $color->id }}</td>
                            <td>{{ $color_name->name($color->color)['name']  }}</td>
                            <td>{{ $color->color }}</td>
                            <td class="text-center"><p style="width: 60px; height: 60px; background-color: {{ $color->color }};" class="rounded"></p></td>
                            <td>{{ $color->created_at }}</td>
                            <td>

                                <button type="submit" wire:click="editColor({{ $color->id }})"
                                    class="btn btn-primary btn-sm" data-toggle="modal"
                                    data-target="#editColor">Edit</button>

                                    <button type="submit" wire:click="deleteColor({{ $color->id }})" class="btn btn-danger btn-sm">Delete</button>

                                    <!-- Modal -->
                                    <div wire:ignore.self class="modal fade" id="editColor" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Update {{ $c_id }} Details</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form  wire:submit="updateColor({{ $c_id }})">
                                                    <div class="mb-3">
                                                        <label>Choose Color</label>
                                                        <input class="form-control"  type="color" placeholder="Added Variations" wire:model="color">
                                                        @error('color')
                                                            <p class="alert alert-danger mt-2">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Color Code</label>
                                                        <input class="form-control"  type="text" placeholder="" wire:model="color">
                                                    </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary btn-sm" >Update Color</button>
                                                        </div>
                                                    </form>
                                        </div>
                                    </div>
                                    </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No Color Found</td>
                        </tr>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
</div>
