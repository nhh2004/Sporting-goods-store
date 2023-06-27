@extends('admin.main')

@section('content')
     <form action="" method="POST">
         <div class="card-body">
             <div class="row">
                 <div class="col-md-6">
                     <div class="form-group">
                         <label>Order Status</label>
                         <select class="form-control" name="status">
                             <option value="Order received" {{ $order->status == "Order received" ? 'selected' : '' }}>Application received</option>
                             <option value="Not received" {{ $order->status == "Not received" ? 'selected' : '' }}>Not yet received</option>
                             <option value="Single error" {{ $order->status == "Single error" ? 'selected' : '' }}>Single error</option>
                         </select>
                     </div>
                 </div>
             </div>
         </div>

         <div class="card-footer">
             <button type="submit" class="btn btn-primary">Update order</button>
         </div>
         @csrf
     </form>
@endsection