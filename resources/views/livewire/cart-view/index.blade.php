<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">Cart Product Added By Users</div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>ID</th>
                        <th>User ID</th>
                        <th>Vendor ID</th>
                        <th>Color</th>
                        <th>Variation</th>
                        <th>Quantity</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                    @foreach ($carts as $cart)
                        <tr>
                            <td>{{ $cart->id }}</td>
                            <td>{{ $cart->user_id }}</td>
                            <td>{{ $cart->vendor_id }}</td>
                            <td class="text-white" style="background-color: {{ $cart->rel_to_color->color }}">{{ $color_name->name($cart->rel_to_color->color)['name'] }}</td>
                            <td>{{ $cart->size }}</td>
                            <td>{{ $cart->quantity }}</td>
                            <td> {{ date('d-m-y', strtotime($cart->created_at)) }}</td>
                            <td class="text-center">
                                <!-- Button trigger modal -->
                                <button type="button" data-toggle="modal" data-target="#staticBackdrop"
                                    class="btn btn-dark btn-sm" wire:click='cart_edit({{ $cart->id }})'><i
                                        class="fa fa-edit"></i></button>
                                <button class="btn btn-danger btn-sm" wire:click='cart_delete({{ $cart->id }})'><i
                                        class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <!-- Modal -->
            <div wire:ignore.self class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Edit Cart</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form wire:submit='edit_submit({{ $id }})'>
                                <div class="form-group">
                                    <label for="{{ $s_color }}">Color</label>
                                    <select wire:model='s_color' class="form-control">
                                        <option value="">Select Option</option>
                                        @foreach ($colors as $color)
                                            {{-- <option value="{{ $color->id }}">{{ $color_name->name($color->color)['name'] }}</option> --}}
                                            <option  style="color: black"
                                                {{ $s_color == $color->color ? 'selected' : '' }}
                                                value="{{ $color->color }}">{{ $color->color_full->color_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="{{ $s_size }}">Size</label>
                                    <select wire:model='s_size' class="form-control">
                                        <option value="">Select Option</option>
                                        @foreach ($colors as $color)
                                            {{-- <option value="{{ $color->id }}">{{ $color_name->name($color->color)['name'] }}</option> --}}
                                            <option  style="color: black"
                                                {{ $s_size == $color->size_variation ? 'selected' : '' }}
                                                value="{{ $color->size_variation }}">{{ $color->size_variation }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="{{ $quantity }}">Quantity</label>
                                    <input wire:model='quantity' style="color: black" type="text" class="form-control"
                                        id="{{ $quantity }}" value="{{ $quantity }}">
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary btn-sm">Update</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
