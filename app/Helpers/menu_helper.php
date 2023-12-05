<?php
function getMenu($menu_category_id, $role)
{
    $db       = \Config\Database::connect();
    $menu     =  $db->table('user_menu')
        ->orderBy('user_access.id', 'ASC')
        ->join('user_access', 'user_menu.id = user_access.menu_id')
        ->where(['menu_category' => $menu_category_id, 'user_access.role_id' => $role])
        ->get()->getResultArray();
    return $menu;
}
function getSubMenu($menu_id, $role)
{
    $db       = \Config\Database::connect();
    $submenu  = $db->table('user_submenu')
        ->orderBy('user_access.id', 'ASC')
        ->join('user_access', 'user_submenu.id = user_access.submenu_id')
        ->where(['user_submenu.menu' => $menu_id, 'user_access.role_id' => $role])
        ->get()->getResultArray();
    return $submenu;
}
function checkPermission() {
    $ci = &get_instance();
    // Your logic to retrieve the user's role and permissions
    // $userRole = getUserRole(); // Replace this with actual logic to get user's role
    $userRole =  $ci->userModel->getUserRole();
    $userPermissions = getUserPermissions($userRole); // Replace this with logic to get user's permissions
    
    // // Check if the user's permissions contain the required permission
    // if (in_array($requiredPermission, $userPermissions)) {
    //     return true; // User has permission
    // } else {
    //     return false; // User doesn't have permission
    // }
}

function getUserRole(){

}
function getUserPermissions($userRole){
    $db       = \Config\Database::connect();
    $menu     =  $db->table('user_menu')
        ->orderBy('user_access.id', 'ASC')
        ->join('user_access', 'user_menu.id = user_access.menu_id')
        ->where(['user_access.role_id' => $userRole])
        ->get()->getResultArray();
        
    echo "<pre>";
    print_r($menu);
    echo "</pre>";
    die();   
}