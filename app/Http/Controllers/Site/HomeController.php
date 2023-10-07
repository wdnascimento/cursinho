<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\TableCode;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    private $student;
    private $table_code;

    function __construct(Student $students, TableCode $table_codes)
    {
        $this->student = $students;
        $this->table_code = $table_codes;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('site.home');
    }

    public function cadastro()
    {
        return redirect()->route('student.form');
    }
}
