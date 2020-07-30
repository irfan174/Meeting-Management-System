$(document).ready(function() {
    $('#meeting_table').DataTable();
    $('.dataTables_length').addClass('bs-select');
});
//course section; catch data and make table
/*function getCoursesJsonData() {
    axios.get('/coursesdata')
        .then(function(response) {
            if (response.status == 200){
                $('#dataTableCourse').removeClass('d-none');
                $('#loadingAnimCourses').addClass('d-none');
                $('#coursesData_table').empty(); //avoid clone table data after more than one time delete

                var coursesDataJson = response.data; // catch response data

                $.each(coursesDataJson, function(i, item){
                    $('<tr>').html(
                        "<td <img class='table-img' src=" + serviceDataJson[i].service_img + "></td>" +
                        "<td>" + coursesDataJson[i].course_name + "</td>" +
                        "<td>" + coursesDataJson[i].course_des + "</td>" +
                        "<td>" + coursesDataJson[i].course_fee + "</td>" +
                        "<td>" + coursesDataJson[i].service_des + "</td>" +




                        "<td><a class='serviceEditIcon' data-id=" + serviceDataJson[i].id + "><i class='fas fa-edit'></i></a></td>" +
                        "<td><a class='serviceDltIcon' data-toggle='modal' data-id=" + serviceDataJson[i].id + " data-target='#deleteModal' ><i class='fas fa-trash-alt'></i></a></td>").appendTo('#coursesData_table');
                });
                //service section; Delete icon hold and send the id of the clicked item to the modal 
                $('.serviceDltIcon').click(function() {
                    var catchId = $(this).data('id');
                    $('#serviceDltId').html(catchId);
                })
                
                
                //service section; Edit icon
                $('.serviceEditIcon').click(function() {
                  
                    var catchIdEdit = $(this).data('id');
                    $('#serviceEditId').html(catchIdEdit);
                    serviceDetailsForEdit(catchIdEdit);
                    $('#editModal').modal('show');
                })
                

            } 
            else 
            {
                $('#notFound').removeClass('d-none');
                $('#loadingAnim').addClass('d-none');
            }


        }).catch(function(error) {
            $('#notFound').removeClass('d-none');
            $('#loadingAnim').addClass('d-none');

        });
}*/