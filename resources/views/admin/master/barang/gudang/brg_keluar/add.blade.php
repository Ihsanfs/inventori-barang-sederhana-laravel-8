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

                                <button class="btn btn-primary btn-round ml-auto" href="/brg_msk/create" data-toggle="modal" data-target="#AddModal">
                                    <i class="fa fa-plus"></i>
                                    Add Row
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{route('simpan_barang_keluar')}}" method="POST">
                                @csrf

                                <input type="hidden" value="{{Auth::user()->id}}" name="id_user">

                            <div class="form-group">
                                <label >no barang</label>
                            <input type="text"  class="form-control" name="no_brg_keluar"  >
                        </div>

                        <div class="form-group">
                            <label >nama barang</label>
                        <input type="text"  class="form-control" name="nama_barang" id="nama_barang" >
                    </div>



                    <div class="form-group">
                        <label >
                            kategori
                           </label>
                           <select name="id_barang" id="barang"  class="form-control">
                            <option value="" hidden>nama barang</option>
                            @foreach ($barang as $item)
                            <option data-price value="{{$item->id}}" >{{$item->nama_barang}}</option>
                            @endforeach


                              </select>
                    </div>

                        <div id="infomas"></div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">harga</span>
                            </div>

                           <input type="number " class="form-control" name="harga" value="" id="harga">

                        </div>
                    </div>




                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">jumlah</span>
                        </div>
                       <input type="number " class="form-control" name="jml_brg_keluar" id="jumlah">
                    </div>
                </div>

                {{-- <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp.</span>
                        </div>
                       <input type="text" class="form-control" name="total" id="total">
                    </div>
                </div> --}}

                <div></div>
                <div class="form-group mb-0" >
                    <input type="text" id="total" class="form-control" name="total" placeholder="Total" readonly="">
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Send message</button>
                  </div>
            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button> --}}
</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.js" integrity="sha512-nO7wgHUoWPYGCNriyGzcFwPSF+bPDOR+NvtOYy2wMcWkrnCNPKBcFEkU80XIN14UVja0Gdnff9EmydyLlOL7mQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.js" integrity="sha512-nO7wgHUoWPYGCNriyGzcFwPSF+bPDOR+NvtOYy2wMcWkrnCNPKBcFEkU80XIN14UVja0Gdnff9EmydyLlOL7mQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#barang").change(function(){
            $.ajax({
                url: "/brg_keluar/proses?id_barang=" + $(this).val(),
                method: 'GET',
                dataType: "json",
                success: function(data) {
                    $('#harga').val(data);
                }
            });
        });

        $("#jumlah, #harga").keyup(function() {
            var harga  = $("#harga").val();
            var jumlah = $("#jumlah").val();

            var total = parseInt(harga) * parseInt(jumlah);
            $("#total").val(total);
        });
    });
</script>

<script type="text/javascript">
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

{{-- <script type="text/javascript">


$( "select" )
  .change(function () {
    var str = "";
    $( "select option:selected" ).each(function() {
      str += $( this ).text() + " ";
    });
    $( '#harga' ).text( str );
  })
  .change();


</script> --}}


{{-- <script type="text/javascript">


    $("#id_barang").change(function(){
        var id_barang = $("#id_barang").val();
        $.ajax({
            type : "GET",
            url : "/brg_msk/proses/",
            data : "id_barang"+id_barang,
            cache : false,
            success : function (data){
                $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
                $('#location').html(data);
            }
        });
    });
</script> --}}



{{-- <script>
      $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    function isi_otomatis() {
      var x = document.getElementById("id_barang").value ;
      document.getElementById("location").innerHTML = "You selected: " + x;
    }
    </script> --}}



{{--
<script>

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    </script> --}}
     {{-- <script>
        $('#barang').on('change', function() {
            getBarang(event.target.value).then(barang => {
			$('#harga').val(barang.warna);

        });
        });

        async function getBarang($barang) {
		let response = await fetch('brg_msk/create' + id)
		let data = await response.json();

		return data;
	}
    </> --}}


{{-- <script type="text/javascript">
    $("#id_barang").change(function(){

        var id_barang = $("id_barang").val();
        $.ajax({
            type : "GET",
            url : "brg_msk/create",
            data : "id_barang"+id_barang,cache false, success : function (data){
                $('#harga').html(data);
            }
        });
    });
</script> --}}

{{-- <script type="text/javascript">
$.ajax({
        url: 'brg_msk/create',
        type: 'GET',
        success: function(data) {
            $('#tabeldata').html(data);
        }
    });</script> --}}

@endsection

{{-- <script type="text/javascript">

    $(document).ready(function(){
        $(#jml_brg_msk).keyup(function()
        {
            var jml_brg_msk = $("#jml_brg_msk").val();
            var harga = $("#harga").val();
            var total  = parseInt(harga) * parseInt(jml_brg_msk);
            $("#total").val(total);
        }
        );
    });
</script> --}}




