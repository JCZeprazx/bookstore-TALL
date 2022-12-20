<div>
    <x-jet-button wire:click="createShowModal">
        {{ __('Buy Book') }}
    </x-jet-button>

    <x-jet-dialog-modal wire:model="modalFormVisible">
        <x-slot name="title">
            {{ __('Fill Form Below') }}
        </x-slot>

        <x-slot name="content">
            <div class="relative max-w-screen-xl px-4 py-8 mx-auto">
                <div class="grid items-start grid-cols-1 gap-8 md:grid-cols-2">
                    <!-- Foto Produk mulai -->
                    <div class="grid grid-cols-2 gap-4 md:grid-cols-1">
                        <img alt="Les Paul" src="{{ asset('storage/book/' . $preview->book_cover) }}"
                            class="object-cover w-1/2 rounded-xl" />
                    </div>
                    {{-- <div class="flex justify-between mt-8">
                        <div class="max-w-[35ch]">
                            <h1 class="text-2xl font-bold">
                                {{ $preview->book_name }}
                            </h1>
                        </div>
                        <p class="text-lg font-bold">{{ $preview->book_cost }}</p>
                    </div> --}}
                </div>
            </div>
            <div class="grid gap-4 mb-4 sm:grid-cols-2">
                <div>
                    <x-jet-label min="0" for="Quantity" value="{{ __('Quantity') }}" />
                    <x-jet-input id="Quantity" class="block w-full mt-1" type="number" wire:model='quantity' />
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
