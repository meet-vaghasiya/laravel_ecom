@extends('admin.admin_master')
@section('admin')
    <div class="col-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Add About</h2>
            </div>
            <div class="card-body">

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <form method="POST" action="{{ route('home.slider.upload') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title"> Title</label>
                        <input type="text" class="form-control" id="title" placeholder="Slider Title"
                            name="title">
                    </div>

                    <div class="form-group">
                        <label for="short_description">short description</label>
                        <textarea class="form-control" id="short_description" rows="3"
                            name="short_description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="long_description">Long description</label>
                        <textarea class="form-control" id="long_description" rows="3"
                            name="long_description"></textarea>
                    </div>
                



                    <div class="form-footer pt-4 pt-5 mt-4 border-top">
                        <button type="submit" class="btn btn-primary btn-default">Submit</button>
                        <button type="" class="btn btn-secondary btn-default">Cancel</button>
                    </div>
                </form>
            </div>
        </div>

    @endsection
