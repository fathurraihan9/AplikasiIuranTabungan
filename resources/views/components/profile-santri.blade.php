<div class="row mb-3">
    <div class="col-md-6">
        <div class="card card-body">
            <form action="">
                <div class="mb-3">
                    <label class="form-label">NIS</label>
                    <input type="text" class="form-control" value="{{ $santri->nis }}" placeholder="Nomor Induk Santri"
                        disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control" value="{{ $santri->nama }}" placeholder="Nama Santri"
                        disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kelas</label>
                    <input type="text" class="form-control" value="{{ $santri->kelas }}" placeholder="Nama Santri"
                        disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <input type="text" class="form-control" value="{{ $santri->jenis_kelamin }}"
                        placeholder="Nama Santri" disabled>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-6">
        <x-pengumuman :notifikasi="$notifikasi"></x-pengumuman>
    </div>
</div>
