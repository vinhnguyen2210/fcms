<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function export($type)
    {
        $data = Contact::get()->toArray();
        return Excel::create('contacts-list', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }
}
