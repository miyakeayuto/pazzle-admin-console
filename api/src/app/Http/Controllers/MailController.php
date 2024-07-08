<?php

namespace App\Http\Controllers;

use App\Http\Resources\MailResource;
use App\Models\Mail;

class MailController extends Controller
{
    public function index()
    {
        $mails = Mail::select([
            'mails.id as id',
            'mails.title as title',
            'mails.text as text',
            'items.name as items_name',
            'amount'
        ])
            ->join('items', 'items.id', '=', 'mails.item_id')
            ->get();

        return response()->json(
            MailResource::collection($mails)
        );
    }
}
