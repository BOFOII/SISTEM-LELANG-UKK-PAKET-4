<div class="modal fade" id="modals-slide-in" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-5 pt-50">
                <div class="text-center mb-2">
                    <h1 class="mb-1">Informasi Lelang</h1>
                    <p>Masukan infromasi barang untuk memperbaruhi server lelang.</p>
                </div>
                <form action="{{ route('post.lelang.cms') }}" id="editUserForm" class="row gy-1 pt-75" method="POST">
                    @csrf
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="barang-lelang">Barang</label>
                        <select name="id_barang" id="barang-lelang"
                            class="select2 form-select @error('id_barang')
                    error
                    @enderror">
                            <option value="">Pilih barang</option>
                            @foreach ($barang_list as $barang)
                                <option value="{{ $barang->id_barang }}">{{ $barang->nama_barang }}</option>
                            @endforeach
                        </select>
                        @error('id_barang')
                            <span id="basic-default-name-error" class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 position-relative">
                        <label class="form-label" for="basic-icon-default-tgl">Tanggal</label>
                        <input type="text" id="basic-icon-default-tgl"
                            class="form-control pickadate @error('tgl_lelang')
                                error
                            @enderror"
                            placeholder="6 April, 2023" name="tgl_lelang" />
                        @error('tgl')
                            <span id="basic-default-tgl-error" class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 text-center mt-2 pt-50">
                        <button type="submit" class="btn btn-primary me-1">Submit</button>
                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                            aria-label="Close">
                            Discard
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
