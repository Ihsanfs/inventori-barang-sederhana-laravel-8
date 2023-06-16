@extends('layout.layout')
@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Data kategori</h4>

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
                        <a href="#">kategori</a>
                    </li>
                </ul>
            </div>
            <div class="row">


                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Add Row</h4>
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#AddModal">
                                    <i class="fa fa-plus"></i>
                                    Add Row
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <input type="button" id="ajaxBtn" value="Send GET request" />
                            <p>
                            </p>
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>nama barang</th>
                                            <th>kategori</th>
                                            <th>harga</th>
                                            <th>stok</th>
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
                                        @foreach ($barang as $row)


                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$row->nama_barang}}</td>
                                            <td>{{$row->nama_kategori}}</td>
                                            <td>{{$row->nama_kategori}}</td>
                                            <td>Rp. {{number_format($row->harga)}}</td>
                                            <td>{{$row->stok}}unit</td>



                                            <td>
                                                <a href="#exampleModal{{$row->id}}" data-target="" data-toggle= "modal" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>edit</a>
                                                <form action="barang/{{$row->id}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit"class="btn btn-primary btn-xs"> <i class="fa fa-times"></i>Hapus</button>
                                            </form>
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
    {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button> --}}
</div>
@foreach ($barang as $d)
<div class="modal fade" id="exampleModal{{$d->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New message</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="brg_msk/{{$d->id}}" method="post">
            @csrf
            @method('put')
            {{-- <input type="text" value="{{$d->id}}" name="id" required> --}}
            <div class="form-group">
                <label >
                    Nama
                   </label>
                   <input type="text" class="form-control" name="nama_kategori"  value="{{$d->nama_barang}}">
            </div>
            <div class="form-group">
                <label >
                    kategori
                   </label>
                   <select name="id_kategori"  class="form-control">
                    <option value="{{$d->id_kategori}}" >nama kategori</option>
                    @foreach ($kategori as $item)
                    <option value="{{$item->id}}" >{{$item->nama_kategori}}</option>
                    @endforeach



                      </select>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Rp.</span>
                    </div>
                   <input type="number " class="form-control" name="harga" value="{{$d->nama_harga}}">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Unit</span>
                    </div>
                   <input type="number " class="form-control" name="stok" value="{{$d->nama_stok}}">
                </div>
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Send message</button>
        </div>
      </div>
    </form>
    </div>
  </div>

  @endforeach






  <div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New message</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>


        <div class="modal-body">
          <form action="{{route('simpan_barang')}}" method="post">
            @csrf

            <div class="form-group">
                <label >
                    Nama
                   </label>
                   <input type="text" class="form-control" name="nama_barang" >
            </div>
            <div class="form-group">
                <label >
                    kategori
                   </label>
                   <select name="id_kategori"  class="form-control">
                    <option value="" hidden>pilih level</option>
                    @foreach ($kategori as $item)
                    <option value="{{$item->id}}" >{{$item->nama_kategori}}</option>
                    @endforeach



                      </select>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Rp.</span>
                    </div>
                   <input type="number " class="form-control" name="harga">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Unit</span>
                    </div>
                   <input type="number " class="form-control" name="stok">
                </div>
            </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Send message</button>
          </div>
</form>
<script type="text/javascript">
    $(document).ready(function () {

     $('#ajaxBtn').click(function(){

        $.get('/barang', {name: nama_barang}, function (data, textStatus, jqXHR) {
            $('p').append(data.nama);
        });
    });
});
</script>

@endsection
