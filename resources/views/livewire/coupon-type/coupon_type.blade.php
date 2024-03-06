<div class="row">
    <div class="col-lg-6">{{-- Add Coupon Start --}}
        <div class="card" style="background-color: black">
            <div class="card-header" style="background-color: black">
                <h4 class="mb-2 text-warning">Add Coupon Type</h4>
            </div>
            <div class="card-body">
                <form wire:submit="couponTypeAdd" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Coupon Type</label>
                        <input type="text" class="form-control" wire:model.blur="coupon_type"
                            placeholder="Coupon Type" >

                        @error('coupon_type')
                            <p class="text-danger mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-warning btn-sm">Add Coupon Type</button>
                </form>
            </div>
        </div>
    </div> {{-- Add Coupon End --}}

    <div class="col-lg-6 m-0 p-0">{{-- Coupon Output Start --}}
        <table class="table table-dark text-white table-bordered table-striped"
            style="font-size: 12px; font-weight: lighter; color: black">
            <tr>
                <th>ID</th>
                <th>Coupon Type</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
            @forelse ($coupon_types as $coupon)
                <tr>
                    <td>{{ $coupon->id }}</td>
                    <td>{{ Str::upper($coupon->type) }}</td>
                    <td> {{ date('d-m-y', strtotime($coupon->created_at)) }}</td>
                    <td class="text-center">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-sm x" data-toggle="modal"
                            data-target="#staticBackdrop" class="btn btn-dark btn-sm"
                            wire:click='edit({{ $coupon->id }})'><i class="fa fa-edit"></i></button>
                        <button class="btn btn-danger btn-sm" wire:click='delete({{ $coupon->id }})'><i
                                class="fa fa-trash"></i></button>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-center"><p>No Type Found</p></td></tr>
            @endforelse
        </table>
        {{ $coupon_types->links('pagination::bootstrap-4') }}
    </div>{{-- Coupon Output Start --}}


    <!-- Button trigger modal -->
    <div class="col-lg-12">

        <!-- Modal -->
        <div style="background-color: black" wire:ignore.self class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit="couponUpdate({{ $id }})" method="POST">
                            <div class="mb-3">
                                <label class="form-label">Coupon Type</label>
                                <input type="text" class="form-control" wire:model.blur="coupons"
                                    placeholder="Coupon Type" value="{{ $coupons }}">

                                @error('coupon_type')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-sm">Update Coupon Type</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
