<?php

namespace App\Livewire\Admin\Product;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

class Edit extends Component
{
    use WithFileUploads;

    #[Layout('components.layouts.admin.app')]
    #[Title('Edit Produk')]

    // Public properties to hold product data
    public $product;
    public $name;
    public $category_id;
    public $price;
    public $stock;
    public $image;
    public $oldImage;
    public $categories;

    // Mount method to initialize the component with existing product data
    public function mount($id)
    {
        // Fetch the product by ID
        $product = Product::findOrFail($id);

        // Find the product and assign it to the public property
        $this->product = $product;

        // Populate the form fields with the product's current data
        $this->name = $product->name;
        $this->category_id = $product->category_id;
        $this->price = $product->price;
        $this->stock = $product->stock;
        $this->oldImage = $product->image;

        // Fetch all categories for the dropdown menu
        $this->categories = Category::all();
    }

    // Method to save the product changes
    public function save()
    {
        // Validate the form data
        $this->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|numeric|min:0',
            'image' => 'nullable|image|max:1024', // Max 1MB
        ]);

        // Handle image upload if a new image is provided
        if ($this->image) {
            // Delete the old image if it exists
            if ($this->oldImage) {
                Storage::disk('public')->delete('img/product/' . $this->oldImage);
            }

            // Store the new image in the 'storage/app/public/img/product' directory
            $imageName = $this->image->getClientOriginalName();
            $this->image->storeAs('img/product', $imageName, 'public');

            // Update the product's image field
            $this->product->image = $imageName;
        }

        // Update the product attributes
        $this->product->name = $this->name;
        $this->product->slug = Str::slug($this->name);
        $this->product->category_id = $this->category_id;
        $this->product->price = $this->price;
        $this->product->stock = $this->stock;

        // Save the updated product to the database
        $this->product->save();

        // Redirect the user back to the product list with a success message
        return $this->redirectRoute('admin.product');
    }

    // This is a render method for the component
    public function render()
    {
        return view('livewire.admin.product.edit');
    }
}
