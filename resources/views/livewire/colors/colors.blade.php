<div class="row">
    <div class="col-lg-2">
        <div class="card">
            <div class="card-header">Add Colors</div>
            <div class="card-body">
                <form  wire:submit="colorInsert" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label>Choose Color</label>
                        <input class="form-control"  type="color" placeholder="Added Variations" wire:model="color">
                        @error('color')
                            <p class="alert alert-danger mt-2">{{ $message }}</p>
                        @enderror
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
    <div class="col-lg-10">
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
                                <button type="submit" wire:confirm="Are you sure you want to delete this?"  wire:click="deleteColor({{ $color->id  }})" class="btn btn-danger btn-sm">Delete</button>
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
