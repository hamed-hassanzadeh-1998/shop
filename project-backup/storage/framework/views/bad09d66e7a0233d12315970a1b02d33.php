<?php $__env->startSection('head-tag'); ?>
    <title>اطلاع رسانی پیامکی</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش اطلاع رسانی</a></li>
            <li class="breadcrumb-item active font-size-12" aria-current="page"> اطلاع رسانی پیامکی </li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        اطلاع رسانی پیامکی
                    </h5>
                    <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                        <a href="<?php echo e(route('admin.notify.sms.create')); ?>" class="btn btn-info btn-sm rounded">ایجاد پیامک جدید</a>
                        <div class="max-width-16-rem">
                            <input class="form-control form-text form-control-sm" type="text" placeholder="جستجو...">
                        </div>
                    </section>
                    <section class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>عنوان اطلاعیه </th>
                                <th>تاریخ ارسال</th>
                                <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th>1</th>
                                <td>فروش ویژه بهاری</td>
                                <td>24 اردیبهشت 02</td>
                                <td class="width-16-rem text-left">
                                    <a href="#" class="btn btn-sm btn-info align-items-center"><i
                                            class="fa fa-edit"></i> ویرایش </a>
                                    <button class="btn btn-sm btn-danger"><i class="fa fa-trash-alt"></i> حذف </button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </section>
                </section>
            </section>
        </section>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\hamed.h\Desktop\admin panel\project\resources\views/admin/notify/sms/index.blade.php ENDPATH**/ ?>