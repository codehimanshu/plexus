<?php

namespace App\Http\Controllers\Event;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Validator;
use Session;
use Auth;
use Redirect;
use App\Event;
use App\Question;
use File;

class QuestionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(
            'society'
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return File::get(public_path()."/backoffice/pages/manageQuestion.html");

    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  int $eventId
     * @return \Illuminate\Http\Response
     */
    public function create($eventId)
    {
        $event = Event::find($eventId);
        if ($event != "") {
            switch ($event->type) {
            case 1:
                return File::get(
                    public_path()."/backoffice/pages/addQuestion1.html"
                );
                break;
            case 2:
                return File::get(
                    public_path()."/backoffice/pages/addQuestion2.html"
                );
                break;

            case 3:
                return File::get(
                    public_path()."/backoffice/pages/addQuestion3.html"
                );
                break;

            default:
                return File::get(
                    public_path()."/backoffice/pages/addEvent.html"
                );
                break;
            }
        }
        return File::get(public_path()."/backoffice/pages/addEvent.html");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


    }

    /**
     * Display the specified resource.
     *
     * @param  int $eventId
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($eventId, $id)
    {
        $question = Question::where(
            [
            ['id', $id],
            ['eventId', $eventId]
            ]
        );

        if ($question == "") {
            /*return Response::json([
                "status" => False,
                "error" => 'Not Found'
            ]);*/
            return File::get(
                public_path()."/backoffice/pages/index.html"
            );
        }

        return File::get(
            public_path()."/backoffice/pages/manageQuestion.html"
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $eventId
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($eventId, $id)
    {
        $question = Question::where(
            [
            ['id', $id],
            ['eventId', $eventId]
            ]
        );

        if ($question == "") {
            /*return Response::json([
                "status" => False,
                "error" => 'Not Found'
            ]);*/
            return File::get(
                public_path()."/backoffice/pages/index.html"
            );
        }

        return File::get(public_path()."/backoffice/pages/manageQuestion.html");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
