
@foreach ($barang as $item)


        {{-- {{$item->nama_barang}} --}}
        <input type="text" id="harga" name="harga" value="{{$item->harga}}" readonly required>
        {{-- <input type="number " class="form-control" name="harga" value="" id="harga"> --}}


@endforeach


