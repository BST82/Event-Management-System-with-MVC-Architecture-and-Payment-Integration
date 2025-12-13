<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $event->title }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/show.css') }}">
</head>
<body>

<div class="event-container">

    <!-- Header -->
    <div class="event-header">
    <h1 class="event-title">✨ {{ $event->title }}</h1>
        <a href="{{ route('events.index') }}" class="back-link">← All Events</a>
    </div>

    <!-- Description -->
    <p class="event-description">
        {{ $event->description }}
    </p>

    <!-- Details -->
    <div class="event-grid">

        <div class="info-card">
            <h3>📅 Event Schedule</h3>

            <div class="info-row">
                <span class="info-label">Date</span>
                <span class="info-value">
                    {{ $event->date->format('l, F d, Y') }}
                </span>
            </div>

            <div class="info-row">
                <span class="info-label">Time</span>
                <span class="info-value">
                    {{ $event->formatted_time }}
                </span>
            </div>

            <div class="info-row">
                <span class="info-label">Price</span>
                <span class="info-value price">
                    ${{ number_format($event->price, 2) }}
                </span>
            </div>
        </div>

        <div class="info-card">
            <h3>🎶 Options & Details</h3>

            <div class="info-row">
                <span class="info-label">Food Option</span>
                <span class="info-value">{{ $event->food_option }}</span>
            </div>

            <div class="info-row">
                <span class="info-label">Music</span>
                <span class="info-value">
                    {{ $event->sangeet_details ?: 'N/A' }}
                </span>
            </div>
        </div>

    </div>

    <!-- Actions -->
    <div class="event-actions">
        <a href="{{ route('events.edit', $event->id) }}" class="btn-edit">✏️ Edit</a>

        <form action="{{ route('events.destroy', $event->id) }}" method="POST"
              onsubmit="return confirm('Delete this event?');">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn-delete">🗑️ Delete</button>
        </form>
    </div>

</div>

</body>
</html>
