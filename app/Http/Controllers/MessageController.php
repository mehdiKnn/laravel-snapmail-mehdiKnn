<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageFormRequest;
use App\Mail\MailTrap;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Routing\UrlGenerator;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('form');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(MessageFormRequest $request, Message $message)
    {
        $mail = $request->get('mail');
        $message->message = $request->get('message');
        $message->photo_url = $request->file('file')->hashName();
        $token = Str::random(60);
        $message->token = $token;
        $message->save();

        $request->file('file')->store('public');

        $link= url()->current() .'/'. $token;

        Mail::to($mail)->send(new MailTrap($link));

        $request->session()->flash('status', 'Envoyé avec succés !');
        return redirect()->route('message.index');
    }

    /**
     * Display the specified resource.
     *
     * @param $token
     * @param \App\Message $message
     * @param $request
     * @return void
     */
    public function show($token, Message $message, Request $request)
    {
        $message = $message::where('token', $token)->get()->first();
        $message !== null ? $message::where('token', $token)->delete() : $request->session()->flash('status', 'Délai depassé message expiré');

       // dd($message);
        return view ('show', ['message'=>$message]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
