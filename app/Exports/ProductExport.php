<?php

namespace App\Exports;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ProductExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Cache::get('products');
    }
    public function map($product): array
    {
        return [
            $product->id,
            $product->category->name,
            $product->name,
            $product->sell_price,
            $product->buy_price,
            $product->stock,
            $product->created_at,
            $product->updated_at,
        ];
    }
    public function headings(): array
    {
        return [
            'No',
            'Kategori Produk',
            'Nama Produk',
            'Harga Beli',
            'Harga Jual',
            'Stok',
            'Created_at',
            'Updated_At'
        ];
    }
}
