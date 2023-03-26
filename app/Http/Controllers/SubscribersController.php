<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;
use App\Notifications\SubscribedNotification;

class SubscribersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:view subscribers'])->only(['index']);
        $this->middleware(['permission:delete subscribers'])->only(['delete']);
    }
    public function index()
    {
        $subscribers = Subscriber::latest()->paginate();
        return view('admin.subscribers.index')->with(compact('subscribers'));
    }

    public function delete($id)
    {
        // return $id;
        Subscriber::find($id)->delete();
        return redirect()->route('subscribers.index');
    }
}
