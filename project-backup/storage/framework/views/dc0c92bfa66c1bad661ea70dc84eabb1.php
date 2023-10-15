<?php $__env->startSection('head-tag'); ?>
    <title>پرداخت ها</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item active font-size-12" aria-current="page"> پرداخت ها </li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        پرداخت ها
                    </h5>
                    <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                        <a href="<?php echo e(route('admin.market.brand.create')); ?>" class="btn btn-info btn-sm rounded disabled">ایجاد پرداخت </a>
                        <div class="max-width-16-rem">
                            <input class="form-control form-text form-control-sm" type="text" placeholder="جستجو...">
                        </div>
                    </section>
                    <section class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>کد تراکنش</th>
                                <th>بانک</th>
                                <th>پرداخت کننده</th>
                                <th>وضعیت پرداخت</th>
                                <th>نوع پرداخت</th>
                                <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th>1</th>
                                <td>52416865415</td>
                                <td>ملت</td>
                                <td>حامد حسن زاده</td>
                                <td>تایید شده</td>
                                <td>آنلاین</td>
                                <td class="width-22-rem text-left">
                                    <a href="#" class="btn btn-sm btn-info align-items-center"><i
                                            class="fa fa-edit"></i> مشاهده </a>
                                    <a href="#" class="btn btn-sm btn-warning align-items-center"><i
                                            class="fa fa-window-close"></i> باطل کردن </a>
                                    <a href="#" class="btn btn-sm btn-danger align-items-center"><i
                                            class="fa fa-reply"></i> برگرداندن </a>
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

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\hamed.h\Desktop\admin panel\project\resources\views/admin/market/payment/index.blade.php ENDPATH**/ ?>