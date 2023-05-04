<tr id="item-{{ $product->id }}">
    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">{{ $product->name }}</td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ $product->subcategory?->category?->name  }}</td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ $product->subcategory?->name  }}</td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"> NRs.{{ $product->price  }}</td>

    <td class="action-btn px-6 py-4 text-right text-sm font-medium">
        <a data-id="#item-{{ $product->id }}" data-url="{{ route('products.edit', $product->id)}}" class="btn-edit text-blue-500 hover:text-blue-700 px-4" href="#">Edit</a>
        <a data-id="#item-{{ $product->id }}" data-url="{{ route('products.destroy', $product->id) }}" class="btn-delete text-red-500 hover:text-red-700" href="#">Delete</a>
    </td>
</tr>