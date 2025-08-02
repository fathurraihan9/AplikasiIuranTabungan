<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="text-center">
                    <i class="bi bi-bell-fill"></i>
                    <span class="fs-4 fw-bold">Pengumuman</span>
                    <i class="bi bi-bell-fill"></i>
                </h4>
            </div>
            <div class="card-body">
                <marquee behavior="scroll" direction="left" class="text-danger">
                    @foreach ($notifikasi as $n)
                        <span class="fw-bold text-capitalize">[{{ $n->tanggal }}] {{ $n->jenis_transaksi }}</span>
                        <span>{{ $n->santri->nama }}:
                            {{ $n->jumlah }}</span> &nbsp;&nbsp; || &nbsp;&nbsp;
                    @endforeach
                </marquee>
            </div>
        </div>
    </div>
</div>
