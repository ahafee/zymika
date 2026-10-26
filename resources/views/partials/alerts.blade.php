<!-- Floating Ultra-Smooth Animated Toast Notifications -->
<div id="toastNotificationWrapper" class="toast-wrapper">
    @if(session('success'))
        <div class="toast-item toast-item-success" role="alert">
            <div class="toast-icon-wrap toast-icon-success">
                <i class="bi bi-check2"></i>
            </div>
            <div class="toast-content-wrap">
                <div class="toast-title">Success</div>
                <div class="toast-desc">{{ session('success') }}</div>
            </div>
            <button type="button" class="toast-close-btn" onclick="dismissToast(this.closest('.toast-item'))" aria-label="Close">
                <i class="bi bi-x"></i>
            </button>
            <div class="toast-progress-bar toast-progress-success"></div>
        </div>
    @endif

    @if(session('error'))
        <div class="toast-item toast-item-error" role="alert">
            <div class="toast-icon-wrap toast-icon-error">
                <i class="bi bi-exclamation-triangle"></i>
            </div>
            <div class="toast-content-wrap">
                <div class="toast-title">Notification</div>
                <div class="toast-desc">{{ session('error') }}</div>
            </div>
            <button type="button" class="toast-close-btn" onclick="dismissToast(this.closest('.toast-item'))" aria-label="Close">
                <i class="bi bi-x"></i>
            </button>
            <div class="toast-progress-bar toast-progress-error"></div>
        </div>
    @endif

    @if($errors->any())
        <div class="toast-item toast-item-error" role="alert">
            <div class="toast-icon-wrap toast-icon-error">
                <i class="bi bi-x-octagon"></i>
            </div>
            <div class="toast-content-wrap">
                <div class="toast-title">Please check the following:</div>
                <ul class="toast-error-list">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <button type="button" class="toast-close-btn" onclick="dismissToast(this.closest('.toast-item'))" aria-label="Close">
                <i class="bi bi-x"></i>
            </button>
            <div class="toast-progress-bar toast-progress-error"></div>
        </div>
    @endif
</div>

<script>
function dismissToast(element) {
    if (!element || element.dataset.dismissing === 'true') return;
    element.dataset.dismissing = 'true';
    element.classList.add('toast-item-dismissing');
    setTimeout(() => {
        if (element && element.parentNode) {
            element.remove();
        }
    }, 400);
}

document.addEventListener('DOMContentLoaded', function () {
    const toasts = document.querySelectorAll('.toast-item');
    toasts.forEach(toast => {
        let dismissTimer;
        const startTimer = () => {
            dismissTimer = setTimeout(() => {
                dismissToast(toast);
            }, 5000);
        };
        const pauseTimer = () => {
            clearTimeout(dismissTimer);
        };

        startTimer();

        // Pause on mouse hover, resume on mouse leave
        toast.addEventListener('mouseenter', pauseTimer);
        toast.addEventListener('mouseleave', startTimer);
    });
});
</script>
