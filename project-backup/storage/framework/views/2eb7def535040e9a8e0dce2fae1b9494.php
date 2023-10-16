<?php $__env->startSection('head-tag'); ?>
    <title>نظرات</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item active font-size-12" aria-current="page"> نظرات </li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                       نظرات
                    </h5>
                    <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                        <a href="<?php echo e(route('admin.market.comment.show')); ?>" class="btn btn-info btn-sm rounded disabled">ایجاد نظر</a>
                        <div class="max-width-16-rem">
                            <input class="form-control form-text form-control-sm" type="text" placeholder="جستجو...">
                        </div>
                    </section>
                    <section class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>کد کاربر</th>
                                <th>نویسنده نظر</th>
                                <th>کد کالا</th>
                                <th>نام کالا</th>
                                <th>وضعیت</th>
                                <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th>1</th>
                                <td>21541232</td>
                                <td>حامد حسن زاده</td>
                                <td>12324867</td>
                                <td>کتاب</td>
                                <td>در انتظار تایید</td>
                                <td class="width-16-rem text-left">
                                    <a href="<?php echo e(route('admin.market.comment.show')); ?>" class="btn btn-sm btn-info align-items-center"><i
                                            class="fa fa-eye"></i> نمایش </a>
                                    <button class="btn btn-sm btn-success"><i class="fa fa-check"></i> تایید </button>
                                </td>
                            </tr>
                            <tr>
                                <th>2</th>
                                <td>21541232</td>
                                <td>حامد حسن زاده</td>
                                <td>12324867</td>
                                <td>کتاب</td>
                                <td>تایید شده</td>
                                <td class="width-16-rem text-left">
                                    <a href="<?php echo e(route('admin.market.comment.show')); ?>" class="btn btn-sm btn-info align-items-center"><i
                                            class="fa fa-eye"></i> نمایش </a>
                                    <button class="btn btn-sm btn-warning"><i class="fa fa-clock"></i> عدم تایید </button>
                                </td>
                            </tr>
                            <tr>
                                <th>3</th>
                                <td>21541232</td>
                                <td>حامد حسن زاده</td>
                                <td>12324867</td>
                                <td>کتاب</td>
                                <td>در انتظار تایید</td>
                                <td class="width-16-rem text-left">
                                    <a href="<?php echo e(route('admin.market.comment.show')); ?>" class="btn btn-sm btn-info align-items-center"><i
                                            class="fa fa-eye"></i> نمایش </a>
                                    <button class="btn btn-sm btn-success"><i class="fa fa-check"></i> تایید </button>
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

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\hamed.h\Desktop\admin panel\project\resources\views/admin/market/comment/index.blade.php ENDPATH**/ ?>