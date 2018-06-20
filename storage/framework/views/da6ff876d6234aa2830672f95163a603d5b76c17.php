<?php $__env->startSection('content3'); ?>
    
    <div style="display: flex;">
        <div>
            <h1 style="margin-top: auto;"><?php echo e($titulo); ?></h1>
        </div>
        <?php if($subtitulo != "La orden todavía no existe"): ?>
            <div style="margin-left: auto; margin-top: 3px;">
                <label class="btn btn-success">TOTAL $<?php echo e($order->monto); ?></label>
            </div>
            <div style="margin-top: 3px; margin-left: 5px;">    
                <?php if($order->desc == 0): ?>
                    <?php if($order->completada == 0): ?>
                    <form method="POST" action="/admin/control/<?php echo e($tipo); ?>/descuento/<?php echo e($id_order); ?>">
                        <?php echo csrf_field(); ?>

                        <input class="btn btn-default" type="number" name="desc" placeholder="DESC $<?php echo e($order->desc); ?>" style="width: 105px;">
                    </form>
                    <?php else: ?>
                        <label class="btn btn-default">DESC $<?php echo e($order->desc); ?></label>
                    <?php endif; ?>
                <?php else: ?>
                    <label class="btn btn-danger">DESC $<?php echo e($order->desc); ?></label>
                <?php endif; ?>
            </div>
            <div style="margin-top: 3px; margin-left: 5px;">    
                <?php if($order->completada == 1): ?>
                <a href="/admin/control/ingresos/<?php echo e($tipo); ?>" class="btn btn-primary"><span class="oi oi-arrow-left"></span> <b>VOLVER</b></a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
    <h4 class="mt-2 mb-3"><?php echo e($subtitulo); ?></h4>
        
    <?php if($subtitulo != "La orden todavía no existe"): ?>
        <div class="card card-body">
            <p>
                <?php if($order->completada != "1"): ?>
                <form method="POST" action="/admin/control/ingresos/<?php echo e($tipo); ?>/<?php echo e($id_order); ?>">
                    <?php echo csrf_field(); ?>

                        
                    <div class="form-group col-md-2" style="padding-left: 0px;">
                        <label>Servicio</label>
                        <select class="form-control" name="id_servicio" value="<?php echo e(old('id_servicio')); ?>">
                            <?php $__currentLoopData = $servicios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $servicio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($servicio->id); ?>"><?php echo e($servicio->nombre); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                                
                    <div class="form-group col-md-6" style="padding-left: 0px;">
                        <label>Detalle</label>
                        <input required type="text" class="form-control" name="detalle" value="<?php echo e(old('detalle')); ?>">
                    </div>
                    <input type="hidden" class="form-control" name="id_type" value="<?php echo e($id_type); ?>">
                    <input type="hidden" class="form-control" name="id_order" value="<?php echo e($id_order); ?>">
                        
                    <div class="form-group col-md-2" style="padding-left: 0px;">
                        <label>&nbsp;</label>
                        <button type="submit" class="btn btn-success form-control">Agregar</button>
                    </div>
                </form>
                <form method="POST" action="/admin/control/<?php echo e($tipo); ?>/cerrar/<?php echo e($id_order); ?>">
                    <?php echo csrf_field(); ?>

                    <input type="hidden" class="form-control" name="completada" value="1">
                    <div class="form-group col-md-2" style="padding-left: 0px;">
                        <label>&nbsp;</label>
                        <button type="submit" class="btn btn-danger form-control">Cerrar</button>
                    </div>
                </form>
                <?php endif; ?>
            </p>
        </div>
    <?php endif; ?>

    <p></p>
    
    <table class="table">
        <thead class="thead-dark"></thead>
            <tr>
                <th scope="col">Servicio</th>
                <th scope="col">Detalle</th>
                <th scope="col">Monto</th>
                <th scope="col">Fecha</th>
                <th scope="col">Hora</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $orders_indiv; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td scope="row">
                        <?php $__currentLoopData = $servicios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $servicio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($servicio->id == $order->id_servicio): ?>
                                <?php echo e($servicio->nombre); ?>

                                <?php break; ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </td>
                    <td><?php echo e($order->detalle); ?></td>
                    <td><b>$</b> <?php echo e($order->monto); ?></td>
                    <td><?php echo e(date('d/m/y', strtotime($order->created_at))); ?></td>
                    <td><?php echo e(date('H:i', strtotime($order->created_at))); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('control.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>