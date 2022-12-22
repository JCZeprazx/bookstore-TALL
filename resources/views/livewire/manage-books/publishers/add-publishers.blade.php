<div>
    <x-jet-button wire:click="createShowModal">
        {{ __('Add Publisher Data') }}
    </x-jet-button>

    <x-jet-dialog-modal wire:model="modalFormVisible">
        <x-slot name="title">
            {{ __('Add Publisher Data') }}
        </x-slot>

        <x-slot name="content">
            <div>
                @error('publisher_name')
                    <div class="p-4 mb-4 mt-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                        role="alert">
                        <span class="font-medium">{{ $message }}</span>
                    </div>
                @enderror
                <x-jet-label for="Publisher" value="{{ __('Publisher') }}" />
                <x-jet-input id="Publisher" class="block mt-1 w-full" type="text" wire:model='publisher_name' />
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
