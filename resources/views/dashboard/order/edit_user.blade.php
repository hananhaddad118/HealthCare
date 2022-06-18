@extends('layouts.admin')
@section('main')

<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">التعديل على المستخدمين</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ route('user.update_user',$user->id) }}" method="post" enctype="multipart/form-data">
              @csrf
              @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">اسم المستخدم</label>
                    <input type="text" class="form-control" id="name" placeholder="" name="name" value="{{ $user->name }}" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">الايميل</label>
                    <input type="text" class="form-control" id="desc" placeholder="" name="email" value="{{ $user->email }}" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">كلمة المرور</label>
                    <input type="text" class="form-control" id="color" placeholder="" name="password" value="{{ $user->password }}" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">نوع المستخدم</label>
                    <input type="text" class="form-control" id="price" placeholder="" name="type" value="{{ $user->type }}" >
                  </div>
              
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">تعديل</button>
                </div>
              </form>
            </div>
 
@endsection