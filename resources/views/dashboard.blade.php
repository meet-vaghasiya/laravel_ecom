<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
    <div class="d-flex justify-content-between">       
     <div class=""> Hii..<b>{{ Auth::user()->name }}</b></div>
<b style="" class="text-right">Total users
  <span class="badge badge-info">{{ count($users) }}</span>
</div>
   </h2>
    </x-slot>




<div class="container mt-5">

<div class="row">

    <table class="table">
        <thead>
          <tr>
            <th scope="col">Sr No </th>
            <th scope="col">Name </th>
            <th scope="col">Email</th>
            <th scope="col">Created At</th>
          </tr>
        </thead>
        <tbody>

        @php($i=1)
            
       
@foreach ($users as $user)
<tr>
  <th scope="row">{{ $i++ }}</th>
  <td>{{ $user->name }}</td>
  <td>{{ $user->email }}</td>
  <td>{{ Carbon\Carbon::parse($user->created_at)->diffForHumans() }}</td>
</tr>
@endforeach   

          
         
        </tbody>
      </table>

</div>


</div>



</x-app-layout>
