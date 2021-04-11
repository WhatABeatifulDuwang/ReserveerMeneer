<x-app-layout>
    <x-slot name="header">
        <div class="row-auto">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Evenementen en Films') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('getEventFilmIndex') }}" method="GET">
                @csrf
                <div class="text-left">
                    <div class="grid grid-cols-5 gap-10">
                        <div class="col-span-1">
                            Filter op: <b>Plaats</b><br>
                            <input type="text" name="location" class="form-control" placeholder="Plaats">
                        </div>
                        <div class="col-span-1">
                            <b>Starttijd</b><br>
                            <input type="datetime-local" name="start_time" class="form-control">
                        </div>
                        <div class="col-span-1">
                            <b>Eindtijd</b><br>
                            <input type="datetime-local" name="end_time" class="form-control">
                        </div>
                    </div>
                </div>
                <br>
                <div class="text-left">
                    Sorteer op:
                    <input type="submit" name="name_sort" class="bg-white hover:bg-gray-100 text-gray-800 py-1.5 px-3 border border-gray-400 rounded shadow cursor-pointer" value="Naam">
                    <input type="submit" name="start_time_sort" class="bg-white hover:bg-gray-100 text-gray-800 py-1.5 px-3 border border-gray-400 rounded shadow cursor-pointer" value="Starttijd">
                </div>
            </form>
            <br>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if(count($eventsAndFilms) == 0)
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="d-flex flex-column w-50">
                            Geen resultaten gevonden.
                        </div>
                    </div>
                @else
                    @foreach($eventsAndFilms as $item)
                        <div class="p-6 bg-white border-b border-gray-200">
                            <div class="d-flex flex-column w-50">
                                {{--only events have max_tickets--}}
                                @if($item['max_tickets'] ?? null)
                                    <b>{{ $item['name'] }}</b> (Evenement)<br>
                                    {{ $item['description'] }}<br>
                                    <b>Locatie: </b>{{ $item['address'] }}, {{ $item['city'] }}<br>
                                    <b>Van: </b>{{ date("d-m H:i", strtotime($item['start_date'])) }} <b>Tot: </b>{{ date("d-m H:i", strtotime($item['end_date'])) }}
                            </div>
                            <div class="d-flex flex-column justify-content-end w-50 text-right pb-2">
                                <a href="{{ route('getEventDetails', $item['id']) }}" class="bg-white hover:bg-gray-100 text-gray-800 py-2 px-4 border border-gray-400 rounded shadow">Meer informatie</a>
                            </div>
                            @else
                                <b>{{ $item['name'] }}</b> (Film)<br>
                                {{ $item['description'] }}<br>
                                <b>Bioscoop: </b>{{ $item['cinema_name'] }} {{ $item['city'] }}<br>
                                <b>Van: </b>{{ date("d-m H:i", strtotime($item['start_date'])) }} <b>Tot: </b>{{ date("d-m H:i", strtotime($item['end_date'])) }}
                        </div>
                        <div class="d-flex flex-column justify-content-end w-50 text-right pb-2">
                            <a href="{{ route('getFilmDetails', $item['id']) }}" class="bg-white hover:bg-gray-100 text-gray-800 py-2 px-4 border border-gray-400 rounded shadow">Meer informatie</a>
                        </div>
                            @endif
                        </div>
                    @endforeach
                @endif
        </div>
    </div>
</x-app-layout>
