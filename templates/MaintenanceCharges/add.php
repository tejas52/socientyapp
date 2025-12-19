<?= $this->Form->create($maintenanceCharge) ?>

<?= $this->Form->control('paid_date', [
    'type'  => 'date',
    'value' => (new DateTime('now', new DateTimeZone('Asia/Kolkata')))->format('Y-m-d'),
    'label' => 'Date'
]) ?>



<?= $this->Form->control('society_id', ['options' => $societies, 'empty'=>'-- Select Society --']) ?>
<?= $this->Form->control('wing_id', ['options' => $wings, 'empty'=>'-- Select Wing --']) ?>
<?= $this->Form->control('flat_id', ['options' => $flats, 'empty'=>'-- Select Flat --']) ?>

<?= $this->Form->control('month', ['type'=>'select', 'options'=>$months, 'empty'=>'-- Select Month --']) ?>
<?= $this->Form->control('year', ['type'=>'select', 'options'=>$yearOptions, 'empty'=>'-- Select Year --']) ?>

<?= $this->Form->control('amount') ?>
<?= $this->Form->control('penalty') ?>
<?= $this->Form->control('status', ['options' => ['Pending'=>'Pending','Paid'=>'Paid']]) ?>

<?= $this->Form->button(__('Save')) ?>
<?= $this->Form->end() ?>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#society-id').change(function() {
        var societyId = $(this).val();
        if(societyId) {
            $.ajax({
                url: '<?= $this->Url->build(["controller" => "Flats", "action" => "getWings"]) ?>/' + societyId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    var wingDropdown = $('#wing-id');
                    wingDropdown.empty().append('<option value="">-- Select Wing --</option>');
                    $.each(data, function(key, value) {
                        wingDropdown.append('<option value="'+ key +'">'+ value +'</option>');
                    });
                    $('#flat-id').empty().append('<option value="">-- Select Flat --</option>');
                }
            });
        }
    });

    $('#wing-id').change(function() {
        var wingId = $(this).val();
        if(wingId) {
            $.ajax({
                url: '<?= $this->Url->build(["controller" => "Flats", "action" => "getFlats"]) ?>/' + wingId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    var flatDropdown = $('#flat-id');
                    flatDropdown.empty().append('<option value="">-- Select Flat --</option>');
                    $.each(data, function(key, value) {
                        flatDropdown.append('<option value="'+ key +'">'+ value +'</option>');
                    });
                }
            });
        }
    });
});
</script>

