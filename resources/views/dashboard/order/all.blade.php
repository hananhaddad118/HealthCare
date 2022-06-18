@extends('layouts.admin')
@section('main')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">طلبات التسجيل</h3>

        <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">

                <div class="input-group-append">
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table table-hover">
            <tbody>
                <tr>
                    <th>اسم مقدم الطلب</th>
                    <th>كلمة السر</th>
                    <th>تاریخ</th>
                    <th>المرفقات</th>
                    <th>الصورة الشخصية</th>
                    <th>التخصص</th>
                    <th>سبب التقديم</th>
                    <th>نوع المستخدم</th>
                    <th>الطبيب المسؤول</th>
                    <th>العمليات</th>

                </tr>
                @foreach($orders as $order)
                <form action="{{ route('order.accept_user') }} " method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{$order->id}}" name="order_id">

                    <tr>
                        <td>{{$order->name}}
                            <input type="hidden" value="{{$order->name}}" name="name">
                            <input type="hidden" value="{{$order->name}}@gmail.com" name="email">

                        </td>
                        <td>{{$order->password}}
                            <input type="hidden" value="{{$order->password}}" name="password">
                        </td>

                        <td>{{$order->dob}}</td>
                        <input type="hidden" value="{{$order->major}}" name="major">
                        <td>@if($order->attached !=null)<img src="/images/{{$order->attached}}" alt="Italian Trulli"width="60" height="45">@else 0 @endif</td>
                        <td>@if($order->image !=null)<img src="/images/{{$order->image}}" alt="Italian Trulli"width="60" height="45">@else 0 @endif</td>
                        <input type="hidden" value="{{$order->image}}" name="image">
                       
                        <td>{{$order->major}}</td>
                        <td>{{$order->order_reason}}</td>
                        <td><select name="type" id="cars">
                                <option value="0">طبيب</option>
                                <option value="2">مريض</option>
                               
                            </select></td>
                            <td><select name="doctor_id" id="cars">
                                <option value=""></option>
                                @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                               @endforeach
                            </select></td>
                        
                        <td><button type="submit" class="btn btn-primary">اعتماد</button></td>
                    </tr>
                </form>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>


@endsection