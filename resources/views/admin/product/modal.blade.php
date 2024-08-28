@foreach ($produks as $item)
    {{-- edit user --}}
    <div class="modal fade" id="edit{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title fs-5" id="exampleModalLabel">Edit Produk</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="{{ url("editproduk/$item->id") }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="inputproduk3" class="col-sm-2 col-form-label">Kategori</label>
                                <div class="col-sm-10">
                                    <select class="form-control select2 select2-hidden-accessible" name="kategori_id"
                                        style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <option selected class="bg-success" value="{{ $item->kategori_id }}">
                                            {{ $item->kategori->nama }}</option>
                                        @foreach ($kategoris as $kat)
                                            <option value="{{ $kat->id }}">{{ $kat->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputname3" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{ $item->name }}"
                                        id="inputname3" name="name" placeholder="name">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi">{{ $item->deskripsi }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                                <div class="col-sm-10">
                                    <input type="number" value="{{ $item->harga }}" class="form-control"
                                        id="harga" name="harga" placeholder="harga">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="stok" class="col-sm-2 col-form-label">Stok</label>
                                <div class="col-sm-10">
                                    <input type="number" value="{{ $item->stok }}" class="form-control"
                                        id="stok" name="stok" placeholder="stok">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="detail" class="col-sm-2 col-form-label">Detail</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control" id="detail" name="detail" placeholder="Detail">{{ $item->detail }}</textarea>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">Edit</button>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="size{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title fs-5" id="exampleModalLabel">Tambahkan ukuran baju</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="{{ url('size') }}" method="POST">
                        @csrf
                        <input hidden type="number" value="{{ $item->id }}" name="produk_id">
                        <div class="form-group row">
                            <label for="size" class="col-sm-2 col-form-label">size</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="size" name="ukuran"
                                    placeholder="S/M/L/XL..">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info">Tambahkan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="stok{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title fs-5" id="exampleModalLabel">edit stok baju</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="{{ url('size') }}" method="POST">
                        @csrf
                        <input hidden type="number" value="{{ $item->id }}" name="produk_id">
                        <div class="form-group row">
                            <label for="size" class="col-sm-2 col-form-label">size</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="size" name="ukuran"
                                    placeholder="S/M/L/XL..">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info">Tambahkan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="color{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title fs-5" id="exampleModalLabel">Tambahkan warna baju</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="{{ url('color') }}" method="POST">
                        @csrf
                        <input hidden type="number" value="{{ $item->id }}" name="produk_id">
                        <div class="form-group row">
                            <label for="color" class="col-sm-2 col-form-label">color</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="color" name="color"
                                    placeholder="color">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="code" class="col-sm-2 col-form-label">code warna</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="code" name="code"
                                    placeholder="code">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-info">Tambahkan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="foto{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title fs-5" id="exampleModalLabel">Preview</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <section class="content">
                        <!-- Default box -->
                        <div class="card card-solid">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <h3 class="d-inline-block d-sm-none">LOWA Men’s Renegade GTX Mid Hiking Boots
                                            Review</h3>
                                        <div class="col-12">
                                            <img src="{{ asset('img/produk/' . $item->foto[0]->img) }}"
                                                class="product-image" alt="Product Image">
                                        </div>
                                        <div class="col-12 product-image-thumbs">
                                            @foreach ($item->foto as $foto)
                                                <div class="product-image-thumb"><img
                                                        src="{{ asset('img/produk/' . $foto->img) }}"
                                                        alt="Product Image">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <h3 class="my-3">{{ $item->name }}</h3>
                                        <p>{{ $item->deskripsi }}</p>
                                        <p>{!! $item->detail !!}</p>
                                        <hr>
                                        <h4>Available Colors</h4>
                                        @foreach ($item->color as $colors)
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-default text-center active">
                                                    <input type="radio" name="color_option" id="color_option_a1"
                                                        autocomplete="off" checked>
                                                    {{ $colors->color }}
                                                    <br>
                                                    <div class="p-3 rounded-circle btn"
                                                        style="background-color:#{{ $colors->code }};"></div>
                                                </label>
                                            </div>
                                        @endforeach
                                        <h4 class="mt-3">Size</h4>
                                        @foreach ($item->size as $sizes)
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-default text-center">
                                                    <input type="radio" name="color_option" id="color_option_b1"
                                                        autocomplete="off">
                                                    <span class="text-xl">{{$sizes->ukuran}}</span>
                                                    <br>
                                                    Small
                                                </label>
                                            </div>
                                        @endforeach

                                        <div class="bg-gray py-2 px-3 mt-4">
                                            <h2 class="mb-0">
                                                Rp{{ number_format($item->harga, 2, ',', '.') }}
                                            </h2>
                                            <h4 class="mt-0">
                                                <small>Ex Tax: Rp{{ number_format($item->harga, 2, ',', '.') }}
                                                </small>
                                            </h4>
                                        </div>

                                        <div class="mt-4">
                                            <div class="btn btn-primary btn-lg btn-flat">
                                                <i class="fas fa-cart-plus fa-lg mr-2"></i>
                                                Add to Cart
                                            </div>

                                            <div class="btn btn-default btn-lg btn-flat">
                                                <i class="fas fa-heart fa-lg mr-2"></i>
                                                Add to Wishlist
                                            </div>
                                        </div>

                                        <div class="mt-4 product-share">
                                            <a href="#" class="text-gray">
                                                <i class="fab fa-facebook-square fa-2x"></i>
                                            </a>
                                            <a href="#" class="text-gray">
                                                <i class="fab fa-twitter-square fa-2x"></i>
                                            </a>
                                            <a href="#" class="text-gray">
                                                <i class="fas fa-envelope-square fa-2x"></i>
                                            </a>
                                            <a href="#" class="text-gray">
                                                <i class="fas fa-rss-square fa-2x"></i>
                                            </a>
                                        </div>

                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <nav class="w-100">
                                        <div class="nav nav-tabs" id="product-tab" role="tablist">
                                            <a class="nav-item nav-link active" id="product-desc-tab"
                                                data-toggle="tab" href="#product-desc" role="tab"
                                                aria-controls="product-desc" aria-selected="true">Description</a>
                                            <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab"
                                                href="#product-comments" role="tab"
                                                aria-controls="product-comments" aria-selected="false">Comments</a>
                                            <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab"
                                                href="#product-rating" role="tab" aria-controls="product-rating"
                                                aria-selected="false">Rating</a>
                                        </div>
                                    </nav>
                                    <div class="tab-content p-3" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="product-desc" role="tabpanel"
                                            aria-labelledby="product-desc-tab"> Lorem ipsum dolor sit amet, consectetur
                                            adipiscing elit. Morbi vitae condimentum erat. Vestibulum ante ipsum primis
                                            in faucibus orci luctus et ultrices posuere cubilia Curae; Sed posuere,
                                            purus at efficitur hendrerit, augue elit lacinia arcu, a eleifend sem elit
                                            et nunc. Sed rutrum vestibulum est, sit amet cursus dolor fermentum vel.
                                            Suspendisse mi nibh, congue et ante et, commodo mattis lacus. Duis varius
                                            finibus purus sed venenatis. Vivamus varius metus quam, id dapibus velit
                                            mattis eu. Praesent et semper risus. Vestibulum erat erat, condimentum at
                                            elit at, bibendum placerat orci. Nullam gravida velit mauris, in
                                            pellentesque urna pellentesque viverra. Nullam non pellentesque justo, et
                                            ultricies neque. Praesent vel metus rutrum, tempus erat a, rutrum ante.
                                            Quisque interdum efficitur nunc vitae consectetur. Suspendisse venenatis,
                                            tortor non convallis interdum, urna mi molestie eros, vel tempor justo lacus
                                            ac justo. Fusce id enim a erat fringilla sollicitudin ultrices vel metus.
                                        </div>
                                        <div class="tab-pane fade" id="product-comments" role="tabpanel"
                                            aria-labelledby="product-comments-tab"> Vivamus rhoncus nisl sed venenatis
                                            luctus. Sed condimentum risus ut tortor feugiat laoreet. Suspendisse
                                            potenti. Donec et finibus sem, ut commodo lectus. Cras eget neque dignissim,
                                            placerat orci interdum, venenatis odio. Nulla turpis elit, consequat eu eros
                                            ac, consectetur fringilla urna. Duis gravida ex pulvinar mauris ornare, eget
                                            porttitor enim vulputate. Mauris hendrerit, massa nec aliquam cursus, ex
                                            elit euismod lorem, vehicula rhoncus nisl dui sit amet eros. Nulla turpis
                                            lorem, dignissim a sapien eget, ultrices venenatis dolor. Curabitur vel
                                            turpis at magna elementum hendrerit vel id dui. Curabitur a ex ullamcorper,
                                            ornare velit vel, tincidunt ipsum. </div>
                                        <div class="tab-pane fade" id="product-rating" role="tabpanel"
                                            aria-labelledby="product-rating-tab"> Cras ut ipsum ornare, aliquam ipsum
                                            non, posuere elit. In hac habitasse platea dictumst. Aenean elementum leo
                                            augue, id fermentum risus efficitur vel. Nulla iaculis malesuada
                                            scelerisque. Praesent vel ipsum felis. Ut molestie, purus aliquam placerat
                                            sollicitudin, mi ligula euismod neque, non bibendum nibh neque et erat.
                                            Etiam dignissim aliquam ligula, aliquet feugiat nibh rhoncus ut. Aliquam
                                            efficitur lacinia lacinia. Morbi ac molestie lectus, vitae hendrerit nisl.
                                            Nullam metus odio, malesuada in vehicula at, consectetur nec justo. Quisque
                                            suscipit odio velit, at accumsan urna vestibulum a. Proin dictum, urna ut
                                            varius consectetur, sapien justo porta lectus, at mollis nisi orci et nulla.
                                            Donec pellentesque tortor vel nisl commodo ullamcorper. Donec varius massa
                                            at semper posuere. Integer finibus orci vitae vehicula placerat. </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </section>
                </div>
            </div>
        </div>
    </div>
@endforeach


{{-- add katagri --}}
<div class="modal fade" id="addproduk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title fs-5" id="exampleModalLabel">Add produk</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="produk" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="inputproduk3" class="col-sm-2 col-form-label">Kategori</label>
                            <div class="col-sm-10">
                                <select class="form-control select2 select2-hidden-accessible" name="kategori_id"
                                    style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    @foreach ($kategoris as $kat)
                                        <option value="{{ $kat->id }}">{{ $kat->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputname3" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputname3" name="name"
                                    placeholder="name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="harga" name="harga"
                                    placeholder="harga">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="stok" class="col-sm-2 col-form-label">Stok</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="stok" name="stok"
                                    placeholder="stok">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="detail" class="col-sm-2 col-form-label">Detail</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" id="detail" name="detail" placeholder="Detail"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="images" class="col-sm-2 col-form-label">Images</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="images"
                                            name="images[]" multiple>
                                        <label class="custom-file-label" for="images">Choose files</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Tambah</button>
                        <button type="submit" class="btn btn-default float-right">Cancel</button>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </div>
</div>
