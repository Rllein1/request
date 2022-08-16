@extends('layout.master')

@section('css')

@stop

@section('content')
        <!-- <div class="alert alert-danger" id="alert" style="display:none;" role="alert">
                {{$errors->first()}}
        </div> -->
        <div class="col-4 mt-3">
            <!-- form body -->
            <div class="row p-2 border-primary bg-white" style="border-top: 5px solid">
                <div class="col mx-auto">
                    <div class="">
                        <form class="user" action="{{route('role.store')}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <input style="text-transform: capitalize;" type="text" class="form-control form-control-user" name="role" placeholder="Role" required>
                                        </div>
                                            <button class="form-control btn-outline-primary" type="submit">Add Role</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-8 mt-3">
        <div class="p-2 border-success bg-white" style="border-top: 5px solid">
          <table class="table table-hover table-striped" style="width:100%" id="evalueeTable">
            <thead>
                <tr>
                    <th style="display:none">ID</th>
                    <th class="bg- text-dark">Role</th>

                </tr>
            </thead>
            <tbody >
            @foreach ($roles as $role)
                <tr class="theData">
                    <td style="display: none">{{$role->id}}</td>
                    <td>{{$role->role}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>
      </div>


@stop

@section('script')

@stop
