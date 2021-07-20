<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Session;
use App\User;
use App\Question;
use App\Answer;
use Validator;

class UserController extends Controller
{

    public function home(Request $request)
    {
        return view('home');
    }

    public function signup()
    {
        return view('signup');
    }

    public function login()
    {
        return view('login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function loginUser(Request $request)
    {
        $frmData = $request->get('frmData');
        parse_str($frmData, $regData);
        $response = array();
        $validation = Validator::make(
            array(
                'username'      => $regData['username'],
                'password'      => $regData['password']
            ),
            array(
                'password'  => array('required'),  
            ),
            array(
                'password.required' => 'Please enter password',
            )
        );

        if ($validation->fails()) {
            $error = $validation->errors()->first();
            if (isset($error) && !empty($error)) {
                $response['resCode']    = 1;
                $response['resMsg']     = $error;
            }
        } else {
            $user = User::where(['username' => $regData['username']])->first();
            if (!is_null($user) && ($user->count() > 0)) {
                if (Auth::attempt(['username' => $regData['username'], 'password' => $regData['password']])) {
                    $userId = Auth::id();
                    $user = User::find($userId);
                    $response['resCode']    = 0;
                    $response['resMsg']     = 'Successful login';
                    $response['redirectTo'] = url('/question');
                } else {
                    $response['resCode']    = 2;
                    $response['resMsg']     = 'Invalid user credentials';
                }
            } else {
                $response['resCode']    = 4;
                $response['resMsg']     = 'Invalid user credentials';
            }
        }
        return response()->json($response);
    }

    public function profile(Request $request)
    {
        $userId = Auth::id();

        $userDetails = User::find($userId);

        return view('profile', ['userDetails' => $userDetails]);
    }

    public function updateUserProfile(Request $request)
    {
        $fullname   = $request->input('fullname');
        $email      = $request->input('uemail');
        $mobile_no  = $request->input('mobile_no');
        $userId = Auth::id();
        $response =array();
        $validation = Validator::make(
            array(
                'fullname'  => $fullname,
                'email'     => $email,
                'mobile_no' => $mobile_no
            ),
            array(
                'fullname'  => array('required'),
                'email'     => array('required', 'email'),
                'mobile_no' => array('required','numeric'),
            ),
            array(
                'fullname.required' => 'Please enter full name',
                'email.required'    => 'Please enter email id',
                'email.required'    => 'Please enter valid email id',
                'mobile_no.required'=> 'Please enter mobile number',
                'mobile_no.required'=> 'Please enter valid mobile number'
            )
        );

        if ( $validation->fails() )
        {
            $error = $validation->errors()->first();

            if( isset( $error ) && !empty( $error ) )
            {
                $response['errCode']    = 1;
                $response['errMsg']     = $error;
            }
        }
        else
        {
            $user = User::find($userId);
            $user->name     = $fullname;
            $user->email    = $email;
            $user->mobile_no= $mobile_no;

            if ($user->save())
            {
                $response['resCode']    = 0;
                $response['resMsg']     = 'Profile updated successfully';
            }
            else
            {
                $response['resCode']    = 1;
                $response['resMsg']     = 'Some error profile update';
            }
        }

        return response()->json($response);
    }

    public function getQuestion(Request $request){

        $userId = Auth::id();
        $userDetails = User::find($userId);
        $role_id = $userDetails['role_id'];
        $user_id = $userDetails['id'];
        $current_date = date('Y-m-d');
        $is_question_data = Answer::where('answers.user_id', $user_id)
            ->where('answers.role_id', $role_id)
            ->whereDate('answers.created_at', $current_date)
            ->get();

           $user_ans_cnt = count($is_question_data);
           if($user_ans_cnt > 0){
            $question = '';
            return view('question', ['question' => $question, 'role_id' => $role_id, 'user_id' => $user_id , 'message' => 'You have already submitted todays questions. Thanks.']);
           }else{

            $question = DB::table('question')
            ->select('question.*')
            ->where('role_id',$role_id)
            ->orderBy('question.id')
            ->get();
            $ques_count = count($question);

            return view('question', ['question' => $question, 'ques_count' => $ques_count, 'role_id' => $role_id, 'user_id' => $user_id]);
           }
    }

    public function createPassword($password){
      echo  \Hash::make($password);
    }

    public function submit_question(Request $request){

        $user_id = $request->input('user_id');
        $role_id = $request->input('role_id'); 
        
        $data = json_decode(json_encode($request->all()), true);

        $cnt = $request->input('count')-1;
        for($i=0; $i<=$cnt; $i++){
            if(!empty($data['ans'.$i])){
                $detail = array('question_id'=>$data['ques_id'][$i],
                'user_id'=>$user_id,
                'role_id'=>$role_id,
                'answer'=>$data['ans'.$i],
                'content'=>$data['content'][$i],
                'created_at'=> date('Y-m-d'),
                'updated_at'=> date('Y-m-d'),
                );
                Answer::insert($detail);
            }
        }

         $question = '';
         return view('question', ['question' => $question, 'role_id' => $role_id, 'user_id' => $user_id, 'message' => 'Your answers has been submitted successfully.']);
    }

}
