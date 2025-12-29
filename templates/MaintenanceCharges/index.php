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
        switch($charge->month){
          case 1:
            $monthname = "January";
            break;
          case 2:
            $monthname = "February";
            break;
          case 3:
            $monthname = "March";
            break;
          case 4:
            $monthname = "April";
            break;
          case 5:
            $monthname = "May";
            break;
          case 6:
            $monthname = "June";
            break;
          case 7:
            $monthname = "July";
            break;
          case 8:
            $monthname = "August";
            break;
          case 9:
            $monthname = "September";
            break;
          case 10:
            $monthname = "October";
            break;
          case 11:
            $monthname = "November";
            break;
          case 12:
            $monthname = "December";
            break;
            

        }
        $phone = $charge->flat->member->phone;
         $sms = "Dear " . $charge->flat->member->name . ", Your maintenance charge for " . $monthname . "-" . $charge->year . " of Rs." . $charge->amount . " is paid successfully. Thank you."; 
        ?>
                        <tr class="align-middle">
                                                      <td><?= h($charge->id) ?></td>

                          <td><?= h($charge->society->name) ?></td>
        <td><?= h($charge->wing->name) ?></td>
        <td><?= h($charge->flat->flat_no) ?></td>
        <td><?= h($monthname.' '.$charge->year  ) ?></td>
        <td><?= h($charge->amount) ?></td>
        <td><?= h($charge->penalty) ?></td>
        <td><?= h($charge->status) ?></td>
        
        <td>
            <?= $this->Html->link('View', ['action' => 'view', $charge->id], ['class' => 'btn btn-info']) ?>
            <a href="https://wa.me/<?= h($phone) ?>?text=<? echo $sms; ?> target="_blank" class="btn btn-info"  >Send
</a>
            <a href="https://wa.me/<?= h($phone) ?>?text=<?= urlencode($sms) ?>"
              target="_blank"
              class="btn btn-info">
              Send WhatsApp
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
