<?php namespace App\Http\Controllers;
use App\Item;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $uncompletedItems = Item::where('isCompleted', 0)->get();
        $completedItems = Item::where('isCompleted', 1)->get();

        $data = ['uncompletedItems' => $uncompletedItems,
            'completedItems' => $completedItems];

        return view('item.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $item = new Item;
        $item->title = $request->title;
        $item->save();
        return response()->json(['id' => $item->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $item = Item::find($id);
        return view('item.show', ['item' => $item]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $item = Item::find($id);
	$item->isCompleted = (bool) $request->isCompleted;
        $item->save();
        return;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);
        $item->delete();
        return;
    }
}
