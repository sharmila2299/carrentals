function loadData() {
    $("#UsersTable").dataTable().fnDestroy();
    var table = $('#UsersTable').DataTable({
      "processing" : true,
      "serverSide" : false,
      "pagingType" : "full_numbers",
      "ajax"       : {
        url        : "actions/users",
        type       : 'post',
        data       : { 'action' : 'show' },
      },
  
      "columns": [
        {
          render: function (data, type, row, meta) {
            return meta.row + meta.settings._iDisplayStart + 1;
          }
        },
        { "data" : "USER_ID" },
        { "data" : "NAME" },
        { "data" : "EMAIL" },
        { "data" : "PASSWORD" },
        { "data" : "PHONE_NUMBER" },
        { "data" : "ADDRESS" },
        { "data" : "AADHAR_PHOTO",
            fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
              $(nTd).html(`<img height="100" src="${oData.AADHAR_PHOTO.replace('../', '')}"/>`);
            } 
          },
          { "data" : "PROFILE_PHOTO",
            fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
              $(nTd).html(`<img height="100" src="${oData.PROFILE_PHOTO.replace('../', '')}"/>`);
            } 
          },      
        { "data" : "ID",
          fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
            let bnTd = '';
            bnTd = `<a href="editUser?type=view&randomId=${oData.RANDOM_ID}" title="View"><i class="fa fa-eye" aria-hidden="true"></i></a>&nbsp;&nbsp;
  
              <a href="editUser?type=edit&randomId=${oData.RANDOM_ID}" title="Edit"><i class="far fa-edit" aria-hidden="true"></i></a>&nbsp;&nbsp;`;
                  $(nTd).html(bnTd);
          }
        }
      ],
      select: true,
      "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]],
      columnDefs: [
        { className: 'text-center', targets: [0,9] },
      ],
      aoColumnDefs : [{'bSortable' : false, 'aTargets' : ['no-sort']}],
      sPaginationType : 'full_numbers',
    });
  }
  
  $(document).ready(function() {
    loadData();
  });
  
  