<!-- Floating Smooth Animated Toast Notifications (Fixed Top-Right) -->
<div id="toastNotificationWrapper" class="position-fixed" style="top: 96px; right: 24px; z-index: 1060; max-width: 420px; width: calc(100% - 48px); pointer-events: none;">
    @if(session('success'))
        <div class="toast-item shadow-lg rounded-4 p-3.5 mb-3 bg-white border d-flex align-items-start gap-3 position-relative overflow-hidden" 
             role="alert" 
             style="pointer-events: auto; border-left: 5px solid #198754 !important; animation: toastSlideIn 0.4s cubic-bezier(0.16, 1, 0.3, 1);">
            <div class="rounded-circle d-flex align-items-center justify-content-center text-white flex-shrink-0" style="width: 36px; height: 36px; background: linear-gradient(135deg, #198754 0%, #20c997 100%);">
                <i class="bi bi-check-lg fs-5"></i>
            </div>
            <div class="flex-grow-1 pe-3">
                <div class="fw-bold text-brand-contrast small mb-0.5">Success</div>
                <div class="text-muted small lh-base">{{ session('success') }}</div>
            </div>
            <button type="button" class="btn-close small ms-auto flex-shrink-0" onclick="dismissToast(this.closest('.toast-item'))" aria-label="Close"></button>
            <div class="toast-progress-bar" style="background-color: #198754;"></div>
        </div>
    @endif

    @if(session('error'))
        <div class="toast-item shadow-lg rounded-4 p-3.5 mb-3 bg-white border d-flex align-items-start gap-3 position-relative overflow-hidden" 
             role="alert" 
             style="pointer-events: auto; border-left: 5px solid #dc3545 !important; animation: toastSlideIn 0.4s cubic-bezier(0.16, 1, 0.3, 1);">
            <div class="rounded-circle d-flex align-items-center justify-content-center text-white flex-shrink-0" style="width: 36px; height: 36px; background: linear-gradient(135deg, #dc3545 0%, #e63946 100%);">
                <i class="bi bi-exclamation-triangle-fill fs-6"></i>
            </div>
            <div class="flex-grow-1 pe-3">
                <div class="fw-bold text-brand-contrast small mb-0.5">Notification</div>
                <div class="text-muted small lh-base">{{ session('error') }}</div>
            </div>
            <button type="button" class="btn-close small ms-auto flex-shrink-0" onclick="dismissToast(this.closest('.toast-item'))" aria-label="Close"></button>
            <div class="toast-progress-bar" style="background-color: #dc3545;"></div>
        </div>
    @endif

    @if($errors->any())
        <div class="toast-item shadow-lg rounded-4 p-3.5 mb-3 bg-white border d-flex align-items-start gap-3 position-relative overflow-hidden" 
             role="alert" 
             style="pointer-events: auto; border-left: 5px solid #dc3545 !important; animation: toastSlideIn 0.4s cubic-bezier(0.16, 1, 0.3, 1);">
            <div class="rounded-circle d-flex align-items-center justify-content-center text-white flex-shrink-0" style="width: 36px; height: 36px; background-color: #dc3545;">
                <i class="bi bi-x-octagon-fill fs-6"></i>
            </div>
            <div class="flex-grow-1 pe-3">
                <div class="fw-bold text-brand-contrast small mb-0.5">Please check:</div>
                <ul class="mb-0 ps-3 small text-muted">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <button type="button" class="btn-close small ms-auto flex-shrink-0" onclick="dismissToast(this.closest('.toast-item'))" aria-label="Close"></button>
            <div class="toast-progress-bar" style="background-color: #dc3545;"></div>
        </div>
    @endif
</div>

<style>
@keyframes toastSlideIn {
    from {
        opacity: 0;
        transform: translateX(50px) scale(0.95);
    }
    to {
        opacity: 1;
        transform: translateX(0) scale(1);
    }
}

@keyframes toastFadeOut {
    from {
        opacity: 1;
        transform: translateX(0) scale(1);
    }
    to {
        opacity: 0;
        transform: translateX(60px) scale(0.9);
    }
}

.toast-progress-bar {
    position: absolute;
    bottom: 0;
    left: 0;
    height: 3px;
    width: 100%;
    animation: toastProgress 4.8s linear forwards;
}

@keyframes toastProgress {
    from { width: 100%; }
    to { width: 0%; }
}
</style>

<script>
function dismissToast(element) {
    if (!element) return;
    element.style.animation = 'toastFadeOut 0.35s cubic-bezier(0.16, 1, 0.3, 1) forwards';
    setTimeout(() => {
        element.remove();
    }, 360);
}

document.addEventListener('DOMContentLoaded', function () {
    const toasts = document.querySelectorAll('.toast-item');
    toasts.forEach(toast => {
        // Auto-dismiss after 5 seconds
        setTimeout(() => {
            dismissToast(toast);
        }, 5000);
    });
});
</script>
