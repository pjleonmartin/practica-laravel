<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Message;

class MessageController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function message_received() {
        $messages = Message::where('addressee_id', \Auth::user()->id)
                ->paginate(5);

        return view('message.received', ['messages' => $messages]);
    }

    public function message_sent() {
        $messages = Message::where('sender_id', \Auth::user()->id)
                ->paginate(5);

        return view('message.sent', ['messages' => $messages]);
    }

    public function message_write() {
        $users = User::all();

        return view('message.form', ['users' => $users]);
    }

    public function send(Request $request) {

        // Conseguir usuario identificado
        $user = \Auth::user();

        // Validación de formulario
        $validate = $this->validate($request, [
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:255'
        ]);

        // Recoger datos del formulario
        $subject = $request->input('subject');
        $content = $request->input('message');
        $addressee_id = $request->input('addressee');

        // Asignar los valores al nuevo objeto Message
        $message = new Message();
        $message->sender_id = $user->id;
        $message->addressee_id = $addressee_id;
        $message->subject = $subject;
        $message->message = $content;

        // Guardar el mensaje en la BBDD
        $message->save();

        return redirect()->route('message.form')
                        ->with(['message_success' => 'Your message has been succesfully sent to its addressee']);
    }

    public function delete($id) {
        $message = Message::find($id);

        if ($message->addressee_id == \Auth::user()->id || $message->sender_id == \Auth::user()->id) {
            
            $message->delete();
            
            DB::select(DB::raw("CALL add_log (:Param1, :Param2, :Param3)"), [
                ':Param1' => \Auth::user()->nick,
                ':Param2' => \Auth::user()->role,
                ':Param3' => 'User ' . $user->nick . ' deleted a message'
            ]);
            
        } else {
            return redirect()->route('home')
                            ->with(['message_error' => 'You are not authorized to delete that message']);
        }

        return redirect()->route('home')
                        ->with(['message_success' => 'Your message has been succesfully deleted']);
    }

}
