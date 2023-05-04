<tr id="item-{{ $subcategory->id }}">
    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">{{ $subcategory->name }}</td>
    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">{{ $subcategory->category->name }}</td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ $subcategory->created_at->diffForHumans() }}</td>

    <td class="action-btn px-6 py-4 text-right text-sm font-medium">
        <a data-id="#item-{{ $subcategory->id }}" data-url="{{ route('subcategories.edit', $subcategory->id)}}" class="btn-edit text-blue-500 hover:text-blue-700 px-4" href="#">Edit</a>
        <a data-id="#item-{{ $subcategory->id }}" data-url="{{ route('subcategories.destroy', $subcategory->id) }}" class="btn-delete text-red-500 hover:text-red-700" href="#">Delete</a>
    </td>
</tr>