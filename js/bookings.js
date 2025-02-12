function loadData() {
    $("#BookingsTable").dataTable().fnDestroy();
    var table = $('#BookingsTable').DataTable({
      "processing" : true,
      "serverSide" : false,
      "pagingType" : "full_numbers",
      "ajax"       : {
        url        : "actions/bookings",
        type       : 'post',
        data       : { 'action' : 'show' },
      },
  
      "columns": [
        {
          render: function (data, type, row, meta) {
            return meta.row + meta.settings._iDisplayStart + 1;
          }
        },
        { "data" : "BOOKING_ID" },
        { "data" : "VEHICLE_ID" },
        { "data" : "START_DATE" },
        { "data" : "END_DATE" },
        { "data" : "PRICE" },
        { "data" : "STATUS" }, 
        { "data" : "NOTIFICATION" },       
        { "data" : "ID",
          fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
            let bnTd = '';
            bnTd = `<a href="editBooking?type=view&randomId=${oData.RANDOM_ID}" title="View"><i class="fa fa-eye" aria-hidden="true"></i></a>&nbsp;&nbsp;
  
              <a href="editBooking?type=edit&randomId=${oData.RANDOM_ID}" title="Edit"><i class="far fa-edit" aria-hidden="true"></i></a>&nbsp;&nbsp;
  
              <a href="javascript:void(0)" title="Delete" onclick="RemoveAccount(${oData.ID})"><i class="fas fa-trash"></i></a>&nbsp;&nbsp;`;
                  $(nTd).html(bnTd);
          }
        }
      ],
      select: true,
      "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]],
      columnDefs: [
        { className: 'text-center', targets: [0,8] },
      ],
      aoColumnDefs : [{'bSortable' : false, 'aTargets' : ['no-sort']}],
      sPaginationType : 'full_numbers',
    });
  }
  
  $(document).ready(function() {
    loadData();
  });
  
  function RemoveAccount(id) {
    let check = confirm('Are You Sure You want To delete This Data..?');
    if(check) {
      $.ajax({
        url  : "actions/bookings",
        type : "post",
        data : { 'id' : id,'action' : 'delete' },
        success: function(data) {
          if(data == 'true') {
            toastr.success('Deleted Successfully...!');
            setTimeout(function(){
              loadData();
            },1000);
          }
        }
      });
    }
    return false;
  }