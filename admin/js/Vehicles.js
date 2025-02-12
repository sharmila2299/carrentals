function loadData() {
  $("#VehiclesTable").dataTable().fnDestroy();
  var table = $('#VehiclesTable').DataTable({
    "processing" : true,
    "serverSide" : false,
    "pagingType" : "full_numbers",
    "ajax"       : {
      url        : "actions/Vehicles",
      type       : 'post',
      data       : { 'action' : 'show' },
    },

    "columns": [
      {
        render: function (data, type, row, meta) {
          return meta.row + meta.settings._iDisplayStart + 1;
        }
      },
        { "data" : "VEHICLE_TYPE" },
        { "data" : "BRAND" },
        { "data" : "MODAL" },
        { "data" : "NUMBER_PLATE" },
        { "data" : "RENTAL_PRICING" },
        { "data" : "AVALIBILITY_STATUS" }, 
        { "data" : "PHOTOS",
        fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
          $(nTd).html(`<img height="100" src="${oData.PHOTOS.replace('../', '')}"/>`);
        } 
      }, 
      { "data" : "ID",
        fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
          let bnTd = '';
          bnTd = `<a href="editVehicle?type=view&randomId=${oData.RANDOM_ID}" title="View"><i class="fa fa-eye" aria-hidden="true"></i></a>&nbsp;&nbsp;

            <a href="editVehicle?type=edit&randomId=${oData.RANDOM_ID}" title="Edit"><i class="far fa-edit" aria-hidden="true"></i></a>&nbsp;&nbsp;

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
      url  : "actions/Vehicles",
      type : "post",
      data : { 'id' : id, 'action' : 'delete' },
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