<x-app-layout>
    <x-slot name="header">
        <div class="row-auto">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Restaurants') }}
            </h2>
            <div class="d-flex flex-column justify-content-end w-50 text-right pb-2">
                <a href="{{ route('getRestaurantCreate') }}"
                   class="bg-white hover:bg-gray-100 text-gray-800 py-2 px-4 border border-gray-400 rounded shadow">Restaurant aanmaken</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @forelse ($restaurants as $restaurant)
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="d-flex flex-column w-50">
                            <p class="text-2xl font-medium font-bold">{{ $restaurant->name }}</p>
                            <p class="mt-1 mb-5 text-gray-700">{{ $restaurant->type }}</p>
                            <div class="grid grid-cols-3 gap-4">
                                <div>
                                    <strong>
                                        Maandag:
                                    </strong>
                                    {{$restaurant->monday_opening}} - {{$restaurant->monday_closing}}
                                </div>
                                <div>
                                    <strong>
                                        Dinsdag:
                                    </strong>
                                    {{$restaurant->tuesday_opening}} - {{$restaurant->tuesday_closing}}
                                </div>
                                <div>
                                    <strong>
                                        Woensdag:
                                    </strong>
                                    {{$restaurant->wednesday_opening}} - {{$restaurant->wednesday_closing}}
                                </div>
                                <div>
                                    <strong>
                                        Donderdag:
                                    </strong>
                                    {{$restaurant->thursday_opening}} - {{$restaurant->thursday_closing}}
                                </div>
                                <div>
                                    <strong>
                                        Vrijdag:
                                    </strong>
                                    {{$restaurant->friday_opening}} - {{$restaurant->friday_closing}}
                                </div>
                                <div>
                                    <strong>
                                        Zaterdag:
                                    </strong>
                                    {{$restaurant->saturday_opening}} - {{$restaurant->saturday_closing}}
                                </div>
                                <div>
                                    <strong>
                                        Zondag:
                                    </strong>
                                    {{$restaurant->sunday_opening}} - {{$restaurant->sunday_closing}}
                                </div>
                                <div>
                                    <strong>
                                        Maximale zitplaatsen:
                                    </strong>
                                    {{$restaurant->amount_of_seats}}
                                </div>
                            </div>
                            <div class="d-flex flex-column justify-content-end w-50 text-right pb-2">
                                <a href="{{ route('getRestaurantEdit', $restaurant->id) }}" class="bg-white hover:bg-gray-100 text-gray-800 py-2 px-4 border border-gray-400 rounded shadow">
                                    Wijzig
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="p-6 bg-white border-b border-gray-200">
                        <p>Er bestaan geen restaurants in deze categorie.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
