
<!-- START FORM -->
<?php $__env->startSection('konten'); ?> 
<form action='<?php echo e(url('archive/'.$data->code)); ?>' method='post'>
<?php echo csrf_field(); ?> 
<?php echo method_field('PUT'); ?>
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <a href='<?php echo e(url('archive')); ?>' class="btn btn-secondary">< kembali</a>
    <div class="mb-3 row">
        <label for="code" class="col-sm-2 col-form-label">Code</label>
        <div class="col-sm-10">
            <?php echo e($data->code); ?>

        </div>
    </div>
    <div class="mb-3 row">
        <label for="title" class="col-sm-2 col-form-label">Title</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='title' value="<?php echo e($data->title); ?>" id="title">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="category" class="col-sm-2 col-form-label">Category</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='category' value="<?php echo e($data->category); ?>" id="category">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="category" class="col-sm-2 col-form-label"></label>
        <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
    </div>
</div>
</form>
<!-- AKHIR FORM -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\School\TOT\Arsip\try\resources\views/archive/edit.blade.php ENDPATH**/ ?>