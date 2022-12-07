@extends ('layout/teacher-layout')

@section('space-work')


<h2 class="mb-4">Exams</h2>
     <!-- Button trigger modal -->
     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addExamModal">
        Add Exam
      </button>
      <table class="table">
        <thead class="thead-light">
          <tr>
            <th scope="col">#</th>
            <th >Exam Name</th>
            <th >Subject</th>
            <th >Date</th>
            <th >Time</th>
            <th >Delete</th>
          </tr>
        </thead>
        <tbody>

            @if(count($exams) > 0)
                
                @foreach ($exams as $exam)
                   <tr>
                         <td>{{ $exam->id }}</td>
                         <td>{{ $exam->exam_name }}</td>
                         <td>{{ $exam->subjects[0]['subject'] }}</td>
                         <td>{{ $exam->date }}</td>
                         <td>{{ $exam->time }} Hrs</td>
                         {{-- <td> --}}
                           {{-- <button class="btn btn-info editButton" data-id="{{ $subject->id }}" data-subject="{{ $subject->subject }}" data-toggle="modal" data-target="#editSubjectModel">Edit</button> --}}
                         {{-- </td> --}}
                         <td>
                            <button class="btn btn-danger deleteButton" data-id="{{ $exam->id }}" data-toggle="modal" data-target="#deleteExamModal">Delete</button> 
                         </td>
                   </tr>
                    
                @endforeach
 
            @else
            <tr>
                 <td colspan="5">Exams not Found!</td>
            </tr>
            @endif
 
         </tbody>

      </table>

       <!-- Modal -->
       <div class="modal fade" id="addExamModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Exam</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form id = "addExam">
                @csrf
                    <div class="modal-body">
                        <label>Exam</label>
                        <input type="text" name = "exam_name" placeholder="Enter Exam Name" class ="w-100" required>
                        <br><br>
                        <select name="subject_id" required class="w-100">
                            <option value =""> Select Subject</option>
                            @if(count($subjects)>0)
                                @foreach($subjects as $subject)
                                    <option value = "{{ $subject ->id }}">{{ $subject ->subject }}</option>
                                @endforeach
                            @endif
                        </select>

                        <br><br>
                        <input type="date" name = "date"  class ="w-100" required min = "@php echo date('Y-m-d'); @endphp">
                        <br><br>
                        <input type="time" name = "time"  class ="w-100" required>

                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
      </div>


      <!--Delete Exam Modal -->
      <div class="modal fade" id="deleteExamModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Delete Exam</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form id = "deleteExam">
                @csrf
                  <div class="modal-body">
                    <h5>Are you sure you want to delete?</h5>
                    <input type="hidden" name = "exam_id"  id ="deleteExamId" >
                  </div>
                  <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-danger">Delete</button>
                  </div>
                </form>
              </div>
        </div>
      </div>



      <script>
        $(document).ready(function(){

           // add exam
           
            $("#addExam").submit(function(e){
                    e.preventDefault();

                    var formData = $(this).serialize();

                    $.ajax({
                            url: "{{ route('addExam') }}",
                            type:"POST",
                            data:formData,
                            success:function(data){
                                    if(data.success == true)
                                    {
                                            location.reload();
                                    }
                                    else{
                                            alert(data.msg);
                                    }
                            }
                    });
            });


            // delete exam


            $(".deleteButton").click(function(){
                  var id = $(this).attr('data-id');
                  $("#deleteExamId").val(id);
                });

                $("#deleteExam").submit(function(e){
                        e.preventDefault();

                        var formData = $(this).serialize();

                        $.ajax({
                                url: "{{ route('deleteExam') }}",
                                type:"POST",
                                data:formData,
                                success:function(data){
                                        if(data.success == true)
                                        {
                                                location.reload();
                                        }
                                        else{
                                                alert(data.msg);
                                        }
                                }
                        });
                });


        });
    </script>

@endsection