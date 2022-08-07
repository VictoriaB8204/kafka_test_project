<div aria-live="polite" aria-atomic="true" class="position-fixed bottom-0 z-index-max" id="toastForm">
    <div id="toast" class="toast text-white {{$success ? 'bg-success' : 'bg-danger'}}" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true">
        <div class="d-flex">
            <div class="toast-body">{{ $message }}</div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>
