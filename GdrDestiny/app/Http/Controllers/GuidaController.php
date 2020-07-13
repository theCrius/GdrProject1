<?php

namespace App\Http\Controllers;

use App\Breed;
use Illuminate\Http\Request;

class GuidaController extends Controller
{
    public function getFileData($nameFolder){
        $filesToOpen=\Storage::files('/homeesterna/'.$nameFolder);
        $title=[];
        $text=[];
        natsort($filesToOpen); /* sort the array in the right way */
        if(!$filesToOpen) throw new \Exception('Errore, cartella o files non trovati');
        foreach($filesToOpen as $file){
            $text[]=\Storage::get($file); 
            $title[]=str_replace(['/','.txt'],'',substr($file,\strripos($file,'/')));
        }
        
        return [
            'text' =>$text,
            'title' => $title];
       

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAmbientazione()
    {   
       $ambientazione=$this->getFileData('Ambientazione');
     
        return view('ambientazione',[
            'ambientazioneText' => $ambientazione['text'],
            'ambientazioneTitle' => $ambientazione['title']
        ]);
    }

    public function indexRegolamento(){

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Breed  $breed
     * @return \Illuminate\Http\Response
     */
    public function show(Breed $breed)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Breed  $breed
     * @return \Illuminate\Http\Response
     */
    public function edit(Breed $breed)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Breed  $breed
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Breed $breed)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Breed  $breed
     * @return \Illuminate\Http\Response
     */
    public function destroy(Breed $breed)
    {
        //
    }
}
