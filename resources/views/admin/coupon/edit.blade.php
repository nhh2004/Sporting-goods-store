@extends('admin.main')

@section('content')
    <form action="" method="POST">
        <div class="card-body">
            <div class="form-group">
                <label for="coupon">Promotion name</label>
                <input type="text" name="name" value="{{ $coupon->name }}" class="form-control" placeholder="Enter Promotion Name">
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Promotion Type</label>
                        <select class="form-control" name="type">
                            <option value="Giảm theo tiền" {{ $coupon->type === 'Giảm theo tiền' ? 'selected' : '' }}>Discount by money</option>
                            <option value="Giảm theo %" {{ $coupon->type === 'Giảm theo %' ? 'selected' : '' }}>Discount by %</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="coupon">Amount of money</label>
                        <input type="number" name="number" value="{{ $coupon->number }}" class="form-control" placeholder="% or bonus amount">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="menu_id">
                            <option value="">Select Category</option>
                            @foreach($menus as $menu)
                                <option value="{{ $menu->id }}" {{ $coupon->menu_id == $menu->id ? 'selected' : '' }}>{{ $menu->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Product</label>
                        <input class="form-control" name="product_id" list="sanpham" placeholder="select Product" value="{{ $coupon->product_id ? $coupon->product_id : '' }}">
                        <datalist id="sanpham">
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </datalist>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="coupon">Start day</label>
                        <input type="text" name="start_date" value="{{ $coupon->start_date }}" class="form-control" id="start_coupon">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="coupon">End day</label>
                        <input type="text" name="end_date" value="{{ $coupon->end_date }}" class="form-control" id="end_coupon">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Activated</label>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" value="1" type="radio" id="active" name="active"
                                {{ $coupon->active == 1 ? 'checked' : '' }}>
                            <label for="active" class="custom-control-label">Yes</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" value="0" type="radio" id="no_active" name="active"
                                {{ $coupon->active == 0 ? 'checked' : '' }}>
                            <label for="no_active" class="custom-control-label">No</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Status</label>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" value="Còn hạn" type="radio" id="status" name="status"
                                {{ $coupon->status === 'Còn hạn' ? 'checked' : '' }}>
                            <label for="status" class="custom-control-label">Due</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" value="Đã hết hạn" type="radio" id="no_status" name="status"
                                {{ $coupon->status === 'Đã hết hạn' ? 'checked' : '' }}>
                            <label for="no_status" class="custom-control-label">Expired</label>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update Promotion</button>
        </div>
        @csrf
    </form>
@endsection