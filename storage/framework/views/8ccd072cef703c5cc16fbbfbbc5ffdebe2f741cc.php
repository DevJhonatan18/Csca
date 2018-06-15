<?php $__env->startSection('content2'); ?>
    <h1 class="form-group col-md-12">Crear <?php echo e($type); ?></h1>
    
    <?php if($errors->any()): ?>
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    <?php endif; ?>

    <form method="POST" files="true" action="/admin/<?php echo e($type); ?>s" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

        <div class="form-row">
            <div class="form-group col-md-2">
                <label>Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?php echo e(old('nombre')); ?>" >
            </div>
        </div>

        <div class="form-group col-md-2">
            <label>Categoria</label>
            <select class="form-control" name="id_categoria" value="<?php echo e(old('id_categoria')); ?>">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($category->id); ?>"><?php echo e($category->nombre); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2">
                <label>Código barra</label>
                <input type="number" min="1" class="form-control" name="codigo" value="<?php echo e(old('codigo')); ?>" >
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-1">
                <label>Cant.</label>
                <input type="number" min="1" class="form-control" name="pedido" value="<?php echo e(old('pedido')); ?>" >
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-1">
                <label>Costo</label>
                <input class="form-control" name="costo" value="<?php echo e(old('costo')); ?>" >
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group col-md-1">
                <label>Monto</label>
                <input class="form-control" name="monto" value="<?php echo e(old('monto')); ?>" >
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group col-md-1">
                <label>Imagen</label>
                <label class="btn btn-default btn-file col-md-12">
                Elegir<input type="file" required style="display: none;" name="archivo">
                </label>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-1">
                <label>&nbsp;</label>
                <a href="/admin/<?php echo e($type); ?>s" class="btn btn-primary form-control">Volver</a>
            </div>
            
            <div class="form-group col-md-1">
                <label>&nbsp;</label>
                <button type="submit" class="btn btn-success form-control">Crear</button>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>