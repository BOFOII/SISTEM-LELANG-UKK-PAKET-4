<div class="modal fade" id="modal-tawaran" tabindex="-1" aria-labelledby="addNewCardTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-sm-5 mx-50 pb-5">
                <h1 class="text-center mb-1" id="addNewCardTitle">Tambahkan Tawaran</h1>
                <p class="text-center">Tambahkan tawaran anda untuk memanangkan baranag ini</p>

                <!-- form -->
                <form id="addNewCardValidation" class="row gy-1 gx-2 mt-75"
                    action="{{ route('post.tawaran', [
                        'lelang' => $lelang,
                    ]) }}" method="POST">
                    @csrf
                    <div class="col-12">
                        <label class="form-label" for="modalAddCardNumber">Tawaran</label>
                        <input name="penawaran_harga"
                            class="form-control @error('penawaran_harga')
                          error
                        @enderror"
                            type="text" placeholder="contoh: 120000" value="{{ old('penawaran_harga') }}" />
                        @error('penawaran_harga')
                            <span id="basic-default-name-error" class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary me-1 mt-1">Submit</button>
                        <button type="reset" class="btn btn-outline-secondary mt-1" data-bs-dismiss="modal"
                            aria-label="Close">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>