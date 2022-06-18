@extends('layouts.site')
@section('main')
<div class="card card-info" dir="rtl">
    <div class="card-header">
        <h3 class="card-title">تقديم طلب</h3>
    </div>
    <form action="{{ route('order.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <!-- Color Picker -->
            <div class="form-group">
                <label>الاسم :</label>
                <input type="text" class="form-control my-colorpicker1 colorpicker-element" name="name" required>

            </div>
            <div class="form-group">
                <label>كلمة المرور :</label>
                <input type="text" class="form-control my-colorpicker1 colorpicker-element" name="password" required>

            </div>
            <div class="form-group">
                <label>التخصص :</label>
                <input type="text" class="form-control my-colorpicker1 colorpicker-element" name="major">

            </div>
            <div class="form-group">
                <label>مرفق :</label>
                <input type="file" class="form-control my-colorpicker1 colorpicker-element" name="attached" required>

            </div>
            <div class="form-group">
                <label>صورة شخصية :</label>
                <input type="file" class="form-control my-colorpicker1 colorpicker-element" name="image" required>

            </div>
            <!-- /.form group -->

            <!-- Color Picker -->
            <div class="form-group">
                <label>تاريخ الميلاد :</label>

                <div class="input-group my-colorpicker2 colorpicker-element">
                    <input type="date" class="form-control" name="dob" required>

                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    </div>
                </div>
                <!-- /.input group -->
            </div>
            <!-- /.form group -->

            <!-- time Picker -->
            <div class="bootstrap-timepicker">
                <div class="form-group">
                    <label> سبب تقديم الطلب :</label>

                    <div class="input-group">
                        <input type="text" class="form-control timepicker" name="order_reason" required>

                        <div class="input-group-append">
                        </div>
                    </div>
                    <!-- /.input group -->
                </div>
                <!-- /.form group -->
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">اضافة</button>
        </div>
    </form>
    <!-- /.card-body -->
</div>
@endsection