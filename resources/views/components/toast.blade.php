<!-- Toast Container -->
<div aria-live="polite" aria-atomic="true"
    style="position: fixed; top: 1rem; left: 50%; transform: translateX(-50%); z-index: 9999;">

    @if (session('msg_success'))
        <div class="toast bg-success text-white" data-delay="5000" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-success text-white">
                <strong class="me-auto">Sukses</strong>
                <small>Baru saja</small>
            </div>
            <div class="toast-body">
                {{ session('msg_success') }}
            </div>
        </div>
    @endif

    @if (session('msg_error'))
        <div class="toast bg-danger text-white" data-delay="5000" role="alert" aria-live="assertive"
            aria-atomic="true">
            <div class="toast-header bg-danger text-white">
                <strong class="me-auto">Gagal</strong>
                <small>Baru saja</small>
            </div>
            <div class="toast-body">
                {{ session('msg_error') }}
            </div>
        </div>
    @endif
</div>
