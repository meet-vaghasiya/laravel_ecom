@extends('admin.admin_master')

@section('admin')
    <div class="container mt-5">

        <div class="row">
            <h4 class="text-dark">Home Slider</h4>
            <a href="{{ route('add.slider') }}" class="ml-auto"> <button class="btn btn-info ">Add Slider</button> </a>
            <div class="col-md-12 mt-3">
                <div class="card">

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif


                    <div class="card-header">
                        All Brand
                    </div>


                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Sr No </th>
                                <th scope="col">slider title </th>
                                <th scope="col">slider description </th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @php($i = 1)
                                @foreach ($sliders as $slider)

                                    <tr>
                                        <th scope="row"> {{ $i++ }}</th>
                                        <td> {{ $slider->title }} </td>
                                        <td><img src="{{ asset($slider->image) }}" style="height:40px; width:80px"> </td>
                                        {{-- <td> {{ $brand->brand_image }} </td>
                                        --}}
                                        <td>
                                            @if ($slider->created_at == null)
                                                <span class="text-danger"> No Data Available </span>
                                            @else
                                                {{ $slider->created_at }}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('slider/edit/' . $slider->id) }}" class="btn btn-primary">edit</a>
                                            <a href="{{ url('delete/slider/' . $slider->id) }}" class="btn btn-danger"
                                                onclick=" return alert('are you sure you want to  delete')">delete</a>

                                        </td>
                                    </tr>
                                @endforeach



                            </tbody>
                        </table>
                        {{-- {{ $sliders->links() }} --}}

                    </div>
                </div>



            </div>

            {{-- // -------------------------------- trash data table
            start---------------------------------------- --}}

        </div>

    @endsection
