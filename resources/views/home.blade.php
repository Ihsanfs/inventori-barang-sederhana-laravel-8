@extends('layout.layout')
@section('content')
<div class="main-panel">
    <div class="content">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Data User</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="#">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Data</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">User</a>
                    </li>
                </ul>
            </div>
            <div class="row">


                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Add Row</h4>
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalAddUser">
                                    <i class="fa fa-plus"></i>
                                    Add Row
                                </button>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>level</th>

                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    {{-- <tbody>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Action</th>
                                        </tr>
                                    </tbody> --}}
                                    <tbody>
                                        @php $no=1 ;@endphp
                                        @foreach ($user as $row)


                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$row->name}}</td>
                                            <td>{{$row->email}}</td>
                                            <td>{{$row->level}}</td>

                                            <td>
                                                <a href="#modalEditUser {{$row->id}}" data-toggle= "modal" class="btn btn-primary btn-xs">edit</a>
                                                <a href="#modalHapusUser {{$row->id}}"  id="modalHapusUser" data-toggle= "modal" class="btn btn-warning btn-xs">hapus</a>

                                                {{-- <div class="form-button-action">
                                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </div> --}}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@foreach ($user as $d)


<div class="modal " id="#modalAddUser" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/user/store" method="post" enctype="multipart/form-data">
                @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label >
                        Nama
                       </label>
                       <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label >
                        email
                       </label>
                       <input type="text" class="form-control" name="email">
                </div>
                <div class="form-group">
                    <label >
                        Password
                       </label>
                       <input type="text" class="form-control" name="password">
                </div>

                <div class="form-group">
                    <label >
                        Nama
                       </label>
                       <select name="level" class="form-control">
                        <option value="" hidden>pilih level</option>
                        <option value="admin">admin</option>
                        <option value="gudang">gudang</option>

                          </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
        </div>
    </div>
</div>
<div class="modal " id="#modalAddUser" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/user/store" method="post" enctype="multipart/form-data">
                @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label >
                        Nama
                       </label>
                       <input type="text" class="form-control" name="name" value="{{$d->name}}">
                </div>
                <div class="form-group">
                    <label >
                        email
                       </label>
                       <input type="text" class="form-control" name="email" value="{{$d->email}}">
                </div>
                <div class="form-group">
                    <label >
                        Password
                       </label>
                       <input type="text" class="form-control" name="password"value="{{$d->name}}">
                </div>

                <div class="form-group">
                    <label >
                        Nama
                       </label>
                       <select name="level" class="form-control">
                        <option value="" hidden>pilih level</option>
                        <option <?php if($d->level=="admin") echo "selected"; ?> value="admin">admin</option>
                        <option <?php if($d->level=="gudang") echo "selected"; ?> value="gudang">gudang</option>

                          </select>
                </div>
            </div>
            <div class="form-group">
                <h4>apakah anda akan menghapus data</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">hapus</button>
            </div>
        </form>
        </div>
    </div>
</div>
@endforeach
@endsection
