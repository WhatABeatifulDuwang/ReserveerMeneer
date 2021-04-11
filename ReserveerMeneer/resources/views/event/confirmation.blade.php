<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Uw reservering
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4">
                        <b>Naam:</b> {{ $reservation->name }}<br>
                        <b>Van:</b> {{ $reservation->start_date }}<br>
                        <b>Tot:</b> {{ $reservation->end_date }}<br><br>
                        <b>Prijs:</b> €{{ $reservation->total_price }}<br>
                    </div>
                    <div class="d-flex flex-column justify-content-end w-50 text-right pb-2">
                        <br>
                        <img src="{{ url('storage/reservation/'.$reservation->img_path) }}" class="max-h-40">
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
