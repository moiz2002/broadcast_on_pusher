<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Events\NewMessageNotification;
use App\Models\Message as ModelsMessage;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    // public function __construct() {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $user_id = Auth::user()->id;
        $data = array('user_id' => $user_id);

        return view('welcome', $data);
    }

    public function message()
    {
        // ...

        // message is being sent
        $message = new ModelsMessage();
        $message->setAttribute('from', 1);
        $message->setAttribute('to', 2);
        $message->setAttribute('message', 'Demo message from user 1 to user 2');
        $message->save();

        // want to broadcast NewMessageNotification event
        event(new NewMessageNotification($message));
        return redirect()->back();

        // ...
    }
}
