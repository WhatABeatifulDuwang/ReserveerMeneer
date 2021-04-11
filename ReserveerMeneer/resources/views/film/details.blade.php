<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $film->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4">
                        <b>Naam:</b> {{ $film->name }}<br>
                        <b>Beschrijving:</b> {{ $film->description }}<br>
                        <b>Van:</b> {{ $film->start_date }}<br>
                        <b>Tot:</b> {{ $film->end_date }}<br>
                        <b>Bioscoop:</b> {{ $cinema->name }}<br>
                        <b>Locatie:</b> {{ $cinema->address }}, {{ $cinema->city }}
                    </div>

                    <div class=" text-left">
                        <a href="{{ route('getEventIndex') }}" class="bg-white hover:bg-gray-100 text-gray-800 py-2 px-4 border border-gray-400 rounded shadow">
                            Terug
                        </a>
                    </div>
                    <div class=" text-right">
                        <a href="{{ route('getFilmReservation', $film->id) }}" class="bg-white hover:bg-gray-100 text-gray-800 py-2 px-4 border border-gray-400 rounded shadow m-3">
                            Reserveren
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
