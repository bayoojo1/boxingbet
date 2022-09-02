$(document).ready(function(){
  $('#submitCategory').click(function(){
    catname = $("#catname").val()
    catdesc = $("#catdesc").val()
    if(catname == '' || catdesc == '') {
        swal({
        title: "Error",
        text: "Category name and description cannot be empty!",
        icon: "error",
        });
        return false
    }
    $("#submitCategory").prop('disabled', true);
    $("#submitCategory").val('Wait...');
    $.ajax({
      url: 'procedures/createawardcategory.php',
      type: 'POST',
      dataType: 'text',
      data: JSON.stringify({ catname: catname, catdesc: catdesc }),
      success: function(response) {
          if(response.indexOf('success') !== -1) {
              window.location = 'awardcategories.php'
        }
      }
   })
  })
})

$(document).ready(function(){
  $('#updateCategory').click(function(){
    catId = $("#catId").val()
    catname = $("#catname").val()
    catdesc = $("#catdesc").val()
    if(catname == '' || catdesc == '') {
        swal({
        title: "Error",
        text: "Category name and description cannot be empty!",
        icon: "error",
        });
        return false
    }
    $("#updateCategory").prop('disabled', true);
    $("#updateCategory").val('Wait...');
    $.ajax({
      url: 'procedures/updateawardcategory.php',
      type: 'POST',
      dataType: 'text',
      data: JSON.stringify({ catId: catId, catname: catname, catdesc: catdesc }),
      success: function(response) {
          if(response.indexOf('success') !== -1) {
              window.location = 'awardcategories.php'
        }
      }
   })
  })
})

function changeStatus(id) {
    $(document).ready(function() {
        currentStatus = id.split('-')[0]
        awardId = id.split('-')[1]
        $.ajax({
          url: 'procedures/changeAwardStatus.php',
          type: 'POST',
          dataType: 'text',
          data: JSON.stringify({ currentStatus: currentStatus, awardId: awardId }),
          success: function(response) {
              if(response.indexOf('closed') !== -1) {
                  $("#" + id).html('<span style="color:red; font-weight:bold;">closed</span>');
            } else if(response.indexOf('open') !== -1) {
               $("#" + id).html('<span style="color:forestgreen; font-weight:bold;">open</span>'); 
            }
          }
       })
    })
}