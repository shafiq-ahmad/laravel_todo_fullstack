
@extends("layouts.app")

@section('content')
    <example-component></example-component>
@endsection


@section("content2")
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
<h1>Todo List</h1>
<hr>
<h4>Task Pending</h4>
<div class="tableResponsive">
<div class="row header"><div class="col-sm-1">ID</div><div class="col-sm-4">Title</div><div class="col-sm-2">Assigned</div><div class="col-sm-2">Action</div></div>
@foreach($tasks as $task)
<div class="row mb-sm-2">
<div class="col-sm-1">{{$task->id}}</div>
<div class="col-sm-4">{{$task->title}}</div>
<div class="col-sm-2">{{Carbon\Carbon::parse($task->created_at)->diffForHumans()}}</div>
<div class="col-sm-2"><a class="btn btn-info btn-sm" href ={{url('/'.$task->id.'/complete')}}><i class="fa fa-check"></i></a></div>

</div>
@endforeach
</div>
<hr/>
<h4>Task Done</h4>
<div class="tableResponsive">
<div class="row header"><div class="col-sm-1">ID</div><div class="col-sm-4">Title</div><div class="col-sm-2">Assigned</div><div class="col-sm-2">Completed</div></div>
@foreach($completed_todo as $done)
<div class="row mb-sm-2">
<div class="col-sm-1">{{$done->id}}</div>
<div class="col-sm-4">{{$done->title}}</div>
<div class="col-sm-2">{{Carbon\Carbon::parse($done->created_at)->diffForHumans()}}</div>
<div class="col-sm-2">{{Carbon\Carbon::parse($done->updated_at)->diffForHumans()}}</div>
</div>



@endforeach
</div>
</div>
</div>
@endsection