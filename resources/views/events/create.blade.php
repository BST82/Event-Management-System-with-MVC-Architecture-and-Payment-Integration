<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Event</title>
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
</head>

<body>
    <div class="event-form-container">

        <h1 class="page-title">➕ Create New Event</h1>

        <a href="{{ route('events.index') }}" class="back-link">← Back to Event List</a>

        @if ($errors->any())
            <div class="error-box">
                <strong>Whoops!</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('events.store') }}" method="POST" class="event-form">
            @csrf

            <div class="field">
                <label>Title</label>
                <input type="text" name="title" value="{{ old('title') }}" required>
            </div>

            <div class="field">
                <label>Description</label>
                <textarea name="description" rows="3">{{ old('description') }}</textarea>
            </div>

            <div class="grid-3">
                <div class="field">
                    <label>Date</label>
                    <input type="date" name="date" value="{{ old('date') }}" required>
                </div>
                <div class="field">
                    <label>Start Time</label>
                    <input type="time" name="start_time" value="{{ old('start_time') }}" required>
                </div>
                <div class="field">
                    <label>End Time</label>
                    <input type="time" name="end_time" value="{{ old('end_time') }}" required>
                </div>
            </div>

            <div class="grid-2">
                <div class="field">
                    <label>Food Option</label>
                    <select name="food_option">
                        <option>Vegetarian</option>
                        <option>Non-Vegetarian</option>
                        <option>Vegan</option>
                    </select>
                </div>

                <div class="field">
                    <label>Sangeet / Music</label>
                    <input type="text" name="sangeet_details">
                </div>
            </div>

            <div class="field">
                <label>Ticket Price ($)</label>
                <input type="number" name="price" step="0.01" required>
            </div>

            <button class="submit-btn">Create Event</button>
        </form>

    </div>
</body>
</html>
