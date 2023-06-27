@extends('admin.main')


@section('content')
    <form action="" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Title</label>
                        <input type="text" name="name" value="{{ $slider->name }}" class="form-control">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Path</label>
                        <input type="text" name="url" value="{{ $slider->url }}" class="form-control">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="menu">Image product</label>
                <input type="file" name="file" class="form-control" id="upload">
                <div id="image_show" class="mt-2">
                    <a href="{{ $slider->image }}" target="_blank">
                        <img src="{{ $slider->image }}" width="100px">
                    </a>
                </div>
                <input type="hidden" name="image" value="{{ $slider->image }}" id="image">
            </div>

            <div class="form-group">
                <label for="menu">Arrange</label>
                <input type="text" name="sort_by" value="{{ $slider->sort_by }}" class="form-control">
            </div>

            <div class="form-group">
                <label>activated</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="active" 
                        {{ $slider->active == 1 ? 'checked' : '' }}>
                    <label for="active" class="custom-control-label">Yes</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="active" 
                    {{ $slider->active == 0 ? 'checked' : '' }}>
                    <label for="no_active" class="custom-control-label">No</label>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update Banner</button>
        </div>
        @csrf
    </form>
@endsection