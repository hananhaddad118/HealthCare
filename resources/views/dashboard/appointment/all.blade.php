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
                    <th>  الطلب</th>
                    <th>اسم الطبيب</th>
                    <th>التاريخ و الوقت</th>
                  
                   
                    <th>العمليات</th>

                </tr>
                @foreach($reference as $app)
        

                    <tr>
                        <td>{{$app['reason']}}
                     

                        </td>
                        <td>{{$app['day']}}
                           
                        </td>

                        <td>{{$app['doctor_id']}}</td>
                 
                        <td><button type="submit" class="btn btn-primary"></button></td>
                    </tr>
                </form>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>


@endsection