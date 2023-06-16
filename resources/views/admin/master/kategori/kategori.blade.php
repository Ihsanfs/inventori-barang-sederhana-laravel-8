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

                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th>No</th>

                                            <th>kategori</th>


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
                                        @foreach ($kategori as $row)


                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$row->nama_kategori}}</td>


                                            <td>
                                                <a href="#exampleModal{{$row->id}}" data-target="" data-toggle= "modal" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>edit</a>
                                                <form action="kategori/{{$row->id}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit"class="btn btn-primary btn-xs"> <i class="fa fa-times"></i>Hapus</button>
                                            </form>

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
@foreach ($kategori as $d)
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
          <form action="kategori/{{$d->id}}" method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <label >
                    Nama
                   </label>
                   <input type="text" class="form-control" name="nama_kategori" value="{{$d->nama_kategori}}">
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
          <form action="{{route('simpan_kategori')}}" method="post">
            @csrf
            @method('post')
            <div class="form-group">
                <label >
                    Nama
                   </label>
                   <input type="text" class="form-control" name="nama_kategori" >
            </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Send message</button>
          </div>
        </form>
        </div>
      </div>
@endsection
{{-- <script>
   $('#exampleModal').click(function(e) {
					swal({
						title: "Good job!",
						text: "You clicked the button!",
						icon: "success",
						buttons: {
							confirm: {
								text: "Confirm Me",
								value: true,
								visible: true,
								className: "btn btn-success",
								closeModal: true
							}
						}
					});
				});
</script> --}}
