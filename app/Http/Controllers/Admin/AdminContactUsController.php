<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ContactUs;

class AdminContactUsController extends Controller
{
    
    public function index()
    {
       $data['messages'] = ContactUs::orderBy('created_at', 'DESC')->paginate(5);
       return view('admin.contactus.index', $data);
    }

 }