<?= $this->Form->create($maintenanceCharge) ?>
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <!-- <div class="row">
              
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Maintenance Charges</li>
                </ol>
              </div>
            </div> -->
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row g-4">
              <!--begin::Col-->
              
              <!--end::Col-->
              <!--begin::Col-->
              <div class="col-md-6">
                <!--begin::Quick Example-->
                <div class="card card-primary card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header">
                    <div class="card-title">Add Maintenance</div>
                  </div>
                  <!--end::Header-->
                  <!--begin::Form-->
                    <?= $this->Form->create($maintenanceCharge) ?>
                    <!--begin::Body-->
                    <div class="card-body">
                      <div class="mb-3">
                        <?= $this->Form->control('paid_date', [
                            'type'  => 'date',
                            'value' => (new DateTime('now', new DateTimeZone('Asia/Kolkata')))->format('Y-m-d'),
                            'label' => 'Payment Date    ',
                            'class' => 'form-control'
                        ]) ?>
                      </div>
                      <div class="mb-3">
                            <?= $this->Form->control('society_id', ['options' => $societies, 'empty'=>'-- Select Society --','class' => 'form-control']) ?>
                                                </div>
                        <div class="mb-3">
                            <?= $this->Form->control('wing_id', ['options' => $wings, 'empty'=>'-- Select Wing --','class' => 'form-control']) ?>
                      </div>
                      <div class="mb-3">
                        <?= $this->Form->control('flat_id', ['options' => $flats, 'empty'=>'-- Select Flat --','class' => 'form-control']) ?>
                      </div>
                      <div class="mb-3">
                        <?= $this->Form->control('year', ['type'=>'select', 'options'=>$yearOptions, 'empty'=>'-- Select Year --', 'class' => 'form-control']) ?>
                      </div>
                      <div class="mb-3">
                        <?= $this->Form->control('amount',['class' => 'form-control ']) ?>

                      </div>
                      <div class="mb-3">
<?= $this->Form->control('penalty', ['class' => 'form-control'] ) ?>
                      </div>
                      <div class="mb-3">
<?= $this->Form->control('status', ['options' => ['Pending'=>'Pending','Paid'=>'Paid'], 'class'=>'form-control']) ?>
                      </div>
                    </div>
                    <!--end::Body-->
                    <!--begin::Footer-->
                    <div class="card-footer">
<?= $this->Form->button(__('Save'),['class'=>'btn btn-info']) ?>
                    </div>
                    <!--end::Footer-->
<?= $this->Form->end() ?>
                  <!--end::Form-->
                </div>
                <!--end::Quick Example-->
                
                
              </div>
              <!--end::Col-->
              <!--begin::Col-->
              
              <!--end::Col-->
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
<?= $this->Form->end() ?>
<?= $this->Html->script('https://code.jquery.com/jquery-3.6.0.min.js') ?>
<?= $this->Html->script('/adminlte/dist/js/adminlte.min.js') ?>
<?= $this->Html->script('/adminlte/dist/js/adminlte.js') ?>
<?php $this->start('script'); ?>
<script>
    $(document).ready(function() {
        // Load wings based on selected society
        $('#society-id').change(function() {
            var societyId = $(this).val();
            $.ajax({
                url: '/societies/getWingsBySocietyId/' + societyId,
                method: 'GET',
                success: function(data) {
                    console.log(data);
                    var wingSelect = $('#wing-id');
                    wingSelect.empty().append('<option value="">-- Select Wing --</option>');
                    $.each(data, function(key, value) {
                        wingSelect.append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            });
        });

        // Load flats based on selected wing
        $('#wing-id').change(function() {
            var wingId = $(this).val();
            $.ajax({
                url: '/wings/getFlatsByWingId/' + wingId,
                method: 'GET',
                success: function(data) {
                    var flatSelect = $('#flat-id');
                    flatSelect.empty().append('<option value="">-- Select Flat --</option>');
                    $.each(data, function(key, value) {
                        flatSelect.append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            });
        });
    });
</script>
<?php $this->end(); ?>
