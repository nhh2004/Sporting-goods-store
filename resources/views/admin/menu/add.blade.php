@extends('admin.main')

@section('head')
     <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
<form action="" method="POST">
     <div class="card-body">
       <div class="form-group">
         <label for="menu">Category name</label>
         <input type="text" name="name" class="form-control" placeholder="Enter category name">
       </div>

       <div class="form-group">
         <label>Category</label>
         <select name="parent_id" class="form-control">
             <option value="0">Parent Category</option>
             @foreach ($menus as $menu)
                 <option value="{{ $menu->menu_id }}">{{ $menu->name }}</option>
             @endforeach
         </select>
       </div>

       <div class="form-group">
         <label>Description</label>
         <textarea name="description" class="form-control"></textarea>
       </div>

       <div class="form-group">
             <label>Activate</label>

             <div class="custom-control custom-radio">
                 <input class="custom-control-input" value="1" type="radio" id="active" name="active" checked>
                 <label for="active" class="custom-control-label">Yes</label>
             </div>

             <div class="custom-control custom-radio">
                 <input class="custom-control-input" value="0" type="radio" id="no_active" name="active">
                 <label for="no_active" class="custom-control-label">No</label>
             </div>
       </div>
      
     </div>
     <!-- /.card-body -->

     <div class="card-footer">
       <button type="submit" class="btn btn-primary">Create category</button>
     </div>
     @csrf
   </form>
@endsection

@section('footer')
     <script>
         CKEDITOR.replace('description');
     </script>
@endsection