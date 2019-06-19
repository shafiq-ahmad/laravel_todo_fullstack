@extends("layouts.app")
@section("content")
<div class="container">
@if(session()->has('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>Done !!! </strong>{{ session()->get('message') }}
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
@endif
@if(session()->has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>Error !!! </strong>{{ session()->get('error') }}
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
@endif
<div class="col-md-10">
<h1>Admin Todo List</h1>
<form method="POST" action={{url('/admin/todo')}}>
{{csrf_field()}}
<div class="form-group">
<input type="text" class="form-control" name="title" placeholder="Enter Task">
</div>
<div class="form-group">
<div class="row mb-sm-2">
<div class="col-sm-12">
<label for="user_id">User</label>
<select name="user_id" id="user_id" class="form-control">
@foreach($users as $user)
<option value="{{$user->id}}">{{$user->name}}</option>
@endforeach
</select></div>
</div>
</div>
<div class="form-group">
<button type="submit" class="btn btn-success">Add</button>
</div>
</form>
<hr>
<h4>Task Pending</h4>
<div class="tableResponsive">
<div class="row header"><div class="col-sm-1">ID</div><div class="col-sm-6">Title</div><div class="col-sm-3">User</div><div class="col-sm-2">Action</div></div>
@foreach($tasks as $task)
<div class="row mb-sm-2">
<div class="col-sm-1">{{$task->id}}</div>
<div class="col-sm-6">{{$task->title}}</div>
<div class="col-sm-3">{{$task->userName}}</div>
<div class="col-sm-2"><a class="btn btn-info btn-sm" href ={{url('admin/'.$task->id.'/complete')}}><i class="fa fa-check"></i></a></div>
</div>
@endforeach
</div>
<hr/>
<h4>Task Done</h4>
<div class="tableResponsive">
<div class="row header"><div class="col-sm-1">ID</div><div class="col-sm-6">Title</div><div class="col-sm-3">User</div><div class="col-sm-2">Action</div></div>
@foreach($completed_todo as $done)
<div class="row mb-sm-2">
<div class="col-sm-1">{{$done->id}}</div>
<div class="col-sm-6">{{$done->title}}</div>
<div class="col-sm-3">{{$done->userName}}</div>
<div class="col-sm-2"><a class="btn btn-danger btn-sm" href ={{url('admin/'.$done->id.'/delete')}}><i class="fa fa-trash"></i></a></div>
</div>



@endforeach
</div>
</div>
</div>
@endsection