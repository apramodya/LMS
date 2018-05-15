
<table><tr><td> <h1>Medical Submission For Attendance</h1></td><td><img src="C:\Users\ASUS\Desktop\LearningMS\LMS\public\storage\Project_Images\UCSC_logo.jpg" float="right" style="width:50px;height:40px;"></td></tr></table><br>
<hr>
                                <div class="form-group">
                                    <label for="fname"><strong>Name in Full: </strong></label>
                                    {{$student->first_name }} {{$student->last_name}}
                                </div>

                            <br>

                                <div class="form-group">
                                    <label for="degree"><strong>Degree: </strong></label>
                                    {{$student->degree}}
                                </div>
                            <br>

                                <div class="form-group">
                                    <label for="course_id"><strong>Course ID: </strong></label>
                                    {{$medical->course_id}}
                                </div>
                           <br>

                            <div class="form-group">
                                <label for="course_id"><strong>Year: </strong></label>
                                {{$medical->year}}
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="course_id"><strong>Semester: </strong></label>
                                {{$medical->semester}}
                            </div>
                            <br>

                            <div class="col-4">
                                <label for="name"><strong>Registration Number: </strong></label>
                                {{$student->index_number}}
                            </div>
                            <br>




                                <div class="form-group">
                                    <label for="causes"><strong>Causes for Absense: </strong></label>
                                   {{$medical->causes}}
                            </div>
                            <br>


                                <div class="form-group">
                                    <label for="remarks"><strong>Remarks [Optional]: </strong></label>
                                    {{$medical->remarks}}
                                </div>
                            <br>
<div>
    <label ><strong>Student's Statement</strong></label><br><br>
    I hereby Declare the above information are true and accurate to the best of my knowledge
</div>
<br><br><br>

<div>
    <label><strong>......................................</strong></label><br><br>
    <label><strong>Student's Signature</strong></label><br>
    <label> {{$student->index_number}}</label><br>
    <label>{{$student->first_name }} {{$student->last_name}}</label><br>
    <label>{{$medical->updated_at}}</label>
</div>
<hr>

