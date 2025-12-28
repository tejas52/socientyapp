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
<p><strong>ID:</strong> <?= h($society->id) ?></p>
<p><strong>Society:</strong> <?= h($society->name) ?></p>


<p>
<?= $this->Html->link(' Edit ', '/societies/edit/' . $society->id, ['class' => 'btn btn-info']) ?>    <?= $this->Form->postLink('🗑 Delete', 
        ['action' => 'delete', $society->id], 
        ['confirm' => 'Are you sure?', 'class' => 'btn btn-danger']) ?> 
    <?= $this->Html->link('⬅ Back', ['action' => 'index'], ['class' => 'btn btn-info']) ?>
</p>
</div>
                  <!-- /.card-body -->
                </div>
                 </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>