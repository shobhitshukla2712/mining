<?php

namespace App\Http\Controllers;

use App\Answer;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;

use Validator;
use App\User;

class AdminController extends Controller
{
    public function index()
    {
        if( Auth::check() || Auth::viaRemember() )	
        {
        	return redirect('admin/dashboard');
        }
        else 					
        {
        	return view('admin/index');
        }
    }

    public function login(Request $request)
    {
        $frmData = $request->get('frmData');
        parse_str($frmData, $loginData);

        $remember = false;
        if( isset( $loginData['remember'] ) )
        {
            $remember = true;
        }
        $response =array();

        $validation = Validator::make(
            array(
                'username'  => $loginData['username'],
                'password'  => $loginData['password']
            ),
            array(
                'username'  => array('required'),
            ),
            array(
                'username.required' => 'Please enter username',
                'password.required' => 'Please enter password'
            )
        );

        if ( $validation->fails() ) 
        {
            $error = $validation->errors()->first();

            if( isset( $error ) && !empty( $error ) )
            {
                $response['resCode']    = 1;
                $response['resMsg']     = $error;
            }
        }
        else
        {
            $user = User::where(['username' => $loginData['username'], 'role_id' => '0'])->first();
            if( !is_null( $user ) && ( $user->count() > 0 ) )
            { 
                    if(Auth::attempt(['username' => $loginData['username'], 'password' => $loginData['password'], 'role_id' => '0']))
                    {
                        $userId = Auth::id();
                        $user = User::find($userId);

                        $response['resCode']    = 0;
                        $response['resMsg']     = 'Successful login';
                        $response['redirectTo'] = url('admin/dashboard');
                    }
                    else
                    {
                        $response['resCode']    = 2;
                        $response['resMsg']     = 'Invalid user credentials';
                    }
            }
            else
            {
                $response['resCode']    = 4;
                $response['resMsg']     = 'Invalid user credentials';
            }
        }

        return response()->json($response);
    }

    public function logout()
    {
        Auth::logout();
        
        return redirect('/admin');
    }

    public function dashboard()
    {

        return view('admin/dashboard');
    }

    public function report()
    {
        $role = DB::table('role')
        ->select('role.*')
        ->orderBy('role.id')
        ->get();
        
        return view('admin/report',['role' => $role]);
    }

    public function profile()
    {
        return view('admin/profile');
    }

    public function changePassword(Request $request)
    {
        $frmData = $request->get('frmData');
        parse_str($frmData, $profileData);
        $password = $profileData['password'];
        $userId = Auth::id();
        $user = User::find($userId);

        $user->password = Hash::make($password);

        if( $user->update() )
        {
            $response['resCode']    = 0;
            $response['resMsg']     = 'Password updated successfully';
        }
        else
        {
            $response['resCode']    = 1;
            $response['resMsg']     = 'Some issue in password update!';
        }

        return response()->json($response);
    }

    public function getExport(Request $request){
        $date =  $request->input('start_date');
        $role_id = $request->input('role');
        $fileName = 'report.csv';

        $report_data =   Answer::select(
            'answers.answer as answer',
            'answers.content as content',
            'answers.created_at as AnswerDate',
            'question.question as question',
            'role.name as role',
            'users.username as username'
        )
            ->leftjoin('question', 'question.id', '=', 'answers.question_id')
            ->leftjoin('role', 'role.id', '=', 'answers.role_id')
            ->leftjoin('users', 'users.id', '=', 'answers.user_id')
            ->where('answers.role_id', $role_id)
            ->where('answers.created_at', $date)
            ->get();

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('question', 'answer', 'content', 'AnswerDate','role', 'username');

        $callback = function() use($report_data, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($report_data as $report_da) {
                $row['question']    = $report_da->question;
                $row['answer']      = $report_da->answer;
                $row['content']     = $report_da->content;
                $row['AnswerDate']  = $report_da->AnswerDate;
                $row['role']        = $report_da->role;
                $row['username']    = $report_da->username;

                fputcsv($file, array($row['question'], $row['answer'], $row['content'], $row['AnswerDate'], $row['role'], $row['username']));
            }

            fclose($file);
        };
        return response()->stream($callback, 200, $headers);
    }

}