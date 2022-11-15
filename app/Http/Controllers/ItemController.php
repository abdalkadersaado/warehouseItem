<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\Item\AddcodeRequest;
use App\Http\Requests\Item\AddItemRequest;
use App\Models\InTransaction;

class ItemController extends Controller
{
    /**
     * all items function
     *
     * @return response api with paginate from latest items
     */
    public function all_items()
    {
        $items = Item::with('category')->latest()->paginate(12);
        return response()->json([
            'items' => $items,
            'status' => 200,
            'message' => 'Items return successfully'
        ]);
    }
    /**
     * import new item with in-transaction function
     *
     * @param name
     * @param commercial_name
     * @param category_id
     * @param qty
     * @param price
     * @return response api
     */
    public function create(AddItemRequest $request)
    {
        try {
            $item = new Item();
            $item->name = $request->name;
            $item->commercial_name = $request->commercial_name;
            $item->category_id = $request->category_id;
            $item->warehouse_id = $request->warehouse_id;
            $item->qty = $request->qty;
            $item->price = $request->price;
            $item->code = $this->generate_character($request->name, $item->category->category_name) . $this->length_commercial($item->commercial_name);

            $item->save();
            $transaction = new InTransaction();
            $transaction->name = "Import-Transaction";
            $transaction->number = $item->created_at;
            $transaction->item_id = $item->id;
            $transaction->save();

            $item->load('in_transaction');

            return response()->json([
                'item' => $item,
                'status' => 201,
                'message' => 'Item added successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'status' => 500,
                'message' => 'something went wrong'
            ]);
        }
    }
    /**
     * function handle auto-generate character from (first_character's) item
     * and  first_character's with last_character category_name
     * @param [type] $data
     * @param [type] $data_cat
     * @return void
     */
    private function generate_character($data, $data_cat)
    {
        $string_upper = Str::ucfirst($data);
        $first_character = Str::substr($string_upper, 0, 1);
        $string_upper2 = Str::upper($data_cat);
        $first_character2 = Str::substr($string_upper2, 0, 1);
        $last_character2 = Str::substr($string_upper2, -1, 1);

        return $first_character . $first_character2 . $last_character2;
    }
    // function handle length commercial and add "00" before it.
    private function length_commercial($data_commercial)
    {
        $stringLength = Str::length($data_commercial);
        return "00" . $stringLength;
    }
    /**
     * select info item through insert code's item
     *
     * @param "code" request
     * @return response api
     */
    public function reverse(AddcodeRequest $request)
    {
        try {
            $item = Item::where('code', $request->code)->first();
            if ($item != null) {
                return response()->json([
                    'item' => $item,
                    'status' => 200,
                    'message' => 'The requested information has been returned'
                ]);
            } else {
                return response()->json([
                    'item' => null,
                    'status' => 499,
                    'message' => 'this code invalid'
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'status' => 500,
                'message' => 'something went wrong'
            ]);
        }
    }
}
