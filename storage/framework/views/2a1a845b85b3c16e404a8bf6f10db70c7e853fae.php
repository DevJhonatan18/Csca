<?php $__env->startSection('content2'); ?>
    <h1 class="form-group col-md-12">Crear <?php echo e($type); ?></h1>
    
    <?php if($errors->any()): ?>
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    <?php endif; ?>

    <form method="POST" action="/admin/<?php echo e($type); ?>s">
        <?php echo csrf_field(); ?>

        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="inputEmail4">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?php echo e(old('nombre')); ?>" >
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-3">
                <label>&nbsp;</label>
                <a href="/admin/<?php echo e($type); ?>s" class="btn btn-primary form-control">Volver</a>
            </div>
            
            <div class="form-group col-md-3">
                <label>&nbsp;</label>
                <button type="submit" class="btn btn-success form-control">Agregar <?php echo e($type); ?></button>
            </div>
        </div>
    </form>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>