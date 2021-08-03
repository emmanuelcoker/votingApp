<!--Start Admin lte section-->

@extends('layouts.admin')

@section('content')
<div class="container p-2">
      <!--Student Section-->

{{-- @include('inc.messages') --}}
@if(count($seats)>0)
<div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">All Seats</h3>

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
                    <th>s/n</th>
                    <th>Seat</th>
                    <th>Action</th>
                </thead>

            <tbody>
                @foreach($seats as $seat)    
                    <tr>
                        <td></td>
                        <td>{{$seat->position}}</td>
                      
                        <td class="d-flex">
                          <div class="pl-1">
                              {!!Form::open(['action'=>['AdminController@destroySeat',$seat->id], 'method'=>'POST','enctype' => 'multipart/form-data' , 'class'=> ''])!!}
              
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
                  <p>There are currently no Seats </p>
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

