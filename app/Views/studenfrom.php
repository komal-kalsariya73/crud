<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background-color: #f0f8ff; }
        .form-container {
            max-width: 900px;
            margin: auto;
            padding: 2rem;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: none;
        }
        h3 { margin-bottom: 1.5rem; }
        .btn-submit { width: 100%; padding: 12px; }
        .input-group-text { background-color: #f8f9fa; }
        .form-control { height: 40px; }
        .table-container { margin-top: 30px; }
    </style>
</head>
<body>

<div class="container mt-5">
    <button class="btn btn-primary mb-3" id="addStudentBtn">Add Student</button>

    <div class="form-container" id="studentFormContainer">
        <h3 class="text-center text-primary">Student Registration Form</h3>
        <form id="studentform" enctype="multipart/form-data">
            <input type="hidden" id="studentId" name="id">

            <!-- Two Column Form Fields -->
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="firstname" class="form-label">First Name</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter your First Name">
                       
                    </div>
                    <div class="error-message text-danger" id="error-firstname"></div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="lastname" class="form-label">Last Name</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter your Last Name">
                      
                    </div>
                    <div class="error-message text-danger" id="error-lastname"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="address" class="form-label">Address</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-house-door"></i></span>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Enter your Address">
                      
                    </div>
                    <div class="error-message text-danger" id="error-address"></div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email ID</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your Email" >
                       
                    </div>
                    <div class="error-message text-danger" id="error-email"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Gender</label><br>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="female" name="gender" value="Female"> 
                        <label class="form-check-label" for="female">Female</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="male" name="gender" value="Male">
                        <label class="form-check-label" for="male">Male</label>
                    </div>
                    <div class="error-message text-danger" id="error-gender"></div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="pincode" class="form-label">Pincode</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                        <input type="text" class="form-control" id="pincode" name="pincode" placeholder="Enter Pincode">
                    </div>
                    <div class="error-message text-danger" id="error-pincode"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="course" class="form-label">Course</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-book"></i></span>
                        <select class="form-select" id="course" name="course">
                            <option value="">Choose...</option>
                            <option value="BCA">BCA</option>
                            <option value="MCA">MCA</option>
                            <option value="BCOM">BCOM</option>
                            <option value="MCOM">MCOM</option>
                        </select>
                    </div>
                    <div class="error-message text-danger" id="error-course"></div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="image" class="form-label">Profile Image</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    <div id="currentProfileImage"></div>
                    <div class="error-message text-danger" id="error-image"></div>
                </div>
             
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-dark btn-submit w-25">Submit</button>
            </div>
            <div id="responseMessage" class="mt-3"></div>
        </form>
    </div>

    <!-- Student Data Table -->
    <div class="table-container" id="studentTableContainer">
        <h4 class="text-center mt-4">Student Data</h4>
        <table class="table table-striped" id="studentTable">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Address</th>
                    <th>Gender</th>
                    <th>Pincode</th>
                    <th>Course</th>
                    <th>Email</th>
                    <th>image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    
    fetchStudents();

    
    function fetchStudents() {
        $.ajax({
            url: '/student/fetchAll',
            method: 'GET',
            success: function (response) {
                let rows = '';
                response.students.forEach(student => {
                    rows += `
                        <tr id="student-${student.id}">
                            <td>${student.firstname}</td>
                            <td>${student.lastname}</td>
                            <td>${student.address}</td>
                            <td>${student.gender}</td>
                            <td>${student.pincode}</td>
                            <td>${student.course}</td>
                            <td>${student.email}</td>
                           <td><img src='uploads/${student.image}' alt='Profile Image' width='100' height='100'></td>
                            <td>
                               
                                <button class="btn btn-warning btn-sm editBtn" data-id="${student.id}">Edit</button>

                                <button class="btn btn-danger btn-sm deleteBtn" data-id="${student.id}">Delete</button>
                            </td>
                        </tr>`;
                });
                $('#studentTable tbody').html(rows);
            }
        });
    }

    // Show form when "Add Student" button is clicked
    $('#addStudentBtn').click(function() {
        $('#studentFormContainer').show();
        $('#studentTableContainer').hide();
        $('#addStudentBtn').hide();
    });

    // Handle form submission
    $('#studentform').on('submit', function (e) {
        e.preventDefault();
        let formData = new FormData(this);
        const isUpdate = $('#studentId').val() !== '';
        const url = isUpdate ? '/student/update/' + $('#studentId').val() : '/student/insert';
       
        $(".error-message").html("");
        $.ajax({
            url: url,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {

                if(response.status=='error'){
                  
                    let errors = response.errors;
                            for (let key in errors) {
                                $("#error-" + key).html(errors[key]);
                            }
           
                }
                else{
                $('#responseMessage').html('<p class="text-success">' + response.message + '</p>');
                $('#studentform')[0].reset();
                fetchStudents();
                $('#studentFormContainer').hide();
                $('#studentTableContainer').show();
                $('#addStudentBtn').show();
                }
            },
            error: function () {
                $('#responseMessage').html('<p class="text-danger">An error occurred.</p>');
            }
        });
    });

    $(document).on('click', '.editBtn', function () {
        const id = $(this).data('id');
        $.ajax({
            url: '/student/edit/' + id,
            method: 'GET',
            success: function (response) {
                const student = response.student;
                
                $('#studentId').val(student.id);
                $('#firstname').val(student.firstname);
                $('#lastname').val(student.lastname);
                $('#address').val(student.address);
                $('#email').val(student.email);
                $(`input[name="gender"][value="${student.gender}"]`).prop('checked', true);
                $('#pincode').val(student.pincode);
                $('#course').val(student.course);
                if (student.image) {
                    $("#currentProfileImage").html(
                        `<p>Current Image: <a href="/uploads/${student.image}" target="_blank">${student.image}</a></p>`
                    );
                }
                $('.btn-submit').text('Update'); 
            
                $('#studentFormContainer').show();
                $('#studentTableContainer').hide();
                $('#addStudentBtn').hide();
            }
        });
    });
    $(document).on('click', '.deleteBtn', function () {
    var studentId = $(this).data('id');

    if (confirm('Are you sure you want to delete this student?')) {
        $.ajax({
            url: '/student/delete/' + studentId,
            method: 'DELETE',
            success: function(response) {
                alert(response.message);
                fetchStudents();  // Refresh the student list after deletion
            },
            error: function() {
                alert('Error occurred while deleting.');
            }
        });
    }
});
});
</script>

</body>
</html>
