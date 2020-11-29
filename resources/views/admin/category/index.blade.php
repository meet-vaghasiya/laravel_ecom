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
  

<div class="card-header">
  All category
</div>


    <table class="table">
        <thead>
          <tr>
            <th scope="col">Sr No </th>
            <th scope="col">User</th>
            <th scope="col">Category name</th>
            <th scope="col">Created At</th>
            <th scope="col">Action</th>
          </tr>
        </thead>

        <tbody>
 @php($i=1)
@foreach ($categories as $cat)
       
<tr>
<th scope="row"> {{ $categories->firstItem()+$loop->index  }} </th>
  <td> {{$cat->user->name}} </td>
  <td> {{$cat->category_name}} </td>
  <td> 
    @if ($cat->created_at==NULL)
        <span class="text-danger"> No Data Available </span>
        @else
        {{$cat->created_at}} 
    @endif</td>
  <td> 
  <a href="{{url('category/edit/'.$cat->id)}}" class="btn btn-primary">edit</a>  
  <a href="{{url('softdelete/category/'.$cat->id)}}" class="btn btn-danger">delete</a>  
  
  </td>
</tr>
@endforeach

          
         
        </tbody>
      </table>
      {{ $categories->links() }}

    </div>
  </div>

  <div class="col-md-4">
    <div class="card">
    
    <div class="card-header">
      All category
    </div>


  <form action="{{route('store.category')}}" method="POST">
    @csrf
      <div class="form-group">
        <label for="exampleInputEmail1 " class="text-left">Add Category</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Category Name"  name="category_name">
        @error('category_name')
      <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
     
      <button type="submit" class="btn btn-primary">Add Category</button>
    </form>
    </div>
  </div>
  



</div>






 {{-- // -------------------------------- trash data table  start---------------------------------------- --}}
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
    update category
  </div>
  
  
      <table class="table">
          <thead>
            <tr>
              <th scope="col">Sr No </th>
              <th scope="col">User</th>
              <th scope="col">Category name</th>
              <th scope="col">Created At</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
  
          <tbody>
   @php($i=1)
  @foreach ($trash_cat as $cat)
         
  <tr>
  <th scope="row"> {{ $categories->firstItem()+$loop->index  }} </th>
    <td> {{$cat->user->name}} </td>
    <td> {{$cat->category_name}} </td>
    <td> 
      @if ($cat->created_at==NULL)
          <span class="text-danger"> No Data Available </span>
          @else
          {{$cat->created_at}} 
      @endif</td>
    <td> 
    <a href="{{url('category/edit/'.$cat->id)}}" class="btn btn-primary">edit</a>  
    <a href="" class="btn btn-danger">delete</a>  
    
    </td>
  </tr>
  @endforeach
  
            
           
          </tbody>
        </table>
        {{ $trash_cat->links() }}
  
      </div>
    </div>
  
    <div class="col-md-4">
      
    </div>
    
  
  
  
 
  
  
  </div>



</div>









'

</x-app-layout>
