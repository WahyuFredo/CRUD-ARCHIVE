<style>
header{
    background-color: #0d6efd;
    padding: 10px;
    text-align: center;
}
h3{
    color: snow
}
</style>

<!-- START DATA -->
<?php $__env->startSection('konten'); ?> 
<header>
    <h3>ARSIP</h3>
</header>   
<div class="my-3 p-3 bg-body rounded shadow-sm text-center">
    <!-- HEADER -->
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <!-- FORM PENCARIAN -->
    <div class="pb-3">
        <form class="d-flex" action="<?php echo e(url('archive')); ?>" method="get">
            <input class="form-control me-1" type="search" name="katakunci" value="<?php echo e(Request::get('katakunci')); ?>" placeholder="Masukkan kata kunci" aria-label="Search">
            <button class="btn btn-secondary" type="submit">Cari</button>
        </form>
    </div>
    
    <!-- TOMBOL TAMBAH DATA -->
    <div class="pb-3">
        <a href='<?php echo e(url('archive/create')); ?>' class="btn btn-primary">+ Tambah Data</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th class="col-md-1">No</th>
                <th class="col-md-3">Kode</th>
                <th class="col-md-4">Judul</th>
                <th class="col-md-2">Kategori</th>
                <th class="col-md-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = $data->firstItem() ?>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($i); ?></td>
                <td><?php echo e($item->code); ?></td>
                <td><?php echo e($item->title); ?></td>
                <td><?php echo e($item->category); ?></td>
                <td>
                    <a href='<?php echo e(url('archive/'.$item->code.'/edit')); ?>' class="btn btn-warning btn-sm">Edit</a>
                    <form onsubmit="return confirm('Yakin akan menghapus data?')" class='d-inline' action="<?php echo e(url('archive/'.$item->code)); ?>" method="post">
                        <?php echo csrf_field(); ?> 
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                    </form>
                </td>
            </tr>
            <?php $i++ ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <?php echo e($data->withQueryString()->links()); ?>

</div>
<!-- AKHIR DATA -->
<?php $__env->stopSection(); ?>
    
<?php echo $__env->make('layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\School\TOT\Arsip\try\resources\views/archive/index.blade.php ENDPATH**/ ?>