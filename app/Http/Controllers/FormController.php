<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Schema;
use App\Models\Category;
use App\Models\Item;

class FormController extends Controller
{
    public function createForm()
    {
        $fields = Schema::getColumnListing('items');
        return view('dynamicForm', compact('fields'));
    }
}
?>