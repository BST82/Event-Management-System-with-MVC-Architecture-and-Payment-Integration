<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <title>Event List</title>
</head>
<body>
    <h1>📋 All Events</h1>

    @if (session('success'))
        <p><strong>Success:</strong> {{ session('success') }}</p>
    @endif

    <p><a href="{{ route('events.create') }}">✨ Create New Event</a></p>
    <hr>

    @if ($events->isEmpty())
    <p class="empty-state">
    😔 No events are scheduled yet. <span>Start by creating one!</span>
</p>

    @else
        <table border="1" cellpadding="5" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Food</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                <tr>
                    <td><strong>{{ $event->title }}</strong></td>
                    <td>{{ $event->date->format('F d, Y') }}</td>
                    <td>{{ $event->formatted_time }}</td>
                    <td>{{ $event->food_option }}</td>
                    <td>${{ number_format($event->price, 2) }}</td>
                    <td>
                        <a href="{{ route('events.show', $event->id) }}">View</a> | 
                        <a href="{{ route('events.edit', $event->id) }}">Edit</a> |
                        <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this event?')" style="color: red; background: none; border: none; cursor: pointer; text-decoration: underline;">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>