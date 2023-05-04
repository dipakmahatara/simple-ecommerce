@extends('layouts.app')

@section('content')
<div class="w-full pt-10 px-4 sm:px-6 md:px-8 lg:pl-72">
    <!-- Page Heading -->
    <header class="flex justify-between items-center mb-8">
        <p class="mb-2 text-sm font-semibold text-blue-600">Subcategories</p>
        <button type="button" id="create-modal-btn" class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-xl border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800" data-hs-overlay="#add_modal">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
            </svg> Create a subcategory
        </button>
    </header>
    <!-- End Page Heading -->

    <section>
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="border rounded-lg shadow overflow-hidden dark:border-gray-700 dark:shadow-gray-900">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-200 dark:bg-gray-700">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase dark:text-gray-400">Subcategory Name</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase dark:text-gray-400">Category</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase dark:text-gray-400">Added on</th>
                                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase dark:text-gray-400">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach ($subcategories as $subcategory)
                                <tr id="item-{{ $subcategory->id }}">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">{{ $subcategory->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">{{ $subcategory->category?->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ $subcategory->created_at->diffForHumans() }}</td>

                                    <td class="action-btn px-6 py-4 text-right text-sm font-medium">
                                        <a data-id="#item-{{ $subcategory->id }}" data-url="{{ route('subcategories.edit', $subcategory->id)}}" class="btn-edit text-blue-500 hover:text-blue-700 px-4" href="#">Edit</a>
                                        <a data-id="#item-{{ $subcategory->id }}" data-url="{{ route('subcategories.destroy', $subcategory->id) }}" class="btn-delete text-red-500 hover:text-red-700" href="#">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Start Add Form  -->
        <div id="add_modal" class="hs-overlay hidden w-full h-full fixed top-0 left-0 z-[60] overflow-x-hidden overflow-y-auto [--overlay-backdrop:static]" data-hs-overlay-keyboard="false">
            <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-2xl sm:w-full m-3 sm:mx-auto">
                <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                    <form class="" id="addSubcategoryForm" action="{{ route('subcategories.store') }}" method="POST">
                        <div class="flex justify-between items-center py-3 px-4 border-b dark:border-gray-700">
                            <h3 class="font-bold text-gray-800 dark:text-white">
                                Subcategory Add
                            </h3>
                            <button id="close-add-modal" type="button" class="hs-dropdown-toggle inline-flex flex-shrink-0 justify-center items-center h-8 w-8 rounded-md text-gray-500 hover:text-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:ring-offset-white transition-all text-sm dark:focus:ring-gray-700 dark:focus:ring-offset-gray-800" data-hs-overlay="#add_modal">
                                <span class="sr-only">Close</span>
                                <svg class="w-3.5 h-3.5" width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.258206 1.00652C0.351976 0.912791 0.479126 0.860131 0.611706 0.860131C0.744296 0.860131 0.871447 0.912791 0.965207 1.00652L3.61171 3.65302L6.25822 1.00652C6.30432 0.958771 6.35952 0.920671 6.42052 0.894471C6.48152 0.868271 6.54712 0.854471 6.61352 0.853901C6.67992 0.853321 6.74572 0.865971 6.80722 0.891111C6.86862 0.916251 6.92442 0.953381 6.97142 1.00032C7.01832 1.04727 7.05552 1.1031 7.08062 1.16454C7.10572 1.22599 7.11842 1.29183 7.11782 1.35822C7.11722 1.42461 7.10342 1.49022 7.07722 1.55122C7.05102 1.61222 7.01292 1.6674 6.96522 1.71352L4.31871 4.36002L6.96522 7.00648C7.05632 7.10078 7.10672 7.22708 7.10552 7.35818C7.10442 7.48928 7.05182 7.61468 6.95912 7.70738C6.86642 7.80018 6.74102 7.85268 6.60992 7.85388C6.47882 7.85498 6.35252 7.80458 6.25822 7.71348L3.61171 5.06702L0.965207 7.71348C0.870907 7.80458 0.744606 7.85498 0.613506 7.85388C0.482406 7.85268 0.357007 7.80018 0.264297 7.70738C0.171597 7.61468 0.119017 7.48928 0.117877 7.35818C0.116737 7.22708 0.167126 7.10078 0.258206 7.00648L2.90471 4.36002L0.258206 1.71352C0.164476 1.61976 0.111816 1.4926 0.111816 1.36002C0.111816 1.22744 0.164476 1.10028 0.258206 1.00652Z" fill="currentColor" />
                                </svg>
                            </button>
                        </div>
                        <div class="p-4 overflow-y-auto">
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full px-3 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                        Subcategory Name
                                    </label>
                                    <input name="name" value="{{ old('name') }}" class="appearance-none block w-full text-gray-700 focus:border-blue-500 focus:ring-blue-500 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight" id="grid-first-name" type="text" placeholder="Enter subcategory name" required>
                                </div>

                                <div class="w-full px-3 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                        Select Category
                                    </label>
                                    <select name="category_id" class="py-3 px-4 pr-9 block w-full border border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-gray-700">
                            <button type="button" class="hs-dropdown-toggle py-3 px-4 inline-flex justify-center items-center gap-2 rounded-xl border font-medium bg-red-500 text-white shadow-sm align-middle hover:bg-red-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm" data-hs-overlay="#add_modal">
                                Cancel
                            </button>
                            <button type="submit" id="save-btn" class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-xl border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800" href="#">
                                Save subcategory
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Emd Add Form  -->

        <!-- Start Edit Form  -->
        <button type="button" id="edit-modal-btn" class="hidden" data-hs-overlay="#edit_modal"> </button>
        <div id="edit_modal" class="hs-overlay hidden w-full h-full fixed top-0 left-0 z-[60] overflow-x-hidden overflow-y-auto [--overlay-backdrop:static]" data-hs-overlay-keyboard="false">
            <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-2xl sm:w-full m-3 sm:mx-auto">
                <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                    <form id="updateSubcategoryForm" action="{{ route('subcategories.store') }}" method="POST">
                        <div class="flex justify-between items-center py-3 px-4 border-b dark:border-gray-700">
                            <h3 class="font-bold text-gray-800 dark:text-white">
                                Edit Subcategory
                            </h3>
                            <button id="close-edit-modal" type="button" class="hs-dropdown-toggle inline-flex flex-shrink-0 justify-center items-center h-8 w-8 rounded-md text-gray-500 hover:text-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:ring-offset-white transition-all text-sm dark:focus:ring-gray-700 dark:focus:ring-offset-gray-800" data-hs-overlay="#edit_modal">
                                <span class="sr-only">Close</span>
                                <svg class="w-3.5 h-3.5" width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.258206 1.00652C0.351976 0.912791 0.479126 0.860131 0.611706 0.860131C0.744296 0.860131 0.871447 0.912791 0.965207 1.00652L3.61171 3.65302L6.25822 1.00652C6.30432 0.958771 6.35952 0.920671 6.42052 0.894471C6.48152 0.868271 6.54712 0.854471 6.61352 0.853901C6.67992 0.853321 6.74572 0.865971 6.80722 0.891111C6.86862 0.916251 6.92442 0.953381 6.97142 1.00032C7.01832 1.04727 7.05552 1.1031 7.08062 1.16454C7.10572 1.22599 7.11842 1.29183 7.11782 1.35822C7.11722 1.42461 7.10342 1.49022 7.07722 1.55122C7.05102 1.61222 7.01292 1.6674 6.96522 1.71352L4.31871 4.36002L6.96522 7.00648C7.05632 7.10078 7.10672 7.22708 7.10552 7.35818C7.10442 7.48928 7.05182 7.61468 6.95912 7.70738C6.86642 7.80018 6.74102 7.85268 6.60992 7.85388C6.47882 7.85498 6.35252 7.80458 6.25822 7.71348L3.61171 5.06702L0.965207 7.71348C0.870907 7.80458 0.744606 7.85498 0.613506 7.85388C0.482406 7.85268 0.357007 7.80018 0.264297 7.70738C0.171597 7.61468 0.119017 7.48928 0.117877 7.35818C0.116737 7.22708 0.167126 7.10078 0.258206 7.00648L2.90471 4.36002L0.258206 1.71352C0.164476 1.61976 0.111816 1.4926 0.111816 1.36002C0.111816 1.22744 0.164476 1.10028 0.258206 1.00652Z" fill="currentColor" />
                                </svg>
                            </button>
                        </div>
                        <div class="p-4 overflow-y-auto">
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full px-3 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="edit_name">
                                        Subcategory Name
                                    </label>
                                    <input name="name" id="edit_name" value="{{ old('name') }}" class="appearance-none block w-full text-gray-700 focus:border-blue-500 focus:ring-blue-500 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight" type="text" placeholder="Enter subcategory name" required>
                                </div>

                                <div class="w-full px-3 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                        Select Category
                                    </label>
                                    <select name="category_id" id="edit_category_id" class="py-3 px-4 pr-9 block w-full border border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-gray-700">
                            <button type="button" class="hs-dropdown-toggle py-3 px-4 inline-flex justify-center items-center gap-2 rounded-xl border font-medium bg-red-500 text-white shadow-sm align-middle hover:bg-red-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm" data-hs-overlay="#edit_modal">
                                Cancel
                            </button>
                            <button type="submit" id="update-btn" class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-xl border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800" href="#">
                                Update subcategory
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Edit Form  -->
    </section>
</div>
@stop

@push('js')
<script>
    var data_id = null;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Add Subcategory
    $('#addSubcategoryForm').on('submit', function(e) {
        e.preventDefault();

        var form = $(this);
        var url = form.attr('action');
        var data = form.serialize();

        $.ajax({
            url: url,
            method: 'POST',
            data: data,
            success: function(response) {
                $('#close-add-modal').click();
                form[0].reset();
                toastr.success('Subcategory added successfully');
                $('tbody').prepend(response);
            },
            error: function(response) {
                var errors = response.responseJSON.errors;
                for (var key in errors) {
                    toastr.error(errors[key]);
                }
            }
        });
    });

    //Edit
    $('body').on('click', '.btn-edit', function() {
        $.ajax({
            url: $(this).data('url'),
            success: function(response) {
                $('#edit_name').val(response.subcategory.name);
                $('#edit_category_id').val(response.subcategory.category_id).trigger;
                $('#updateSubcategoryForm').attr('action', response.update_route);
                $('#edit-modal-btn').click();
                data_id = '#item-' + response.subcategory.id;
            },
            error: function(response) {
                var errors = response.responseJSON.errors;
                for (var key in errors) {
                    toastr.error(errors[key]);
                }
            }
        });
    });

    // Update subcategory
    $('#updateSubcategoryForm').on('submit', function(e) {
        e.preventDefault();
        var form = $(this);
        var url = form.attr('action');
        var data = form.serialize();

        $.ajax({
            url: url,
            method: 'PUT',
            data: data,
            success: function(response) {
                $('#close-edit-modal').click();
                form[0].reset();
                toastr.success('Subcategory updated successfully');
                if (data_id) {
                    $(data_id).replaceWith(response);
                }
            },
            error: function(response) {
                var errors = response.responseJSON.errors;
                for (var key in errors) {
                    toastr.error(errors[key]);
                }
            }
        });
    });

    //Delete 
    $('body').on('click', '.btn-delete', function() {
        var confirmMsg = "Are you sure you want to delete this record?";
        if (confirm(confirmMsg)) {
            var item_id = $(this).data('id');
            $.ajax({
                type: 'DELETE',
                url: $(this).data('url'),
                success: function(data) {
                    toastr.success('Subcategory removed successfully');
                    $(item_id).remove();
                }
            });
        }
    });
</script>
@endpush