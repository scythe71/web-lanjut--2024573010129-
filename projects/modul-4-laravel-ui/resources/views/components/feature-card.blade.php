<!-- Penambahan agar tidak error Undefined -->
@props([
    'title',
    'icon',
    'description',
    'theme' => 'light',
    'badge' => null
])
<div class="card feature-card h-100 {{ $theme === 'dark' ? 'bg-secondary text-white' : '' }}">
    <div class="card-body">
        <div class="d-flex align-items-center mb-3">
            <span class="fs-2 me-3">{{ $icon ?? '⭐' }}</span>
            <h5 class="card-title mb-0">{{ $title }}</h5>
        </div>
        <p class="card-text">{{ $description }}</p>
        <!-- Pengurangan isset() -->
        @if($badge)
            <span class="badge {{ $theme === 'dark' ? 'bg-light text-dark' : 'bg-dark' }}">{{ $badge }}</span>
        @endif
    </div>
</div>