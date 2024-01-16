<div>
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4>Inventory Of : {{ $product->name }}</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr style="font-size: 12px">
                            <th>ID</th>
                            {{-- <th>Category ID</th>
                            <th>Product ID</th> --}}
                            <th>Color</th>
                            <th>Variation</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Action</th>
                            {{-- <th>Created At</th> --}}
                        </tr>
                        @forelse ($inventory as $inven)
                            <tr style="font-size: 12px;">
                                <td>{{ $loop->iteration }}</td>
                                {{-- <td>{{ $inven->category_id }}</td>
                                <td>{{ $inven->product_id }}</td> --}}
                                <td>{{ $color_name->name($inven->color)['name']  }}</td>
                                <td>{{ $inven->size_variation }}</td>
                                <td>{{ $inven->quantity }}</td>
                                <td>{{ $inven->price }}</td>
                                <td class="d-flex">
                                    <button class="btn btn-sm btn-danger" wire:click="delete({{ $inven->id }})">Del</button>
                                </td>
                                {{-- <td>{{ date('d-m-y', strtotime($inven->created_at)) }}</td> --}}
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7">No Data Found</td>
                            </tr>
                            @endforelse
                        </table>
                        {{ $inventory->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <form wire:submit="inventory">
                <div class="card">
                    <div class="card-header">
                        <h5>Add Inventory</h5>
                    </div>
                    <div class="card-body">
                        {{-- Inventory Product update Item --}}
                        <label>Product Name</label>
                        <input type="text" class="form-control" style="color: black" disabled
                            value="{{ $product->name }}">

                        {{-- Add Size --}}

                        <div class="my-3">
                            <label for="" class="fs-5">Select Variation</label>
                            <select style="color: black" wire:model='size' class="form-control mt-2">
                                <option data-display='- Please Choose an Option -'>Select Variation</option>
                                @foreach ($variation as $varia)
                                    <option value="{{ $varia->size }}">{{ $varia->size }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Add Color --}}

                        <div class="my-3">
                            <label for="">Select Color</label>
                            <select style="color: black" wire:model='color' class="form-control mt-2">
                                <option>Select Color</option>
                                @foreach ($colors as $color)
                                    <option class=" text-white" style="background-color: {{ $color->color }}"
                                        value="{{ $color->color }}" selected>{{ $color->color_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Add Quantity --}}
                        <label for="">Select Quantity</label>
                        <input type="number" wire:model='quantity' class="form-control">

                        <label for="" class="mt-2">Add price</label>
                        <input type="number" wire:model='price' class="form-control">

                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary btn-sm">Add Inventory</button>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
