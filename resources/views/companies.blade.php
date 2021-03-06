@extends('layouts.app')
@section('content')

<div class="container" style="width:900px" >
<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))

      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
  </div>
<a href="/company"><button type="button" class="btn  btn-success btn-sm " style="margin-bottom: 13px;">Create new company</button></a>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Logo</th>
      <th scope="col">Cpmpany</th>
      <th scope="col">Email</th>
      <th scope="col">Website</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($mains as $main )
    <tr>
      <th scope="row">{{$main->id}}</th>
      <td> <img src="{{$main->logo}}"  width="50" height="50"></td>
      <td>{{$main->name}}</td>
      <td>{{$main->email}}</td>
      <td><a href="{{$main->website}}">{{Str::limit($main->website, 10)}}</a></td>
      
      <td>
      <a  href="{{route('main.edit',$main->id)}}"><i class="fas fa-edit"></i></a>
      <a style="margin-left: 14px;color: red;"href="{{route('main.destroy', $main->id)}}" class="delete" data-confirm="Are you sure to delete this item?"><i class="fas fa-trash-alt"></i></a>
      </td>
    </tr>
    @endforeach 
  </tbody>
</table>

{{ $mains->onEachSide(5)->links() }}

</div>


<script>
  var deleteLinks = document.querySelectorAll('.delete');

for (var i = 0; i < deleteLinks.length; i++) {
  deleteLinks[i].addEventListener('click', function(event) {
      event.preventDefault();

      var choice = confirm(this.getAttribute('data-confirm'));

      if (choice) {
        window.location.href = this.getAttribute('href');
      }
  });
}
</script>





@endsection