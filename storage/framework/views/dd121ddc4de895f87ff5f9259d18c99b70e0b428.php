<div class="form-group">
      <label for="squareInput">Nama Santri</label>
      <?php echo Form::select('id_santri', [''=>'-']+ App\Santri::pluck('nama','id')->all(),null,['class' =>$errors->has('id_santri') ? 'form-control is-invalid' : 'form-control','required' ]); ?>

     <?php if($errors->has('id_santri')): ?>
      <span class="invalid-feedback">
          <strong><?php echo e($errors->first('id_santri')); ?></strong>
      </span>
     <?php endif; ?>
 </div>
 <div class="form-group">
        <label for="squareInput">Kategori Penilaian</label>
        <?php
        $ktgs = App\Kategori::select('id','nama','bobot')->get();
        ?>
        <div class="form-check">
            <?php $__currentLoopData = $ktgs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" value="<?php echo e($item->id); ?>" name="ktgnilai">
                        <span class="form-check-sign"><?php echo e($item->nama); ?>(<?php echo e($item->bobot); ?>)</span>
                    </label>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
</div>
<div class="form-group">
        <label for="squareInput">Keterangan</label>
       <?php echo Form::textarea('keterangan',null,['class'=>$errors->has('keterangan') ? 'form-control is-invalid' : 'form-control'  ]); ?>

      <?php if($errors->has('keterangan')): ?>
        <span class="invalid-feedback">
            <strong><?php echo e($errors->first('keterangan')); ?></strong>
        </span>
       <?php endif; ?>
</div>