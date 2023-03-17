<div class="modal fade" id="modal-user" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-5 pt-50">
                <div class="text-center mb-2">
                    <h1 class="mb-1">Informasi Barang</h1>
                    <p>Masukan data barang pada form di bawah untuk menambahkan barang.</p>
                </div>
                <form id="main-form" class="row gy-1 pt-75" action="{{ route('post.barang.cms') }}" method="POST">
                    @csrf
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="basic-icon-default-nama_barange">Nama Barang</label>
                        <input type="text"
                            class="form-control dt-nama_barang @error('nama_barang')
                        error
                        @enderror"
                            id="basic-icon-default-nama_barang" placeholder="contoh: IPhone 12 PRO Max"
                            name="nama_barang" value="{{ old('nama_barang') }}" />
                        @error('nama_barang')
                            <span id="basic-default-nama_barange-error" class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="basic-icon-default-harga_awal">Harga Awal</label>
                        <input type="text" id="basic-icon-default-harga_awal"
                            class="form-control dt-harga_awal @error('harga_awal')
                              error
                            @enderror"
                            placeholder="contoh: 100000" name="harga_awal" value="{{ old('harga_awal') }}" />
                        @error('harga_awal')
                            <span id="basic-default-harga_awal-error" class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 position-relative">
                        <label class="form-label" for="basic-icon-default-tgl">Tanggal</label>
                        <input type="text" id="basic-icon-default-tgl"
                            class="form-control pickadate @error('tgl')
                                error
                            @enderror" placeholder="6 April, 2023" name="tgl"/>
                        @error('tgl')
                            <span id="basic-default-tgl-error" class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="basic-icon-default-deskripsi_barang">Deskripsi</label>
                        <div class="form-floating mb-0">
                            <textarea data-length="20"
                                class="form-control char-textarea @error('deskripsi_barang')
                              error
                            @enderror"
                                id="textarea-counter" name="deskripsi_barang" rows="3" placeholder="Counter" style="height: 100px">{{ old('deskripsi_barang') }}</textarea>
                        </div>
                        <small class="textarea-counter-value float-end"><span class="char-count">0</span> / 100 </small>
                        @error('deskripsi_barang')
                            <span id="basic-default-deskripsi_barang-error" class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    @if (empty(old('images')) != true && is_array(old('images')))
                        @foreach (old('images') as $image)
                            <input type="text" class="d-none" value="{{ $image }}" name="images[]">
                        @endforeach

                    @endif
                </form>
                <div class="col-12 mt-2 pt-50">
                    @error('images')
                        <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
                            <div class="alert-body d-flex align-items-center">
                                <i data-feather="info" class="me-50"></i>
                                <span>The value is <strong>invalid</strong>. {{ $message }}.</span>
                            </div>
                        </div>
                    @enderror
                    <label class="form-label" for="basic-icon-default-email">Images</label>

                    <form action="{{ route('post.image-upload') }}" class="dropzone dropzone-area" id="dpz-images"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="dz-message">Drop files here or click to upload.</div>
                    </form>

                    <button id="clear-dropzone" class="mt-1 btn btn-outline-primary mb-1">
                        <i data-feather="trash" class="me-25"></i>
                        <span class="align-middle">Clear Dropzone</span>
                    </button>
                </div>
                <div class="col-12 text-center mt-2 pt-50">
                    <button onclick="document.getElementById('main-form').submit();" type="submit"
                        class="btn btn-primary me-1">Submit</button>
                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
                        Discard
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>