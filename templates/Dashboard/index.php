<div style="display:flex; min-height:100vh;">

    <!-- Sidebar -->
    <div style="width:240px; background:#2c3e50; color:white; padding:15px;">
        <h2 style="color:#ecf0f1;">Dashboard</h2>
        <ul style="list-style:none; padding:0; margin:0;">

            <li style="margin:10px 0;">
                <?= $this->Html->link("Societies ({$societiesCount})", ['controller'=>'Societies','action'=>'index'], ['style'=>'color:white; text-decoration:none;']) ?>
            </li>

            <li style="margin:10px 0;">
                <?= $this->Html->link("Wings ({$wingsCount})", ['controller'=>'Wings','action'=>'index'], ['style'=>'color:white; text-decoration:none;']) ?>
            </li>

            <li style="margin:10px 0;">
                <?= $this->Html->link("Flats ({$flatsCount})", ['controller'=>'Flats','action'=>'index'], ['style'=>'color:white; text-decoration:none;']) ?>
            </li>

            <li style="margin:10px 0;">
                <?= $this->Html->link("Members ({$membersCount})", ['controller'=>'Members','action'=>'index'], ['style'=>'color:white; text-decoration:none;']) ?>
            </li>

            <li style="margin:10px 0;">
                <?= $this->Html->link("Maintenance Charges ({$maintenanceCount})", ['controller'=>'MaintenanceCharges','action'=>'index'], ['style'=>'color:white; text-decoration:none;']) ?>
            </li>

            <li style="margin:10px 0;">
                <?= $this->Html->link("Payments ({$paymentsCount})", ['controller'=>'MaintenancePayments','action'=>'index'], ['style'=>'color:white; text-decoration:none;']) ?>
            </li>

            <li style="margin:10px 0;">
                <?= $this->Html->link('Send Reminder', ['controller' => 'MaintenanceCharges', 'action' => 'sendReminder', 1], ['style'=>'color:white; text-decoration:none;']) ?>
            </li>

        </ul>
    </div>

    <!-- Main Content -->
    <div style="flex:1; padding:20px;">
        <h1>Welcome to Society Management Dashboard</h1>
        <p>Select a module from the left menu.</p>
    </div>

</div>
