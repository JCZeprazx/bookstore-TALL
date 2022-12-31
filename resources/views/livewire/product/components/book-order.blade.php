<div>
    @include('sweetalert::alert')
    <x-jet-button wire:click="createShowModal">
        {{ __('Buy Book') }}
    </x-jet-button>

    <x-jet-dialog-modal wire:model="modalFormVisible" >
        <x-slot name="title">
            <div class="font-semibold">
                {{ __('Fill Form Below') }}
            </div>
        </x-slot>

        <x-slot name="content">
            <div class="relative max-w-screen-xl px-2 mx-auto">
                <div class="grid items-start grid-cols-1 gap-4 sm:grid-cols-6">
                    <!-- Foto Produk mulai -->
                    <div class="grid grid-cols-2 gap-4 sm:grid-cols-1 sm:col-span-2">
                        <img alt="Les Paul" src="{{ asset('storage/' . $preview->book_cover) }}"
                            class="object-cover w-3/4 rounded-xl" />
                    </div>
                    <div class="grid grid-rows-3 h-full items-center col-span-2">
                        <h1 class="text-base font-medium">
                            Nama Buku:
                        </h1>
                        <h1 class="text-base font-medium">
                            Harga Buku:
                        </h1>
                        <div class="text-lg text-white items-center">1</div>
                    </div>

                    <div class="grid grid-rows-3 h-full items-center col-span-2">
                        <div class="w-full">
                            <h1 class="text-base font-medium">
                                {{ $preview->book_name }}
                            </h1>
                        </div>

                        <div class="w-full">
                            <h1 class="text-base font-medium">
                                {{ $preview->book_cost }}
                            </h1>
                        </div>

                        <div>
                            <div class="flex gap-4 col-span-3">
                                <x-jet-button wire:click="decrement">-</x-jet-button>
                                <p class="text-base items-center" wire:model="count">{{ $count }}</p>
                                <x-jet-button wire:click="increment">+</x-jet-button>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="grid items-start grid-cols-1 gap-4 sm:grid-cols-3">
                    <div></div>
                    <div class="col-span-2">
                        <hr>
                        <div class="grid grid-cols-2 mt-2">
                            <div>
                                <h1 class="text-base font-semibold">Total</h1>
                            </div>
                            <div>
                                <h1 class="text-base font-semibold">Rp {{ $total_cost }}</h1>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalFormVisible')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-3" wire:click="createOrder" wire:loading.attr="disabled">
                {{ __('Add Data') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
