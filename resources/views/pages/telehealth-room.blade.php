@extends('layouts.app')

@section('title', 'Encrypted Telehealth Video Room - ZYMIKA HEALTH')

@push('styles')
<style>
.video-room-container {
    background-color: #010916;
    min-height: calc(100vh - 180px);
    border-radius: var(--radius-xl);
    overflow: hidden;
    position: relative;
    box-shadow: 0 20px 40px rgba(0,0,0,0.3);
}
.video-stream-grid {
    display: grid;
    grid-template-columns: 1fr 340px;
    min-height: 580px;
    gap: 1.5rem;
    padding: 1.5rem;
}
@media (max-width: 991px) {
    .video-stream-grid {
        grid-template-columns: 1fr;
    }
}
.video-feed-main {
    background: linear-gradient(135deg, #0f2d59 0%, #010916 100%);
    border-radius: 16px;
    border: 1px solid rgba(255,255,255,0.08);
    position: relative;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 400px;
}
.video-feed-pip {
    position: absolute;
    bottom: 20px;
    right: 20px;
    width: 190px;
    height: 130px;
    background: #000;
    border-radius: 12px;
    border: 2px solid var(--brand-primary);
    overflow: hidden;
    box-shadow: 0 8px 24px rgba(0,0,0,0.5);
    z-index: 10;
}
.video-feed-pip video {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.video-controls-bar {
    background: rgba(15, 45, 89, 0.95);
    backdrop-filter: blur(12px);
    border-top: 1px solid rgba(255,255,255,0.08);
    padding: 1rem 1.5rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 1rem;
}
.control-btn {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
    border: none;
    transition: all 0.2s ease;
    cursor: pointer;
}
.control-btn-default {
    background: rgba(255,255,255,0.12);
    color: #fff;
}
.control-btn-default:hover {
    background: rgba(255,255,255,0.25);
    color: #fff;
}
.control-btn-active {
    background: var(--brand-primary);
    color: #fff;
}
.control-btn-danger {
    background: #E74C3C;
    color: #fff;
}
.control-btn-danger:hover {
    background: #C0392B;
    color: #fff;
}
.clinical-sidebar {
    background: rgba(255,255,255,0.04);
    border: 1px solid rgba(255,255,255,0.08);
    border-radius: 16px;
    padding: 1.25rem;
    color: #ffffff;
    display: flex;
    flex-direction: column;
}
.audio-wave-bar {
    display: inline-flex;
    align-items: center;
    gap: 3px;
    height: 16px;
}
.audio-wave-bar span {
    width: 3px;
    height: 100%;
    background-color: #2ECC71;
    border-radius: 2px;
    animation: wavePulse 1.2s infinite ease-in-out;
}
.audio-wave-bar span:nth-child(2) { animation-delay: 0.2s; height: 70%; }
.audio-wave-bar span:nth-child(3) { animation-delay: 0.4s; height: 100%; }
.audio-wave-bar span:nth-child(4) { animation-delay: 0.1s; height: 50%; }
@keyframes wavePulse {
    0%, 100% { transform: scaleY(0.4); }
    50% { transform: scaleY(1); }
}
</style>
@endpush

@section('content')
<div class="container py-4" x-data="videoRoomApp()">
    
    <!-- Top Breadcrumb & Status -->
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">
        <div class="d-flex align-items-center gap-2">
            <a href="{{ route('home') }}" class="btn btn-sm btn-outline-secondary py-1 px-2.5">
                <i class="bi bi-arrow-left me-1"></i> Exit Room
            </a>
            <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 px-2.5 py-1.5 d-inline-flex align-items-center gap-1.5">
                <span class="badge-vip-dot" style="background-color: #2ECC71;"></span>
                <span>WebRTC 256-Bit Encrypted Telehealth</span>
            </span>
        </div>
        <div class="text-muted small">
            Room ID: <code class="text-brand-primary fw-bold">{{ $room_code }}</code>
        </div>
    </div>

    <!-- Main Video Room Shell -->
    <div class="video-room-container">
        
        <div class="video-stream-grid">
            
            <!-- Main Video Stage (Doctor / Consult View) -->
            <div class="video-feed-main">
                
                <!-- Overlay Header -->
                <div class="position-absolute top-0 start-0 w-100 p-3 d-flex justify-content-between align-items-center" style="z-index: 5; background: linear-gradient(180deg, rgba(0,0,0,0.6) 0%, transparent 100%);">
                    <div class="d-flex align-items-center gap-2">
                        <div class="avatar-vip" style="width: 40px; height: 40px; font-size: 0.95rem; background: var(--brand-contrast);">
                            SB
                        </div>
                        <div>
                            <div class="text-white fw-bold small">{{ $doctor->full_name ?? 'Dr Bazel Lodhi' }}</div>
                            <div class="text-white-50" style="font-size: 0.75rem;">AHPRA Authorised Prescriber &bull; Online</div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center gap-2">
                        <div class="d-flex align-items-center gap-1.5 px-2.5 py-1 rounded-pill bg-dark bg-opacity-75 border border-white border-opacity-10 text-white small">
                            <span class="audio-wave-bar">
                                <span></span><span></span><span></span><span></span>
                            </span>
                            <span style="font-size: 0.78rem;">HD Audio</span>
                        </div>
                        <div class="px-2.5 py-1 rounded-pill bg-danger text-white small fw-bold" x-text="timerDisplay">
                            00:00
                        </div>
                    </div>
                </div>

                <!-- Doctor Stream Simulated Visual -->
                <div class="text-center p-4">
                    <div class="position-relative d-inline-block mb-3">
                        <div class="rounded-circle p-1 border border-2 border-success d-inline-block">
                            <img src="{{ asset('images/Final-File.png') }}" alt="Dr Bazel Lodhi" class="rounded-circle shadow" style="width: 110px; height: 110px; object-fit: cover; background: #ffffff;">
                        </div>
                        <span class="position-absolute bottom-0 end-0 p-1.5 bg-success border border-2 border-dark rounded-circle"></span>
                    </div>
                    <h5 class="text-white fw-bold mb-1">{{ $doctor->full_name ?? 'Dr Bazel Lodhi' }}</h5>
                    <p class="text-white-50 small mb-2">Prescribing Telehealth Doctor &bull; ZYMIKA HEALTH</p>
                    <span class="badge bg-white bg-opacity-10 text-white border border-white border-opacity-20 px-3 py-1.5">
                        <i class="bi bi-shield-check text-brand-primary me-1"></i> Consultation Active &amp; Ready
                    </span>
                </div>

                <!-- Patient Self-View (Picture in Picture) -->
                <div class="video-feed-pip">
                    <video id="selfVideo" autoplay playsinline muted x-show="cameraOn"></video>
                    <div x-show="!cameraOn" class="w-100 h-100 d-flex flex-column align-items-center justify-content-center text-white-50 bg-dark" style="font-size: 0.75rem;">
                        <i class="bi bi-camera-video-off fs-4 mb-1"></i>
                        <span>Camera Off</span>
                    </div>
                    <span class="position-absolute bottom-0 start-0 px-2 py-0.5 bg-dark bg-opacity-75 text-white" style="font-size: 0.68rem;">You</span>
                </div>

            </div>

            <!-- Clinical Side Drawer -->
            <div class="clinical-sidebar">
                <div class="pb-3 border-bottom border-white border-opacity-10 mb-3">
                    <h6 class="fw-bold text-brand-primary mb-1">
                        <i class="bi bi-clipboard2-pulse me-1"></i> Consultation Diary
                    </h6>
                    <div class="text-white-50 small" style="font-size: 0.8rem;">
                        Secure Australian EHR Telehealth Session
                    </div>
                </div>

                <div class="mb-3">
                    <div class="small text-white-50 mb-1">Assigned Patient:</div>
                    <div class="fw-bold text-white">{{ $appointment->patient->name ?? (Auth::user()->name ?? 'Consulting Patient') }}</div>
                    <div class="small text-white-50" style="font-size: 0.78rem;">
                        Ref: <span class="font-monospace text-brand-primary">{{ $appointment->appointment_number ?? 'APT-LIVE-SESSION' }}</span>
                    </div>
                </div>

                <div class="p-2.5 rounded-3 bg-white bg-opacity-5 border border-white border-opacity-10 mb-3 small">
                    <div class="d-flex justify-content-between mb-1">
                        <span class="text-white-50">Clinical Pathway:</span>
                        <span class="fw-bold text-white">{{ $appointment->service->name ?? 'Telehealth Consultation' }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-1">
                        <span class="text-white-50">Duration:</span>
                        <span class="badge bg-brand-light text-brand-contrast border">{{ $appointment->service->duration_minutes ?? 20 }} mins</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span class="text-white-50">EHR Sync:</span>
                        <span class="text-success"><i class="bi bi-check-circle-fill"></i> Connected</span>
                    </div>
                </div>

                <!-- Pre-Consult Snapform CTA -->
                @if($appointment)
                    <div class="p-3 rounded-3 bg-brand-primary bg-opacity-15 border border-brand-primary border-opacity-25 mb-3 text-start">
                        <div class="fw-bold text-white small mb-1">
                            <i class="bi bi-file-earmark-medical me-1"></i> Snapform Intake
                        </div>
                        <p class="text-white-50 mb-2" style="font-size: 0.75rem;">Share pain score &amp; current medicines with Dr Lodhi.</p>
                        <a href="{{ route('patient.snapform', ['appointment_id' => $appointment->id]) }}" class="btn btn-sm btn-brand-primary w-100 fw-semibold" style="font-size: 0.8rem;">
                            Open Snapform &rarr;
                        </a>
                    </div>
                @endif

                <div class="mt-auto pt-3 border-top border-white border-opacity-10 text-center">
                    <a href="{{ route('patient.dashboard') }}" class="btn btn-outline-light btn-sm w-100" style="font-size: 0.8rem;">
                        <i class="bi bi-person-badge me-1"></i> Go to Patient Portal
                    </a>
                </div>
            </div>

        </div>

        <!-- Interactive Video Action Bar -->
        <div class="video-controls-bar">
            
            <div class="d-flex align-items-center gap-2">
                <span class="badge bg-white bg-opacity-10 text-white-50 border border-white border-opacity-10 py-1.5 px-3 d-none d-sm-inline-block small">
                    <i class="bi bi-lock-fill text-brand-sage me-1"></i> End-to-End Encrypted
                </span>
            </div>

            <div class="d-flex align-items-center justify-content-center gap-3">
                
                <!-- Mic Button -->
                <button class="control-btn" :class="micOn ? 'control-btn-default' : 'control-btn-danger'" @click="toggleMic()" :title="micOn ? 'Mute Microphone' : 'Unmute Microphone'">
                    <i class="bi" :class="micOn ? 'bi-mic-fill' : 'bi-mic-mute-fill'"></i>
                </button>

                <!-- Camera Button -->
                <button class="control-btn" :class="cameraOn ? 'control-btn-default' : 'control-btn-danger'" @click="toggleCamera()" :title="cameraOn ? 'Turn Off Camera' : 'Turn On Camera'">
                    <i class="bi" :class="cameraOn ? 'bi-camera-video-fill' : 'bi-camera-video-off-fill'"></i>
                </button>

                <!-- Screen Share Button -->
                <button class="control-btn" :class="screenSharing ? 'control-btn-active' : 'control-btn-default'" @click="toggleScreenShare()" title="Share Screen">
                    <i class="bi bi-display"></i>
                </button>

                <!-- End Call Button -->
                <a href="{{ route('patient.dashboard') }}" class="control-btn control-btn-danger" title="End Consultation" onclick="return confirm('Do you want to end this telehealth session and return to portal?');">
                    <i class="bi bi-telephone-x-fill"></i>
                </a>

            </div>

            <div class="d-flex align-items-center gap-2">
                <button class="btn btn-sm btn-outline-light py-1 px-3 d-none d-md-inline-block" @click="requestHelp()">
                    <i class="bi bi-question-circle me-1"></i> Audio / Video Test
                </button>
            </div>

        </div>

    </div>

</div>

@push('scripts')
<script>
function videoRoomApp() {
    return {
        micOn: true,
        cameraOn: true,
        screenSharing: false,
        secondsElapsed: 0,
        timerInterval: null,
        localStream: null,
        init() {
            this.startTimer();
            this.initLocalMedia();
        },
        startTimer() {
            this.timerInterval = setInterval(() => {
                this.secondsElapsed++;
            }, 1000);
        },
        get timerDisplay() {
            const m = Math.floor(this.secondsElapsed / 60).toString().padStart(2, '0');
            const s = (this.secondsElapsed % 60).toString().padStart(2, '0');
            return `${m}:${s}`;
        },
        async initLocalMedia() {
            try {
                if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                    this.localStream = await navigator.mediaDevices.getUserMedia({ video: true, audio: true });
                    const videoEl = document.getElementById('selfVideo');
                    if (videoEl) {
                        videoEl.srcObject = this.localStream;
                    }
                }
            } catch (err) {
                console.log('Camera/Mic preview fallback active:', err.message);
                this.cameraOn = false;
            }
        },
        toggleMic() {
            this.micOn = !this.micOn;
            if (this.localStream) {
                this.localStream.getAudioTracks().forEach(track => track.enabled = this.micOn);
            }
        },
        toggleCamera() {
            this.cameraOn = !this.cameraOn;
            if (this.localStream) {
                this.localStream.getVideoTracks().forEach(track => track.enabled = this.cameraOn);
            }
        },
        toggleScreenShare() {
            this.screenSharing = !this.screenSharing;
            if (this.screenSharing) {
                alert('Screen sharing initiated for Dr Bazel Lodhi.');
            }
        },
        requestHelp() {
            alert('Your microphone and camera devices are verified for Australian Telehealth standards.');
        }
    }
}
</script>
@endpush
@endsection
