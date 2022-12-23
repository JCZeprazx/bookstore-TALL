<div class="min-h-screen p-0">
    <main>
        <section>
            <h1 class="sr-only">Checkout</h1>
            <div class="grid grid-cols-1 mx-auto max-w-screen-2xl md:grid-cols-2">
                <div class="py-12 bg-white-500 md:py-24">
                    <div class="max-w-lg px-4 mx-auto space-y-8 lg:px-8">
                        <div class="flex items-center">
                            <span class="w-10 h-10 bg-blue-700 rounded-full"></span>
                            <h2 class="ml-4 font-medium text-gray-900">List Book</h2>
                        </div>
                        @if ($orders !== null)
                            <div>
                                <p class="text-2xl font-medium tracking-tight text-gray-900">
                                    Total Rp {{ $cost_total }}
                                </p>
                                <p class="mt-1 text-sm text-gray-600">For the purchase of {{ $quantity }} items</p>
                            </div>
                            <div>
                                <div class="flow-root">

                                    @foreach ($orders as $order)
                                        <ul class="-my-4 divide-y divide-gray-100">
                                            <li class="flex items-center py-4">
                                                <img src="{{ asset('storage/book/' . $order->book_cover) }}"
                                                    alt="1" class="object-cover w-16 rounded" />

                                                <div class="ml-4">
                                                    <h3 class="text-sm text-gray-900">{{ $order->book_name }}</h3>

                                                    <dl class="mt-0.5 space-y-px text-[10px] text-gray-600">
                                                        <div>
                                                            <dt class="inline">Quantity :</dt>
                                                            <dd class="inline">{{ $order->quantity }}</dd>
                                                        </div>
                                                    </dl>
                                                    <dl class="mt-0.5 space-y-px text-[10px] text-gray-600">
                                                        <div>
                                                            <dt class="inline">Price :</dt>
                                                            <dd class="inline">{{ $order->book_cost }}</dd>
                                                        </div>
                                                    </dl>
                                                    <dl>
                                                        <x-jet-danger-button class="ml-3"
                                                            wire:click="deleteShowModal({{ $order->id }})"
                                                            wire:loading.attr="disabled">
                                                            {{ __('Delete') }}
                                                        </x-jet-danger-button>
                                                    </dl>
                                                </div>
                                            </li>
                                        </ul>
                                    @endforeach

                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <x-jet-dialog-modal wire:model="modalConfirmDeleteVisible">
                    <x-slot name="title">
                        {{ __('Delete Data') }}
                    </x-slot>

                    <x-slot name="content">
                        {{ __('Are you sure you want to delete your data? Once your data is deleted, all of its resources and data will be permanently deleted.') }}
                    </x-slot>

                    <x-slot name="footer">
                        <x-jet-secondary-button wire:click="$toggle('modalConfirmDeleteVisible')"
                            wire:loading.attr="disabled">
                            {{ __('Cancel') }}
                        </x-jet-secondary-button>

                        <x-jet-danger-button class="ml-3" wire:click="delete" wire:loading.attr="disabled">
                            {{ __('Delete Data') }}
                        </x-jet-danger-button>
                    </x-slot>
                </x-jet-dialog-modal>

                <div class="py-12 bg-white-500 md:py-24">
                    <div class="max-w-lg px-4 mx-auto lg:px-8">
                        @if ($user_address == null)
                            <form class="grid grid-cols-6 gap-4" wire:submit.prevent='save'>
                                <div class="col-span-6">
                                    <x-jet-label for="address" value="{{ __('Address') }}" />
                                    <x-jet-input id="address" class="block mt-1 w-full" type="text"
                                        value="{{ Auth::user()->address }}" wire:model='address' />
                                </div>
                                <div class="col-span-6">
                                    <x-jet-label for="city" value="{{ __('City') }}" />
                                    <x-jet-input id="city" class="block mt-1 w-full" type="text"
                                        value="{{ Auth::user()->city }}" wire:model='city' />
                                </div>
                                <div class="col-span-6">
                                    <x-jet-label for="region" value="{{ __('Region') }}" />
                                    <x-jet-input id="region" class="block mt-1 w-full" type="text"
                                        value="{{ Auth::user()->region }}" wire:model='region' />
                                </div>
                                <div class="col-span-6">
                                    <x-jet-label for="country" value="{{ __('Country') }}" />
                                    <x-jet-input id="country" class="block mt-1 w-full" type="text"
                                        value="{{ Auth::user()->country }}" wire:model='country' />
                                </div>
                                <div class="col-span-6">
                                    <x-jet-button>Update</x-jet-button>
                                </div>
                            </form>
                        @endif
                        @if ($user_method->payment_id == null && $user_method->shipping_id == null)
                            <x-jet-button class="my-3" wire:click='createShowModal'>
                                Select Payment and Shipping
                            </x-jet-button>
                        @else
                            <div class="p-4 mb-4 text-sm text-blue-700 bg-blue-100 rounded-lg dark:bg-blue-200 dark:text-blue-800"
                                role="alert">
                                <span class="font-medium">Payment Info</span>
                                @foreach ($payments as $payment)
                                    @if ($payment->id == $user_method->payment_id)
                                        <p>{{ $payment->payment_method . ' = ' . $payment->payment_info }}</p>
                                    @endif
                                @endforeach
                                <x-jet-button wire:click='uploadImage'>
                                    Kirim
                                </x-jet-button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
        <x-jet-dialog-modal wire:model="modalFormVisible">
            <x-slot name="title">
                {{ __('Select Payment And Shipping') }}
            </x-slot>

            <x-slot name="content">
                <div>
                    <div>
                        <x-jet-label for="Shippings" value="{{ __('Shippings') }}" />
                        <select id="Shippings"
                            class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                            wire:model='shipping_id'>
                            <option selected="" value="null">Shippings</option>
                            @foreach ($shippings as $shipping)
                                <option value="{{ $shipping->id }}">
                                    {{ $shipping->shipping_method }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <x-jet-label class="my-2" for="Payments" value="{{ __('Payments') }}" />
                        <select id="Payments"
                            class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                            wire:model='payment_id'>
                            <option selected="" value="null">Payment</option>
                            @foreach ($payments as $payment)
                                <option value="{{ $payment->id }}">
                                    {{ $payment->payment_method }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modalFormVisible')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>

                <x-jet-button class="ml-3" wire:click="updateMethod" wire:loading.attr="disabled">
                    {{ __('Add Data') }}
                </x-jet-button>
            </x-slot>
        </x-jet-dialog-modal>

        <x-jet-dialog-modal wire:model="modalFormImage">
            <x-slot name="title">
                {{ __('Upload Your Image') }}
            </x-slot>

            <x-slot name="content">
                <div>
                    @error('image')
                        <div class="p-4 mb-4 mt-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                            role="alert">
                            <span class="font-medium">{{ $message }}</span>
                        </div>
                    @enderror
                    <div class="my-3">
                        <x-jet-label for="transfer" value="{{ __('Bukti Transfer') }}" />
                        <x-jet-input id="transfer" class="block mt-1 w-full" type="file" wire:model='image' />
                    </div>
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modalFormImage')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>

                <x-jet-button class="ml-3" wire:click="pay" wire:loading.attr="disabled">
                    {{ __('Add Data') }}
                </x-jet-button>
            </x-slot>
        </x-jet-dialog-modal>
    </main>
</div>
