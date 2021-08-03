<!--Start Admin lte section-->

@extends('layouts.admin')

@section('content')
<div class="container p-2">
      <!--Student Section-->

{{-- @include('inc.messages') --}}
@if(count($users)>0)
<div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Students</h3>

          <div class="card-tools">
            
            <form action="{{route('searchUser')}}" method="POST">
                {{csrf_field()}}
                <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="search" list="users" name="search" class="form-control float-right" placeholder="Search">
                    <datalist id="users">
                      @foreach($users as $user)
                      <option value="{{$user->regno}}">{{$user->regno}}</option>
                      @endforeach
                    </datalist>
       
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
      
            </form>
           
          </div>

        <div class="card-tools mr-2">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                  Create New
                </button>
                 </div>

        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0" style="height: 100vh;">
          <table class="table table-hover fixed text-nowrap">
    
                <thead>
                    <th>Matric Number</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>Faculty</th>
                    <th>Status</th>
                    <th>Set Seat</th>
                </thead>

            <tbody>
                @foreach($users as $user)    
                    <tr>
                        <td>{{$user->regno}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->department->name ?? "None"}}</td>
                        <td>{{$user->user_faculty->name ?? "None"}}</td>
                        <td>{{$user->admission_status}}</td>
                        <td class="d-flex">
                            <form action="{{route('candidate.add')}}" method="POST">
                                @if(empty($user->candidate)) {{csrf_field()}}
                                <input type="hidden" name="id" value="{{$user->id}}">
                                <input type="hidden" name="priviledge" value="1">
                                <input type="hidden" name="profile_img" value="noImage.jpg">
                                <select name="seat" class="form-control" style="width: 100%;">
                                    @foreach ($seats as $seat)
                                    <option value="{{$seat->id}}">{{$seat->position}}</option>
                                    @endforeach
                                </select>
                                <input type="submit"value="Add Student">
                                @else
                                <?php
                                    $seatName = \App\Seat::find($user->candidate->seat);
                                ?>
                                <input type="text" class="form-control w-100" value="{{$seatName->position}}" disabled>
                                @endif
                            </form>
                        </td>
                        <td class="d-flex">

                            <div class="pr-1">
                                <a href="/users/{{$user->id}}/edit" class="text-white btn btn-sm btn-primary">
                                    <i class="far fa-edit"></i>
                                </a>
                            </div>
                         
                            <div class="pl-1">
                                {!!Form::open(['action'=>['AdminController@destroyStudent',$user->id], 'method'=>'POST','enctype' => 'multipart/form-data' , 'class'=> ''])!!}
                
                                 {{Form::hidden('_method','DELETE')}}
                              
                                    <button type="submit" class="btn btn-danger btn-sm mt-0">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                   
                                {!!Form::close()!!} 
                            </div>
                        </td>
              
  <!--end of modal-->
                    </tr>

                @endforeach
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                        {{-- <li class="page-item">{{$products->links() ?? ""}}</li> --}}
                    </ul>
                  </div>
               @else
                  <p>There are currently no Students </p>
               @endif
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
</div>
<!-- Scrollable modal for Create product -->
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add New Student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      @include('inc.createUser')
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!--end of modal-->


@endsection

