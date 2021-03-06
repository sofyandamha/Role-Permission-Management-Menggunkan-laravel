<?php $__env->startSection('content'); ?>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3>Product <small><a href="<?php echo e(route('products.create')); ?>" class="btn btn-warning btn-sm">New Product</a></small></h3>
        <?php echo Form::open(['url' => 'products', 'method'=>'get', 'class'=>'form-inline']); ?>

            <div class="form-group <?php echo $errors->has('q') ? 'has-error' : ''; ?>">
              <?php echo Form::text('q', isset($q) ? $q : null, ['class'=>'form-control', 'placeholder' => 'Type name / model...']); ?>

              <?php echo $errors->first('q', '<p class="help-block">:message</p>'); ?>

            </div>

          <?php echo Form::submit('Search', ['class'=>'btn btn-primary']); ?>

        <?php echo Form::close(); ?>

        <table class="table table-hover">
          <thead>
            <tr>
              <td>Name</td>
              <td>Model</td>
              <td>Category</td>
              <td></td>
            </tr>
          </thead>
          <tbody>
            <?php foreach($products as $product): ?>
            <tr>
              <td><?php echo e($product->name); ?></td>
              <td><?php echo e($product->model); ?></td>
              <td>
                <?php foreach($product->categories as $category): ?>
                  <span class="label label-primary">
                  <i class="fa fa-btn fa-tags"></i>
                  <?php echo e($category->title); ?></span>
                <?php endforeach; ?>
              </td>
              <td>
                <?php echo Form::model($product, ['route' => ['products.destroy', $product], 'method' => 'delete', 'class' => 'form-inline'] ); ?>

                 <a href="<?php echo e(route('products.edit', $product->id)); ?>">Edit</a> |
                  <?php echo Form::submit('delete', ['class'=>'btn btn-xs btn-danger js-submit-confirm']); ?>

                <?php echo Form::close(); ?>

              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <?php echo $products->links(); ?>

      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>