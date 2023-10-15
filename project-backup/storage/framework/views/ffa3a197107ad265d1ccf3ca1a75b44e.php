<?php $__env->startSection('head-tag'); ?>
    <title>نمایش نظر</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item font-size-12"> <a href="#"> خانه</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#"> بخش محتوی</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#"> نظرات</a></li>
      <li class="breadcrumb-item font-size-12 active" aria-current="page"> نمایش نظر ها</li>
    </ol>
  </nav>


  <section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                نمایش نظرها
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="<?php echo e(route('admin.content.comment.index')); ?>" class="btn btn-info btn-sm">بازگشت</a>
            </section>

            <section class="card mb-3">
                <section class="card-header text-white bg-custom-yellow">
                    کامران محمدی - 845362736
                </section>
                <section class="card-body">
                    <h5 class="card-title">مشخصات کالا : ساعت هوشمند apple watch کد کالا : 8974938</h5>
                    <p class="card-text">به نظر من ساعت خوبیه ولی تنها مشکلی که داره اینه که وزنش زیاده و زود شارژش تموم میشه!</p>
                </section>
            </section>

            <section>
                <form action="" method="">
                    <section class="row">
                        <section class="col-12">
                            <div class="form-group">
                                <label for="">پاسخ ادمین</label>
                               <textarea class="form-control form-control-sm" rows="4"></textarea>
                            </div>
                        </section>
                        <section class="col-12">
                            <button class="btn btn-primary btn-sm">ثبت</button>
                        </section>
                    </section>
                </form>
            </section>

        </section>
    </section>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\hamed.h\Desktop\admin panel\project\resources\views/admin/content/comment/show.blade.php ENDPATH**/ ?>