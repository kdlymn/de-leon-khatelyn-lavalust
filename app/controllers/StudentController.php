<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class StudentController extends Controller
{
    public function index()
    {
        $this->call->view('student_home.php');
    }

    public function profile()
    {
        
        $data = [
            'student_id' => '2024-00143',
            'name'       => 'Jayoffe Harvey A. Pascua',
            'course'     => 'BS Information Technology',
            'year'       => '3rd Year',
            'section'    => '3F3',
            'email'      => 'jayoffepascua@gmail.com',
            'skills'     => ['PHP', 'MySQL', 'HTML & CSS'],
            'hobbies'    => ['Reading', 'Music', 'Gaming'],
            'contact_number' => '0912 345 6789',
            'address'    => 'Davao City, Philippines',
        ];

        $this->call->view('student_profile', $data);
    }
}
