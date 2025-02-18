<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if(auth()->user()->role === 'student') 
            <p>{{ __("Student dashboard") }}</p>
        @elseif(auth()->user()->role === 'professor') 
            <p>{{ __("Professor dashboard") }}</p> 
        @endif 
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div id="vue-app"></div>
                </div>  
               
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    window.userRole = "{{ auth()->user()->role }}";
    window.user = @json(auth()->user());
</script>