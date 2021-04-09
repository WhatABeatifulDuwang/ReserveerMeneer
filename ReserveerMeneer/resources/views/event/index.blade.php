<x-app-layout>
    <x-slot name="header">
        <div class="row-auto">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Evenementen') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @foreach($events as $event)
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="d-flex flex-column w-50">
                            <b>{{ $event->name }}</b><br>
                            {{ $event->description }}<br>
                            €{{ $event->price }}<br>
                            <b>Van: </b>{{ date("d-m h:i", strtotime($event->start_date)) }}
                            <b>Tot: </b>{{ date("d-m h:i", strtotime($event->end_date)) }}
                        </div>
                    </div>
                    <br>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
