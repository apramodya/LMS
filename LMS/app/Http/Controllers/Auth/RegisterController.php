<?php

namespace App\Http\Controllers\Auth;

use App\Lecturer;
use App\Student;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    protected $redirectTo = '/dashboard';

    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|string|max:255',
            'phone' => 'required|min:9|max:11',
            'registration_year' => 'min:4|max:4',
            'index_number' => 'min:8|max:8',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // if a student registration
        if ($data['type'] == 'student') {
            $user = User::create([
                'username' => $data['index_number'],
                'password' => Hash::make($data['index_number']),
                'type' => 'student'
            ]);

            $student = new Student();

            $student->first_name = $data['first_name'];
            $student->last_name = $data['last_name'];
            $student->email = $data['email'];
            $student->phone = $data['phone'];
            $student->registration_year = $data['registration_year'];
            $student->index_number = $data['index_number'];
            $student->user_id = $user->id;

            $student->save();
        }
        // if a lecturer registration
        elseif ($data['type'] == 'lecturer') {
            $user = User::create([
                'username' => $data['username'],
                'password' => Hash::make($data['username']),
                'type' => 'lecturer'
            ]);

            $lecturer = new Lecturer();

            $lecturer->first_name = $data['first_name'];
            $lecturer->last_name = $data['last_name'];
            $lecturer->email = $data['email'];
            $lecturer->phone = $data['phone'];
            $lecturer->user_id = $user->id;
            $lecturer->position_id = $data['position_id'];

            $lecturer->save();
        }

        return $user;
    }
}
