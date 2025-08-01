<!-- Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutModalLabel">Logout</h5>
            </div>
            <div class="modal-body">
                Apakah anda ingin logout?
            </div>
            <form action="{{ route('logout') }}" class="modal-footer" method="POST">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>
    </div>
</div>
