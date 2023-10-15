<?php $__env->startSection('head-tag'); ?>
    <title>ایجاد دسته بندی</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش محتوی</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">دسته بندی</a></li>
            <li class="breadcrumb-item active font-size-12" aria-current="page"> ایجاد دسته بندی </li>
        </ol>
    </nav>
    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        دسته بندی
                    </h5>
                    <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                        <a href="<?php echo e(route('admin.content.category.index')); ?>" class="btn btn-info btn-sm rounded">بازگشت</a>
                    </section>
                    <section>
                        <form action="" method="">
                            <section class="row">
                                <section class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="">نام دسته</label>
                                        <input type="text" class="form-control form-control-sm">
                                    </div>
                                </section>
                                <section class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="">دسته والد</label>
                                        <select name="" id="" class="form-control form-control-sm">
                                            <option value="">دسته را انتخاب کنید</option>
                                            <option value="">وسایل الکترونیکی</option>
                                        </select>
                                    </div>
                                </section>
                                <section class="col-12">
                                    <button class="btn btn-sm btn-primary">ثبت </button>
                                </section>
                            </section>
                        </form>
                    </section>
                </section>
            </section>
        </section>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\hamed.h\Desktop\admin panel\project\resources\views/admin/content/category/create.blade.php ENDPATH**/ ?>