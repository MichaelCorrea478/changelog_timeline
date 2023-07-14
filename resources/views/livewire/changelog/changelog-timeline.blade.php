<div>
    <div class="timeline">

        @php
            $previousDate = null;
        @endphp
        @foreach ($changelogs as $changelog)
            @if ($changelog->release_date->format('d/m/Y') !== $previousDate)
                <!-- timeline time label -->
                <div class="time-label">
                    <span class="bg-green">
                        <i class="fas fa-solid fa-calendar"></i>
                        {{ $changelog->release_date->format('d/m/Y') }}
                    </span>
                </div>
                <!-- /.timeline-label -->
                @php
                    $previousDate = $changelog->release_date->format('d/m/Y');
                @endphp
            @endif

            <!-- timeline item -->
            <div>
                <i class="fas fa-solid fa-check bg-blue"></i>
                <div class="timeline-item">
                    <span class="time"><i class="fas fa-clock"></i> {{ $changelog->release_date->format('H:i') }}</span>
                    <h3 class="timeline-header">{{ $changelog->title }}</h3>

                    <div class="timeline-body">
                        {{ $changelog->description }}

                        <div>
                            @foreach ($changelog->images() as $image)
                                <img src="{{ $image->image }}" class="rounded mx-auto d-block">
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- END timeline item -->
        @endforeach

    </div>
</div>
