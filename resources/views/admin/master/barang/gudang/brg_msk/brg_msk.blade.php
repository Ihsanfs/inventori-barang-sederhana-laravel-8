@extends('layout.layout')
@section('content')

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Data barang masuk</h4>
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
                        <a href="#">barang masuk</a>
                    </li>
                </ul>
            </div>
            <div class="row">


                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Add Row</h4>
                                <a href="/brg_msk/create" class="btn btn-primary btn-round ml-auto">
                                    <i class="fa fa-plus"></i>
                                    Add Row </a>

                            </div>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th>No</th>

                                            <th>nomor barang masuk</th>
                                            <th>id barang</th>

                                            <th>jumlah</th>
                                            <th>total</th>
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
                                        @foreach ($brg_msk as $row)


                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$row->no_brg_masuk}}</td>
                                            <td>{{$row->id_barang}}</td>
                                            <td>{{$row->jml_brg_masuk}}</td>

                                            <td>{{$row->total}}</td>

                                            <td>

{{--
                                                <form action="brg_msk/edit{{$row->id}}">

                                                    <button type="submit" class="btn btn-danger">edit</button>
                                                </form> --}}


                                                <form action="brg_msk/{{$row->id}}" method="post">
                                                    @csrf
                                                    @method('put')
                                                    <a href="brg_msk/{{$row->id}}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>edit</a>
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit"class="btn btn-primary btn-xs"> <i class="fa fa-times"></i>Hapus</button>
                                            </form>
                                                {{-- <a href="brg_msk/destroy{{$row->id}}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>hapus</a> --}}

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

    @endsection

