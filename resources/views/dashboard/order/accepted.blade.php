@extends('layouts.admin')
@section('main')

<div class="card">
    <div class="card-header">
        <h3 class="card-title"> الطلبات المجابة</h3>

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
                  <th>الايميل</th>
                  <th>النوع</th>
                 

                </tr>
                @foreach($users as $user)
                    

                    <tr>
                        <td>{{$user->name}}
                         
                        </td>
                        <td>{{$user->email}}
                         
                        </td>
                        <td>{{$user->type}}
                         
                        </td>
                   
                    </tr>
         
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>


@endsection