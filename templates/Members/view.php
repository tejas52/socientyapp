<h1>Member Details</h1>
<p><strong>Name:</strong> <?= h($member->name) ?></p>
<p><strong>Email:</strong> <?= h($member->email) ?></p>
<p><strong>Phone:</strong> <?= h($member->phone) ?></p>
<p><strong>Society:</strong> <?= $member->society->name ?? '' ?></p>
<p><strong>Wing:</strong> <?= $member->wing->name ?? '' ?></p>
<p><strong>Flat:</strong> <?= $member->flat->flat_no ?? '' ?></p>
