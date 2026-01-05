
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
                    <div class="card-title">Add Transaction</div>
                  </div>
                  <!--end::Header-->
                  <!--begin::Form-->
                    <?= $this->Form->create($incomeexpence) ?>
                    <!--begin::Body-->
                    <div class="card-body">
                      <div class="mb-3">
                        <?= $this->Form->control('transaction_date', [
                            'type'  => 'date',
                            'value' => (new DateTime('now', new DateTimeZone('Asia/Kolkata')))->format('Y-m-d'),
                            'label' => 'Transaction Date    ',
                            'class' => 'form-control'
                        ]) ?>
                      </div>
                      <div class="mb-3">
                            <?= $this->Form->control('society_id', ['options' => $societies, 'empty'=>'-- Select Society --','class' => 'form-control']) ?>
                                                </div>
                        <div class="mb-3">
                            <?= $this->Form->control('wing_id', ['options' => '', 'empty'=>'-- Select Wing --','class' => 'form-control']) ?>
                      </div>
                      <div class="mb-3">
                        <?= $this->Form->control('flat_id', ['options' => '','empty'=>'-- Select Flat --','class' => 'form-control']) ?>
                      </div>
                       <div class="mb-3">
                        <?= $this->Form->control('transaction_type', ['options' => $transaction_type,'empty'=>'-- Select Transaction Type --','class' => 'form-control']) ?>
                      </div>
                      <div class="mb-3">
                        <?= $this->Form->control('transaction_mode', ['options' => $transaction_mode,'empty'=>'-- Select Transaction Mode --','class' => 'form-control']) ?>
                      </div>
                      <div class="mb-3">
                          <?= $this->Form->control('description', [
                              'type'  => 'textarea',
                              'class' => 'form-control',
                              'rows'  => 4
                          ]) ?>
                      </div>
                      
                          
                      <div class="mb-3">
                        <?= $this->Form->control('amount',['class' => 'form-control']) ?>

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

        //Get reside type for flatSelect
        $('#flat-id').change(function() {
            var flatId = $(this).val();
            /* $.ajax({
                url: '/flats/get_reside_type/' + flatId,
                method: 'GET',
                success: function(data) {
                    console.log(data.reside_type);
                    if(data.reside_type === 'Owner') {
                        $('#amount').val(1300);
                    } else if(data.reside_type === 'Tenant') {
                        $('#amount').val(1500);
                    } 
                   
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching reside type:', error);
                }
            }); */
      
            $.ajax({
                url: '/flats/get_member/' + flatId,
                method: 'GET',
                success: function(data) {
                   console.log(data);
                   var memberSelect = $('#member-id');
                    memberSelect.empty();
                    $.each(data, function(key, value) {
                        memberSelect.append('<option value="' + key + '">' + value + '</option>');
                    });
                   
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching reside type:', error);
                }
            });
        });

        //Calculate panelty
        //Get reside type for flatSelect
        $('#month').change(function() {
            var month = $(this).val();
            var year = $('#year').val();
            var paiddate = $('#paid-date').val();
            $.ajax({
                url: '/maintenance-charges/calculate_penalty/' + paiddate + '/' + month + '/' + year,
                method: 'GET',
                success: function(data) {
                    console.log(data);
                    $('#penalty').val(data.total_panelty);
                   
                },
                error: function(xhr, status, error) {
                    console.error('Error calculating penalty:', error);
                }
            });
        });
    });
</script>
<?php $this->end(); ?>
