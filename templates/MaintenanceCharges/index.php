      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <?= $this->Html->link(
    'Add Charge',
    ['action' => 'add'],
    ['class' => 'btn btn-info']
) ?>
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

<div class="card mb-4">
                  
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th style="width: 10px">#</th>
                          <th class="w-15">Society</th>
                          <th class="w-10">Wing</th>
                          <th class="w-10">Flat</th>
                          <th class="w-15">Month-Year</th>
                          <th class="w-10">Amount</th>
                          <th class="w-10">Panelty</th>
                          <th class="w-10">Status</th>
                        <th class="w-20">Actions</th>

                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($charges as $charge):
        $phone = $charge->flat->member->phone;
        ?>
                        <tr class="align-middle">
                                                      <td><?= h($charge->id) ?></td>

                          <td><?= h($charge->society->name) ?></td>
        <td><?= h($charge->wing->name) ?></td>
        <td><?= h($charge->flat->flat_no) ?></td>
        <td><?= h($charge->month_number . '-' . $charge->year) ?></td>
        <td><?= h($charge->amount) ?></td>
        <td><?= h($charge->penalty) ?></td>
        <td><?= h($charge->status) ?></td>
        <td>
            <?= $this->Html->link('View', ['action' => 'view', $charge->id]) ?>
            <a href="https://wa.me/<?= h($phone) ?>?text=my name is tejas" target="_blank">
 Send
</a>
        </td>
                        </tr>
                        
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
                 </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
