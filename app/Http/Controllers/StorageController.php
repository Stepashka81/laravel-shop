<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsFilterRequest;
use App\Http\Requests\SubscriptionRequest;
use App\Models\Category;
use App\Models\Currency;
use App\Models\Product;
use App\Models\Sku;
use App\Models\Subscription;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class StorageController extends Controller
{
    public function categories(Request $request, $file) {
        $this->_file( $request, 'categories/' . $file);
    }
    public function products(Request $request, $file) {
        $this->_file( $request, 'products/' . $file);
    }
    protected function _file(Request $request, $file)
    {
        if(!Storage::disk('public')->exists($file)) {
            throw new FileNotFoundException();
        }
        return Storage::disk('public')->response($file);
    }
}
