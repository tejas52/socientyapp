
<?= $this->Form->create($society) ?>
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
                    <div class="card-title">Edit Society</div>
                  </div>
                  <!--end::Header-->
                  <!--begin::Form-->
                    <?= $this->Form->create($society) ?>
                    <!--begin::Body-->
                    <div class="card-body">
                     
                      <div class="mb-3">
                        <?= $this->Form->control('name',['class' => 'form-control ']) ?>

                      </div>
                      <div class="mb-3">
<?= $this->Form->control('address', [
    'type' => 'textarea',
    'rows' => 4,
    'placeholder' => 'Enter address here',
    'label' => 'Address',
    'class' => 'form-control'
]) ?>                      </div>
                      
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

<?= $this->Html->script('https://code.jquery.com/jquery-3.6.0.min.js') ?>
<?= $this->Html->script('/adminlte/dist/js/adminlte.min.js') ?>
<?= $this->Html->script('/adminlte/dist/js/adminlte.js') ?>
