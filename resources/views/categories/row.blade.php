<tr id="item-{{ $category->id }}">
    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">{{ $category->name }}</td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ $category->created_at->diffForHumans() }}</td>

    <td class="action-btn px-6 py-4 text-right text-sm font-medium">
        <a data-id="#item-{{ $category->id }}" data-url="{{ route('categories.edit', $category->id)}}" class="btn-edit text-blue-500 hover:text-blue-700 px-4" href="#">Edit</a>
        <a data-id="#item-{{ $category->id }}" data-url="{{ route('categories.destroy', $category->id) }}" class="btn-delete text-red-500 hover:text-red-700" href="#">Delete</a>
    </td>
</tr>