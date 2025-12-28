<main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <?= $this->Html->link(
    'Add Society',
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
                            <th>ID</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($societies as $society):
                            ?>
                <tr>
                    <td><?= h($society->id) ?></td>
                    <td><?= $this->Html->link($society->name, ['action' => 'getWingsBySocietyId', (int)$society->id]) ?></td>
                    <td><?= h($society->address) ?></td>
                    <td><?= h($society->created) ?></td>

                    <td>
                        <?= $this->Html->link(' View ', '/societies/view/' . $society->id, ['class' => 'btn btn-info']) ?>
                        <?= $this->Html->link(' Edit ', '/societies/edit/' . $society->id, ['class' => 'btn btn-info']) ?>
                        <?= $this->Form->postLink(
                    'Delete',
                    ['controller' => 'Societies', 'action' => 'delete', $society->id],
                    [
                        'confirm' => 'Are you sure you want to delete this society?',
                        'class' => 'btn btn-danger'
                    ]
                ) ?>
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
