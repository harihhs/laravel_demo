<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Exception;

class ChangePasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/profile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Initiates Change Password Request
     *
     * @return void
     */
    public function requestPasswordChange(Request $request){
        try {
            $formData = $request->all();
            $validationRules = [
                'oldPassword' => 'required|string|min:8',
                'newPassword' => 'required|string|min:8|different:oldPassword',
                'confirmPassword' => 'required|string|min:8|same:newPassword'
            ];
            $validationMsgs = [
                'required' => 'This field is required',
                'different' => 'Please provide a different new password',
                'same' => 'Passwords do not match',
                'min' => 'A minimum of 8 Charachters is required'
            ];

            //Validating the input form data
            $request->validate($validationRules,$validationMsgs);
            
            //Match Old Password on Database
            SELF::validateOldPassword($formData);
            return redirect()->back()->with(['password_success'=>"Password Changed Successfully"]);
        } 

        //Handles the user-input-data validation errors
        catch (ValidationException $e) { 
            Log::debug("\nValidation Errors\n".print_r($e->errors(),true));
            return redirect()->back()->withErrors($e->errors());
        }

        //Handles general errors
        catch (Exception $e){
            return redirect()->back()->with(['password_error'=>$e->getMessage()]);
        }
    }

    /**
     * To verify the old Password
     *
     * @return void
     */
    private function validateOldPassword($formData){
        $user = Auth::user();
        if(Hash::check($formData['oldPassword'],$user->password)){
            $user->password = Hash::make($formData['newPassword']);
            $user->save();
        }
        else{
            throw new Exception("Invalid Old Password", 1);
        }
    }
}
