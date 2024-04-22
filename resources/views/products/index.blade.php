<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Management</title>
    
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-blue-50">
    <!-- Container -->
    <div class="container mx-auto py-8">
        <!-- Heading -->
        <h1 class="text-3xl font-bold text-blue-800 mb-6">Product Management</h1>
        
        <!-- Create Product Button -->
        <div class="mb-4">
            <a href="{{ route('product.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">Create a Product</a>
        </div>
           
                @if(session()->has('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
        <!-- Product Table -->
        <table class="w-full border border-blue-200">
            <!-- Table Header -->
            <thead>
                <tr>
                    <th class="border-b bg-blue-100 px-4 py-2">ID</th>
                    <th class="border-b bg-blue-100 px-4 py-2">Name</th>
                    <th class="border-b bg-blue-100 px-4 py-2">Quality</th>
                    <th class="border-b bg-blue-100 px-4 py-2">Quantity</th>
                    <th class="border-b bg-blue-100 px-4 py-2">Price</th>
                    <th class="border-b bg-blue-100 px-4 py-2">Description</th>
                    <th class="border-b bg-blue-100 px-4 py-2">Edit</th>
                    <th class="border-b bg-blue-100 px-4 py-2">Delete</th>
                </tr>
            </thead>
            <!-- Table Body -->
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td class="border-b px-4 py-2">{{ $product->id }}</td>
                    <td class="border-b px-4 py-2">{{ $product->name }}</td>
                    <td class="border-b px-4 py-2">{{ $product->quality }}</td>
                    <td class="border-b px-4 py-2">{{ $product->qty }}</td>
                    <td class="border-b px-4 py-2">{{ $product->price }}</td>
                    <td class="border-b px-4 py-2">{{ $product->description }}</td>
                    <!-- Edit Product Button -->
                    <td class="border-b px-4 py-2">
                        <a href="{{ route('product.edit', ['product' => $product]) }}" class="text-blue-500 hover:text-blue-700 flex items-center">
                            <svg class="h-5 w-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                            Edit
                        </a>
                    </td>
                    <!-- Delete Product Button -->
                    <td class="border-b px-4 py-2">
                        <form method="post" action="{{ route('product.destroy', ['product' => $product]) }}">
                            @csrf 
                            @method('delete')
                            <button type="submit" class="text-blue-500 hover:text-blue-700 flex items-center">
                                <svg class="h-5 w-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
