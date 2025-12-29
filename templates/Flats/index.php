<main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <?= $this->Html->link(
    'Add Flat',
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
    <tr>
        <th>ID</th>
        <th>Flat No</th>
        <th>Wing</th>
        <th>Society</th>
        <th>Owner</th>
        <th>Reside Type</th>
        <th>Members</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($flats as $flat):
        ?>
    <tr>
        <td><?= h($flat->id) ?></td>
        <td><?= h($flat->flat_no) ?></td>
        <td><?= $flat->wing->name ?? '' ?></td>
        <td><?= $flat->wing->society->name ?? '' ?></td>
        <td><?= h($flat->owner_name) ?></td>
        <td><?= h($flat->reside_type) ?></td>
        <td><?= count($flat->members ?? []) ?></td>
        <td>
                <?= $this->Html->link(' View ', '/flats/view/' . $flat->id, ['class' => 'btn btn-info']) ?>
                <?= $this->Html->link(' Edit ', '/flats/edit/' . $flat->id, ['class' => 'btn btn-info']) ?>
                <?= $this->Form->postLink(
                    'Delete',
                    ['controller' => 'Flats', 'action' => 'delete', $flat->id],
                    [
                        'confirm' => 'Are you sure you want to delete this Flat?',
                        'class' => 'btn btn-danger'
                    ]
                ) ?>
            </td>
    </tr>
    <?php endforeach; ?>
</table>
 </div>
                  <!-- /.card-body -->
                </div>
                 </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
