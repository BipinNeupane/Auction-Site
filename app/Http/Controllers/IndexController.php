<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Bids;
use App\Models\Catalog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class IndexController extends Controller
{
    public function showBidAuction($lot_number)
    {
        $product = Products::find($lot_number);
        $bids = Bids::where('lot_number', $lot_number)->take(5)->get();
        $HighestBid = Bids::where('lot_number', $lot_number)
            ->orderBy('bid_amount', 'desc')->first();

        // $highestBidAmount = $HighestBid ? $HighestBid->bid_amount : floatval($product->estimated_price);

        return view('bid-auction', ['products' => $product, 'bids' => $bids, 'highestBid' => $HighestBid]);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $results = Products::where('product_name', 'like', '%' . $query . '%')
            ->orWhere('artist', 'like', '%' . $query . '%')
            ->orWhere('description', 'like', '%' . $query . '%')
            ->get();
        
        return view('search-products', ['results' => $results, 'query' => $query]);
    }

    public function filterSearch(Request $request)
{
    // Get search parameters from the request
    $artist = $request->input('artist');
    $category = $request->input('category');
    $price = $request->input('price');
    $auctionDate = $request->input('auction_date');
    $subjectClassification = $request->input('subject_classification');

    // Start the query with the Products model
    $query = Products::query();

    // Apply filters based on search parameters
    if ($artist) {
        $query->where('artist', 'like', '%' . $artist . '%');
    }

    if ($category) {
        $query->where('category_id', $category);
    }

    if ($price) {
        // Adjust this based on how you store price information in your database
        $query->where('estimated_price', '<=', $price);
    }

    if ($auctionDate) {
        $auctionDate = (int)$auctionDate;
        $convertedDate = date('Y-m-d H:i:s', $auctionDate);
    
        // Assuming start_date and end_date are date fields in your database
        $query->whereDate('start_date', '=', $convertedDate);
        $query->whereDate('end_date', '=', $convertedDate);
    }

    if ($subjectClassification) {
        $query->where('subject_classification', 'like', '%' . $subjectClassification . '%');
    }

    // Execute the query and get the results
    $results = $query->get();

    // Pass the results and search parameters to the view
    return view('search-products', [
        'results' => $results,
        'artist' => $artist,
        'category' => $category,
        'price' => $price,
        'auctionDate' => $auctionDate,
        'subjectClassification' => $subjectClassification,
    ]);
}

public function showCatalog($catalog_id){
    $products = Products::where('catalog_id',$catalog_id)->get();
    $catalog = Catalog::where('catalog_id',$catalog_id)->first();
    return view('catalog-auction',['products'=> $products,'catalog'=> $catalog]);
}

}
