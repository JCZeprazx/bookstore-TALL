<div>
    @section('content')
    <div class="min-h-screen bg-gray-100">
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex items-center justify-between">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    {{ __('About') }}
                </h2>
            </div>
        </header>
            <div class="sm:flex sm:justify-evenly my-10">
                <div class="basis-[260px] bg-white shadow-lg border border-gray-200 rounded-lg p-5 hover:scale-110 ease-in-out duration-300">
                    <img src="{{ asset('img/afjani.jpg') }}" alt="" class="rounded-full">
                    <div class="mt-3 text-center">
                        <h3 class="font-bold text-lg">Muhammad Ab'jani</h3>
                        <h5 class="text-base mt-5">Universitas Bhayangkara Jakarta Raya</h5>
                    </div>
                </div>
                <div class="basis-[260px] bg-white shadow-lg border border-gray-200 rounded-lg p-5 hover:scale-110 ease-in-out duration-300">
                    <img src="{{ asset('img/rizqy.jpg') }}" alt="" class="rounded-full">
                    <div class="mt-3 text-center">
                        <h3 class="font-bold text-lg">Rizqy Khoirul Waritsin</h3>
                        <h5 class="text-base mt-5">Universitas Pembangunan Nasional Veteran Jawa Timur</h5>
                    </div>
                </div>
                <div class="basis-[260px] bg-white shadow-lg border border-gray-200 rounded-lg p-5 hover:scale-110 ease-in-out duration-300">
                    <img src="{{ asset('img/rizqy.jpg') }}" alt="" class="rounded-full">
                    <div class="mt-3 text-center">
                        <h3 class="font-bold text-lg">Julio Cahya Prayoga</h3>
                        <h5 class="text-base mt-5">Universitas Pembangunan Nasional Veteran Jawa Timur</h5>
                    </div>
                </div>

           </div>
           <div class="sm:flex sm:justify-evenly mb-10">
                <div class="basis-[260px] bg-white shadow-lg border border-gray-200 rounded-lg p-5 hover:scale-110 ease-in-out duration-300">
                    <img src="{{ asset('img/adrian.jpg') }}" alt="" class="rounded-full">
                    <div class="mt-3 text-center">
                        <h3 class="font-bold text-lg">Adrian Sutansaty</h3>
                        <h5 class="text-base mt-5">Universitas Sriwijaya</h5>
                    </div>
                </div>
                <div class="basis-[260px] bg-white shadow-lg border border-gray-200 rounded-lg p-5 hover:scale-110 ease-in-out duration-300">
                    <img src="{{ asset('img/ajiz.jpeg') }}" alt="" class="rounded-full">
                    <div class="mt-3 text-center">
                        <h3 class="font-bold text-lg">M. Abdul Aziz</h3>
                        <h5 class="text-base mt-5">Universitas Bina Sarana Informatika</h5>
                    </div>
                </div>
           </div>
    </div>
    @endsection

    @section('footer')
        <x-layouts.footer />
    @endsection
</div>
