<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
    <div class="d-flex justify-content-between">       
     <div class=""> All Brand<b></b></div>
<b style="" class="text-right">
  <span class="badge badge-info"></span>
</div>
   </h2>
    </x-slot>

<div class="container mt-5">

<div class="row">
<div class="col-md-8">
<div class="card">

@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{session('success')}}</strong> 
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
            <th scope="col">brand name</th>
            <th scope="col">brand image</th>
            <th scope="col">Created At</th>
            <th scope="col">Action</th>
          </tr>
        </thead>

        <tbody>
 @php($i=1)
@foreach ($brands as $brand)
       
<tr>
<th scope="row"> {{ $brands->firstItem()+$loop->index  }} </th>
  <td> {{$brand->brand_name}} </td>
<td><img src="{{asset($brand->brand_image)}}" style="height:40px; width:80px" ></img> </td>
  {{-- <td> {{$brand->brand_image}} </td> --}}
  <td> 
    @if ($brand->created_at==NULL)
        <span class="text-danger"> No Data Available </span>
        @else
        {{$brand->created_at}} 
    @endif
</td>
  <td> 
  <a href="{{url('brand/edit/'.$brand->id)}}" class="btn btn-primary">edit</a>  
  <a href="{{url('delete/brand/'.$brand->id)}}" class="btn btn-danger" onclick=" return alert('are you sure you want to  delete')">delete</a>  
  
  </td>
</tr>
@endforeach

          
         
        </tbody>
      </table>
      {{ $brands->links() }}

    </div>
  </div>

  <div class="col-md-4">
    <div class="card">
    
    <div class="card-header">
      All Brands
    </div>


  <form action="{{route('store.brand')}}" method="POST" enctype="multipart/form-data">
    @csrf
      <div class="form-group">
        <label for="exampleInputEmail1 " class="text-left">Add Brands</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Brand Name"  name="brand_name">
        @error('brand_name')
      <span class="text-danger my-0">{{$message}}</span>
        @enderror
      </div>
      <div class="form-group">
        <label for="exampleInputBrand " class="text-left my-0"> Add Brand Image</label>
        <input type="file" class="form-control" id="exampleInputBrand" aria-describedby="emailHelp" placeholder="Enter Brand Image"  name="brand_image">
        @error('brand_image')
        <span class="text-danger my-0">{{$message}}</span>
          @enderror
      </div>
     
      <button type="submit" class="btn btn-primary">Add Brand</button>
    </form>
    </div>
  </div>
  
</div>

 {{-- // -------------------------------- trash data table  start---------------------------------------- --}}

</div>

</x-app-layout>
