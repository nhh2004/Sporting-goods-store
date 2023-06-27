@extends('admin.main')

@section('content')
     <div class="customer mt-3">
         <ul>
             @foreach($customer as $key => $customer)
             <li>Customer name: <strong>{{ $customer->name }}</strong></li>
             <li>Phone number: <strong>{{ $customer->phone }}</strong></li>
             <li>Address: <strong>{{ $customer->address }}</strong></li>
             <li>Email: <strong>{{ $customer->email }}</strong></li>
             @endforeach
         </ul>
     </div>

     <div class="carts">
         @php $total = 0; @endphp
         <table class="table">
             <tbody>
             <tr class="table_head">
                 <th class="column-1">Picture</th>
                 <th class="column-2">Product name</th>
                 <th class="column-3">Price</th>
                 <th class="column-4">Quantity</th>
                 <th class="column-5">Make money</th>
             </tr>
             @foreach($cthds as $key => $cthd)
             @php
             $total_money = $cthd->amount * $cthd->unit_price;
             $total += $total_money;
             @endphp
             <tr>
                 <td class="column-1">
                     <div class="how-itemcart1">
                         @if ($cthd->product)
                             <img src="{{ $cthd->product->image }}" alt="IMG" style="width: 100px">
                         @else
                             <span>No image available</span>
                         @endif
                     </div>
                 </td>
                 <td class="column-2">{{ $cthd->product->name ?? 'N/A' }}</td>
                 <td class="column-3">{{ number_format($cthd->unit_price, 0, '', '.') }}</td>
                 <td class="column-4">{{ $cthd->amount }}</td>
                 <td class="column-5">{{ number_format($total_money, 0, '', '.') }}</td>
             </tr>
         @endforeach
        
                 <tr>
                     <td colspan="4" class="text-right">Total Amount:</td>
                     <td>{{ number_format($total, 0, '', '.') }}</td>
                 </tr>
             </tbody>
         </table>
         <a class="btn btn-primary" target="_blank" href="/admin/print-order/{{ $order->id }}">
             <i class="fas fa-print"></i>
             <span>Print order</span>
         </a>
     </div>
@endsection