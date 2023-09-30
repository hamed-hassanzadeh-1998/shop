<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function coupon()
    {
        return view('admin.market.discount.coupon');
    }
    public function couponCreate()
    {
        return view('admin.market.discount.coupon-create');
    }
    public function commonDiscount()
    {
        return view('admin.market.discount.common');
    }
    public function createCommonDiscount()
    {
        return view('admin.market.discount.common-create');
    }
    public function amazingSale()
    {
        return view('admin.market.discount.amazing');
    }
    public function amazingSaleCreate()
    {
        return view('admin.market.discount.amazing-create');
    }

}
