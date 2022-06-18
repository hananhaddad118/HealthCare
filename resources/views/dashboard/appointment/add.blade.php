@extends('layouts.patient')
@section('main')
<div class="card card-info" dir="rtl">
    <div class="card-header">
        <h3 class="card-title">تقديم طلب</h3>
    </div>
    <form action="{{ route('appoientment.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <!-- Color Picker -->
            <div class="form-group">
                <label>الطبيب :</label>
                <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" name="doctor_id">

                    @foreach($user as $a)
                    <option value="{{$a->id}}">{{$a->name}}</option>
                    @endforeach

                </select>

            </div>
          
            <div class="form-group">
                <label>اليوم :</label>
                <input type="text" class="form-control my-colorpicker1 colorpicker-element" name="day" required>

            </div>
            <div class="form-group">
                <label>سبب التقديم :</label>
                <input type="text" class="form-control my-colorpicker1 colorpicker-element" name="reason" required>

            </div>
            <div class="form-group">
                <label>مرفق صورة :</label>
                <input type="file" class="form-control my-colorpicker1 colorpicker-element" name="image" required>

            </div>
            <div class="form-group">
                <label>مرفق فيديو  :</label>
                <input type="file" class="form-control my-colorpicker1 colorpicker-element" name="video" required>

            </div>
            <!-- /.form group -->

            <!-- Color Picker -->

        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">اضافة</button>
        </div>
    </form>
    <!-- /.card-body -->
</div>
@endsection