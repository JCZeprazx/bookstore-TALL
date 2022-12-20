<div>
    <x-jet-button wire:click="createShowModal">
        {{ __('Add Author Data') }}
    </x-jet-button>

    <x-jet-dialog-modal wire:model="modalFormVisible">
        <x-slot name="title">
            {{ __('Add Author Data') }}
        </x-slot>

        <x-slot name="content">
            <div>
                @error('author_firstname')
                    <div class="p-4 mb-4 mt-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                        role="alert">
                        <span class="font-medium">{{ $message }}</span>
                    </div>
                @enderror
                <x-jet-label for="Author_firstname" value="{{ __('Author Firstname') }}" />
                <x-jet-input id="Author_firstname" class="block mt-1 w-full" type="text" wire:model='author_firstname' />
                <x-jet-label for="Author_lastname" value="{{ __('Author Lastname') }}" />
                <x-jet-input id="Author_lastname" class="block mt-1 w-full" type="text" wire:model='author_lastname' />
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
