@extends('admin.main')

@section('content')
    <table class="table" id="myTable" class="m-t-4">
        <thead>
        <tr>
            <th style="width: 20px">ID</th>
            <th>Name of promotion</th>
            <th>Promotion type</th>
            <th>Amount</th>
            <th>Category</th>
            <th>Product</th>
            <th>Activate</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Status</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
            @foreach($coupons as $key => $coupon)
            <tr>
                <td>{{ $coupon->id }}</td>
                <td>{{ $coupon->name }}</td>
                <td>{{ $coupon->type }}</td>
                <td>{{ number_format($coupon->number, 0, '', '.') }}</td>
                <td>{{ $coupon->menu?->name }}</td>
                <td>{{ $coupon->product?->name }}</td>
                <td>{!! \App\Helpers\Helper::activeDate($coupon->active, $coupon->end_date, $today) !!}</td>
                <td>{{ $coupon->start_date }}</td>
                <td>{{ $coupon->end_date }}</td>
                <td>
                    @if($coupon->end_date > $today)
                        <span style="color:green">Due</span>
                    @else
                        <span style="color:red">Expired</span>
                    @endif   
                </td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/coupons/edit/{{ $coupon->id }}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow({{ $coupon->id }}, '/admin/coupons/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- {!! $products->links() !!} --}}
@endsection