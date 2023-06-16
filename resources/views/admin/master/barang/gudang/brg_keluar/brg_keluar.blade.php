@extends('layout.layout')
@section('content')

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Data barang keluar</h4>
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
                        <a href="#">barang keluar</a>
                    </li>
                </ul>
            </div>
            <div class="row">


                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Add Row</h4>
                                <a href="/brg_keluar/create" class="btn btn-primary btn-round ml-auto">
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
                                        @foreach ($brg_keluar as $row)


                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$row->no_brg_keluar}}</td>
                                            <td>{{$row->id_barang}}</td>
                                            <td>{{$row->jml_brg_keluar}}</td>

                                            <td>{{$row->total}}</td>

                                            <td>

                                                <a href="brg_keluar/{{$row->id}}" class="btn btn-success">edit</a>


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

