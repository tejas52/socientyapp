<main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <?= $this->Html->link(
                'Add Member',
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
                            <?= $this->Html->link('Add Member', ['action' => 'add'], ['class' => 'button float-right']) ?>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Society</th>
                                    <th>Wing</th>
                                    <th>Flat</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Actions</th>
                                </tr>
                                <?php foreach ($members as $member): ?>
                                <tr>
                                    <td><?= h($member->id) ?></td>
                                    <td><?= h($member->name) ?></td>
                                    <td><?= $member->society->name ?? '' ?></td>
                                    <td><?= $member->wing->name ?? '' ?></td>
                                    <td><?= $member->flat->flat_no ?? '' ?></td>
                                    <td><?= h($member->email) ?></td>
                                    <td><?= h($member->phone) ?></td>
                                    <td>
                                        <?= $this->Html->link(' View ', '/members/view/' . $member->id, ['class' => 'btn btn-info']) ?>
                <?= $this->Html->link(' Edit ', '/members/edit/' . $member->id, ['class' => 'btn btn-info']) ?>
                <?= $this->Form->postLink(
                    'Delete',
                    ['controller' => 'Members', 'action' => 'delete', $member->id],
                    [
                        'confirm' => 'Are you sure you want to delete this Member?',
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