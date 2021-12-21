@extends('layouts.front_layout.front_layout')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
         
        </div>
      </div><!-- /.container-fluid -->
    </section>
    @if(Session::has('success_message'))
      <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 10px;">
        {{ Session::get('success_message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Coupon</h3>
             <a href="" data-toggle="modal" data-target="#myModal" style="max-width: 150px; float:right; display:inline-block;" class="btn btn-block btn-success">Add Task</a>
            </div>

            <div class="card-body">
              <table id="categories" class="table table-bordered table-striped text-center">
                <thead>
                <tr>
                  
                  <th>ID</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Status</th>
                  <th>Date</th>
                  <th>Completed</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
               @forelse($todolists as $data)
                <tr>
                  <td>{{$data->id}}</td>
                  <td>{{$data->title}}</td>
                  <td>{{$data->description}} </td>
                  <td>{{$data->status}}</td>

                  <td>{{$data->date}}</td>
                  <td>{{$data->completed_at}}</td>

                   <td>
                    <a href="" data-toggle="modal" data-target="#myModal{{$data->id}}"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
                    <a href="javascript:" class="delete_form" record="task"  rel="{{$data->id}}" style="display:inline;">
                      <i class="fa fa-trash fa-" aria-hidden="true" ></i>
                    </a>
                   </td>
                </tr>
                <div class="modal fade" id="myModal{{$data->id}}">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <form>
                          <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                          <div class="modal-body">
                            <div class="form-group">
                              <label for="title">Title*</label>
                              <input class="form-control" id="title-{{$data->id}}" name="title" value="{{$data->title}}" >
                            </div>
                            <div class="form-group">
                                <label for="start_time">Description*</label>
                                <textarea name="description" id="description-{{$data->id}}" class="form-control" id="" cols="30" rows="10">{{$data->description}}</textarea>
                            </div>
                                <div class="form-group">
                                  <label for="start_time">Date*</label>
                                  <input class="form-control" id="date-{{$data->id}}" name="date" type="date" value="{{$data->date}}">
                              </div>
                              <div class="form-group">
                                <label for="start_time">Complete Date</label>
                                <input class="form-control"  name="completed_date" id="completed_at-{{$data->id}}" type="date" value="{{$data->completed_at}}">
                              </div>
                              <div class="form-group">
                                <label for="start_time"  >status*</label>
                                <select name="status" id="status-{{$data->id}}" class="form-control" id="">
                                  <option value=""> Select</option>
                                  <option value="Pending" @if ($data->status && $data->status == 'Pending')
                                    selected
                                  @endif> Pending</option>
                                  <option value="Progress"@if ($data->status && $data->status == 'Progress')
                                    selected
                                    @endif> Progress</option>
                                  <option value="Done"@if ($data->status && $data->status == 'Done')
                                    selected
                                    @endif> Done</option>
                                </select>
                            </div>
                          </div>
                          <!-- Modal footer -->
                          <div class="modal-footer">
                              <button type="button" class=" btn btn-danger" data-dismiss="modal">Close</button>
                              <input type="submit" class="edit-task btn btn-success"attr={{$data->id}}  value="Add">
                          </div>
                      </form>
                    </div>
                  </div>
              </div>
                @empty
              
                @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <form>
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="title">Title*</label>
                    <input type="text" class="form-control" id="title" name="title" required  placeholder="Title">
                </div>
                <div class="form-group">
                  <label for="start_time">Description*</label>
                  <textarea name="description" id="description" class="form-control" id="" cols="30" rows="10"></textarea>
              </div>
              <div class="form-group">
                <label for="start_time">Date*</label>
                <input class="form-control" id="date" name="date" type="date">
            </div>
            <div class="form-group">
              <label for="start_time">Complete Date</label>
              <input class="form-control"  name="completed_date" id="completed_at" type="date">
          </div>
            <div class="form-group">
              <label for="start_time" >status*</label>
              <select name="status" id="status" class="form-control" >
                <option value=""> Select</option>
                <option value="Pending"> Pending</option>
                <option value="Progress"> Progress</option>
                <option value="Done"> Done</option>
              </select>
              
          </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class=" btn btn-danger" data-dismiss="modal">Close</button>
                <input type="submit" class=" add_task btn btn-success" value="Add">
            </div>
        </form>
      </div>
    </div>
</div>

@endsection
@section('script')
<script>
  $(function () {
    $("#categories").DataTable();

    //  For Adding New Task 
   
  });
  
</script>
@endsection

