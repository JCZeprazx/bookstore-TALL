<div>
    <x-jet-input id="Book Name" class="block w-1/4 my-4" type="text" wire:model='search' placeholder="Search by name" />
    <div class="mx-4 my-4">
        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            No
                        </th>
                        <th scope="col" class="py-3 px-6">
                            User
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Order Status
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $data)
                        <tr class="bg-white dark:bg-gray-800">
                            <td class="py-4 px-6">
                                {{ $loop->iteration }}
                            </td>
                            <th scope="row"
                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $data->user->name }}
                            </th>
                            <th scope="row"
                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $data->order_status }}
                            </th>
                            <th class="row">
                                <x-jet-button wire:click="updateShowModal({{ $data->id }})"
                                    wire:loading.attr="disabled">
                                    {{ __('Update Data') }}
                                </x-jet-button>
                                <x-jet-danger-button class="ml-3" wire:click="deleteShowModal({{ $data->id }})"
                                    wire:loading.attr="disabled">
                                    {{ __('Delete') }}
                                </x-jet-danger-button>
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                {{-- {{ $datas->links() }} --}}
            </div>
        </div>
    </div>
</div>
