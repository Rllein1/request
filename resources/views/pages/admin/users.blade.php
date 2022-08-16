@extends('layout.master')

@section('css')

@stop

@section('content')

<!-- -----------------ADD STUDENT BUTTON-----------------------ADD STUDENT BUTTON--------------------------------- -->
<button class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#addUserModal" style="font-size:12px;width:120px;height:35px;">
  ADD USER
</button>

<!-- -----------------------ADD STUDENT MODAL-----------------ADD STUDENT MODAL----------------------------------- -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            {{-- header modal --}}
            <div class="modal-header" style="background-color: #0480be;color: #fff">
                <h5 class="modal-title" id="addUserModalLabel">User Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {{-- end of header modal --}}

            {{-- modal body --}}
            <div class="modal-body">
                <form id="adduser" action="#" method="post">
                    @csrf
                    <div class="form-group">
                        <select class="form-control mb-1 shadow class" name="department" required>
                            <option value='' selected>--Department--</option>
                            @foreach($departments as $department)
                                <option value='{{$department->id}}'>{{$department->department}}</option>
                            @endforeach
                        </select>
                        <select class="form-control mb-1 shadow class" name="role" required>
                            <option value='' selected>--Role--</option>
                            @foreach($roles as $role)
                                <option value='{{$role->id}}'>{{$role->role}}</option>
                            @endforeach
                        </select>

                        <input type="text" class="form-control mb-1 shadow" name="username" placeholder="Enter Username" required>
                        <span class="input-group-btn" style="float: left !important;">
                        <center>
                            <input type="submit" value="ADD USER" class="mt-2 btn btn-info text-center" style="color: #fff">
                        </center>
                    </div>
                </form>
            </div>
            {{-- end of modal body --}}
        </div>
    </div>
</div>
<!-- -----------------------END OF ADD STUDENT MODAL-----------------END OF ADD STUDENT MODAL----------------------------------- --> 

{{-- --------------------------STUDENT TABLE-------------------------STUDENT TABLE------------ --}}
{{-- table header --}}
<div class="mt-3 mr-3 p-2 border-success bg-white" style="border-top: 5px solid">
    <br>
        <h3>USER LIST</h3>
    <br>
{{-- end of table header --}}
{{-- table --}}
    <table class="table table-striped user-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody style="text-transform: capitalize;">
        </tbody>
    </table>
</div>
{{-- table --}}
{{-- --------------------------END OF STUDENT TABLE-------------------------END OF STUDENT TABLE------------ --}}

@stop

@section('script')
<script type="text/javascript">
  $(function () {

    var table = $('.user-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{route('users.getusers')}}",
        columns: [
            {data: 'id', name: 'id'},
            {
                data: 'action',
                name: 'action',
                orderable: true,
                searchable: true
            },
        ]
    });
  });
</script>

@stop