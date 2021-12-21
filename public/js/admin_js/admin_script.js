$(document).ready(function() {
    // Check Admin Password is correct or not
    $("#current_password").keyup(function () {
        var current_password = $("#current_password").val();

        $.ajax({
            type:'post',
            url:'/admin/check-current-password',
            data:{
                current_password:current_password
            },
            success:function(response) {
                if(response=="false")
                {
                    $("#checkCurrentPassword").html("<font color=red>Current Password is Incorrect.");
                }else if(response=="true")
                {
                    $("#checkCurrentPassword").html("<font color=green>Current Password is Correct.");
                }
            },error:function(){
                alert("Error");
            }
        });

    });

   
    $(".add_task").on('click',function (e) {
        e.preventDefault();
        var title = $("#title").val();
        var description = $("#description").val();
        var date = $("#date").val();
        var completed_at = $("#completed_at").val();
        var status = $("#status").val();
        console.log(title, description, date, completed_at, status);

          $.ajax({
            type:'post',
            url:'/user/add-task',
            data:{
              title:title,
              description:description,
              date:date,
              completed_at:completed_at,
              status:status,
            },
            success:function(response) {
             alert('Task added successfully!');
            window.location.href = "view-todolist";
            },error:function(){
                alert("Error");
            }
        });
       
      }); 
      // For updating task 
      $(".edit-task").on('click',function (e) {
        e.preventDefault();
        var  id = $(this).attr("attr");
        var title = $(`#title-${id}`).val();
        var description = $(`#description-${id}`).val();
        var date = $(`#date-${id}`).val();
        var completed_at = $(`#completed_at-${id}`).val();
        var status = $(`#status-${id}`).val();
        console.log(title, description, date, completed_at, status,id);
        
          $.ajax({
            type:'post',
            url:'/user/add-task',
            data:{
              id :id,
              title:title,
              description:description,
              date:date,
              completed_at:completed_at,
              status:status,
            },
            success:function(response) {
                alert('Task added successfully!');
                 window.location.href = "view-todolist";
            },error:function(){
                alert("Error");
            }
        });
       
      })

      $(".delete_form").click(function(){
        var id =$(this).attr('rel');
        var record =$(this).attr('record');
        // alert(id);
        swal({
            title: "Are you sure?",
            text: "You will not able to recover this record again!",
            icon: "warning",
            showCancelButton : true,
            confirmButtonClass :"btn-danger",
            confirmButtonText :"Yes, delete it",
        },
        function() {
            window.location.href = "delete-"+record+"/"+id;        }
        );
    });



    
});



    



