<?php $__env->startSection('contentd'); ?>
    <example-component></example-component>
<?php $__env->stopSection(); ?>


<?php $__env->startSection("content"); ?>
<div class="container">
<?php if(session()->has('message')): ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>Done !!! </strong><?php echo e(session()->get('message'), false); ?>

<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<?php endif; ?>
<?php if(session()->has('error')): ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>Error !!! </strong><?php echo e(session()->get('error'), false); ?>

<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<?php endif; ?>
<div class="col-md-10">
<h1>Todo List</h1>
<hr>
<h4>Task Pending</h4>
<div class="tableResponsive">
<div class="row header"><div class="col-sm-1">ID</div><div class="col-sm-4">Title</div><div class="col-sm-2">Assigned</div><div class="col-sm-2">Action</div></div>
<?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="row mb-sm-2">
<div class="col-sm-1"><?php echo e($task->id, false); ?></div>
<div class="col-sm-4"><?php echo e($task->title, false); ?></div>
<div class="col-sm-2"><?php echo e(Carbon\Carbon::parse($task->created_at)->diffForHumans(), false); ?></div>
<div class="col-sm-2"><a class="btn btn-info btn-sm" href =<?php echo e(url('/'.$task->id.'/complete'), false); ?>><i class="fa fa-check"></i></a></div>

</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<hr/>
<h4>Task Done</h4>
<div class="tableResponsive">
<div class="row header"><div class="col-sm-1">ID</div><div class="col-sm-4">Title</div><div class="col-sm-2">Assigned</div><div class="col-sm-2">Completed</div></div>
<?php $__currentLoopData = $completed_todo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $done): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="row mb-sm-2">
<div class="col-sm-1"><?php echo e($done->id, false); ?></div>
<div class="col-sm-4"><?php echo e($done->title, false); ?></div>
<div class="col-sm-2"><?php echo e(Carbon\Carbon::parse($done->created_at)->diffForHumans(), false); ?></div>
<div class="col-sm-2"><?php echo e(Carbon\Carbon::parse($done->updated_at)->diffForHumans(), false); ?></div>
</div>



<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\laravel\laravel_todo_fullstack\public\views/welcome.blade.php ENDPATH**/ ?>