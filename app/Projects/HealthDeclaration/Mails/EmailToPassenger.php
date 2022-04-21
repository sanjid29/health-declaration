<?php

namespace App\Projects\HealthDeclaration\Mails;

use App\Projects\HealthDeclaration\Modules\Declarations\Declaration;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailToPassenger extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    protected $declaration;
    protected $message;
    /**
     * Create a new message instance.
     */
    public function __construct(Declaration $declaration)
    {
        $this->declaration = $declaration;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $message="You are Not allowed to Travel";
        if($this->declaration->decision=="You are Allowed to Travel"){
            $fileName = "Health Declaration-".$this->declaration->passenger_name.".pdf";
            $pdfLocation = public_path(config('mainframe.config.upload_root'))."Declaration of-".$this->declaration->passenger_name." on ".formatDateTime($this->declaration->created_at).".pdf";
            $message="You are allowed to Travel, Please download the attachment and show in the airport";
            $data=[
                'declaration'=>$this->declaration,
                'message'=>$message
            ];
            return $this->view('projects.health-declaration.emails.declaration.blank')
                ->subject('Health Declaration of '.$this->declaration->passenger_name)
                ->attach($pdfLocation,['as' => $fileName])
                ->with(['data' => $data]);
        }else{
            $data=[
                'declaration'=>$this->declaration,
                'message'=>$message
            ];
            return $this->view('projects.health-declaration.emails.declaration.blank')
                ->subject('Health Declaration of '.$this->declaration->passenger_name)
                ->with(['data' => $data]);
        }


    }
}