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
            'student_id' => '2024-00127',
            'name'       => 'Khate Lyn M. De Leon',
            'course'     => 'BS Information Technology',
            'year'       => '3rd Year',
            'section'    => '3F3',
            'email'      => 'khatelyn.deleon@gmail.com',
            'skills'     => ['Video Editing', 'Content Creation', 'UI/UX Design'],
            'hobbies'    => ['Watching Movies', 'Traveling', 'Exploring Something New'],
            'contact_number' => '+6312 996 3316',
            'address'    => 'Brgy. Subaan, Socorro, Oriental Mindoro, Philippines',
        ];

        $this->call->view('student_profile', $data);
    }
}
