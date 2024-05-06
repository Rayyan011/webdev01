<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Management Dashboard</title>
    
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <!-- Full-Screen Container -->
    <div class="min-h-screen flex flex-col">
       
        
        <!-- Hero Section -->
        <div class="bg-gradient-to-r from-blue-500 to-blue-800 text-center p-20 text-white">
            <h1 class="text-6xl font-bold mb-4">Manage Your Products Efficiently</h1>
            <p class="text-lg mb-6">Streamline your workflow with our intuitive product management system.</p>
            <a href="{{ route('product.create') }}" class="bg-white text-blue-700 font-bold py-3 px-6 rounded-lg shadow-lg hover:bg-gray-200 transition-all">Get Started</a>
        </div>
        
        <!-- Features Section -->
        <div class="container mx-auto mt-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-center">
                <!-- Single Feature -->
                <div class="bg-white rounded-lg p-6 shadow-lg">
                    <h2 class="text-2xl font-bold text-blue-600 mb-2">Track Products</h2>
                    <p class="text-gray-600">Easily monitor stock levels and manage product availability in real-time.</p>
                </div>
                <!-- Single Feature -->
                <div class="bg-white rounded-lg p-6 shadow-lg">
                    <h2 class="text-2xl font-bold text-blue-600 mb-2">Analyze Sales</h2>
                    <p class="text-gray-600">Gain insights into sales trends and optimize your pricing strategy.</p>
                </div>
                <!-- Single Feature -->
                <div class="bg-white rounded-lg p-6 shadow-lg">
                    <h2 class="text-2xl font-bold text-blue-600 mb-2">Customer Feedback</h2>
                    <p class="text-gray-600">Collect and manage customer feedback to improve your products.</p>
                </div>
            </div>
        </div>

        <!-- Product Table Section -->
        <div class="container mx-auto px-6 py-8">
            <div class="flex justify-end mb-4">
                <a href="{{ route('product.create') }}" class="bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition-colors">Create a Product</a>
            </div>
            <div class="overflow-x-auto bg-white rounded-lg shadow">
                <table class="w-full border-collapse">
                    <!-- Table Header -->
                    <thead class="bg-blue-200">
                        <tr>
                            <th class="px-4 py-2 border-b-2">ID</th>
                            <th class="px-4 py-2 border-b-2">Name</th>
                            <th class="px-4 py-2 border-b-2">Quality</th>
                            <th class="px-4 py-2 border-b-2">Quantity</th>
                            <th class="px-4 py-2 border-b-2">Price</th>
                            <th class="px-4 py-2 border-b-2">Description</th>
                            <th class="px-4 py-2 border-b-2">Edit</th>
                            <th class="px-4 py-2 border-b-2">Delete</th>
                        </tr>
                    </thead>
                    <!-- Table Body -->
                    <tbody>
                        @foreach($products as $product)
                        <tr class="hover:bg-blue-50">
                            <td class="px-4 py-2 border-b">{{ $product->id }}</td>
                            <td class="px-4 py-2 border-b">{{ $product->name }}</td>
                            <td class="px-4 py-2 border-b">{{ $product->quality }}</td>
                            <td class="px-4 py-2 border-b">{{ $product->qty }}</td>
                            <td class="px-4 py-2 border-b">{{ $product->price }}</td>
                            <td class="px-4 py-2 border-b">{{ $product->description }}</td>
                            <td class="px-4 py-2 border-b">
                                <a href="{{ route('product.edit', ['product' => $product]) }}" class="text-blue-600 hover:text-blue-800">Edit</a>
                            </td>
                            <td class="px-4 py-2 border-b">
                                <form method="post" action="{{ route('product.destroy', ['product' => $product]) }}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

       
        <!-- Footer -->
        <footer class="bg-gray-800 text-white text-center p-4 mt-4">
            © 2024 ProductManager, Inc. All rights reserved.
        </footer>

       
    </div>
</body>
</html>
