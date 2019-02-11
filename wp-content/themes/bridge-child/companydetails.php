<?php
/* 
Template Name:Company details
*/
get_header();
?>
<head>
    <style>
        #tbl{
            margin-top:200px;
        }
    </style>
</head>
<table id="tbl">
    <thead>
    <tr>
       <th>Companyname</th>
        <th>Primary admin_name</th>
        <th>Priamry admin_email</th>
        <th>Country</th>
        <th>State</th>
        <th>City</th>
</tr>
</thead>
<tbody>
    <?php
    $arg = array(
    'role' => 'company',
    'meta_query' => array(
        array(
            'key'     => 'mepr_company_name',
            'value'   => get_user_meta($current_user->ID,'mepr_company_name',true)
        )
    )
    );
    $users= get_users($arg);
     foreach($users as $key => $user){
         ?>
         <tr>
         <td><?php echo $user->user_login; ?></td>
         <td><?php echo $user->display_name; ?></td>
        </tr>
    <?php
         
     }
    ?>
</tbody>
</table>
<?php
get_footer();
?>