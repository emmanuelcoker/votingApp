<!--Start Admin lte section-->

@extends('layouts.admin')

@section('content')
<div class="container p-2">
      <!--Student Section-->

{{-- @include('inc.messages') --}}
@if(count($candidates)>0)
<div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Election Candidates</h3>

          <div class="card-tools">
          <form action="{{route('searchCandidate')}}" method="POST">
            {{ csrf_field() }}
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="search" list="candidates" name="search" class="form-control float-right" placeholder="Search">
              <datalist id="candidates">
                @foreach($candidates as $candidate)
                <option value="{{$candidate->regno}}">{{$candidate->regno}}</option>
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
                  Create Priviledge
                </button>
            </div>

            <div class="card-tools mr-2">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#staticBackdrop2">
                Create Seat
              </button>
          </div>

        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0" style="height: 485px;">
          <table class="table table-hover fixed text-nowrap">
    
            <thead>
              <th>Reg no.</th>
              <th>Name</th>
              <th>Aspired Seat</th>
              <th>Votes</th>
              <th>Priviledge</th>
              <th>Action</th>
            </thead>
            <tbody>
                @foreach($candidates as $candidate)    
                    <tr>
                        <td>{{$candidate->regno}}</td>
                        <td>{{$candidate->name}}</td>
                        <td>{{$candidate->seats->position}}</td>
                        <td>{{$candidate->votes}}</td>
                          @if($candidate->priviledge == 0)
                            <td>None</td>
                          @else
                            <td>{{$candidate->priviledge}}</td>
                        @endif
                        
                        <td class="d-flex">
                      <div class="pr-1">
                                <a href="/candidate/{{$candidate->id}}" class="text-white btn btn-sm btn-success">
                                    <i class="far fa-eye"></i>
                                </a>
                            </div>

                            <div class="pr-1">
                                <a href="/candidate/{{$candidate->id}}/edit" type="button" class="text-white btn btn-sm btn-primary">
                                    <i class="far fa-edit"></i>
                                </a>
                            </div>
                         
                            <div class="pl-1">
                                {!!Form::open(['action'=>['AdminController@destroyCandidate',$candidate->id], 'method'=>'POST','enctype' => 'multipart/form-data' , 'class'=> ''])!!}
                
                                 {{Form::hidden('_method','DELETE')}}
                              
                                    <button type="submit" class="btn btn-danger btn-sm mt-0">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                   
                                {!!Form::close()!!} 
                            </div>
                        </td>
                    </tr>
                @endforeach
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                        {{-- <li class="page-item">{{$products->links() ?? ""}}</li> --}}
                    </ul>
                  </div>
               @else
                  <p>There are currently no Candidates</p>
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
        <h5 class="modal-title" id="staticBackdropLabel">Add New Priviledge</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      @include('inc.createPriviledge')
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!--end of modal-->

<!-- Modal -->
<div class="modal fade" id="staticBackdrop2" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add New Seat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      @include('inc.createSeat')
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!--end of modal-->
@endsection


