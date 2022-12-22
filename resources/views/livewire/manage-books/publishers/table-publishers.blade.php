<div>
    <x-jet-input id="Publisher" class="block w-1/4 my-4" type="text" wire:model='search' placeholder="Search by name" />
    <div class="mt-4 mr-4">
        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            No
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Publisher Name
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if ($datas->count())
                        @foreach ($datas as $data)
                            <tr class="bg-white dark:bg-gray-800">
                                <td class="py-4 px-6">
                                    {{ $loop->iteration }}
                                </td>
                                <th scope="row"
                                    class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $data->publisher_name }}
                                </th>
                                <td class="flex items-center py-4 px-6 space-x-3">
                                    <x-jet-button wire:click="updateShowModal({{ $data->id }})"
                                        wire:loading.attr="disabled">
                                        {{ __('Update Data') }}
                                    </x-jet-button>
                                    <x-jet-danger-button class="ml-3" wire:click="deleteShowModal({{ $data->id }})"
                                        wire:loading.attr="disabled">
                                        {{ __('Delete') }}
                                    </x-jet-danger-button>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>

            {{ $datas->links() }}

        </div>
    </div>
    <x-jet-dialog-modal wire:model="modalFormVisible">
        <x-slot name="title">
            {{ __('Update Data') }}
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

            <x-jet-button class="ml-3" wire:click="update" wire:loading.attr="disabled">
                {{ __('Update Data') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

    <x-jet-dialog-modal wire:model="modalConfirmDeleteVisible">
        <x-slot name="title">
            {{ __('Delete Data') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to delete your data? Once your data is deleted, all of its resources and data will be permanently deleted.')  }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalConfirmDeleteVisible')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-3" wire:click="delete" wire:loading.attr="disabled">
                {{ __('Delete Data') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
