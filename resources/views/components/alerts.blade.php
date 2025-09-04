@if (session('success'))
    <div class="w-7xl text-center">
        <div 
            x-data="{ show: true }" 
            x-show="show"
            class="w-full text-center relative mb-4 rounded-md bg-green-100 border border-green-400 text-green-800 px-4 py-3 mt-4"
            role="alert"
        >
            <span class="block sm:inline">{{ session('success') }}</span>
            <button 
                type="button" 
                class="absolute top-0 bottom-0 right-0 px-4 py-3"
                @click="show = false"
            >
                <svg class="fill-current h-6 w-6 text-green-800" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <title>Cerrar</title>
                    <path d="M14.348 5.652a1 1 0 00-1.414 0L10 8.586 7.066 5.652A1 1 0 105.652 7.066L8.586 10l-2.934 2.934a1 1 0 101.414 1.414L10 11.414l2.934 2.934a1 1 0 001.414-1.414L11.414 10l2.934-2.934a1 1 0 000-1.414z"/>
                </svg>
            </button>
        </div>
    </div>
@endif

@if (session('error'))
    <div 
        x-data="{ show: true }" 
        x-show="show"
        class="w-full text-center relative mb-4 rounded-md bg-red-100 border border-green-400 text-red-800 px-4 py-3 mt-4"
        role="alert"
    >
        <span class="block sm:inline">{{ session('error') }}</span>
        <button 
            type="button" 
            class="absolute top-0 bottom-0 right-0 px-4 py-3"
            @click="show = false"
        >
            <svg class="fill-current h-6 w-6 text-green-800" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <title>Cerrar</title>
                <path d="M14.348 5.652a1 1 0 00-1.414 0L10 8.586 7.066 5.652A1 1 0 105.652 7.066L8.586 10l-2.934 2.934a1 1 0 101.414 1.414L10 11.414l2.934 2.934a1 1 0 001.414-1.414L11.414 10l2.934-2.934a1 1 0 000-1.414z"/>
            </svg>
        </button>
    </div>
@endif