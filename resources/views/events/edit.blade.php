<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event: {{ $event->title }}</title>
    <link href="{{ asset('css/edit.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen py-10">
    <div class="max-w-3xl mx-auto bg-white p-8 rounded-xl shadow-2xl">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 border-b pb-3">✏️ Edit Event: {{ $event->title }}</h1>
        <a href="{{ route('events.index') }}" class="text-indigo-600 hover:text-indigo-800 mb-6 inline-block">← Back to Event List</a>
        
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6">
                <strong class="font-bold">Whoops!</strong> There were some problems with your input.
                <ul class="mt-2 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('events.update', $event->id) }}" method="POST" class="space-y-6">
            @csrf 
            @method('PUT')
            
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Title:</label>
                <input type="text" name="title" id="title" required value="{{ old('title', $event->title) }}"
                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description:</label>
                <textarea name="description" id="description" rows="3"
                          class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500">{{ old('description', $event->description) }}</textarea>
            </div>

            <div class="grid grid-cols-3 gap-4">
                <div>
                    <label for="date" class="block text-sm font-medium text-gray-700">Date:</label>
                    <input type="date" name="date" id="date" required value="{{ old('date', $event->date->format('Y-m-d')) }}"
                           class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div>
                    <label for="start_time" class="block text-sm font-medium text-gray-700">Start Time:</label>
                    <input type="time" name="start_time" id="start_time" required value="{{ old('start_time', \Carbon\Carbon::parse($event->start_time)->format('H:i')) }}"
                           class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div>
                    <label for="end_time" class="block text-sm font-medium text-gray-700">End Time:</label>
                    <input type="time" name="end_time" id="end_time" required value="{{ old('end_time', \Carbon\Carbon::parse($event->end_time)->format('H:i')) }}"
                           class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="food_option" class="block text-sm font-medium text-gray-700">Food Option:</label>
                    <select name="food_option" id="food_option" required
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 bg-white">
                        @php $currentFood = old('food_option', $event->food_option); @endphp
                        <option value="Vegetarian" {{ $currentFood == 'Vegetarian' ? 'selected' : '' }}>Vegetarian</option>
                        <option value="Non-Vegetarian" {{ $currentFood == 'Non-Vegetarian' ? 'selected' : '' }}>Non-Vegetarian</option>
                        <option value="Vegan" {{ $currentFood == 'Vegan' ? 'selected' : '' }}>Vegan</option>
                    </select>
                </div>
                <div>
                    <label for="sangeet_details" class="block text-sm font-medium text-gray-700">Sangeet/Music Details:</label>
                    <input type="text" name="sangeet_details" id="sangeet_details" value="{{ old('sangeet_details', $event->sangeet_details) }}"
                           class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>
            </div>

            <div>
                <label for="price" class="block text-sm font-medium text-gray-700">Ticket Price ($):</label>
                <input type="number" name="price" id="price" step="0.01" required value="{{ old('price', $event->price) }}"
                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <button type="submit" 
                    class="w-full py-3 px-4 bg-indigo-600 text-white font-bold rounded-md shadow-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-300">
                Update Event
            </button>
        </form>
    </div>
    
</body>
</html>