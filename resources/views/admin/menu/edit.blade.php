@extends('admin.main')

@section('head')
     <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
<form action="" method="POST">
     <div class="card-body">
       <div class="form-group">
         <label for="menu">Category name</label>
         <input type="text" name="name" value="{{ $menu->name }}" class="form-control" placeholder="Enter category name">
       </div>

       <div class="form-group">
         <label>Category</label>
         <select name="parent_id" class="form-control">
             <option value="0" {{ $menu->parent_id == 0 ? 'selected' : ''}}>
                 Parent Directory
             </option>
             @foreach ($menus as $menuParent)
                 <option value="{{ $menuParent->id }}" {{ $menu->parent_id == $menuParent->id ? 'selected' : ''}}>
                     {{ $menuParent->name }}
                 </option>
             @endforeach
         </select>
       </div>

       <div class="form-group">
         <label>Description</label>
         <textarea name="description" class="form-control">{{ $menu->description }}</textarea>
       </div>

       <div class="form-group">
             <label>Activate</label>

             <div class="custom-control custom-radio">
                 <input class="custom-control-input" value="1" type="radio" id="active"
                     name="active" {{ $menu->active == 1 ? 'checked' : '' }}>
                 <label for="active" class="custom-control-label">Yes</label>
             </div>

             <div class="custom-control custom-radio">
                 <input class="custom-control-input" value="0" type="radio" id="no_active"
                     name="active" {{ $menu->active == 0 ? 'checked' : '' }}>
                 <label for="no_active" class="custom-control-label">No</label>
             </div>
       </div>
      
     </div>
     <!-- /.card-body -->

     <div class="card-footer">
       <button type="submit" class="btn btn-primary">Update category</button>
     </div>
     @csrf
   </form>
@endsection

@section('footer')
     <script>
         CKEDITOR.replace('description');
     </script>
@endsection