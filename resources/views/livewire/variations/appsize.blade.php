<div>
    <div class="row">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-header">Add Variation to products</div>
                <div class="card-body">
                    @if (session('addSize'))
                        <div class="alert alert-success">
                            {{ session('addSize') }}
                        </div>
                    @endif
                    <form wire:submit="sizeInsert" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label>Enter Variations</label>
                            <input class="form-control" type="text" placeholder="Added Variations" wire:model="size">
                            @error('size')
                                <p class="alert alert-danger mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Select Category</label>
                            <select class="form-control" wire:model='category'>
                                <option>Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->Category_Name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button button type="submit" class="btn btn-primary btn-sm">
                            <div wire:loading class="spinner-border text-danger" role="status">
                                <span class="visually-hidden"></span>
                            </div>
                            <span wire:loading.remove>Add Variation</span>
                        </button>


                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="card">
                <div class="card-header">
                    <h4>Variation & Sizes Lists</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered border-primary">
                        <tr>
                            <th>Serial</th>
                            <th>Variations</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                        @forelse ($sizes as $size)
                            <tr>
                                <td>{{ $size->id }}</td>
                                <td>{{ $size->size }}</td>
                                <td>{{ $size->created_at }}</td>
                                <td>
                                    <button type="submit" wire:click="editSize({{ $size->id }})"
                                        class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#editSize">Edit</button>                   

                                        @include('livewire.variations.editApp')

                                    <button type="submit" wire:click="deleteSize({{ $size->id }})" class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No Variation Found</td>
                            </tr>
                        @endforelse
                        {{-- <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                Launch demo modal
                            </button>  --}}
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
