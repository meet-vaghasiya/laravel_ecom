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
    
    <div class="card-header">
      All category
    </div>


  <form action="{{ url('category/update/'.$category->id) }}" method="POST">
    @csrf
      <div class="form-group">
        <label for="exampleInputEmail1 " class="text-left">Update Category</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Category Name"  name="category_name" value='{{$category->category_name}}'>
        @error('category_name')
      <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
     
      <button type="submit" class="btn btn-primary">Update Category</button>
    </form>
    </div>
  </div>
  



</div>


</div>



</x-app-layout>
