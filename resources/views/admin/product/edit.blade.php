@extends('admin.main')

@section('head')
     <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
     <form action="" method="POST">
         <div class="card-body">
             <div class="row">
                 <div class="col-md-6">
                     <div class="form-group">
                         <label for="menu">Product Name</label>
                         <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="Enter product name">
                     </div>
                 </div>

                 <div class="col-md-6">
                     <div class="form-group">
                         <label>Category</label>
                         <select class="form-control" name="menu_id">
                             @foreach($menus as $menu)
                                 <option value="{{ $menu->id }}" {{ $product->menu_id == $menu->id ? 'selected' : '' }}>{{ $menu->name }}</option>
                             @endforeach
                         </select>
                     </div>
                 </div>
             </div>

             <div class="row">
                 <div class="col-md-6">
                     <div class="form-group">
                         <label for="menu">Cost cost</label>
                         <input type="number" name="original_price" value="{{ $product->original_price }}" class="form-control" >
                     </div>
                 </div>

                 <div class="col-md-6">
                     <div class="form-group">
                         <label for="menu">Price</label>
                         <input type="number" name="price_sale" value="{{ $product->price_sale }}" class="form-control" >
                     </div>
                 </div>
             </div>

             <div class="form-group">
                 <label>Description </label>
                 <textarea name="description" class="form-control">{{ $product->description }}</textarea>
             </div>

             <div class="form-group">
                 <label>Detailed Description</label>
                 <textarea name="content" id="content" class="form-control">{{ $product->content }}</textarea>
             </div>

             <div class="form-group">
                 <label for="menu">Product Image</label>
                 <input type="file" name="file" class="form-control" id="upload">
                 <div id="image_show" class="mt-2">
                     <a href="{{ $product->image }}" target="_blank">
                         <img src="{{ $product->image }}" width="100px">
                     </a>
                 </div>
                 <input type="hidden" name="image" value = "{{ $product->image }}" id="image">
             </div>

             <div class="form-group">
                 <label>Activation</label>
                 <div class="custom-control custom-radio">
                     <input class="custom-control-input" value="1" type="radio" id="active" name="active"
                         {{ $product->active == 1 ? 'checked' : ''}}>
                     <label for="active" class="custom-control-label">Yes</label>
                 </div>
                 <div class="custom-control custom-radio">
                     <input class="custom-control-input" value="0" type="radio" id="no_active" name="active"
                         {{ $product->active == 0 ? 'checked' : ''}}>
                     <label for="no_active" class="custom-control-label">No</label>
                 </div>
             </div>

         </div>

         <div class="card-footer">
             <button type="submit" class="btn btn-primary">Update Product</button>
         </div>
         @csrf
     </form>
@endsection

@section('footer')
     <script>
         CKEDITOR.replace('content');
     </script>
@endsection