<?php $__env->startSection('head-tag'); ?>
    <title>محصولات</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item active font-size-12" aria-current="page"> محصولات </li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        محصولات
                    </h5>
                    <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                        <a href="<?php echo e(route('admin.market.product.create')); ?>" class="btn btn-info btn-sm rounded disabled">ایجاد محصول جدید</a>
                        <div class="max-width-16-rem">
                            <input class="form-control form-text form-control-sm" type="text" placeholder="جستجو...">
                        </div>
                    </section>
                    <section class="table-responsive">
                        <table class="table table-striped table-hover h-150">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>نام کالا</th>
                                <th>تصویر کالا</th>
                                <th>قیمت</th>
                                <th>وزن</th>
                                <th>دسته</th>
                                <th>فرم</th>
                                <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th>1</th>
                                <td>گوشی آیفون 12</td>
                                <td><img src="<?php echo e(asset('admin-assets/images/avatar-2.jpeg')); ?>" alt=""></td>
                                <td>34,000 تومان</td>
                                <td>1 کیلو</td>
                                <td>کالای الکترونیکی</td>
                                <td>اندازه نمایشگر</td>
                                <td class="width-8-rem text-left">
                                   <div class="dropdown">
                                       <a href="#"
                                          class="btn btn-sm btn-success btn-block dropdown-toggle"
                                          role="button"
                                          id="dropdownMenuLink"
                                          data-toggle="dropdown"
                                       aria-expanded="false">
                                           <i class="fa fa-tools"></i> عملیات
                                       </a>
                                       <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                           <a href="<?php echo e(route('admin.market.gallery.index')); ?>" class="dropdown-item text-right align-items-center justify-content-between"><i class="fa fa-images"></i> گالری</a>
                                           <a href="" class="dropdown-item text-right"><i class="fa fa-list-ul"></i> فرم کالا</a>
                                           <a href="" class="dropdown-item text-right"><i class="fa fa-edit"></i> ویرایش</a>
                                           <form action="">
                                               <button class="dropdown-item text-right" type="submit">
                                                   <i class="fa fa-window-close"></i> حذف
                                               </button>
                                           </form>
                                       </div>
                                   </div>
                                </td>
                            </tr>
                            <tr>
                                <th>1</th>
                                <td>گوشی آیفون 12</td>
                                <td><img src="<?php echo e(asset('admin-assets/images/avatar-2.jpeg')); ?>" alt=""></td>
                                <td>34,000 تومان</td>
                                <td>1 کیلو</td>
                                <td>کالای الکترونیکی</td>
                                <td>اندازه نمایشگر</td>
                                <td class="width-8-rem text-left">
                                   <div class="dropdown">
                                       <a href="#"
                                          class="btn btn-sm btn-success btn-block dropdown-toggle"
                                          role="button"
                                          id="dropdownMenuLink"
                                          data-toggle="dropdown"
                                       aria-expanded="false">
                                           <i class="fa fa-tools"></i> عملیات
                                       </a>
                                       <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                           <a href="<?php echo e(route('admin.market.gallery.index')); ?>" class="dropdown-item text-right align-items-center justify-content-between"><i class="fa fa-images"></i> گالری</a>
                                           <a href="" class="dropdown-item text-right"><i class="fa fa-list-ul"></i> فرم کالا</a>
                                           <a href="" class="dropdown-item text-right"><i class="fa fa-edit"></i> ویرایش</a>
                                           <form action="">
                                               <button class="dropdown-item text-right" type="submit">
                                                   <i class="fa fa-window-close"></i> حذف
                                               </button>
                                           </form>
                                       </div>
                                   </div>
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

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\hamed.h\Desktop\admin panel\project\resources\views/admin/market/product/index.blade.php ENDPATH**/ ?>