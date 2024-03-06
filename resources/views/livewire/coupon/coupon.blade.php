<div class="row">
    <div class="col-lg-4">{{-- Add Coupon Start --}}
        <div class="card" style="background-color: black">
            <div class="card-header" style="background-color: black">
                <h2 class="mb-2 text-warning">Add Coupon</h2>
            </div>
            <div class="card-body">
                <form wire:submit="couponAdd" method="POST">

                    <div class="mb-3">
                        <label class="form-label">Coupon Name</label>
                        <input type="text" class="form-control" wire:model.blur="coupon_name"
                            placeholder="Coupon Name" value="{{ old('coupon_name') }}">

                        @error('coupon_name')
                            <p class="text-danger mt-2">{{ $message }}</p>
                        @enderror

                    </div>

                    <div class="mb-3">
                        <label class="form-label">Coupon Type</label>
                        <select class="form-control" wire:model.live="coupon_type">
                            <option value="">Select Coupon Type</option>
                            @foreach ($coupon_types as $type)
                                <option value="{{ $type->id }}">{{ $type->type }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Coupon Value</label>
                        <input type="number" class="form-control" wire:model.blur="coupon_value"
                            placeholder="Coupon Value" value="{{ old('coupon_value') }}">
                        @error('coupon_value')
                            <p class="text-danger mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Coupon Date</label>
                        <input type="date" class="form-control" wire:model.blur="coupon_date"
                            placeholder="Coupon Date" value="{{ old('coupon_date') }}">
                        @error('coupon_date')
                            <p class="text-danger mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-warning btn-sm">Add Coupon</button>
                </form>
            </div>
        </div>
    </div> {{-- Add Coupon End --}}

    <div class="col-lg-8 m-0 p-0">{{-- Coupon Output Start --}}
        <table class="table table-dark text-white table-bordered table-striped"
            style="font-size: 12px; font-weight: lighter; color: black">
            <tr>
                <th>ID</th>
                <th>Coupon Name</th>
                <th>Coupon Type</th>
                <th>Coupon Value</th>
                <th>Date</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
            @forelse ($coupons as $coupon)
                <tr>
                    <td>{{ $coupon->id }}</td>
                    <td>{{ $coupon->coupon_name }}</td>
                    <td>{{ $coupon->relToType->type }}</td>
                    <td>{{ $coupon->coupon_value != '' ? $coupon->coupon_value : 'Null' }}</td>
                    <td>{{ $coupon->coupon_date }}</td>
                    <td> {{ $coupon->created_at->diffForHumans() }}</td>
                    {{-- <td> {{ date('d-m-y', strtotime($coupon->created_at)) }}</td> --}}
                    <td class="text-center d-flex">
                        <!-- Button trigger modal -->
                        <button type="button" data-toggle="modal" data-target="#exampleModal"
                            class="btn btn-dark btn-sm mr-2" wire:click='coupon_edit({{ $coupon->id }})'><i
                                class="fa fa-edit"></i></button>
                        <button class="btn btn-danger btn-sm" wire:click='coupon_delete({{ $coupon->id }})'><i
                                class="fa fa-trash"></i></button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center"><p>No Coupon added</p></td>
                </tr>
            @endforelse
        </table>
        {{ $coupons->links('pagination::bootstrap-4') }}
    </div>{{-- Coupon Output Start --}}

    <!-- Modal -->
    <div style="background-color: black" wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit="couponUpdate({{ $id }})" method="POST">

                        <div class="mb-3">
                            <label class="form-label">Coupon Name</label>
                            <input type="text" class="form-control" wire:model.blur="name"
                                placeholder="Coupon Name" value="{{ $name }}">
    
                            @error('coupon_name')
                                <p class="text-danger mt-2">{{ $message }}</p>
                            @enderror
    
                        </div>
    
                        <div class="mb-3">
                            <label class="form-label">Coupon Type</label>
                            <select class="form-control" wire:model.live="type">
                                <option value="">Select Coupon Type</option>
                                @foreach ($coupon_types as $type)
                                    <option value="{{ $type->id }}">{{ $type->type}}</option>
                                @endforeach
                            </select>
                        </div>
    
                        <div class="mb-3">
                            <label class="form-label">Coupon Fixed</label>
                            <input type="number" class="form-control" wire:model.blur="value"
                                placeholder="Coupon Fixed" value="{{ $value }}">
                            @error('coupon_fixed')
                                <p class="text-danger mt-2">{{ $message }}</p>
                            @enderror
                        </div>
    
                        <div class="mb-3">
                            <label class="form-label">Coupon Date</label>
                            <input type="date" class="form-control" wire:model.blur="date"
                                placeholder="Coupon Date" value="{{ $date }}">
                            @error('coupon_date')
                                <p class="text-danger mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-sm">Update Coupon</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
