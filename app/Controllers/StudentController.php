<?php
namespace App\Controllers;
use App\Models\StudentModel;

class StudentController extends BaseController {
    private $studentModel;

    public function __construct() {
        $this->studentModel = new StudentModel();
    }

    public function index() {
        return view('studenfrom');
    }

    public function fetchAll() {
        $students = $this->studentModel->findAll();
        return $this->response->setJSON(['students' => $students]);
    }

    public function insert() {

        $validationRules = [
            'firstname' => 'required|min_length[3]|max_length[100]',
            'lastname'  => 'required|min_length[3]|max_length[100]',
            'address'   => 'required|min_length[5]',
            'email'     => 'required|valid_email',
            'gender' => 'required|in_list[Male,Female]',
            'pincode'   => 'required|regex_match[/^[0-9]{6}$/]',
            'course'    => 'required',
            'image'     => 'uploaded[image]|is_image[image]|max_size[image,2048]'
        ];
    
        if (!$this->validate($validationRules)) {
            return $this->response->setJSON(['status' => 'error', 'errors' => $this->validator->getErrors()]);
        }
        
        $student = $this->request->getPost();
        $image = $this->request->getFile('image');
        if ($image && $image->isValid() && !$image->hasMoved()) {
            $imageName = $image->getRandomName();
            $image->move(ROOTPATH . 'public/uploads', $imageName);
            $student['image'] = $imageName;
        }

        if ($this->studentModel->insert($student)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Student successfully inserted.']);
        }
        return $this->response->setJSON(['status' => 'error', 'message' => 'Insertion failed.']);
    }

    public function edit($id) {
        $student = $this->studentModel->find($id);
        return $this->response->setJSON(['student' => $student]);
    }

    public function update($id) {
        $data = $this->request->getPost();
        $image = $this->request->getFile('image');

        if ($image && $image->isValid() && !$image->hasMoved()) {
            $imageName = $image->getRandomName();
            $image->move(ROOTPATH . 'public/uploads', $imageName);
            $data['image'] = $imageName;
        }

        if ($this->studentModel->update($id, $data)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Student successfully updated.']);
        }
        return $this->response->setJSON(['status' => 'error', 'message' => 'Update failed.']);
    }

    public function delete($id) {
        
        $student = $this->studentModel->find($id);
        if (!$student) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Student not found.']);
        }
    
        
        if ($this->studentModel->delete($id)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Student deleted successfully.']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to delete student.']);
        }
    }
    public function fetchUser($id)
    {
      

     
        $student = $this->studentModel->find($id);
        if ($student) {
            return $this->response->setJSON(['status' => 'success', 'data' => $student]);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'User not found']);
        }
    }
}
?>
