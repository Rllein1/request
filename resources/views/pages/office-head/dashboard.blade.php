@extends('layout.master')

@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('content')
    <div class="page m-3">
        <ul class="nav nav-tabs" id="myTab">
            <li class="nav-item">
                <a href="#onprocess" class="nav-link active" data-bs-toggle="tab">ONPROCESS</a>
            </li>
            <li class="nav-item">
                <a href="#pending" class="nav-link" data-bs-toggle="tab">REQUEST</a>
            </li>
            <li class="nav-item">
                <a href="#completed" class="nav-link" data-bs-toggle="tab">COMPLETED</a>
            </li>
            <li class="nav-item">
                <a href="#canceled" class="nav-link" data-bs-toggle="tab">CANCELED</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="onprocess">
                <!------- ONPROCESS ------->
                <div class="row container text-center">
                    @foreach($forms as $form)
                    @if($form->status==2)
                    <div class="col-md-4 form{{$form->id}}">
                        <div class="m-3 shadow p-3">
                            <div class="text-center bg-secondary p-2 Header">
                                <h2>{{$form->department->department}}</h2>
                            </div>
                            <div class="text-center description border m-3">
                                <p> {{$form->description}}</p>
                            </div>
                            <div class="text-center dateneeded">
                                <h4>Date Needed:<span class="text-danger">{{$form->dateneeded}} </span></h4>
                            </div>
                            <div class="text-center donebtn">
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
            <div class="tab-pane fade" id="pending">
                <!------- PENDING ------->
                <div class="row container text-center pendingbox">
                    @foreach($forms as $form)
                    @if($form->status==1)
                    <div class="col-md-4 form{{$form->id}}">
                        <div class="m-3 shadow p-3">
                            <div class="text-center bg-secondary p-2 Header">
                                <h2>{{$form->department->department}}</h2>
                            </div>
                            <div class="text-center description border m-3">
                                <p> {{$form->description}}</p>
                            </div>
                            <div class="text-center dateneeded">
                                <h4>Date Needed:<span class="text-danger">{{$form->dateneeded}} </span></h4>
                            </div>
                            <div class="text-center donebtn">
                                @if($form->reciever!=3)
                                <button class="btn btn-outline-primary m-2 accept" onclick="accept({{$form->id}})">APPROVE</button>
                                @endif
                                <button class="btn btn-outline-danger m-2 cancel" onclick="cancel({{$form->id}})">CANCEL</button>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
            <div class="tab-pane fade" id="completed">
                <!------- COMPLETED ------->
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                            <thead>
                            <tr role="row">
                                <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending">Department</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Description</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="descending" aria-label="Platform(s): activate to sort column ascending">Date Complete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($forms as $form)
                            @if($form->status==3)
                            <tr class="even">
                            <td >{{$form->department->department}}</td>
                            <td>{{$form->description}}</td>
                            <td class="sorting dtr-control">{{$form->updated_at}}</td>
                            </tr>
                            @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="canceled">
                <!------- CANCEL ------->
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example_info">
                            <thead>
                            <tr role="row">
                                <th class="sorting sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Department</th>
                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Description</th>
                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Remark</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($forms as $form)
                            @if($form->status==4)
                            <tr class="even">
                            <td >{{$form->department->department}}</td>
                            <td>{{$form->description}}</td>
                            <td class="sorting dtr-control">{{$form->remark}}</td>
                            </tr>
                            @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
        <div class="modal" id="remarkbox" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Cancel Request Form</h5>
                <button type="button" class="btn-close" onclick="$(this).click($('#remarkbox').hide())"></button>
            </div>
            <div class="modal-body">
                <div class="form-floating formdescription">
                    <input type="text" class="formID" name='formid' hidden>
                    <textarea class="form-control remark" placeholder="Leave a comment here" name="remark" id="floatingTextarea2" style="height: 150px" required></textarea>
                    <label for="floatingTextarea2">Remark: <span class="font-weight-normal"> </span></label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="$(this).click($('#remarkbox').hide())">Close</button>
                <button type="submit" class="btn btn-primary" onclick="proceed()">PROCEED</button>
            </div>
            </div>
        </div>
        </div>
@stop

@section('script')
<script>
    function cancel(id) {
        $('#remarkbox').show();
        $('.formID').val(id);
    }
    function proceed(){
        let id=$('.formID').val();
        let remark=$('.remark').val();

        alert(id+ remark);

        $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'PATCH',
                url: "{{URL::current()}}/"+id,
                data:{ 'status': 4, 'remark': remark},
            })
            .done(function(data){
                $('.form'+id).hide();
                $('.remark').val('');
                $('#remarkbox').hide();
            });
    }
    function accept(id) {
        alert(id);
        $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'PATCH',
                url: "{{URL::current()}}/"+id,
                data:{  'status': 2},
            })
            .done(function(data){
                $('.form'+id).hide();
            });
    }
</script>

<script>
    $(function () {
        $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "print"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        $("#example").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "print"]
        }).buttons().container().appendTo('#example_wrapper .col-md-6:eq(0)');
    });
    </script>
@stop
