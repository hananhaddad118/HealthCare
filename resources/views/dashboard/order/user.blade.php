@extends('layouts.admin')
@section('main')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">المستخدمين</h3>

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
                    <th>#</th>
                    <th>اسم مقدم الطلب</th>
                  <th>صورة</th>
                    <!-- <th>العمليات</th> -->

                </tr>
                @foreach($users as $user)
                    

                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$user->name}}
                         
                        </td>
                        <td>@if($user->image !=null)<img src="/images/{{$user->image}}" alt="Italian Trulli"width="60" height="45">@else 0 @endif</td>
                   
                       <!-- <td><a href ="{{route('order.user',$user->id)}}" onclick="return confirm('هل تريد الحذف?')"><button type="button" class="btn btn-danger "><i class="fa fa-times"></i></button></a>
                  <a href ="{{route('order.edit',$user->id)}}"><button type="button" class="btn  btn-success"><i class="nav-icon fa fa-edit"></i></button></a>
                  <a href ="{{route('order.user',$user->id)}}"><button type="button" class="btn  btn-primary "><i class="fa fa-files-o"></i></button></a></td>
                  </td> -->
                    </tr>
         
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>


@endsection