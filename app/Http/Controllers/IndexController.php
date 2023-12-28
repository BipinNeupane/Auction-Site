<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Bids;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function showBidAuction($lot_number)
    {
        $product = Products::find($lot_number);
        $bids = Bids::where('lot_number',$lot_number)->take(5)->get();
        $HighestBid = Bids::where('lot_number', $lot_number)
        ->orderBy('bid_amount', 'desc')->first();

        // $highestBidAmount = $HighestBid ? $HighestBid->bid_amount : floatval($product->estimated_price);

        return view('bid-auction', ['products' => $product,'bids' => $bids, 'highestBid' => $HighestBid]);
    }
}
