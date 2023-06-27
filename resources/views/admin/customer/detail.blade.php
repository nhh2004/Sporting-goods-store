@extends('admin.main')

@section('content')
     <div class="customer mt-3">
         <ul>
             <li>Customer name: <strong>{{ $customer->name }}</strong></li>
             <li>Email: <strong>{{ $customer->email }}</strong></li>
             <li>Phone number: <strong>{{ $customer->phone }}</strong></li>
         </ul>
     </div>

     <div class="carts">
         <span><strong>List of Purchased Orders</strong></span>
         <table class="table">
             <tbody>
             <tr class="table_head">
                 <th class="column-1">ID</th>
                 <th class="column-2">Total amount</th>
                 <th class="column-3">Order date</th>
             </tr>

             @foreach($orders as $key => $order)
             <tr>
                 <td class="column-1">{{ $order->id }}</td>
                 <td class="column-5">{{ number_format($order->total_money, 0, '', '.') }}</td>
                 <td class="column-4">{{ $order->created_at }}</td>
             </tr>
             @endforeach
             </tbody>
         </table>
     </div>
@endsection