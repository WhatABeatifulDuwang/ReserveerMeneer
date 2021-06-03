<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Restaurant aanmaken') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($errors->any())
                <div class="">
                    <strong>De ingevoerde data is niet juist.</strong><br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('postRestaurantStore') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-2 gap-4">
                            <div class="col-span-1">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control w-full" placeholder="Naam" value="{{ old('name') }}">
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div class="form-group">
                                    <input type="text" name="type" class="form-control w-full" placeholder="Type" value="{{ old('type') }}">
                                </div>
                            </div>
                            <div class="col-span-1">
                                <label>Maandag openingstijd</label>
                                <div class="form-group">
                                    <input type="time" name="monday_opening" class="form-control w-full text-gray-500" value="{{ old('monday_opening_time') }}">
                                </div>
                            </div>
                            <div class="col-span-1">
                                <label>Maandag sluitingstijd</label>
                                <div class="form-group">
                                    <input type="time" name="monday_closing" class="form-control w-full text-gray-500" value="{{ old('monday_closing_time') }}">
                                </div>
                            </div>
                            <div class="col-span-1">
                                <label>Dinsdag openingstijd</label>
                                <div class="form-group">
                                    <input type="time" name="tuesday_opening" class="form-control w-full text-gray-500" value="{{ old('tuesday_opening_time') }}">
                                </div>
                            </div>
                            <div class="col-span-1">
                                <label>Dinsdag sluitingstijd</label>
                                <div class="form-group">
                                    <input type="time" name="tuesday_closing" class="form-control w-full text-gray-500" value="{{ old('tuesday_closing_time') }}">
                                </div>
                            </div>
                            <div class="col-span-1">
                                <label>Woensdag openingstijd</label>
                                <div class="form-group">
                                    <input type="time" name="wednesday_opening" class="form-control w-full text-gray-500" value="{{ old('wednesday_opening_time') }}">
                                </div>
                            </div>
                            <div class="col-span-1">
                                <label>Woensdag sluitingstijd</label>
                                <div class="form-group">
                                    <input type="time" name="wednesday_closing" class="form-control w-full text-gray-500" value="{{ old('wednesday_closing_time') }}">
                                </div>
                            </div>
                            <div class="col-span-1">
                                <label>Donderdag openingstijd</label>
                                <div class="form-group">
                                    <input type="time" name="thursday_opening" class="form-control w-full text-gray-500" value="{{ old('thursday_opening_time') }}">
                                </div>
                            </div>
                            <div class="col-span-1">
                                <label>Donderdag sluitingstijd</label>
                                <div class="form-group">
                                    <input type="time" name="thursday_closing" class="form-control w-full text-gray-500" value="{{ old('thursday_closing_time') }}">
                                </div>
                            </div>
                            <div class="col-span-1">
                                <label>Vrijdag openingstijd</label>
                                <div class="form-group">
                                    <input type="time" name="friday_opening" class="form-control w-full text-gray-500" value="{{ old('friday_opening_time') }}">
                                </div>
                            </div>
                            <div class="col-span-1">
                                <label>Vrijdag sluitingstijd</label>
                                <div class="form-group">
                                    <input type="time" name="friday_closing" class="form-control w-full text-gray-500" value="{{ old('friday_closing_time') }}">
                                </div>
                            </div>
                            <div class="col-span-1">
                                <label>Zaterdag openingstijd</label>
                                <div class="form-group">
                                    <input type="time" name="saturday_opening" class="form-control w-full text-gray-500" value="{{ old('saturday_opening_time') }}">
                                </div>
                            </div>
                            <div class="col-span-1">
                                <label>Zaterdag sluitingstijd</label>
                                <div class="form-group">
                                    <input type="time" name="saturday_closing" class="form-control w-full text-gray-500" value="{{ old('saturday_closing_time') }}">
                                </div>
                            </div>
                            <div class="col-span-1">
                                <label>Zondag openingstijd</label>
                                <div class="form-group">
                                    <input type="time" name="sunday_opening" class="form-control w-full text-gray-500" value="{{ old('sunday_opening_time') }}">
                                </div>
                            </div>
                            <div class="col-span-1">
                                <label>Zondag sluitingstijd</label>
                                <div class="form-group">
                                    <input type="time" name="sunday_closing" class="form-control w-full text-gray-500" value="{{ old('sunday_closing_time') }}">
                                </div>
                            </div>
                            <div class="col-span-2">
                                <label>Stoelen</label>
                                <div class="form-group">
                                    <input type="number" name="seats" class="form-control w-full" placeholder="Type" value="{{ old('amount_of_seats') }}"></div>
                            </div>
                            <div class="col-span-1 text-left">
                                <a href="{{ route('getRestaurantIndex') }}" class="bg-white hover:bg-gray-100 text-gray-800 py-2 px-4 border border-gray-400 rounded shadow">
                                    Terug
                                </a>
                            </div>
                            <div class="col-span-1 text-right">
                                <button type="submit" class="bg-white hover:bg-gray-100 text-gray-800 py-2 px-4 border border-gray-400 rounded shadow">
                                    Aanmaken
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
