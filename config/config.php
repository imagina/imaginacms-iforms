<?php

return [

    /**
     * Used with Inotification
     * http://exampleurl.com/inotification/v1/preview-email?config=imodule.entityTestEmail
     */
    'leadTestEmail' => [
        "title" =>  "iform::lead.email.created.title",
        "message" => 'El mensaje',
        "content" => "iform::emails.lead",
        "extraParams" => [
            'lead' => fn() => Modules\Iform\Models\Lead::find(1),
            'form' => fn() => Modules\Iform\Models\Form::with('fields')->find(1),
        ],
    ]

];
