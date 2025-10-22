<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= $this->fetch('title') ?: 'Admin Dashboard' ?></title>
    <?= $this->Html->css(['https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css']) ?>
    <?= $this->Html->script(['https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js']) ?>
    <style>
        body { min-height: 100vh; display: flex; }
        #sidebar { width: 220px; background: #343a40; color: #fff; }
        #sidebar a { color: #fff; text-decoration: none; display: block; padding: 10px; }
        #sidebar a:hover { background: #495057; }
        #content { flex-grow: 1; padding: 20px; }
    </style>
</head>
<body>
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

    <div id="content">
        <nav class="navbar navbar-light bg-light mb-3">
            <span class="navbar-brand mb-0 h1"><?= $this->fetch('title') ?: 'Dashboard' ?></span>
        </nav>
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </div>
</body>
</html>
