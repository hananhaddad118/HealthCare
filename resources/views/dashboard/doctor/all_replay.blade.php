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
                    <th> نص الاستشارة </th>
                    <th>صاحب الاستشارة</th>
                 

                    <th> الرد على الاستشارة </th>
                  
                   
                    <th>تاريخ الرد</th>

                </tr>
                @foreach($replays as $replay)
        
                
                   
                    <tr>
                        <td>{{$replay->app_text}}
                        

                        </td>
                       

                        <td>@if($replay->patient_id !=null){{$replay->patient->name}}@else 0
                            @endif
                        </td>
                        <td>{{$replay->replay}}</td>
                        <td>{{$replay->created_at}}</td>
                        
                    </tr>
                </form>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>


@endsection