<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
    <div class="d-flex justify-content-between">       
     <div class=""> All Category<b></b></div>
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
  



  <div class="container">
    <div class="row">
      <div class="col-8">
<div class="card-group">
        @foreach ($images as $image)
            <div class="col-4">
              <div class="card">
                <img src=" {{asset($image->multi_image)}}  " alt="">
              </div>
            </div>
        @endforeach

      </div>

      </div>
    </div>
  </div>
     

    </div>
  </div>

  <div class="col-md-4">
    <div class="card">
    
    <div class="card-header">
      Add Multiple Images
    </div>


  <form action="{{route('store.image')}}" method="POST" enctype="multipart/form-data">
    @csrf
      <div class="form-group">
        <label for="exampleInputEmail1 " class="text-left">Add Multiple Images</label>
        <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Category Name"  name="multi_image[]" multiple="">
        @error('category_name')
      <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
     
      <button type="submit" class="btn btn-primary">Add Images</button>
    </form>
    </div>
  </div>
  
</div>



 {{-- // -------------------------------- trash data table  start---------------------------------------- --}}
 

</div>

</x-app-layout>
