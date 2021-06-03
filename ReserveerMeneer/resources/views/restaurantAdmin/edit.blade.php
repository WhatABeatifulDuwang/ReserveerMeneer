<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Restaurant bewerken') }}
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
                    <form action="{{ route('postRestaurantUpdate', $restaurant->id) }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-2 gap-4">
                            <div class="col-span-1">
                                <label>Naam</label>
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control w-full"
                                           @if(old('name') != null)
                                           value="{{ old('name') }}"
                                           @else
                                           value="{{ $restaurant->name }}"
                                        @endif>
                                </div>
                            </div>
                            <div class="col-span-2">
                                <label>Type</label>
                                <div class="form-group">
                                    <input type="text" name="type" class="form-control w-full" placeholder="Type"
                                           @if(old('type') != null)
                                           value="{{ old('type') }}"
                                           @else
                                           value="{{ $restaurant->type }}"
                                        @endif>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <label>Maandag openingstijd</label>
                                <div class="form-group">
                                    <input type="time" name="monday_opening" class="form-control w-full text-gray-500"
                                           @if(old('monday_opening') != null)
                                           value="{{ old('monday_opening') }}"
                                           @else
                                           value="{{ $restaurant->monday_opening }}"
                                        @endif>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <label>Maandag sluitingstijd</label>
                                <div class="form-group">
                                    <input type="time" name="monday_closing" class="form-control w-full text-gray-500"
                                           @if(old('monday_closing') != null)
                                           value="{{ old('monday_closing') }}"
                                           @else
                                           value="{{ $restaurant->monday_closing }}"
                                        @endif>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <label>Dinsdag openingstijd</label>
                                <div class="form-group">
                                    <input type="time" name="tuesday_opening" class="form-control w-full text-gray-500"
                                           @if(old('tuesday_opening') != null)
                                           value="{{ old('tuesday_opening') }}"
                                           @else
                                           value="{{ $restaurant->tuesday_opening }}"
                                        @endif>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <label>Dinsdag sluitingstijd</label>
                                <div class="form-group">
                                    <input type="time" name="tuesday_closing" class="form-control w-full text-gray-500"
                                           @if(old('tuesday_closing') != null)
                                           value="{{ old('tuesday_closing') }}"
                                           @else
                                           value="{{ $restaurant->tuesday_closing }}"
                                        @endif>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <label>Woensdag openingstijd</label>
                                <div class="form-group">
                                    <input type="time" name="wednesday_opening" class="form-control w-full text-gray-500"
                                           @if(old('wednesday_opening') != null)
                                           value="{{ old('wednesday_opening') }}"
                                           @else
                                           value="{{ $restaurant->wednesday_opening }}"
                                        @endif>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <label>Woensdag sluitingstijd</label>
                                <div class="form-group">
                                    <input type="time" name="wednesday_closing" class="form-control w-full text-gray-500"
                                           @if(old('wednesday_closing') != null)
                                           value="{{ old('wednesday_closing') }}"
                                           @else
                                           value="{{ $restaurant->wednesday_closing }}"
                                        @endif>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <label>Donderdag openingstijd</label>
                                <div class="form-group">
                                    <input type="time" name="thursday_opening" class="form-control w-full text-gray-500"
                                           @if(old('thursday_opening') != null)
                                           value="{{ old('thursday_opening') }}"
                                           @else
                                           value="{{ $restaurant->thursday_opening }}"
                                        @endif>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <label>Donderdag sluitingstijd</label>
                                <div class="form-group">
                                    <input type="time" name="thursday_closing" class="form-control w-full text-gray-500"
                                           @if(old('thursday_closing') != null)
                                           value="{{ old('thursday_closing') }}"
                                           @else
                                           value="{{ $restaurant->thursday_closing }}"
                                        @endif>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <label>Vrijdag openingstijd</label>
                                <div class="form-group">
                                    <input type="time" name="friday_opening" class="form-control w-full text-gray-500"
                                           @if(old('friday_opening') != null)
                                           value="{{ old('friday_opening') }}"
                                           @else
                                           value="{{ $restaurant->friday_opening }}"
                                        @endif>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <label>Vrijdag sluitingstijd</label>
                                <div class="form-group">
                                    <input type="time" name="friday_closing" class="form-control w-full text-gray-500"
                                           @if(old('friday_closing') != null)
                                           value="{{ old('friday_closing') }}"
                                           @else
                                           value="{{ $restaurant->friday_closing }}"
                                        @endif>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <label>Zaterdag openingstijd</label>
                                <div class="form-group">
                                    <input type="time" name="saturday_opening" class="form-control w-full text-gray-500"
                                           @if(old('saturday_opening') != null)
                                           value="{{ old('saturday_opening') }}"
                                           @else
                                           value="{{ $restaurant->saturday_opening }}"
                                        @endif>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <label>Zaterdag sluitingstijd</label>
                                <div class="form-group">
                                    <input type="time" name="saturday_closing" class="form-control w-full text-gray-500"
                                           @if(old('saturday_closing') != null)
                                           value="{{ old('saturday_closing') }}"
                                           @else
                                           value="{{ $restaurant->saturday_closing }}"
                                        @endif>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <label>Zondag openingstijd</label>
                                <div class="form-group">
                                    <input type="time" name="sunday_opening" class="form-control w-full text-gray-500"
                                           @if(old('sunday_opening') != null)
                                           value="{{ old('sunday_opening') }}"
                                           @else
                                           value="{{ $restaurant->sunday_opening }}"
                                        @endif>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <label>Zondag sluitingstijd</label>
                                <div class="form-group">
                                    <input type="time" name="sunday_closing" class="form-control w-full text-gray-500"
                                           @if(old('sunday_closing') != null)
                                           value="{{ old('sunday_closing') }}"
                                           @else
                                           value="{{ $restaurant->sunday_closing }}"
                                        @endif>
                                </div>
                            </div>
                            <div class="col-span-2">
                                <label>Max. aantal stoelen</label>
                                <div class="form-group">
                                    <input type="number" name="amount_of_seats" class="form-control w-full" placeholder="Max. aantal stoelen"
                                           @if(old('amount_of_seats') != null)
                                           value="{{ old('amount_of_seats') }}"
                                           @else
                                           value="{{ $restaurant->amount_of_seats }}"
                                        @endif>
                                </div>
                            </div>

                            <div class="col-span-1 text-left">
                                <a href="{{ route('getRestaurantAdminIndex') }}" class="bg-white hover:bg-gray-100 text-gray-800 py-2 px-4 border border-gray-400 rounded shadow">
                                    Terug
                                </a>
                            </div>
                            <div class="col-span-1 text-right">
                                <button type="submit" class="bg-white hover:bg-gray-100 text-gray-800 py-2 px-4 border border-gray-400 rounded shadow">
                                    Opslaan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
