<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit a Product</title>
    
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-blue-50">
    <!-- Container -->
    <div class="container mx-auto py-8">
        <!-- Heading -->
        <h1 class="text-3xl font-bold text-blue-800 mb-6">Edit a Product</h1>

        <!-- Error Messages -->
        <div class="mb-4">
            @if($errors->any())
            <ul class="text-red-500">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif
        </div>

        <!-- Form Container -->
        <div class="bg-white rounded-md shadow-md p-6">
            <form method="post" action="{{ route('product.update', ['product' => $product]) }}">
                @csrf 
                @method('put')

                <!-- Name Field -->
                <div class="mb-4">
                    <label class="block text-blue-800">Name</label>
                    <input type="text" name="name" placeholder="Name" value="{{ $product->name }}" class="block w-full border border-blue-200 rounded-md px-4 py-2" />
                </div>

                <!-- Quality Field -->
                <div class="mb-4">
                    <label class="block text-blue-800">Quality</label>
                    <input type="text" name="quality" placeholder="Quality" value="{{ $product->quality }}" class="block w-full border border-blue-200 rounded-md px-4 py-2" />
                </div>

                <!-- Qty Field -->
                <div class="mb-4">
                    <label class="block text-blue-800">Qty</label>
                    <input type="text" name="qty" placeholder="Qty" value="{{ $product->qty }}" class="block w-full border border-blue-200 rounded-md px-4 py-2" />
                </div>

                <!-- Price Field -->
                <div class="mb-4">
                    <label class="block text-blue-800">Price</label>
                    <input type="text" name="price" placeholder="Price" value="{{ $product->price }}" class="block w-full border border-blue-200 rounded-md px-4 py-2" />
                </div>

                <!-- Description Field -->
                <div class="mb-4">
                    <label class="block text-blue-800">Description</label>
                    <input type="text" name="description" placeholder="Description" value="{{ $product->description }}" class="block w-full border border-blue-200 rounded-md px-4 py-2" />
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">Update</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
