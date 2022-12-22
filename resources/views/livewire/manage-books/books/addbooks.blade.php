<div>
    <x-jet-button wire:click="createShowModal">
        {{ __('Add Book Data') }}
    </x-jet-button>

    <x-jet-dialog-modal wire:model="modalFormVisible">
        <x-slot name="title">
            {{ __('Add Book Data') }}
        </x-slot>

        <x-slot name="content">
            @if ($errors->any())
            <div class="p-4 mb-4 mt-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
            role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li><span class="font-medium">{{ $error }}</span></li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="grid gap-4 mb-4 sm:grid-cols-2">
                <div>
                    <x-jet-label for="Book Name" value="{{ __('Book Name') }}" />
                    <x-jet-input id="Book Name" class="block mt-1 w-full" type="text" wire:model='book_name' />
                </div>
                <div>
                    <x-jet-label for="ISBN" value="{{ __('ISBN') }}" />
                    <x-jet-input id="ISBN" class="block mt-1 w-full" type="number" wire:model='isbn' />
                </div>
                <div>
                    <x-jet-label for="Total Page" value="{{ __('Total Page') }}" />
                    <x-jet-input id="Total Page" class="block mt-1 w-full" type="number" wire:model='total_page' />
                </div>
                <div>
                    <x-jet-label for="Release Date" value="{{ __('Release Date') }}" />
                    <x-jet-input id="Release Date" class="block mt-1 w-full" type="date" wire:model='release_date' />
                </div>
                <div>
                    <x-jet-label for="Language" value="{{ __('Language') }}" />
                    <select id="Language"
                        class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        wire:model='language_id'>
                        <option selected="">Language</option>
                        @foreach ($languages as $language)
                            <option value="{{ $language->id }}">{{ $language->language }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <x-jet-label for="Publisher" value="{{ __('Publisher') }}" />
                    <select id="Publisher"
                        class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        wire:model='publisher_id'>
                        <option selected="" value="null">Publisher</option>
                        @foreach ($publishers as $publisher)
                            <option value="{{ $publisher->id }}">
                                {{ $publisher->publisher_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <x-jet-label for="Book Cost" value="{{ __('Book Cost') }}" />
                    <x-jet-input id="Book Cost" class="block mt-1 w-full" type="number" wire:model='book_cost' />
                </div>
                <div>
                    <x-jet-label for="Total Stock" value="{{ __('Total Stock') }}" />
                    <x-jet-input id="Total Stock" class="block mt-1 w-full" type="text" wire:model='total_stock' />
                </div>
                <div>
                    <x-jet-label for="Image" value="{{ __('Image') }}" />
                    <x-jet-input id="Image" class="block mt-1 w-full" type="file" wire:model='book_cover' />
                </div>
            </div>
            <div class="w-full">
                <x-jet-label for="Book_Description" value="{{ __('Book Description') }}" />
                <textarea id="Book_Description" rows="4"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                    wire:model='book_description'></textarea>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalFormVisible')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-3" wire:click="create" wire:loading.attr="disabled">
                {{ __('Add Data') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
