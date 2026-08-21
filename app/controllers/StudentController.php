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
// Display student profile
$student = [
    'student_id' => 'MCC2024-00127',
    'name' => 'Khate Lyn M. De Leon',
    'course' => 'BS Information Technology',
    'year' => '3rd Year',
    'section' => 'F3',
    'email' => 'khatelyndeleon@gmail.com',
    'address' => 'Brgy. Subaan, Socorro, Oriental Mindoro, Philippines',
    'contact_number' => '+63 912 996 3316',
    'skills' => ['Video Editing', 'Content Creation', 'UI/UX Design'],
    'hobbies' => ['Watching Movies', 'Traveling', 'Exploring Something New'],
    
];
$this->call->view('student_profile', $student);
}
}