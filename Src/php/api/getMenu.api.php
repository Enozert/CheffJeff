<?php
function GetMenu($host)
{
    $lang = $_SESSION['lang'];
    $langLink = strtolower($_SESSION['lang']);
    if($langLink != 'uk'){
        $link = $host."wordpress/wp-json/wp/v2/menu$langLink";
    }else{
        $link = $host."wordpress/wp-json/wp/v2/menu";
    }
    $dataPrep = file_get_contents($link);
    $menuItems = json_decode($dataPrep, true);
    $menuIds = array();
    $subMenu = array();
    $menu = array();

    foreach($menuItems as $menuItem){
        $menuIds[$menuItem['ID']] = [
            'name' => $menuItem['type_label'],
            'link' => $menuItem['object']
        ];
    }

    foreach($menuItems as $menuItem){
        $hasParent = false;
    
        if($menuItem['type'] == 'custom'){
            if($menuItem['menu_item_parent'] == 0){
                switch($lang){
                    case 'NL':
                        $navLink = '/nl/'.$menuItem['url'];
                        break;
                    default:
                        $navLink = $menuItem['url'];
                        break;
                }
            }else {
                $hasParent = true;
                $pageTile = str_replace(' ', '_', $menuItem['title']);
                switch($lang){
                    case 'NL':
                        $navLink = '/nl/'.$menuIds[$menuItem['menu_item_parent']]['link'].$menuItem['url'];
                        break;
                    default:
                        $navLink = '/'.$menuIds[$menuItem['menu_item_parent']]['link'].$menuItem['url'];
                        break;
                }
            }
        }else{
            if($menuItem['menu_item_parent'] == 0){
                if($menuItem['object'] == 'home'){
                    switch($lang){
                        case 'NL':
                            $navLink = '/nl';
                            break;
                        default:
                            $navLink = '/';
                            break;
                    }
                    
                }else{
                    switch($lang){
                        case 'NL':
                            $navLink = '/nl/'.$menuItem['object'];
                            break;
                        default:
                            $navLink = '/'.$menuItem['object'];
                            break;
                    }
                }
            }else {
                $hasParent = true;
                $pageTile = str_replace(' ', '_', $menuItem['title']);
                switch($lang){
                    case 'NL':
                        $navLink = '/nl/'.$menuIds[$menuItem['menu_item_parent']]['link'].'/'.strtolower($pageTile);
                        break;
                    default:
                        $navLink = '/'.$menuIds[$menuItem['menu_item_parent']]['link'].'/'.strtolower($pageTile);
                        break;
                }
            }
        }

        if($hasParent){
            $menu[] = [
                'Name' => $menuItem['title'],
                'Link' => $navLink,
                'parent' => $menuIds[$menuItem['menu_item_parent']]['name'],
                'parentId' => $menuItem['menu_item_parent'],
                'itemId' => $menuItem['ID'],
                'object' => $menuItem['object'],
                'templateIpa' => 'http://localhost/wordpress/wp-json/wp/v2/'.$menuItem['object'].'?slug=template'
            ];
            $subMenu[] = [
                'Name' => $menuItem['title'],
                'Link' => $navLink,
                'parent' => $menuIds[$menuItem['menu_item_parent']]['name'],
                'parentId' => $menuItem['menu_item_parent'],
                'itemId' => $menuItem['ID'],
                'object' => $menuItem['object'],
                'templateIpa' => 'http://localhost/wordpress/wp-json/wp/v2/'.$menuItem['object'].'?slug=template'
            ];
        }else{
            $menu[] = [
                'Name' => $menuItem['title'],
                'Link' => $navLink,
                'parent' => null,
                'hasChild' => null,
                'itemId' => $menuItem['ID'],
                'object' => $menuItem['object'],
                'templateIpa' => 'http://localhost/wordpress/wp-json/wp/v2/'.$menuItem['object'].'?slug=template'
            ];
        }
    }

    $menuP = count($menu);
    foreach($subMenu as $sub){
        $parentId = (int)$sub['parentId'];
        for($i = 0; $i < $menuP; $i++ ){
            if($parentId == $menu[$i]['itemId']){
                $menu[$i]['hasChild'] = 1;
            }
        }
    } 
    
    $_SESSION['menu'] = $menu;
    $_SESSION['subMenu'] = $subMenu;
}