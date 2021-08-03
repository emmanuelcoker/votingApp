<!--Start Admin lte section-->

@extends('layouts.admin')

@section('content')
<div class="container p-2">
      <!--Student Section-->

{{-- @include('inc.messages') --}}
@if(count($faculties)>0)
<div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">All Faculties</h3>

          {{-- <div class="card-tools">
            
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
           
          </div> --}}

        <div class="card-tools mr-2">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                  Create New
                </button>
        </div>

        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0" style="height: 485px;">
          <table class="table table-hover fixed text-nowrap">
    
                <thead>
                    <th>Faculty</th>
                    <th></th>
                </thead>

            <tbody>
                @foreach($faculties as $faculty)    
                    <tr>
                        <td>{{$faculty->name}}</td>          
                        <td>
                            {!!Form::open(['action'=>['AdminController@destroyFaculty',$faculty->id], 'method'=>'POST','enctype' => 'multipart/form-data' , 'class'=> ''])!!}
                
                                 {{Form::hidden('_method','DELETE')}}
                              
                                    <button type="submit" class="btn btn-danger btn-sm mt-0">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                   
                                {!!Form::close()!!} 
                        </td>
                    </tr>
                @endforeach
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                        {{-- <li class="page-item">{{$products->links() ?? ""}}</li> --}}
                    </ul>
                  </div>
               @else
               <div>
                <p>There are currently no Faculties </p>
                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                    Create New
                  </button>
               </div>
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
        <h5 class="modal-title" id="staticBackdropLabel">Add New Faculty</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      @include('inc.createFaculty')
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!--end of modal-->
@endsection

