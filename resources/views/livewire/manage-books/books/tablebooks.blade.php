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
                            Book Name
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Book Cover
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Category
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Author
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
                                    {{ $data->book_name }}
                                </th>
                                <th scope="row"
                                    class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <img class="w-20 rounded" src="{{ asset('storage/book/' . $data->book_cover) }}"
                                        alt="">
                                </th>
                                <th scope="row"
                                    class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <x-jet-button wire:click="updateCategory({{ $data->id }})"
                                        wire:loading.attr="disabled">
                                        {{ __('Add Category') }}
                                    </x-jet-button>
                                </th>
                                <th class="row">
                                    <x-jet-button wire:click="updateAuthor({{ $data->id }})"
                                        wire:loading.attr="disabled">
                                        {{ __('Add Author') }}
                                    </x-jet-button>
                                </th>
                                <th class="row">
                                    <x-jet-button wire:click="updateShowModal({{ $data->id }})"
                                        wire:loading.attr="disabled">
                                        {{ __('Update Data') }}
                                    </x-jet-button>
                                    <x-jet-danger-button class="ml-3"
                                        wire:click="deleteShowModal({{ $data->id }})" wire:loading.attr="disabled">
                                        {{ __('Delete') }}
                                    </x-jet-danger-button>
                                </th>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            <div>
                {{ $datas->links() }}
            </div>
        </div>
    </div>
    <x-jet-dialog-modal wire:model="modalFormVisible">
        <x-slot name="title">
            {{ __('Update Data') }}
        </x-slot>

        <x-slot name="content">
            <div>
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
                        <x-jet-input id="Release Date" class="block mt-1 w-full" type="date"
                            wire:model='release_date' />
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
                        <x-jet-input id="Total Stock" class="block mt-1 w-full" type="text"
                            wire:model='total_stock' />
                    </div>
                    <div>
                        <x-jet-label for="Image" value="{{ __('Image') }}" />
                        <x-jet-input id="Image" class="block mt-1 w-full" type="file"
                            wire:model='book_cover' />
                    </div>
                </div>
                <div class="w-full">
                    <x-jet-label for="Book_Description" value="{{ __('Book Description') }}" />
                    <textarea id="Book_Description" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                        wire:model='book_description'></textarea>
                </div>
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
            {{ __('Are you sure you want to delete your data? Once your data is deleted, all of its resources and data will be permanently deleted.') }}
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
    <x-jet-dialog-modal wire:model="modalAuthorVisible">
        <x-slot name="title">
            {{ __('Add Author Book') }}
        </x-slot>

        <x-slot name="content">
            <div>
                <x-jet-label for="Author" value="{{ __('Author') }}" />
                <select id="Author"
                    class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm form-multipleselect"
                    wire:model="author_id">
                    <option selected="" value="null">Author</option>
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}">
                            {{ $author->author_firstname . ' ' . $author->author_lastname }}</option>
                    @endforeach
                </select>
                <div class="mt-4">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="py-3 px-6 text-center">
                                    Author
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                                @foreach ($book->authors as $author)
                                    @if ($author->pivot->book_id == $modelId)
                                        <tr class="bg-white dark:bg-gray-800">
                                            <th scope="row"
                                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <div class="flex items-center justify-between">
                                                    {{ $author->author_firstname . ' ' . $author->author_lastname }}
                                                    <x-jet-danger-button
                                                        wire:click="deleteAuthor({{ $author->pivot->author_id }})">
                                                        Delete</x-jet-danger-button>
                                                </div>
                                            </th>
                                        </tr>
                                    @endif
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalAuthorVisible')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-3" wire:click="updateDataAuthor" wire:loading.attr="disabled">
                {{ __('Add Author') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
    <x-jet-dialog-modal wire:model="modalCategoryVisible">
        <x-slot name="title">
            {{ __('Add Category Book') }}
        </x-slot>

        <x-slot name="content">
            <div>
                <x-jet-label for="Category" value="{{ __('Category') }}" />
                <select id="Category"
                    class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm form-multipleselect"
                    wire:model="category_id">
                    <option selected="" value="null">Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->category_name }}</option>
                    @endforeach
                </select>
                <div class="mt-4">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="py-3 px-6 text-center">
                                    Category
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                                @foreach ($book->categories as $category)
                                    @if ($category->pivot->book_id == $modelId)
                                        <tr class="bg-white dark:bg-gray-800">
                                            <th scope="row"
                                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <div class="flex items-center justify-between">
                                                    {{ $category->category_name }}
                                                    <x-jet-danger-button
                                                        wire:click="deleteCategory({{ $category->pivot->category_id }})">
                                                        Delete</x-jet-danger-button>
                                                </div>
                                            </th>
                                        </tr>
                                    @endif
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalCategoryVisible')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-3" wire:click="updateDataCategory" wire:loading.attr="disabled">
                {{ __('Add Category') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
