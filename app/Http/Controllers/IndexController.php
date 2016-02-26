<?php

namespace App\Http\Controllers;

use App\Feedback;
use App\ImageManager;
use App\User;
use Auth;
use DB;
use Redirect;
use Request;
use Session;
use App\Http\Controllers\Controller;


class IndexController extends Controller
{
    //

    public function welcome()
    {
        if (Auth::check()) {
            return redirect('dashboard');
        } else {
            return response()->view("welcome");
        }
    }


    public function feedback()
    {
        if (Auth::check()) {
            return response()->view("feedback");
        } else {
            return response()->view("welcome");
        }
    }

    public function saveFeedback()
    {
        $id = Auth::user()->id;
        $title = Request::get("title");
        $description = Request::get("description");

        $feedback = new Feedback();
        $feedback->title = $title;
        $feedback->description = $description;
        $feedback->rating = 5;
        $feedback->postedby = $id;

        if ($feedback->save()) {
            $json = array('result' => true);
            return response()->json($json);
        } else {
            $json = array('result' => false);
            return response()->json($json);
        }
    }


    public function imageUpload()
    {
        $file = Request::file('file');
        $imageid = str_random();
        $imageName = $imageid . '.' . $file->getClientOriginalExtension();
        $file->move(base_path() . '/storage/uploads/images/', $imageName);

        $imageManager = new ImageManager();
        $imageManager->name = $imageName;
        $imageManager->url = env("BASE_URL") . '/storage/uploads/images/' . $imageName;
        $imageManager->imageid = $imageid;

        if ($imageManager->save()) {
            $array = array(
                'url' => env("BASE_URL") . '/storage/uploads/images/' . $imageName,
                'id' => $imageid
            );

            return response()->json($array);
        } else {

            $array = array(
                'url' => env("BASE_URL") . '/storage/uploads/images/feature_error.png',
                'id' => $imageid
            );
            return response()->json($array);
        }
    }

    public function imageManager()
    {

        $images = ImageManager::all();
        $responseArray = array();

        foreach ($images as $image) {
            array_push($responseArray, array(
                'thumb' => $image->url,
                'url' => $image->url,
                'title' => $image->name,
                'id' => $image->imageid
            ));
        }

        return response()->json($responseArray);

    }

    public function loginValidate(Request $request, $username, $password)
    {
        if (!Auth::check()) {
            if (Auth::attempt(array('email' => $username, 'password' => $password, 'active' => true), true)) {
                $json = array('result' => true);
                return response()->json($json);
            } else {
                $json = array('result' => false);
                return response()->json($json);
            }
        }
        // return response()->json($json);
    }

    public function dashboard()
    {
        if (Auth::check()) {


            $user = Auth::user();


            config(['app.timezone' => 'America/Chicago']);
            return response()->view("dashboard");
        } else {
            return redirect('');
        }
    }

    public function logout()
    {
        Session::clear();
        Auth::logout();
        return redirect('');
    }
}
