<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    // Menampilkan data produk
    public function index()
    {
        $data_toko = [
            'nama_toko' => 'Tulis Nama Kamu',
            'alamat_toko' => 'Jl. Terus Jadian Kagak',
            'status_toko' => 'Belum Pasti'
        ];

        $data_product = Product::orderBy('id', 'desc')->paginate(10);

        return view('pages.product.show', [
            'data_toko' => $data_toko,
            'data_produk' => $data_product
        ]);
    }

    // Menampilkan form tambah produk
    public function addProduct()
    {
        $data_category = Category::all();

        return view('pages.addProduct', [
            'data_category' => $data_category
        ]);
    }

    // Menyimpan produk baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_product' => 'required|string|min:4|max:20',
            'stock_product' => 'required|integer|min:0',
            'price_product' => 'required|numeric|min:0',
            'desc_product' => 'required|string',
            'id_category' => 'required|exists:category_product,id_category'
        ], [
            'name_product.required' => 'Nama produk wajib diisi!',
            'name_product.min' => 'Nama produk minimal 4 karakter!',
            'name_product.max' => 'Nama produk maksimal 20 karakter!',
            'stock_product.required' => 'Stok produk wajib diisi!',
            'stock_product.min' => 'Stok tidak boleh negatif!',
            'price_product.required' => 'Harga produk wajib diisi!',
            'desc_product.required' => 'Deskripsi produk wajib diisi!',
            'id_category.required' => 'Kategori produk wajib dipilih!',
            'id_category.exists' => 'Kategori tidak ditemukan!'
        ]);

        $product = new Product();
        $product->name_product = $validated['name_product'];
        $product->stock_product = $validated['stock_product'];
        $product->price_product = $validated['price_product'];
        $product->desc_product = $validated['desc_product'];
        $product->id_category = $validated['id_category'];

        $product->save();

        return redirect('/product')->with('success', 'Produk berhasil ditambahkan!');
    }
public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('pages.product.detail', [
            'product' => $product
        ]);
    }

    // Menampilkan form edit produk
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('pages.product.edit', [
            'product' => $product
        ]);
    }

    // Memperbarui data produk
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name_product' => 'required|string|min:4|max:20',
            'stock_product' => 'required|integer|min:0',
            'price_product' => 'required|numeric|min:0',
            'desc_product' => 'required|string',
            'id_category' => 'required|exists:category_product,id_category'
        ]);

        $product = Product::findOrFail($id);
        $product->update($validated);

        return redirect('/product')->with('success', 'Produk berhasil diperbarui!');
    }

    // Menghapus data produk
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect('/product')->with('success', 'Produk berhasil dihapus!');
    }

}
