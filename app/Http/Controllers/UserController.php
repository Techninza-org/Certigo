<?php



namespace App\Http\Controllers;



use App\Models\ReportColor;

use App\Models\User;

use App\Models\GraphType;





use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Mail;





class UserController extends Controller
{



    // public function addUser(Request $request)
    // {



    //     // dd($request->all());

    //     $request->validate([

    //         'name' => 'required',

    //         'email' => 'required|email|unique:users',

    //         'role' => 'required',

    //         'designation' => 'required',

    //         'password' => 'required',

    //         'cpass' => 'required'

    //     ]);



    //     $allUsers = User::all();



    //     $emailExists = User::where(['email' => $request->email])->exists();

    //     if ($emailExists) {

    //         return redirect()->back()->with('error', 'Email already exists!');

    //     } else {

    //         if ($request->password === $request->cpass) {

    //             $user = new User();

    //             $user->name = $request->name;

    //             $user->email = $request->email;

    //             $user->role = $request->role;

    //             $user->string = $request->password;


    //             $user->designation = $request->designation;

    //             $user->password = bcrypt($request->password);

    //             $user->save();



    //             // Sending password to  mail 

    //             $data = array(

    //                 'name' => $request->name,

    //                 'email' => $request->email,

    //                 'password' => $request->password

    //             );

    //             // dd($request->company_emailid);

    //             Mail::send('mail', $data, function ($message) use ($request) {

    //                 $message->to($request->email, 'Certigo QAS')->subject

    //                 ('New User Created');

    //                 $message->from('sanurag0022@gmail.com', 'Certigo QAS');

    //             });

    //             return redirect()->back()->with('success', 'User created successfuly')->withInput(['allUsers' => $allUsers]);





    //         } else {

    //             return redirect()->back()->with('error', 'Confirm password does not match!')->withInput(['allUsers' => $allUsers]);



    //         }

    //     }



    // }
    public function addUser(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'role' => 'required',
            'designation' => 'required',
            'password' => 'required',
            'cpass' => 'required'
        ]);

        $allUsers = User::all();

        $emailExists = User::where(['email' => $request->email])->exists();
        if ($emailExists) {
            return redirect()->back()->with('error', 'Email already exists!');
        } else {
            if ($request->password === $request->cpass) {
                $user = new User();
                $user->name = $request->name;
                $user->email = $request->email;
                $user->role = $request->role;
                $user->designation = $request->designation;
                $user->password = bcrypt($request->password);
                $user->save();

                // Sending password to mail
                $data = [
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => $request->password
                ];

                try {
                    Mail::send('mail', $data, function ($message) use ($request) {
                        $message->to($request->email, 'Certigo QAS')->subject('New User Created');
                        $message->from('sanurag0022@gmail.com', 'Certigo QAS');
                    });

                    return redirect()->back()->with('success', 'User created successfully')->withInput(['allUsers' => $allUsers]);
                } catch (\Exception $e) {
                    return redirect()->back()->with('error', 'User created but failed to send email ');
                }
            } else {
                return redirect()->back()->with('error', 'Confirm password does not match!')->withInput(['allUsers' => $allUsers]);
            }
        }
    }




    public function editUser(Request $request)
    {

        $request->validate([

            'userId' => 'required'

        ]);



        $user = User::where(['id' => $request->userId])->first();

        return view('users.edit', ['user' => $user]);

    }



    public function editUserDetails(Request $request)
    {

        $request->validate([

            'userId' => 'required',

            'name' => 'required',

            'email' => 'required',

            'role' => 'required',

            'designation' => 'nullable'



        ]);



        $data = $request->all();

        // dd($data);

        $user = User::where(['id' => $request->userId])->first();

        $user->update($data);

        // return redirect()->back()->with('users.edit');

        return redirect()->back()->with('success', 'User updated successfully')->withInput(['user' => $user]);



    }



    public function updateUserPass(Request $request)
    {

        $request->validate([

            'userId' => 'required',

            'curr_pass' => 'required',

            'new_pass' => 'required',

            'c_new_pass' => 'required'

        ]);



        $user = User::find($request->userId);





        if ($request->new_pass === $request->c_new_pass) {



            if (Hash::check($request->input('curr_pass'), $user->password)) {

                $newPass = bcrypt($request->input('new_pass'));

                $user->password = $newPass;

                $user->save();



                $data = array(

                    'name' => $user->name,

                    'email' => $user->email,

                    'password' => $request->new_pass

                );

                // dd($request->company_emailid);

                Mail::send('pass-update', $data, function ($message) use ($data) {

                    $message->to($data['email'], 'Certigo QAS')->subject

                    ('Certigo QAS password assistance');

                    $message->from(env('CERTIGO_EMAIL'), 'Certigo QAS');

                });



                return redirect()->back()->with('success', 'User updated successfully')->withInput(['user' => $user]);

            } else {

                return redirect()->back()->with('error', 'Entered wrong current password')->withInput(['user' => $user]);

            }

        } else {

            return redirect()->back()->with('error', 'Confirm password does not match')->withInput(['user' => $user]);

        }





    }



    public function delete_user(Request $request)
    {

        $id = $request->userId;

        $user = User::where(['id' => $id])->first();

        $user->delete();

        return redirect()->back()->with('User removed Successfully');



    }

    public function inactive_user(Request $request)
    {

        $user = User::where(['id' => $request->userId])->first();



        if ($user) {



            $user->status = 0;

            $user->save();

            return redirect()->back()->with('User got in-active Successfully');



        } else {

            return redirect()->back()->with('User not found');



        }



    }



    public function active_user(Request $request)
    {

        $user = User::where(['id' => $request->userId])->first();



        if ($user) {



            $user->status = 1;

            $user->save();

            return redirect()->back()->with('User got active Successfully');



        } else {

            return redirect()->back()->with('User not found');



        }



    }





    public function getColourPage()
    {



        $color = ReportColor::where(['type' => 1])->first();

        $colorInd = ReportColor::where(['type' => 2])->first();







        return view('report-colour', ['color' => $color, 'colorInd' => $colorInd]);

    }



    public function setColourPage(Request $request)
    {



        $color = ReportColor::where(['type' => 1])->first();

        $color->color = $request->color;

        if ($color->save()) {

            return redirect()->back()->with('success', 'Color updated');

        }

        return redirect()->back()->with('error', 'color not updated, try again');

        // return view('report-colour',['color'=>$color]);

    }



    public function setColourIndPage(Request $request)
    {



        $color = ReportColor::where(['type' => 2])->first();

        $color->color = $request->color;

        if ($color->save()) {

            return redirect()->back()->with('success', 'Color updated');

        }

        return redirect()->back()->with('error', 'color not updated, try again');

        // return view('report-colour',['color'=>$color]);

    }







    public function getGraphPage()
    {



        $color = GraphType::first();



        return view('graph-page', ['color' => $color]);

    }



    public function setGraphPage(Request $request)
    {



        $color = GraphType::first();

        $color->type = $request->type;

        if ($color->save()) {

            return redirect()->back()->with('success', 'Graph orientation updated');

        }

        return redirect()->back()->with('error', 'Graph orientation not updated, try again');

        // return view('report-colour',['color'=>$color]);

    }

}