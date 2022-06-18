@extends('layouts.doctor')
@section('main')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">الاستشارات </h3>

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
                    <th> نص الاستشارة</th>
                    <th>اسم المريض</th>
                    <th>صورة</th>
                    <th>فيديو</th>


                    <th> الرد على الاستشارة</th>


                    <th>العمليات</th>

                </tr>
                @foreach($appointment as $app)

                <form action="{{ route('replay.store') }} " method="post" enctype="multipart/form-data">
                    @csrf

                    <tr>
                        <td>{{$app->reason}}
                            <input type="hidden" value="{{$app->reason}}" name="app_text">

                        </td>
                        <td>{{$app->patient->name}}</td>
           
                        <td> <img src="/images/{{$app->image}}"  alt="User Image"width="80" height="80"></td>
                        <td><video width="80" height="80" controls>
                                <source src="/videos/{{$app->video}}" type="video/mp4">

                                
                            </video></td>

                        
                        <input type="hidden" value="{{$app->patient->id}}" name="patient_id">
                        <td> <textarea id="w3review" name="replay" rows="4" cols="50" required>

</textarea></td>

                        <td><button type="submit" class="btn btn-primary">رد</button></td>
                    </tr>
                </form>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>


@endsection