<div class="modal fade" id="modal-user" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-5 pt-50">
                <div class="text-center mb-2">
                    <h1 class="mb-1">Informasi Petugas</h1>
                    <p>Masukan data petugas pada form di bawah untuk menambahkan petugas.</p>
                </div>
            <form id="main-form" action="{{ route('post.petugas.cms') }}" class="row gy-1 pt-75" method="POST">
                    @csrf
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="basic-icon-default-nama_petugas">Nama Lengkap</label>
                        <input type="text"
                            class="form-control dt-full-name @error('nama_petugas')
                        error
                        @enderror"
                            id="basic-icon-default-nama_petugas" placeholder="contoh: John Doe" name="nama_petugas"
                            value="{{ old('nama_petugas') }}" />
                        @error('nama_petugas')
                            <span id="basic-default-name-error" class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="basic-icon-default-uname">Username</label>
                        <input type="text" id="basic-icon-default-uname"
                            class="form-control dt-uname @error('error')
                        error
                        @enderror"
                            placeholder="contoh: Zalpha" name="username" value="{{ old('username') }}" />
                        @error('username')
                            <span id="basic-default-name-error" class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="user-level">User Level</label>
                        <select id="user-level"
                            class="select2 form-select @error('id_level')
                        error
                        @enderror"
                            name="id_level">
                            <option value="">Pilih Level</option>
                            @foreach ($level_list as $level)
                                <option @if (old('id_level') == $level->id_level) @checked(true) @endif
                                    value="{{ $level->id_level }}">{{ ucfirst($level->level) }}</option>
                            @endforeach
                        </select>
                        @error('id_level')
                            <span id="basic-default-name-error" class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="basic-icon-default-password">Password</label>
                        <input type="password" id="basic-icon-default-password"
                            class="form-control dt-password @error('user_password')
                            error
                        @enderror"
                            name="user_password" />
                        @error('user_password')
                            <span id="basic-default-password-error" class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    @if (empty(old('image')) == false)
                        <input type="text" class="d-none" name="image" value="{{ old('image') }}">
                    @endif
                </form>
                <div class="col-12 mt-2 pt-50">
                    @error('image')
                        <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
                            <div class="alert-body d-flex align-items-center">
                                <i data-feather="info" class="me-50"></i>
                                <span>The value is <strong>invalid</strong>. {{ $message }}.</span>
                            </div>
                        </div>
                    @enderror
                    <label class="form-label" for="basic-icon-default-email">Avatar</label>

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
                    <button onclick="document.getElementById('main-form').submit()" type="submit"
                        class="btn btn-primary me-1">Submit</button>
                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
                        Discard
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
