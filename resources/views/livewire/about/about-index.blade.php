<div>
    @section('header')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('About') }}
        </h2>
    @endsection

    @section('content')
            <div class="sm:flex sm:justify-evenly my-10">
                <div class="basis-[260px] bg-white shadow-lg border border-gray-200 rounded-lg p-5 hover:scale-110 ease-in-out duration-300">
                    <img src="{{ asset('storage/afjani.jpg') }}" alt="" class="rounded-full">
                    <div class="mt-3 text-center">
                        <h3 class="font-bold text-lg">Muhammad Ab'jani</h3>
                        <h5 class="text-base mt-5">Universitas Bhayangkara Jakarta Raya</h5>
                    </div>
                </div>
                <div class="basis-[260px] bg-white shadow-lg border border-gray-200 rounded-lg p-5 hover:scale-110 ease-in-out duration-300">
                    <img src="{{ asset('storage/rizqy.jpg') }}" alt="" class="rounded-full">
                    <div class="mt-3 text-center">
                        <h3 class="font-bold text-lg">Rizqy Khoirul Waritsin</h3>
                        <h5 class="text-base mt-5">Universitas Pembangunan Nasional Veteran Jawa Timur</h5>
                    </div>
                </div>
                <div class="basis-[260px] bg-white shadow-lg border border-gray-200 rounded-lg p-5 hover:scale-110 ease-in-out duration-300">
                    <img src="{{ asset('storage/rizqy.jpg') }}" alt="" class="rounded-full">
                    <div class="mt-3 text-center">
                        <h3 class="font-bold text-lg">Julio Cahya Prayoga</h3>
                        <h5 class="text-base mt-5">Universitas Pembangunan Nasional Veteran Jawa Timur</h5>
                    </div>
                </div>

           </div>
           <div class="sm:flex sm:justify-evenly mb-10">
                <div class="basis-[260px] bg-white shadow-lg border border-gray-200 rounded-lg p-5 hover:scale-110 ease-in-out duration-300">
                    <img src="{{ asset('storage/adrian.jpg') }}" alt="" class="rounded-full">
                    <div class="mt-3 text-center">
                        <h3 class="font-bold text-lg">Adrian Sutansaty</h3>
                        <h5 class="text-base mt-5">Universitas Sriwijaya</h5>
                    </div>
                </div>
                <div class="basis-[260px] bg-white shadow-lg border border-gray-200 rounded-lg p-5 hover:scale-110 ease-in-out duration-300">
                    <img src="{{ asset('storage/ajiz.jpeg') }}" alt="" class="rounded-full">
                    <div class="mt-3 text-center">
                        <h3 class="font-bold text-lg">M. Abdul Aziz</h3>
                        <h5 class="text-base mt-5">Universitas Bina Sarana Informatika</h5>
                    </div>
                </div>
           </div>
    @endsection

    @section('footer')
        <x-layouts.footer />
    @endsection
</div>
