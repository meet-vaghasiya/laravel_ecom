@extends('admin.admin_master')

@section('admin')
    <div class="container mt-5">

        <div class="row">
            <h4 class="text-dark">Home About</h4>
            <a href="{{ route('home.about.add') }}" class="ml-auto"> <button class="btn btn-info ">Add About</button> </a>
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
                        All About
                    </div>


                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" style="width:5%">Sr No </th>
                                <th scope="col" style="width:15%">About title </th>
                                <th scope="col" style="width:20%">short description </th>
                                <th scope="col" style="width:20%">long description </th>
                                <th scope="col" style="width:20%">Created At</th>
                                <th scope="col" style="width:20%">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @php($i = 1)
                                @foreach ($about as $abt)

                                    <tr>
                                        <th scope="row"  style="width:5%"> {{ $i++ }}</th>
                                        <td style="width:15%"> {{ $abt->title }} </td>
                                        <td style="width:20%">{{ $abt->short_description }} </td>
                                        <td style="width:20%">{{ $abt->long_description }} </td>
                                      
                                        <td style="width:20%">
                                            @if ($abt->created_at == null)
                                                <span class="text-danger"> No Data Available </span>
                                            @else
                                                {{ $abt->created_at }}
                                            @endif
                                        </td>
                                        <td style="width:20%">
                                            <a href="{{ url('abt/edit/' . $abt->id) }}" class="btn btn-primary">edit</a>
                                            <a href="{{ url('delete/abt/' . $abt->id) }}" class="btn btn-danger"
                                                onclick=" return alert('are you sure you want to  delete')">delete</a>

                                        </td>
                                    </tr>
                                @endforeach



                            </tbody>
                        </table>
                        {{-- {{ $about->links() }} --}}

                    </div>
                </div>



            </div>

            {{-- // -------------------------------- trash data table
            start---------------------------------------- --}}

        </div>

    @endsection
