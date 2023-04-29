
if($('.is-invalid').length > 0) {
    $('#inventoryForm').modal('show');
    $('#categoryFormModal').modal('show');
    $('#productFormModal').modal('show');
    $('#maintenanceForm').modal('show');
}

$('#floor_id option:selected').val();
$('#room-name').on('click', function() {
    let department = $('#department_id option:selected').text();
    let floor = $('#floor option:selected').val();
    $(this).val(department + floor + '/');
});

