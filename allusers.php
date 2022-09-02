<?php
require_once __DIR__ . '/inc/bootstrap.php';
require_once __DIR__ . '/templates/header.php';
require_once __DIR__ . '/templates/nav.php';

$isAuth = new UserAuth();
$isAuth->requireAuth();

$allUsers = new User();
$listUsers = $allUsers->getAllUser();
$listUsers = json_decode($listUsers, true);

?>
<br><br><br>
<div class="container">
    <div class="section-title">
      <h2 data-aos="fade-up">All Users</h2>
      <p data-aos="fade-up">This shows all users till date.</p>
    </div>

    <?php if(!empty($listUsers) && (is_array($listUsers))) : ?>
    <table id="stakes" class="table table-striped" style="width:100%; background-color:#adb5bd; color:white; font-size:12px;">
        <thead style="background-color:#ff5821;">
            <tr style="font-size:12px; font-weight:bold;">
                <th>User ID</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>User Type</th>
            </tr>
        </thead>
        <tbody>
      <?php foreach($listUsers as $listUser) : ?> 
            <?php foreach($listUser as $index => $value) : ?>
        <tr>
            <td style="color:grey;"><a href="profile.php?u=<?php echo $value['userid']; ?>"><?php echo $value['userid']; ?></a></td>
            <?php if(isset($value['email'])) : ?>
                <td style="color:grey;"><?php echo $value['email']; ?></td>
            <?php else : ?>
                <td style="color:grey;"><?php echo $value['myemail']; ?></td>
            <?php endif; ?>
            <?php if(isset($value['mobile'])) : ?>
                <td style="color:grey;"><?php echo $value['mobile']; ?></td>
            <?php else : ?>
                <td style="color:grey;"><?php echo $value['mymobile']; ?></td>
            <?php endif; ?>
            <td style="color:grey;"><?php echo $value['fname']; ?></td>
            <td style="color:grey;"><?php echo $value['lname']; ?></td>
            <?php
                $userType = '';
                if($value['role_id'] == '1') {
                    $userType = 'Admin';
                } else if($value['role_id'] == '2') {
                    $userType = 'Boxer';
                } else if($value['role_id'] == '3') {
                    $userType = 'User';
                } else if($value['role_id'] == '4') {
                    $userType = 'Agent';
                } else {
                    $userType = 'Manager';
                }
            ?>
            <td style="color:grey;"><?php echo $userType; ?></td>
        </tr>
           <?php endforeach; ?>
      <?php endforeach; ?>
        </tbody>
    </table>
    <?php else : ?>
        <div style="background-color:red;">You don't have any stake available.</div>
    <?php endif; ?>
</div><br><br><br>

<link href="assets/css/table.css" rel="stylesheet">
<script src="js/jquery.min.js"></script>
<script type="text/javascript" src="DataTables/datatables.min.js"></script>

<script>
    $(document).ready( function () {
    $('#stakes').DataTable();
});
</script>

<?php
include __DIR__ .'/templates/footer.php'; 
?>
            