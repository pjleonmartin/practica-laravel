<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\User;
use PDF;

class UserController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function create() {
        if (\Auth::user()->role == 'admin') {
            return view('user.create');
        } else {
            return redirect()->route('home')
                            ->with(['message' => 'You are not authorized']);
        }
    }

    public function insert(Request $request) {
        if (\Auth::user()->role == 'admin') {
            // Validación de formulario
            $validate = $this->validate($request, [
                'name' => 'required|string|max:255',
                'surname' => 'required|string|max:255',
                'nick' => 'required|string|max:255|unique:users,nick',
                'phonenumber' => 'required|min:9|max:9|numeric',
                'email' => 'required|string|email|max:255|unique:users,email'
            ]);

            // Recoger datos del formulario
            $name = $request->input('name');
            $surname = $request->input('surname');
            $nick = $request->input('nick');
            $phonenumber = $request->input('phonenumber');
            $email = $request->input('email');
            $password = $request->input('password');

            // Asignar nuevos valores al nuevo objeto de usuario
            $user = new User();
            $user->name = $name;
            $user->surname = $surname;
            $user->nick = $nick;
            $user->phonenumber = $phonenumber;
            $user->email = $email;
            $user->password = Hash::make($password);

            // Ejecutar consulta y cambios en la base de datos
            $user->save();

            DB::select(DB::raw("CALL add_log (:Param1, :Param2, :Param3)"), [
                ':Param1' => \Auth::user()->nick,
                ':Param2' => \Auth::user()->role,
                ':Param3' => 'User ' . $user->nick . ' has been created by an administrator'
            ]);

            return redirect()->route('user.create')
                            ->with(['message_success' => 'The user has been successfully created']);
        } else {
            return redirect()->route('home')
                            ->with(['message_error' => 'You are not authorized']);
        }
    }

    public function active_list() {
        if (\Auth::user()->role == 'admin') {
            $users = User::where('active', TRUE)
                    ->paginate(5);

            return view('user.list', ['users' => $users]);
        } else {
            return redirect()->route('home')
                            ->with(['message_error' => 'You are not authorized']);
        }
    }

    public function inactive_list() {
        if (\Auth::user()->role == 'admin') {
            $users = User::where('active', FALSE)
                    ->paginate(5);

            return view('user.list', ['users' => $users]);
        } else {
            return redirect()->route('home')
                            ->with(['message_error' => 'You are not authorized']);
        }
    }

    public function admin_panel() {
        if (\Auth::user()->role == 'admin') {
            return view('user.adminpanel');
        } else {
            return redirect()->route('home')
                            ->with(['message_error' => 'You are not authorized']);
        }
    }

    public function configuration() {
        return view('user.configuration');
    }

    public function admin_editprofile($id) {
        if (\Auth::user()->role == 'admin') {
            $user = User::find($id);
            if ($user != null) {
                return view('user.editprofile', ['user' => $user]);
            } else {
                return redirect()->route('home');
            }
        } else {
            return redirect()->route('home')
                            ->with(['message_error' => 'You are not authorized']);
        }
    }

    public function profile($id) {

        $user = User::find($id);
        if ($user != null) {
            return view('user.profile', ['user' => $user]);
        } else {
            return redirect()->route('home');
        }
    }

    public function update(Request $request) {

        // Conseguir usuario identificado
        $user = \Auth::user();
        $id = $user->id;

        // Validación de formulario
        $validate = $this->validate($request, [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'nick' => 'required|string|max:255|unique:users,nick,' . $id,
            'phonenumber' => 'required|min:9|max:9|numeric',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id
        ]);

        // Recoger datos del formulario
        $name = $request->input('name');
        $surname = $request->input('surname');
        $nick = $request->input('nick');
        $phonenumber = $request->input('phonenumber');
        $email = $request->input('email');

        // Asignar nuevos valores al objeto de usuario
        $user->name = $name;
        $user->surname = $surname;
        $user->nick = $nick;
        $user->phonenumber = $phonenumber;
        $user->email = $email;

        // Subir la imagen
        $image_path = $request->file('image_path');
        if ($image_path) {
            // Poner nombre único
            $image_path_full = time() . $image_path->getClientOriginalName();

            // Guardar en la carpeta storage (storage/app/users)
            Storage::disk('users')->put($image_path_full, File::get($image_path));

            // Modificar la variable imag_path al nombre de la imagen nueva
            $user->image = $image_path_full;
        }

        // Ejecutar consulta y cambios en la base de datos
        $user->update();

        DB::select(DB::raw("CALL add_log (:Param1, :Param2, :Param3)"), [
            ':Param1' => \Auth::user()->nick,
            ':Param2' => \Auth::user()->role,
            ':Param3' => 'User ' . $user->nick . ' updated his own profile'
        ]);

        return redirect()->route('user.profile')
                        ->with(['message_success' => 'Your profile has been updated succesfully']);
    }

    public function admin_updateprofile(Request $request) {

        // Conseguir datos del usuario al que modificamos en el formulario a partir del id
        $id = $request->input('id');
        $user = User::find($id);

        // Validación de formulario
        $validate = $this->validate($request, [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'nick' => 'required|string|max:255|unique:users,nick,' . $id,
            'phonenumber' => 'required|min:9|max:9|numeric',
            'role' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id
        ]);

        // Recoger datos del formulario
        $name = $request->input('name');
        $surname = $request->input('surname');
        $nick = $request->input('nick');
        $phonenumber = $request->input('phonenumber');
        $role = $request->input('role');
        $email = $request->input('email');

        // Asignar nuevos valores al objeto de usuario
        $user->name = $name;
        $user->surname = $surname;
        $user->nick = $nick;
        $user->phonenumber = $phonenumber;
        $user->role = $role;
        $user->email = $email;

        // Subir la imagen
        $image_path = $request->file('image_path');
        if ($image_path) {
            // Poner nombre único
            $image_path_full = time() . $image_path->getClientOriginalName();

            // Guardar en la carpeta storage (storage/app/users)
            Storage::disk('users')->put($image_path_full, File::get($image_path));

            // Modificar la variable imag_path al nombre de la imagen nueva
            $user->image = $image_path_full;
        }

        // Ejecutar consulta y cambios en la base de datos
        $user->update();

        DB::select(DB::raw("CALL add_log (:Param1, :Param2, :Param3)"), [
            ':Param1' => \Auth::user()->nick,
            ':Param2' => \Auth::user()->role,
            ':Param3' => 'User ' . $user->nick . ' has been updated'
        ]);

        return redirect()->route('user.admin_editprofile', ['id' => $id])
                        ->with(['message_success' => 'This profile has been updated successfully']);
    }

    public function getImage($filename) {
        $file = Storage::disk('users')->get($filename);
        return new Response($file, 200);
    }

    public function delete($id) {
        if (\Auth::user()->role == 'admin') {
            $user = User::find($id);
            $user->delete();

            DB::select(DB::raw("CALL add_log (:Param1, :Param2, :Param3)"), [
                ':Param1' => \Auth::user()->nick,
                ':Param2' => \Auth::user()->role,
                ':Param3' => 'User ' . $user->nick . ' has been deleted'
            ]);

            return redirect()->route('home')
                            ->with(['message_success' => 'The user has been successfully deleted']);
        } else {
            return redirect()->route('home')
                            ->with(['message_error' => 'You are not authorized']);
        }
    }

    public function activate($id) {
        if (\Auth::user()->role == 'admin') {
            $user = User::find($id);
            $user->active = TRUE;
            $user->update();

            return redirect()->route('user.active_list')
                            ->with(['message_success' => 'The user has been successfully activated']);
        } else {
            return redirect()->route('home')
                            ->with(['message_error' => 'You are not authorized']);
        }
    }

    public function search() {
        return view('user.search');
    }

    public function search_send(Request $request) {

        // Conseguir datos del formulario
        $criterion = $request->input('criterion');
        $field = $request->input('field');

        // Validación de formulario
        $validate = $this->validate($request, [
            'criterion' => 'required|string|max:255',
            'field' => 'required|string'
        ]);

        $users = User::where($field, 'LIKE', '%' . $criterion . '%')
                ->where('active', TRUE)
                ->paginate(5);

        return view('user.list', ['users' => $users]);
    }

    public function curriculum() {

        return view('user.curriculum');
    }

    public function curriculum_update(Request $request) {

        // Recogemos el contenido del formulario
        $content = $request->input('content');

        // Cogemos el usuario que modificará su currículum
        $user = \Auth::user();
        $user->curriculum = $content;

        // Actualizamos al usuario
        $user->update();

        return redirect()->route('user.curriculum')
                        ->with(['message_success' => 'Your curriculum vitae has been successfully updated']);
    }

    public function logs() {
        if (\Auth::user()->role == 'admin') {

            $logs = DB::table('logs')->paginate(5);

            return view('user.logs', ['logs' => $logs]);
        } else {
            return redirect()->route('home')
                            ->with(['message_error' => 'You are not authorized']);
        }
    }

    public function pdflists() {
        if (\Auth::user()->role == 'admin') {
            return view('pdf.lists');
        } else {
            return redirect()->route('home')
                            ->with(['message_error' => 'You are not authorized']);
        }
    }

    public function pdf_activeusers() {
        if (\Auth::user()->role == 'admin') {
            $users = User::where('active', TRUE)->get();

            $pdf = PDF::loadView('pdf.userlist', compact('users'));

            return $pdf->stream('active-users.pdf');
        } else {

            return redirect()->route('home')
                            ->with(['message_error' => 'You are not authorized']);
        }
    }

    public function pdf_inactiveusers() {
        if (\Auth::user()->role == 'admin') {
            $users = User::where('active', FALSE)->get();

            $pdf = PDF::loadView('pdf.userlist', compact('users'));

            return $pdf->stream('inactive-users.pdf');
        } else {

            return redirect()->route('home')
                            ->with(['message_error' => 'You are not authorized']);
        }
    }

    public function pdf_logs() {
        if (\Auth::user()->role == 'admin') {
            $logs = DB::table('logs')->get();

            $pdf = PDF::loadView('pdf.logs', compact('logs'));

            return $pdf->stream('server-logs.pdf');
        } else {

            return redirect()->route('home')
                            ->with(['message_error' => 'You are not authorized']);
        }
    }

    public function pdf_curriculum($id) {
        if (\Auth::user()->role == 'admin') {
            $user = User::find($id);

            $curriculum = $user->curriculum;

            $pdf = PDF::loadHTML($curriculum);

            return $pdf->stream('curriculum.pdf');
        } else {

            return redirect()->route('home')
                            ->with(['message_error' => 'You are not authorized']);
        }
    }

    public function mail_write() {
        if (\Auth::user()->role == 'admin') {

            $users = User::all();
            return view('mail.form', ['users' => $users]);
        } else {

            return redirect()->route('home')
                            ->with(['message_error' => 'You are not authorized']);
        }
    }

    public function mail_send(Request $request) {
        if (\Auth::user()->role == 'admin') {

            // Validación de formulario
            $validate = $this->validate($request, [
                'subject' => 'required|string|max:255',
                'message' => 'required|string|max:255',
                'addressee' => 'required'
            ]);

            // Recogemos los datos del formulario
            $data = ['content' => $request->input('message'), 'subject' => $request->input('subject'), 'addressee' => $request->input('addressee')];

            Mail::send('mail.send', $data, function($mail) use($data) {
                $mail->to($data['addressee'])
                        ->subject($data['subject'])
                        ->from('iessansebastian.servidor@gmail.com', 'Laravel Application - Admin ('. \Auth::user()->nick . ')')
                        ->sender('iessansebastian.servidor@gmail.com', 'Laravel Application - Admin ('. \Auth::user()->nick . ')')
                        ->replyTo('iessansebastian.servidor@gmail.com', 'Laravel Application - Admin ('. \Auth::user()->nick . ')');
            });

            if (Mail::failures()) {
                return redirect()->route('mail.form')
                                ->with(['message_error' => 'The e-mail has not been delivered']);
            } else {
                DB::select(DB::raw("CALL add_log (:Param1, :Param2, :Param3)"), [
                    ':Param1' => \Auth::user()->nick,
                    ':Param2' => \Auth::user()->role,
                    ':Param3' => 'E-Mail sent to ' . $data['addressee']
                ]);

                return redirect()->route('mail.form')
                                ->with(['message_success' => 'The e-mail has been successfully delivered to its addressee']);
            }
        } else {

            return redirect()->route('home')
                            ->with(['message_error' => 'You are not authorized']);
        }
    }

}
